<div class="col-12">
    <div class="card">
        <div class="card-body table-responsive">

            <button class="btn btn-sm btn-primary mb-3" onclick="add_data()"><i class="fa fa-plus"></i></button>

            <table class="table table-bordered table-sm" id="main-table">
                <thead>
                    <tr class="table-secondary">
                        <th>#</th>
                        <th>Jenis Rekognisi</th>
                        <th>Jenis Kegiatan</th>
                        <th>Tingkat Rekognisi</th>
                        <th>Penyelenggara</th>
                        <th>Tahun</th>
                        <th>Bukti</th>
                        <th><i class="fa fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($data as $d){ 
                        $decode_bukti = json_decode($d->bukti);
                        if($decode_bukti->type == 'file'){
                            $li_bukti = '';
                            foreach($decode_bukti->data as $db){
                                $li_bukti .= '<li><a href="'. base_url('assets/upload/rekognisi/' . $db->file_name) . '" target="_blank">' . $db->ori_name . '</a></li>';
                            }
                            $bukti = '<ul>' . $li_bukti . '</ul>';
                        } else {
                            $bukti = '<a href="'. $decode_bukti->url . '" target="_blank">Link</a>';
                        }    
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $d->jenis_rekognisi ?></td>
                        <td><?= $d->jenis_kegiatan ?></td>
                        <td><?= $d->level ?></td>
                        <td><?= $d->penyelenggara ?></td>
                        <td><?= $d->tahun ?></td>
                        <td><?= $bukti ?></td>
                        <td>
                            <?= form_open('client/validasi-rekognisi', 'class="act-edit"') ?>
                            <input type="hidden" name="id" value="<?= $d->id_encode ?>">
                            <input type="hidden" name="act" value="get-edit">
                            <button class="btn btn-sm btn-primary w-100 my-1" type="submit"><i
                                    class="fa fa-edit"></i></button>
                            <?= form_close() ?>


                            <?= form_open('client/validasi-rekognisi', 'class="act-delete"') ?>
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

<!-- Modal -->
<div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title text-light fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('client/validasi-rekognisi', 'id="form-modal"') ?>
            <div class="modal-body">
                <input type="hidden" name="id" id="id_modal">
                <input type="hidden" name="act" id="act_modal">

                <div class="form-group my-3">
                    <label><b>Tahun</b></label>
                    <select name="year" id="year" class="form-control" required>
                        <option value="">--pilih--</option>
                        <?php
                            $now_year = date('Y');
                            $reverse = $now_year - 15;
                            for($i = $reverse; $i <= $now_year; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                        ?>
                    </select>
                </div>


                <div class="form-group my-3">
                    <label><b>Jenis Rekognisi</b></label>
                    <select name="jenis_rekognisi" id="jenis_rekognisi" class="form-control" required>
                        <option value="">--pilih--</option>
                        <?php
                            foreach($rekognisi as $re){
                                echo '<option value="'.$re.'">'.$re.'</option>';
                            }
                        ?>
                    </select>
                </div>


                <div class="form-group my-3">
                    <label><b>Jenis Kegiatan</b></label>
                    <select name="jenis_kegiatan" id="jenis_kegiatan" class="form-control" required>
                        <option value="">--pilih--</option>
                        <?php
                            foreach($kegiatan as $re){
                                echo '<option value="'.$re.'">'.$re.'</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group my-3">
                    <label><b>Tingkat Rekognisi</b></label>
                    <select name="tingkat_rekognisi" id="tingkat_rekognisi" class="form-control" required>
                        <option value="">--pilih--</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Internasional">Internasional</option>
                    </select>
                </div>

                <div class="form-group my-3">
                    <label><b>Penyelenggara</b></label>
                    <textarea name="penyelenggara" id="penyelenggara" class="form-control" rows="3" required></textarea>
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