   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Detail Pengguna</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?= base_url('admin') ?>"> Dashboard</a></li>
                      <li><i class="fa fa-users"></i><a href="<?= base_url('admin/pengguna') ?>"> Data Pengguna</a></li>
                      <li class="active"><i class="fa fa-info"></i> Detail Data</li>                    
                    </ol>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div>
                        <h2>Detail Data Pengguna</h2>
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
                                            <th>Role</th>
                                            <td><?= $this->role_m->get_row(['id_role' => $data->id_role])->role ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td><?= $data->nama ?></td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td><?= $data->username ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?= $data->email ?></td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td><?= $data->jenis_kelamin ?></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td><?= $data->alamat ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nomor HP</th>
                                            <td><?= $data->no_hp ?></td>
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