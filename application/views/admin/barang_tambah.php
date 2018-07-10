   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Tambah Barang</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?= base_url('admin') ?>"> Dashboard</a></li>
                      <li><i class="fa fa-book"></i><a href="<?= base_url('admin/barang') ?>"> Data Barang</a></li>
                      <li class="active"><i class="fa fa-plus"></i> Tambah Data</li>                    
                    </ol>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div>
                        <h2>Input Data Barang</h2>
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
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10 col-sm-10 col-xs-10">
                                <div style="margin-bottom: 2%;">
                                    <style type="text/css">.required{color: red;}</style>
                                    <?= $this->session->flashdata('msg') ?>
                                </div>
                                <?= form_open_multipart('admin/tambah-barang', ['id' => 'form']) ?>

                                <!-- <div class="form-group">
                                    <label>Kode Barang<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="kode_barang" required>
                                </div> -->

                                <div class="form-group">
                                    <label>Kategori<span class="required">*</span></label>
                                    <select name="id_kategori_barang" class="form-control" required>
                                        <option>---</option>
                                        <?php foreach($kategori as $row): ?>
                                            <option value="<?= $row->id_kategori_barang ?>"><?= $row->nama_kategori ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div><br>

                                <div class="form-group">
                                    <label>Upload Gambar<span class="required">*</span></label>
                                    <input type="file" name="gambar" required>
                                </div><br>

                                <div class="form-group">
                                    <label>Deskripsi<span class="required">*</span></label>
                                    <textarea id="tinymce" class="form-control" name="deskripsi" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Harga<span class="required">*</span></label>
                                    <input type="number" any class="form-control" name="harga" required>
                                </div>

                                <div class="form-group">
                                    <label>Stok<span class="required">*</span></label>
                                    <input type="number" class="form-control" name="stok" required>
                                </div>

                                <div class="form-group">
                                    <label>Status<span class="required">*</span></label>
                                    <select class="form-control" name="status" required>
                                        <option>---</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                    </select>
                                </div>

                                <div>
                                    <input type="submit" onclick="submit_form();" name="simpan" value="Simpan" class="btn btn-success">
                                </div>

                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>



            <script type="text/javascript">
                function submit_form() {
                    $('#form').submit();
                }

                $(document).ready(function() {
                    tinymce.init({
                        selector: 'textarea',
                        height: 500,
                        plugins: [
                            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                            'searchreplace wordcount visualblocks visualchars code fullscreen',
                            'insertdatetime media nonbreaking save table contextmenu directionality',
                            'emoticons template paste textcolor colorpicker textpattern imagetools'
                        ],
                        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                        toolbar2: 'print preview media | forecolor backcolor emoticons',
                        image_advtab: true
                    })

                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    $('#dataTables-example').DataTable({
                        responsive: true
                    })
                });
            </script>