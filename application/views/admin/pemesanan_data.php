   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Daftar Pemesanan
                  <!-- <a href="<?= base_url('admin/tambah_pemesanan') ?>" class="btn btn-success"><i class="fa fa-plus"></i></a> -->
                </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?= base_url('admin') ?>"> Dashboard</a></li>
                      <li class="active"><i class="fa fa-cart-plus"></i> Data Pemesanan</li>
                    </ol>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div>
                        <h2>Daftar Pemesanan</h2>
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
                                        <th>Pengguna</th>
                                        <th>Penerima</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                            </thead>

                            <tbody>
                                <?php $i=1; foreach ($data as $row): ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $this->pengguna_m->get_row(['id_pengguna' => $row->id_pengguna])->nama ?></td>    
                                    <td><?= $row->nama_penerima ?></td>
                                    <td><?= $row->waktu_pemesanan ?></td>
                                    <td id="btn-<?= $row->id_pemesanan?>">
                                      
                                      <?php if ($row->status == 'Lunas'): ?>
                                        <button onclick="changeStatus(<?= $row->id_pemesanan ?>)" class="btn btn-success"><i class="fa fa-check"></i> Lunas</button>
                                      <?php else: ?>
                                        <button onclick="changeStatus(<?= $row->id_pemesanan ?>)" class="btn btn-danger"><i class="fa fa-close"></i> Belum Bayar</button>
                                      <?php endif; ?>

                                    </td>
                                    <td>
                                        <center>
                                          <a href="<?= base_url('admin/detail_pemesanan/' . $row->id_pemesanan) ?>" class="btn btn-success"><i class="fa fa-eye"></i> Detail</a>
                                          <!-- 
                                          <a href="<?= base_url('admin/edit_pemesanan/' . $row->id_pemesanan) ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                          <button onclick="delete_data('<?= $row->id_pemesanan ?>')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button> -->
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

  function delete_data(id_pemesanan) {
    $.ajax({
        url: '<?= base_url('admin/pemesanan') ?>',
        type: 'POST',
        data: {
            delete: true,
            id_pemesanan: id_pemesanan
        },
        success: function(response) {
            window.location = '<?= base_url('admin/pemesanan') ?>';
        }
    });
  }

  function changeStatus(id_pemesanan) {
    $.ajax({
      url: '<?= base_url('admin/pemesanan') ?>',
      type: 'POST',
      data: {
        id_pemesanan: id_pemesanan,
        status: true
      },
      success: function(response) {
        $('#btn-' + id_pemesanan).html(response);
      },
      error: function (e) {
        console.log(e.responseText);
      }
    });
  }

</script>