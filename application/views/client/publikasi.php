<div class="col-12">
    <div class="card">
        <div class="card-body table-responsive">
            <button class="btn btn-sm btn-primary mb-3" onclick="add_data()"><i class="fa fa-plus"></i></button>
            <table class="table table-sm table-bordered" id="main-table">
                <thead>
                    <tr class="table-secondary">
                        <th>#</th>
                        <th>Judul</th>
                        <th>Jurnal / Prosiding</th>
                        <th>Tahun Terbit</th>
                        <th>Tingkat</th>
                        <th>Indeksasi</th>
                        <th>Bukti</th>
                        <th><i class="fa fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data as $d) {
                        $decode_bukti = json_decode($d->bukti);


                        if ($decode_bukti->type == 'file') {
                            $li_bukti = '';
                            foreach ($decode_bukti->data as $db) {
                                $li_bukti .= '<li><a href="' . base_url('assets/upload/publikasi/' . $db->file_name) . '" target="_blank">' . $db->ori_name . '</a></li>';
                            }
                            $bukti = '<ul>' . $li_bukti . '</ul>';
                        } else {
                            $bukti = '<a href="' . $decode_bukti->url . '" target="_blank">Link</a>';
                        };
                        









                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $d->judul ?></td>
                            <td><?= $d->jurnal ?></td>
                            <td><?= $d->tahun ?></td>
                            <td><?= $d->level ?></td>

                            <td><?= $d->indeks ?></td>

                            <td><?= $bukti ?></td>
                            <td>
                                <?= form_open('client/validasi-publikasi', 'class="act-edit my-1"') ?>
                                <input type="hidden" name="id" value="<?= $d->id_encode ?>">
                                <input type="hidden" name="act" value="get-edit">
                                <button type="submit" class="btn btn-sm btn-primary w-100"><i class="fa fa-edit"></i></button>
                                <?= form_close() ?>

                                <?= form_open('client/validasi-publikasi', 'class="act-delete my-1"') ?>
                                <input type="hidden" name="id" value="<?= $d->id_encode ?>">
                                <input type="hidden" name="act" value="delete">
                                <button type="submit" class="btn btn-sm btn-danger w-100"><i class="fa fa-trash"></i></button>
                                <?= form_close() ?>
                            </td>
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
            <?= form_open('client/validasi-publikasi', 'id="form-modal"') ?>
            <div class="modal-body">
                <input type="hidden" name="id" id="id_modal">
                <input type="hidden" name="act" id="act_modal">

                <div class="form-group my-3">
                    <label><b>Judul</b></label>
                    <textarea name="judul" id="judul" class="form-control" rows="3" required></textarea>
                </div>

                <div class="form-group my-3">
                    <label><b>Jurnal / Prosiding</b></label>
                    <textarea name="jurnal" id="jurnal" class="form-control" rows="3" required></textarea>
                </div>

                <div class="form-group my-3">
                    <label><b>Tahun Terbit</b></label>
                    <select name="year" id="year" class="form-control" required>
                        <option value="">--pilih--</option>
                        <?php
                        $now_year = date('Y');
                        $reverse = $now_year - 15;
                        for ($i = $reverse; $i <= $now_year; $i++) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>


                <div class="form-group my-3">
                    <label><b>Tingkat</b></label>
                    <select name="level" id="level" class="form-control" required>
                        <option value="">--pilih--</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Internasional">Internasional</option>
                    </select>
                </div>

                <div class="form-group my-3">
                    <label><b>Indeksasi</b></label>
                    <div class="row">
                        <div class="col-12 my-1">
                            <label>SCOPUS</label>
                            <select name="scopus" id="scopus" class="form-control">
                                <option value="">--pilih--</option>
                                <?php
                                foreach ($scopus as $d) {
                                    echo '<option value="' . $d . '">' . $d . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-12 my-1">
                            <label>WOS</label>
                            <select name="wos" id="wos" class="form-control">
                                <option value="">--pilih--</option>
                                <?php
                                foreach ($wos as $d) {
                                    echo '<option value="' . $d . '">' . $d . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-12 my-1">
                            <label>SINTA</label>
                            <select name="sinta" id="sinta" class="form-control">
                                <option value="">--pilih--</option>
                                <?php
                                foreach ($sinta as $d) {
                                    echo '<option value="' . $d . '">' . $d . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>



                    <div class="form-group my-3">
                        <label><b>Indeksasi</b></label>
                        <select class="form-control" name="indeks" id="indeks" required>
                            <option value="">--pilih--</option>
                            <?php
                            foreach ($indeks as $key) {
                                echo '<option data-level="' . $key->level . '" value="' . $key->indeks . '">' . $key->indeks . '</option>';
                            }
                            ?>
                        </select>
                        <input type="hidden" name="level" id="level">


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