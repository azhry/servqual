   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Detail Pemesanan</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?= base_url('admin') ?>"> Dashboard</a></li>
                      <li><i class="fa fa-cart-plus"></i><a href="<?= base_url('admin/pemesanan') ?>"> Data Pemesanan</a></li>
                      <li class="active"><i class="fa fa-info"></i> Detail Data</li>                    
                    </ol>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div>
                        <h2>Detail Data Pemesanan</h2>
                    </div>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li><!-- 
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        <div class="row" style="margin-top: 2%;">
                            <div class="col-md-offset-1 col-md-10 col-sm-10 col-xs-10">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tbody>
                                        <tr>
                                            <th>Pengguna</th>
                                            <td><?= $this->pengguna_m->get_row(['id_pengguna' => $data->id_pengguna])->nama ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Penerima</th>
                                            <td><?= $data->nama_penerima ?></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Penerima</th>
                                            <td><?= $data->alamat_penerima ?></td>
                                        </tr>
                                        <tr>
                                            <th>Waktu Pemesanan</th>
                                            <td><?= $data->waktu_pemesanan ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <td>
                                                <ul>
                                                    <?php $qty = 0; foreach ($detail as $row): ?>
                                                        <li><?= $row->kode_barang ?></li>
                                                    <?php $qty += $row->qty; endforeach; ?>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Barang</th>
                                            <td><?= $qty ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ongkir</th>
                                            <td><?= 'Rp ' . number_format($data->ongkir, 2, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kurir</th>
                                            <td><?= $data->kurir ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total Pembayaran</th>
                                            <td>
                                                <?php  
                                                    $total = $data->ongkir;
                                                    foreach ($barang as $row)
                                                        $total += ($row->harga * $row->qty);
                                                    echo 'Rp ' . number_format($total, 2, ',', '.');
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td><?= $data->status ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
                            </div>
                        <div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</div>