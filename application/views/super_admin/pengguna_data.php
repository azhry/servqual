   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Daftar pengguna
                  <a href="<?= base_url('super_admin/tambah_pengguna') ?>" class="btn btn-success"><i class="fa fa-plus"></i></a>
                </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?= base_url('super_admin') ?>"> Dashboard</a></li>
                      <li class="active"><i class="fa fa-users"></i> Data pengguna</li>
                    </ol>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div>
                        <h2>Daftar pengguna</h2>
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
                        <div>
                            <?= $this->session->flashdata('msg') ?>
                        </div>

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                            </thead>

                            <tbody>
                                <?php $i=1; foreach ($data as $row): ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= $row->email ?></td>
                                    <td><?= $this->role_m->get_row(['id_role' => $row->id_role])->role ?></td>
                                    <td>
                                        <center>
                                          <a href="<?= base_url('super_admin/detail_pengguna/' . $row->id_pengguna) ?>" class="btn btn-success"><i class="fa fa-eye"></i> Detail</a>
                                          <a href="<?= base_url('super_admin/edit_pengguna/' . $row->id_pengguna) ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                          <button onclick="delete_data('<?= $row->id_pengguna ?>')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                                        </center>
                                    </td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

<script type="text/javascript">

  function delete_data(id_pengguna) {
    $.ajax({
        url: '<?= base_url('super_admin/pengguna') ?>',
        type: 'POST',
        data: {
            delete: true,
            id_pengguna: id_pengguna
        },
        success: function(response) {
            window.location = '<?= base_url('super_admin/pengguna') ?>';
        }
    });
  }

</script>