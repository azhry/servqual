   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Edit Pengguna</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?= base_url('admin') ?>"> Dashboard</a></li>
                      <li><i class="fa fa-users"></i><a href="<?= base_url('admin/pengguna') ?>"> Data Pengguna</a></li>
                      <li class="active"><i class="fa fa-pencil"></i> Edit Data</li>                    
                    </ol>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div>
                        <h2>Edit Data Pengguna</h2>
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
                                <?= form_open('admin/edit-pengguna/'.$data->id_pengguna, ['id' => 'form']) ?>

                                <input type="hidden" class="form-control" name="id_pengguna" required value="<?= $data->id_pengguna ?>">

                                <div class="form-group">
                                    <label>Role<span class="required">*</span></label>
                                    <select class="form-control" name="id_role" required>
                                        <option>---</option>
                                        <?php foreach($role as $row): ?>
                                            <option value="<?= $row->id_role ?>"><?= $row->role ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                     <input type="text" class="form-control" name="username" id="username" value="<?= $data->username ?>"/>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <span class="text-danger">* Kosongkan jika tidak mengubah password!</span>
                                    <input type="password" class="form-control" name="password" id="password"/>
                                </div>

                                <div class="form-group">
                                    <label for="Nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="Nama" value="<?= $data->nama ?>"/>
                                </div>

                                <div class="form-group">
                                    <label for="Jenis Kelamin">Jenis Kelamin</label><br>
                                    <?php if($data->jenis_kelamin == "Laki-laki"): ?>
                                        <input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki <br>
                                        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan <br>
                                    <?php elseif($data->jenis_kelamin == "Perempuan"): ?>
                                        <input type="radio" name="jenis_kelamin" value="Laki-laki" > Laki-laki <br>
                                        <input type="radio" name="jenis_kelamin" value="Perempuan" checked> Perempuan <br>
                                    <?php else: ?>
                                        <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki <br>
                                        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan <br>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email"  / value="<?= $data->email ?>">
                                </div>

                                <div class="form-group">
                                    <label for="Nomor HP">Nomor HP</label>
                                    <input type="text" class="form-control" name="no_hp" id="no_hp"   value="<?= $data->no_hp ?>"/>
                                </div>

                                <div class="form-group">
                                    <label for="Alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat"> <?= $data->alamat ?></textarea>
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