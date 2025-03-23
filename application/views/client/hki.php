<div class="col-12">
  <div class="card">
    <div class="card-body table-responsive">

      <button type="button" name="button" class="btn btn-sm btn-primary mb-3" onclick="add_data()"><i class="fa fa-plus"></i></button>

<!-- <?php
  var_dump($data);
?> -->


      <table class="table table-bordered table-sm" id="main-table">
        <thead>
          <tr class="table-secondary">
            <th>#</th>
            <th>Nama Dosen</th>
            <th>Judul</th>
            <th>No. HKI</th>
            <th>Tanggal Terbit</th>
            <th>Bukti</th>
            <th><i class="fa fa-cogs"></i></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no=1;
          foreach ($data as $key) {
            $decode_bukti = json_decode($key->bukti);
            $c_date = date_create($key->tanggal);
            if($decode_bukti->type == 'file'){
                           $li_bukti = '';
                           foreach($decode_bukti->data as $db){
                               $li_bukti .= '<li><a href="'. base_url('assets/upload/hki/' . $db->file_name) . '" target="_blank">' . $db->ori_name . '</a></li>';
                           }
                           $bukti = '<ul>' . $li_bukti . '</ul>';
                       } else {
                           $bukti = '<a href="'. $decode_bukti->url . '" target="_blank">Link</a>';
                       }

          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td>
              <ul>


              <?php
                echo "<li>".$key->user_create." (".$key->user_nip.")</li>";
                $u = json_decode($key->user_info);
                if(!empty($u)){
                  for ($i=0; $i < count($u); $i++) {
                    echo '<li>'.$u[$i].'</li>';
                  }
                }
              ?>

              </ul>
            </td>
            <td><?= $key->judul ?></td>
            <td><?= $key->no_hki ?></td>
            <td><?= date_format($c_date, 'd F Y') ?></td>
            <td><?= $bukti ?></td>
            <td>
              <?php if($key->id_user == $user->id){ ?>
                              <?= form_open('client/validasi-hki', 'class="act-edit"') ?>
                              <input type="hidden" name="id" value="<?= $key->id_encode ?>">
                              <input type="hidden" name="act" value="get-edit">
                              <button class="btn btn-sm btn-primary w-100 my-1" type="submit"><i
                                      class="fa fa-edit"></i></button>
                              <?= form_close() ?>


                              <?= form_open('client/validasi-hki', 'class="act-delete"') ?>
                              <input type="hidden" name="id" value="<?= $key->id_encode ?>">
                              <input type="hidden" name="act" value="delete">
                              <button class="btn btn-sm btn-danger w-100 my-1" type="submit"><i
                                      class="fa fa-trash"></i></button>
                              <?= form_close() ?></td>
              <?php } ?>

          </tr>
        <?php } ?>
        </tbody>
      </table>


    </div>
  </div>
</div>

<div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary ">
        <h1 class="modal-title text-light fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('client/validasi-hki', 'id="form-modal"') ?>
      <input type="hidden" name="id" id="id_modal">
      <input type="hidden" name="act" id="act_modal">
      <div class="modal-body">

        <div class="form-group my-3">
          <label><b>No HKI</b></label>
          <input type="text" name="no_hki" id="no_hki" class="form-control" required>
        </div>

        <div class="form-group my-3">
          <label><b>Judul Jurnal</b></label>
          <textarea name="jurnal" id="jurnal" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group my-3">
          <label><b>Tanggal Terbit</b></label>
          <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>

        <div class="form-group my-3">
          <div class="row align-items-center">
            <div class="col-10">
              <label><b>Dosen Lain yang Terlibat</b></label>
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-sm btn-success" onclick="add_list_dosen()">
                <i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
        </div>

        <div id="append-list-dosen" class="my-3">
        </div>

        <div class="form-group my-3">
                           <label><b>Bukti</b></label>

                           <div id="type_bukti">
                               <div class="form-group my-3">
                                   <label>Tipe Bukti</label>
                                   <select name="tipe_bukti" id="tipe_bukti" class="form-control" required>
                                       <option value="">--pilih--</option>
                                       <option value="url">URL</option>
                                       <option value="file">File</option>
                                   </select>
                               </div>
                           </div>


                           <div id="bukti_url_container" class="d-none my-3">
                               <label>Masukkan URL</label>
                               <input type="url" name="bukti_url" id="bukti_url" class="form-control">
                           </div>

                           <div id="bukti_file" class="d-none my-3">
                               <label>Upload File</label>
                               <input type="file" name="bukti[]" id="bukti_files" class="form-control" multiple="true">
                               <small>
                                   <ul>
                                       <li>Ukuran file max 3mb</li>
                                       <li>File yang di izinkan (jpg, jpeg, png, svg, pdf, doc, docx, xls, xlsx, ppt, pptx)
                                       </li>
                                   </ul>
                               </small>

                               <div class="ct my-3 p-2" id="container_file">
                               </div>
                           </div>
                       </div>


                       <div class="my-3 mt-5 d-none" id="preview_bukti">
                           <label><b>Bukti Terupload</b></label>

                           <div id="container_preview_bukti">
                           </div>
                       </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<div class="modal" id="selectDosen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5 text-light" id="staticBackdropLabel">Tambah List Dosen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-bordered table-sm" id="table-list-dosen">
          <thead>
            <tr class="table-secondary">
              <th>#</th>
              <th>NIP</th>
              <th>Nama Dosen</th>
              <th><i class="fa fa-cogs"></i></th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
