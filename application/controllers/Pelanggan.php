<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends MY_Controller
{
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model( 'instagram_m' );
        // $this->instagram_m->set_username( 'azharyarliansyah' );
        // $this->dump( $this->instagram_m->get_posts() );
        // exit;

        $this->data['id_pengguna']  = $this->session->userdata( 'id_pengguna' );
        $this->data['id_role']      = $this->session->userdata( 'id_role' );
        $this->data['username']     = $this->session->userdata( 'username' );

        $this->data['logged_in']    = false;
        if ( isset( $this->data['id_pengguna'], $this->data['id_role'], $this->data['username'] ) ) {
            $this->data['logged_in']    = true;
        }
    }

    public function index()
    {
        $this->load->model('barang_m');

        $this->data['title']    = 'Home';
        $this->data['barang']   = $this->barang_m->get();
        $this->data['content']  = 'pelanggan/home';
        $this->template($this->data, 'pelanggan');
    }

    public function detail_barang()
    {
        $this->data['kode_barang']    = $this->uri->segment(3);
        $this->check_allowance( !isset( $this->data['kode_barang'] ) );
        
        $this->load->model('barang_m');
        $this->data['barang']         = $this->barang_m->get_row(['kode_barang' => $this->data['kode_barang']]);
        $this->check_allowance( !isset( $this->data['barang'] ), [ 'Data not found', 'danger' ] );
       
        $this->load->model( 'kategori_barang_m' );
        $this->data['kategori']       = $this->kategori_barang_m->get_row([ 'id_kategori_barang' => $this->data['barang']->id_kategori_barang ]);
        $this->check_allowance( !isset( $this->data['kategori'] ), [ 'Category not found', 'danger' ] );

        $this->data['title']          = 'Detail Barang';
        $this->data['semua_barang']   = $this->barang_m->get();
        $this->data['content']        = 'pelanggan/detail_barang';
        $this->template($this->data, 'pelanggan');
    }

    public function cart()
    {
        $this->load->model( 'barang_m' );
        $this->load->library( 'rajaongkir' );

        $this->data['area']           = '327';
        if ( $this->POST( 'get_shipping_cost' ) ) {

            $this->data['shipping_cost'] = $this->rajaongkir->cost( $this->data['area'], $this->POST( 'city_id' ), 1000,  $this->POST( 'shipping_agent' ) );
            echo $this->data['shipping_cost'];
            exit;

        }

        if ( $this->POST( 'get_city' ) ) {

            $this->data['city'] = $this->rajaongkir->city( $this->POST( 'province_id' ) );
            echo $this->data['city'];
            exit;

        }

        $this->data['provinsi']         = $this->rajaongkir->province();
        if ( !empty( $this->data['provinsi'] ) ) {

            $this->data['provinsi'] = json_decode( $this->data['provinsi'] );
            $this->data['provinsi'] = $this->data['provinsi']->rajaongkir->results;  

        } 

        if ( $this->POST( 'checkout' ) ) {

            if ( $this->data['logged_in'] ) {

                $total_belanja = $this->POST( 'shipping-cost-hidden' );
                $this->load->model( 'pemesanan_m' );
                $this->load->model( 'detail_pemesanan_m' );
                $this->data['pemesanan'] = [
                    'id_pengguna'       => $this->data['id_pengguna'],
                    'status'            => 'Belum bayar',
                    'nama_penerima'     => $this->POST( 'nama_penerima' ),
                    'alamat_penerima'   => $this->POST( 'alamat_penerima' ),
                    'kurir'             => $this->POST( 'kurir' ),
                    'ongkir'            => $this->POST( 'shipping-cost-hidden' )
                ];
                $this->pemesanan_m->insert( $this->data['pemesanan'] );

                $this->load->model( 'barang_m' );
                $id_pemesanan = $this->db->insert_id();
                foreach ( $this->cart->contents() as $item ) {

                    $barang = $this->barang_m->get_row([ 'kode_barang' => $item['id'] ]);
                    if ( $barang ) {
                        $this->data['detail_pemesanan'] = [
                            'id_pemesanan'  => $id_pemesanan,
                            'kode_barang'   => $item['id'],
                            'qty'           => $item['qty']
                        ];
                        $this->detail_pemesanan_m->insert( $this->data['detail_pemesanan'] );
                        $total_belanja += $barang->harga * $item['qty'];
                    }

                }

                $this->cart->destroy();
                $this->flashmsg( 'Total belanja anda adalah IDR ' . number_format($total_belanja, 2, ',', '.') . '. Silahkan transfer sesuai dengan nominal yang tertera ke rekening BNI 21324324 a.n Enggi RP', 'success', 'cart_success' );
            }
            redirect( 'pelanggan/cart' );
            exit;  

        }

        $this->data['title']            = 'Cart';
        $this->data['semua_barang']     = $this->barang_m->get();
        $this->data['content']          = 'pelanggan/cart';
        $this->template($this->data, 'pelanggan');
    }

    public function perbandingan_produk()
    {
        $this->load->model('barang_m');
        $this->load->model('kategori_barang_m');

        if ( $this->POST( 'get_barang' ) ) {

            echo json_encode( $this->barang_m->get_row_barang([ 'kode_barang' => $this->POST( 'kode_barang' ) ]) );
            exit;

        }

        $this->data['title']          = 'Perbandingan Produk';
        $this->data['barang']         = $this->barang_m->get_row(['kode_barang' => 'K405']);
        $this->data['semua_barang']   = $this->barang_m->get();
        $this->data['content']        = 'pelanggan/perbandingan_produk';
        $this->template($this->data, 'pelanggan');
    }

    public function add_to_cart() {

        if ( $this->POST( 'add_to_cart' ) ) {

            $item = [
                'id'        => $this->POST( 'id' ),
                'qty'       => $this->POST( 'qty' ),
                'price'     => $this->POST( 'price' ),
                'name'      => $this->POST( 'name' ),
                'options'   => [
                    'deskripsi'             => $this->POST( 'description' ),
                    'id_kategori_barang'    => $this->POST( 'id_kategori' )
                ]
            ];

            $this->cart->insert( $item );

        }

    }

    public function update_cart() {

        if ( $this->POST( 'update_cart' ) ) {

            $item = [
                'rowid' => $this->POST( 'rowid' ),
                'qty'   => $this->POST( 'qty' )
            ];

            $this->cart->update( $item );

        }

    }

    public function cek_barang() {

        $this->load->model( 'barang_m' );
        $this->data['barang'] = $this->barang_m->get();
        echo json_encode( $this->data['barang'] );

    }

}