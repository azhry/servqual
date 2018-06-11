   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Daftar Barang
                  <a href="<?= base_url('super_admin/tambah_barang') ?>" class="btn btn-success"><i class="fa fa-plus"></i></a>
                </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?= base_url('super_admin') ?>"> Dashboard</a></li>
                      <li class="active"><i class="fa fa-book"></i> Data Barang</li>
                    </ol>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div>
                        <h2>Daftar Barang</h2>
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
                                        <th>Kode Barang</th>
                                        <th>Kategori Barang</th>
                                        <th>Nama</th><!-- 
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Stok</th> -->
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                            </thead>

                            <tbody>
                                <?php $i=1; foreach ($data as $row): ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row->kode_barang ?></td>
                                    <td><?= $this->kategori_barang_m->get_row(['id_kategori_barang' => $row->id_kategori_barang])->nama_kategori ?></td>
                                    <td><?= $row->nama ?></td><!-- 
                                    <td><?= $row->deskripsi ?></td>
                                    <td><?= $row->harga ?></td>
                                    <td><?= $row->stok ?></td> -->
                                    <td><?= $row->status ?></td>
                                    <td>
                                        <center>
                                          <a href="<?= base_url('super_admin/detail_barang/' . $row->kode_barang) ?>" class="btn btn-success"><i class="fa fa-eye"></i> Detail</a>
                                          <a href="<?= base_url('super_admin/edit_barang/' . $row->kode_barang) ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                          <button onclick="delete_data('<?= $row->kode_barang ?>')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
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

  function delete_data(kode_barang) {
    $.ajax({
        url: '<?= base_url('super_admin/barang') ?>',
        type: 'POST',
        data: {
            delete: true,
            kode_barang: kode_barang
        },
        success: function(response) {
            window.location = '<?= base_url('super_admin/barang') ?>';
        }
    });
  }

</script>