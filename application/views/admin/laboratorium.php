<div class="col-12">
    <div class="card">
        <div class="card-body table-responsive">
            <button class="btn btn-sm btn-primary mb-3" onclick="add_data()"><i class="fa fa-plus"></i></button>
            <table class="table table-bordered table-sm" id="main-table">
                <thead>
                    <tr class="table-secondary">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Merk</th>
                        <th>Bidang</th>
                        <th>Volume</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th><i class="fa fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i  = 1;
                    foreach ($data as $d) {
                        
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $d->nama ?></td>
                            <td><?= $d->merk ?></td>
                            <td><?= $d->kategori ?></td>
                            <td><?= $d->volume ?></td>
                            <td><?= $d->jumlah ?></td>
                            <td><?= $d->satuan ?></td>
                            <td>

                                <?= form_open('admin/validasi-lab', 'class="act-detail"') ?>
                                <input type="hidden" name="id" value="<?= $d->id ?>">
                                <input type="hidden" name="act" value="detail">
                                <button class="btn btn-sm btn-secondary w-100 my-1" type="submit"><i class="fas fa-search"></i></button>
                                <?= form_close() ?>

                                <?= form_open('admin/validasi-lab', 'class="act-edit"') ?>
                                <input type="hidden" name="id" value="<?= $d->id ?>">
                                <input type="hidden" name="act" value="get-edit">
                                <button class="btn btn-sm btn-primary w-100 my-1" type="submit"><i class="fa fa-edit"></i></button>
                                <?= form_close() ?>


                                <?= form_open('admin/validasi-lab', 'class="act-delete"') ?>
                                <input type="hidden" name="id" value="<?= $d->id ?>">
                                <input type="hidden" name="act" value="delete">
                                <button class="btn btn-sm btn-danger w-100 my-1" type="submit"><i class="fa fa-trash"></i></button>
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
<div class="modal" id="modalLab" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title text-light fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('admin/validasi-lab', 'id="form_modal"') ?>
            <div class="modal-body">
                <input type="hidden" name="id" id="id_modal">
                <input type="hidden" name="act" id="act_modal">

                <div class="form-group my-3">
                    <label><b>Nama</b></label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>

                <div class="form-group my-3">
                    <label><b>Merk</b></label>
                    <input type="text" name="merk" id="merk" class="form-control">
                </div>

                <div class="form-group my-3">
                    <label><b>Spesifikasi/Konsentrasi</b></label>
                    <textarea name="spesifikasi" id="spesifikasi" class="form-control" rows="3" required></textarea>
                </div>

                <div class="form-group my-2">
                    <label><b>Kategori Bahan/Alat</b></label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">--pilih--</option>
                        <option value="Alat Matematika">Alat Matematika</option>
                        <option value="Alat Fisika">Alat Fisika</option>
                        <option value="Bahan Fisika">Bahan Fisika</option>
                        <option value="Alat Kimia">Alat Kimia</option>
                        <option value="Bahan Kimia">Bahan Kimia</option>
                        <option value="Alat Biologi">Alat Biologi</option>
                        <option value="Bahan Biologi">Bahan Biologi</option>
                    </select>
                </div>

                <div class="form-group my-3">
                    <label><b>Volume</b></label>
                    <input type="number" name="volume" id="volume" class="form-control" required>
                </div>

                <div class="form-group my-3">
                    <label><b>Jumlah</b></label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control">
                </div>

                <div class="form-group my-3">
                    <label><b>Satuan</b></label>
                    <input type="text" name="satuan" id="satuan" class="form-control">
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
<div class="modal" id="modalDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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