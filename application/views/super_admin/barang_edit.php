   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Edit Barang</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?= base_url('super_admin') ?>"> Dashboard</a></li>
                      <li><i class="fa fa-book"></i><a href="<?= base_url('super_admin/barang') ?>"> Data Barang</a></li>
                      <li class="active"><i class="fa fa-pencil"></i> Edit Data</li>                    
                    </ol>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div>
                        <h2>Edit Data Barang</h2>
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
                                <?= form_open_multipart('super_admin/edit-barang/'.$data->kode_barang, ['id' => 'form']) ?>

                                <input type="hidden" class="form-control" name="kode_barang" required value="<?= $data->kode_barang ?>">

                                <div class="form-group">
                                    <label>Nama<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="nama" required value="<?= $data->nama ?>">
                                </div>

                                <div class="form-group">
                                    <label>Kategori<span class="required">*</span></label>
                                    <?php 
                                        $nilai_opt = [];
                                        foreach ( $kategori as $row ) $nilai_opt[$row->id_kategori_barang] = $row->nama_kategori;
                                        echo form_dropdown( 'id_kategori_barang', $nilai_opt, $data->id_kategori_barang, [ 'required' => '', 'class' => 'form-control' ] ); 
                                    ?>
                                </div><br>

                                <div class="form-group">
                                    <label>Upload Gambar<span class="required">*</span></label><br>
                                    <img src="<?= base_url('assets/produk/'.$nama_kategori.'/'.$data->kode_barang.'.JPG') ?>" width = "200" height = "200" style="margin-bottom: 3%;"> 
                                    <input type="file" name="gambar">
                                </div><br>

                                <!--  -->

                                <div class="form-group">
                                    <label>Harga<span class="required">*</span></label>
                                    <input type="number" any class="form-control" name="harga" required value="<?= $data->harga ?>">
                                </div>

                                <div class="form-group">
                                    <label>Stok<span class="required">*</span></label>
                                    <input type="number" class="form-control" name="stok" required value="<?= $data->stok ?>">
                                </div>

                                <div class="form-group">
                                    <label>Status<span class="required">*</span></label>
                                    <?php 
                                        $nilai_opt = [
                                            ''  => '---' ,
                                            '0' => 'Non-aktif',
                                            '1' => 'Aktif'
                                        ];

                                        echo form_dropdown( 'status', $nilai_opt, $data->status, [ 'required' => '', 'class' => 'form-control' ] ); 
                                    ?>
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