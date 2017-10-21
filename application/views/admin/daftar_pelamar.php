<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Admin
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Daftar Pelamar
                        </h2>
                    </div>
                    <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#add"><i class="material-icons">add</i> Tambah</button>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th style="width: 450px; text-align: justify;">Asal</th>
                                <th>Email</th>
                                <th style="width: 80px;">Aksi</th>
                            </thead>
                            <tbody>
                                 <tr>
                                    <td>1</td>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry</td>
                                    <td>au@gemaiil.com</td>
                                    <td>
                                         <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                PRIMARY <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?= base_url('admin/hasil_penilaian') ?>"><i class="material-icons">info</i> Hasil Penilaian</a></li>
                                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#edit" onclick="get_buku()"><i class="material-icons">edit</i> Edit</a></li>
                                                <li><a href="javascript:void(0);"  onclick="delete_buku()"><i class="material-icons">delete</i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add -->
        <div class="modal fade" tabindex="-1" role="dialog" id="add">
          <div class="modal-dialog" role="document">
            <?= form_open('admin/') ?>
           <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Pelamar</h4>
              </div>
              <div class="modal-body">
                     <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="Nama" name="nama" class="form-control">
                            <label class="form-label">Nama</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea type="text" id="judul" name="judul" class="form-control"> </textarea>
                            <label class="form-label">Judul</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="tahun_terbit" name="tahun_terbit" class="form-control">
                            <label class="form-label">Tahun Terbit</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="jumlah_halaman" name="jumlah_halaman" class="form-control">
                            <label class="form-label">Jumlah Halaman</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="penerbit" name="penerbit" class="form-control">
                            <label class="form-label">Penerbit</label>
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default m-t-15 waves-effect" data-dismiss="modal">Batal</button>
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary m-t-15 waves-effect">
              </div>
              <?= form_close() ?>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!--/End Add -->

        <!-- Edit -->
        <div class="modal fade" tabindex="-1" role="dialog" id="edit">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <?= form_open('admin/') ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data Buku</h4>
              </div>
              <div class="modal-body">
                    <input type="hidden" name="edit_id_buku" id="edit_id_buku">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="edit_penulis" name="penulis" value="" class="form-control">
                            <label class="form-label">Penulis</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea type="text" id="edit_judul" name="judul" class="form-control"> </textarea>
                            <label class="form-label">Judul</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="edit_tahun_terbit" name="tahun_terbit" value="" class="form-control">
                            <label class="form-label">Tahun Terbit</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="edit_jumlah_halaman" name="jumlah_halaman" value="" class="form-control">
                            <label class="form-label">Jumlah Halaman</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="edit_penerbit" name="penerbit" value="" class="form-control">
                            <label class="form-label">Penerbit</label>
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <input type="submit" name="edit" value="Edit" class="btn btn-primary">
              </div>
              <?= form_close() ?>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->  
        <!--/End Edit -->
    </div>
</section>

<script type="text/javascript">

        function get_buku(id_buku) {
            $.ajax({
                url: '<?= base_url('admin/') ?>',
                type: 'POST',
                data: {
                    id_buku: id_buku,
                    get: true
                },
                success: function(response) {
                    response = JSON.parse(response);
                    $('#edit_id_buku').val(response.id_buku);
                    $('#edit_penulis').val(response.penulis);
                    $('#edit_judul_buku').val(response.judul_buku);
                    $('#edit_tahun_terbit').val(response.tahun_terbit);
                    $('#edit_jumlah_halaman').val(response.jumlah_hal);
                    $('#edit_penerbit').val(response.penerbit);
                }
            });
        }

        function delete_buku(id_buku) {
            $.ajax({
                url: '<?= base_url('admin/') ?>',
                type: 'POST',
                data: {
                    id_buku: id_buku,
                    delete: true
                },
                success: function() {
                    window.location = '<?= base_url('admin/') ?>';
                }
            });   
        }
    </script>