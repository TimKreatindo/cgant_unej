<div class="row">
    <div class="col-12">
        <h4 class="text-primary">Kerjasama</h4>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">

                <button class="btn btn-sm btn-primary mb-3" onclick="add_data()">
                    <i class="fa fa-plus"></i>
                </button>


                <table class="table table-bordered table-sm" id="main-table">
                    <thead>
                        <tr class="table-secondary">
                            <th>#</th>
                            <th>Lembaga Mitra</th>
                            <th>Tingkat</th>
                            <th>Judul Kegiatan</th>
                            <th>Durasi Waktu</th>
                            <th>Bukti</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 text-light" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <?= form_open_multipart('admin/validasi_kerjasama', 'id="form_modal"') ?>
            <div class="modal-body">


                <input type="hidden" name="id" id="id_form" class="form-control">
                <input type="hidden" name="act" id="act_form" class="form-control">

                <div class="form-grop my-2">
                    <label><b>Durasi Kerja Sama</b></label>
                    <div class="row">
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

                <div class="form-group my-2">
                    <label><b>Judul Kegiatan Kerjasama</b></label>
                    <textarea name="title" id="title" class="form-control" rows="3" required></textarea>
                </div>

                <div class="form-group my-2">
                    <label><b>Nama Mitra</b></label>
                    <input name="mitra" id="mitra" class="form-control" required>
                </div>

                <div class="form-group my-2">
                    <label><b>Level Kerjasama</b></label>
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