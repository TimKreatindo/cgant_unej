<div class="row">
    <div class="col-12">
        <h4 class="text-primary">Pengelola Jurnal</h4>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <?= form_open('admin/get-master', 'id="form-get-master"') ?>
                <input type="hidden" name="act" value="jabatan-jurnal">
                <button class="btn btn-sm btn-primary mb-3" type="submit">Master Jabatan Jurnal</button>
                <?= form_close() ?>

                <table class="table table-bordered table-sm" id="main-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIP</th>
                            <th>Nama Dosen</th>
                            <th>Jurnal</th>
                            <th>Jabatan</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalMaster" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 text-light" id="staticBackdropLabel">Master Jabatan Jurnal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('admin/add-master','id="form-modal-master"') ?>
            <input type="hidden" name="act" value="jabatan-jurnal">
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-sm" id="table-modal-master">
                    <thead>
                        <tr class="table-secondary">
                            <th>Jabatan</th>
                            <th width="10%"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="add_form_master()">Tambah Form</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 text-light" id="staticBackdropLabel">Detail Data</h1>
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