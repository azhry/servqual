   <!-- page content -->
        <div class="right_col" Survei="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Edit Survei</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                      <li><i class="fa fa-home"></i><a href="<?= base_url('admin') ?>"> Dashboard</a></li>
                      <li><i class="fa fa-book"></i><a href="<?= base_url('admin/survei') ?>"> Data Survei</a></li>
                      <li class="active"><i class="fa fa-pencil"></i> Edit Data</li>                    
                    </ol>
                </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div>
                        <h2>Edit Data Survei</h2>
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
                                <?= form_open('admin/edit-survei/'.$data->id_jawaban_pengguna, ['id' => 'form']) ?>

                                <input type="hidden" class="form-control" name="id_jawaban_pengguna" required value="<?= $data->id_jawaban_pengguna ?>">

                                <div class="form-group">
                                    <label>Pertanyaan<span class="required">*</span></label>
                                    <p><?= $this->pertanyaan_m->get_row(['id_pertanyaan' => $data->id_pertanyaan])->pertanyaan ?></p>

                                    <?php $jawaban = $this->jawaban_m->get(['id_pertanyaan' => $data->id_pertanyaan]); ?>
                                    <?php foreach($jawaban as $col): ?>
                                      <input type="radio" name="pertanyaan_<?= $data->id_pertanyaan ?>" value="<?= $col->id_jawaban ?>"> <?= $col->jawaban ?> <br>
                                    <?php endforeach; ?>
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