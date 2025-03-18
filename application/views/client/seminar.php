<div class="col-12">
    <div class="card">
        <div class="card-body table-responsive">

            <button class="btn btn-sm btn-primary mb-3" onclick="add_data()"><i class="fa fa-plus"></i></button>

            <table class="table table-bordered table-sm" id="main-table">
                <thead>
                    <tr class="table-secondary">
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Judul Kegiatan</th>
                        <th>Penyelenggara</th>
                        <th width="10%"><i class="fa fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach($data as $d){
                        $decode_date = json_decode($d->tanggal_kegiatan);

                        if($decode_date->start == $decode_date->end){
                            $c_date = date_create($decode_date->start);
                            $shown_date = date_format($c_date, 'd F Y');
                        } else {
                            $c_start = date_create($decode_date->start);
                            $c_end = date_create($decode_date->end);
                            $shown_date = date_format($c_start, 'd F Y') .' - '. date_format($c_end, 'd F Y');
                        }
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $shown_date ?></td>
                        <td><?= $d->judul_kegiatan ?></td>
                        <td><?= $d->penyelenggara ?></td>
                        <td>
                            <?= form_open('client/validasi-seminar', 'class="act-detail my-1"') ?>
                            <input type="hidden" name="id" value="<?= $d->id_encode ?>">
                            <input type="hidden" name="act" value="detail">
                            <button type="submit" class="btn btn-sm btn-secondary w-100"><i
                                    class="fa fa-search"></i></button>
                            <?= form_close() ?>


                            <?= form_open('client/validasi-seminar', 'class="act-edit my-1"') ?>
                            <input type="hidden" name="id" value="<?= $d->id_encode ?>">
                            <input type="hidden" name="act" value="get-edit">
                            <button type="submit" class="btn btn-sm btn-primary w-100">
                                <i class="fa fa-edit"></i>
                            </button>
                            <?= form_close() ?>


                            <?= form_open('client/validasi-seminar', 'class="act-delete my-1"') ?>
                            <input type="hidden" name="id" value="<?= $d->id_encode ?>">
                            <input type="hidden" name="act" value="delete">
                            <button type="submit" class="btn btn-sm btn-danger w-100">
                                <i class="fa fa-trash"></i>
                            </button>
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
            <div class="modal-header bg-primary ">
                <h1 class="modal-title fs-5 text-light" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('client/validasi-seminar', 'id="form-modal"') ?>
            <div class="modal-body">

                <input type="hidden" name="id" id="id_modal">
                <input type="hidden" name="act" id="act_modal">

                <div class="form-group my-3">
                    <label><b>Tanggal Kegiatan</b></label>
                    <div class="row g-1">
                        <div class="col-6">
                            <label>Dari Tanggal</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" required>
                        </div>
                    </div>
                </div>


                <div class="form-group my-3">
                    <label><b>Jenis Kegiatan</b></label>
                    <select name="jenis_kegiatan" id="jenis_kegiatan" class="form-control" required>
                        <option value="">--pilih--</option>
                        <?php
                          foreach ($kegiatan as $key) {
                            echo '<option value="'.$key.'">'.$key.'</option>';
                          }
                        ?>
                    </select>
                </div>

                <div class="form-group my-3">
                    <label><b>Jenis Partisipasi</b></label>
                    <select name="jenis_partisipasi" id="jenis_partisipasi" class="form-control" required>
                        <option value="">--pilih--</option>
                        <?php
                          foreach ($partisipasi as $key) {
                            echo '<option value="'.$key.'">'.$key.'</option>';
                          }
                        ?>
                    </select>
                </div>

                <div class="form-group my-3">
                    <label><b>Judul Kegiatan</b></label>
                    <textarea name="judul_kegiatan" id="judul_kegiatan" class="form-control" rows="3"
                        required></textarea>
                </div>

                <div class="form-group my-3">
                    <label><b>Penyelenggara</b></label>
                    <textarea name="penyelenggara" id="penyelenggara" class="form-control" rows="3" required></textarea>
                </div>

                <div class="form-group my-2">
                    <label><b>Tingkat</b></label>
                    <select name="level" id="level" class="form-control" required>
                        <option value="">--pilih--</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Internasional">Internasional</option>
                    </select>
                </div>


                <div class="form-group my-2">
                    <label><b>Bukti</b></label>

                    <div id="type_bukti">
                        <div class="form-group my-2">
                            <label>Tipe Bukti</label>
                            <select name="tipe_bukti" id="tipe_bukti" class="form-control" required>
                                <option value="">--pilih--</option>
                                <option value="url">URL</option>
                                <option value="file">File</option>
                            </select>
                        </div>
                    </div>


                    <div id="bukti_url_container" class="d-none my-2">
                        <label>Masukkan URL</label>
                        <input type="url" name="bukti_url" id="bukti_url" class="form-control">
                    </div>

                    <div id="bukti_file" class="d-none my-2">
                        <label>Upload File</label>
                        <input type="file" name="bukti[]" id="bukti_files" class="form-control" multiple="true">
                        <small>
                            <ul>
                                <li>Ukuran file max 3mb</li>
                                <li>File yang di izinkan (jpg, jpeg, png, svg, pdf, doc, docx, xls, xlsx, ppt, pptx)
                                </li>
                            </ul>
                        </small>

                        <div class="ct my-2 p-2" id="container_file">
                        </div>
                    </div>
                </div>


                <div class="my-2 mt-5 d-none" id="preview_bukti">
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

<!-- Modal -->
<div class="modal" id="modalDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title text-light fs-5" id="staticBackdropLabel">Detail Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body table-responsive">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
