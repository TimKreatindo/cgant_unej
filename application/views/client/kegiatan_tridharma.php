<div class="col-12">
    <div class="card shadown">
        <div class="card-body table-responsive">

            <button class="btn btn-sm btn-primary mb-3" onclick="add_data()"><i class="fa fa-plus"></i></button>

            <table class="table table-bordered table-sm" id="main-table">
                <thead>
                    <tr class="table-secondary">
                        <th>#</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Jenis Kegiatan</th>
                        <th>Tempat Kegiatan</th>
                        <th>Bukti</th>
                        <th><i class="fa fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
<<<<<<< HEAD
                    <?php $i=1; 
                    foreach($data as $d){ 
=======
                    <?php $i=1;
                    foreach($data as $d){
>>>>>>> 85dbd2518b7e8245bd8416a5c18272a2826ade8a
                        $decode_date = json_decode($d->tanggal_kegiatan);
                        $start_date = $decode_date->start;
                        $end_date = $decode_date->end;
                        if($start_date == $end_date){
                            $tgl = date_create($start_date);
                            $show_date = date_format($tgl, 'd F Y');
                        } else {
                            $tgl_start = date_create($start_date);
                            $tgl_end = date_create($end_date);
                            $show_date = date_format($tgl_start, 'd F Y') . ' - ' . date_format($tgl_end, 'd F Y');
                        }


                        $decode_bukti = json_decode($d->bukti);
                        if($decode_bukti->type == 'file'){
                            $li_bukti = '';
                            foreach($decode_bukti->data as $db){
                                $li_bukti .= '<li><a href="'. base_url('assets/upload/kegiatan-tridharma/' . $db->file_name) . '" target="_blank">' . $db->ori_name . '</a></li>';
                            }
                            $bukti = '<ul>' . $li_bukti . '</ul>';
                        } else {
                            $bukti = '<a href="'. $decode_bukti->url . '" target="_blank">Link</a>';
                        }

                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $show_date ?></td>
                        <td><?= $d->jenis_kegiatan ?></td>
                        <td><?= $d->tempat_kegiatan ?></td>
                        <td><?= $bukti ?></td>
                        <td>
                            <?= form_open('client/validasi-tridharma', 'class="btn_get_edit"') ?>
                            <input type="hidden" name="id" value="<?= $d->id_encode ?>">
                            <input type="hidden" name="act" value="get_edit">
                            <button class="btn btn-sm btn-primary w-100 my-1" type="submit"><i
                                    class="fa fa-edit"></i></button>
                            <?= form_close() ?>

                            <?= form_open('client/validasi-tridharma', 'class="delete_data"') ?>
                            <input type="hidden" name="id" value="<?= $d->id_encode ?>">
                            <input type="hidden" name="act" value="delete">
                            <button class="btn btn-sm btn-danger w-100 my-1" type="submit"><i
                                    class="fa fa-trash"></i></button>
                            <?= form_close() ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


<div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary ">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('client/validasi-tridharma', 'id="form_modal"') ?>
            <div class="modal-body">
                <input type="hidden" name="id" id="id_modal">
                <input type="hidden" name="act" id="act_modal">

                <div class="form-group my-3">
                    <label><b>Tanggal Kegiatan</b></label>
                    <div class="row g-1">
                        <div class="col-6">
                            <label>Dari Tanggal</label>
                            <input type="date" name="start_date" id="start_date" class="form-control">
                        </div>
                        <div class="col-6">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="end_date" id="end_date" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="form-group my-3">
                    <label><b>Jenis Kegiatan</b></label>
                    <select name="jenis_kegiatan" id="jenis_kegiatan" class="form-control">
                        <option value="">--pilih--</option>
<<<<<<< HEAD
                        <option value="Seminar Internasional">Seminar Internasional</option>
                        <option value="Seminar Nasional">Seminar Nasional</option>
                        <option value="Workshop">Workshop</option>
=======
                        <?php
                          foreach ($kegiatan as $key) {
                            echo '<option value="'.$key.'">'.$key.'</option>';
                          }
                         ?>
>>>>>>> 85dbd2518b7e8245bd8416a5c18272a2826ade8a
                    </select>
                </div>


                <div class="form-group my-3">
                    <label><b>Tempat Kegiatan</b></label>
                    <textarea name="tempat_kegiatan" id="tempat_kegiatan" class="form-control" rows="3"></textarea>
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
<<<<<<< HEAD
</div>
=======
</div>
>>>>>>> 85dbd2518b7e8245bd8416a5c18272a2826ade8a
