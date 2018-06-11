   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Tambah Jawaban</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?= base_url('super_admin') ?>"> Dashboard</a></li>
                      <li><i class="fa fa-book"></i><a href="<?= base_url('super_admin/jawaban') ?>"> Data Jawaban</a></li>
                      <li class="active"><i class="fa fa-plus"></i> Tambah Data</li>                    
                    </ol>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div>
                        <h2>Input Data Jawaban</h2>
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
                                <?= form_open('super_admin/tambah-jawaban', ['id' => 'form']) ?>

                                <div class="form-group">
                                    <label>Pertanyaan<span class="required">*</span></label>
                                    <select class="form-control" name="id_pertanyaan" required>
                                      <?php foreach($pertanyaan as $row): ?>
                                        <option value="<?= $row->id_pertanyaan ?>"><?= $row->pertanyaan ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jawaban<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="jawaban" required>
                                </div>
                                <div class="form-group">
                                    <label>Skor<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="skor" required>
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
            </script>