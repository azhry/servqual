   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Detail Barang</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?= base_url('super_admin') ?>"> Dashboard</a></li>
                      <li><i class="fa fa-book"></i><a href="<?= base_url('super_admin/barang') ?>"> Data Barang</a></li>
                      <li class="active"><i class="fa fa-info"></i> Detail Data</li>                    
                    </ol>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div>
                        <h2>Detail Data Barang</h2>
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
                                  <?php 
                                    $kategori = $this->kategori_barang_m->get_row(['id_kategori_barang' => $data->id_kategori_barang]);
                                  ?>
                                    <tbody>
                                        <tr>
                                            <th>Foto</th>
                                            <td>
                                              <img src="<?= base_url('assets/produk/' . $kategori->nama_kategori . '/'.$data->kode_barang.'.jpg') ?>" width = "200" height = "200"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <td><?= $data->kode_barang ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td><?= $data->nama ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kategori Barang</th>
                                            <td><?= $kategori->nama_kategori ?></td>
                                        </tr>
                                        <tr>
                                            <th>Harga</th>
                                            <td><?= $data->harga ?></td>
                                        </tr>
                                        <tr>
                                            <th>Stok</th>
                                            <td><?= $data->stok ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td><?= $data->status ?></td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <td><p style="text-align: justify;"><?= $data->deskripsi ?></p></td>
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