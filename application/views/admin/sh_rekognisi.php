<div class="row">
    <div class="col-12">
        <div class="col-12">
            <h4 class="text-primary">Rekognisi</h4>
        </div>
        <div class="card">
            <div class="card-body table-responsive">

                <div class="row align-items-center">
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                        <?= form_open('admin/get-master', 'id="form-get-master1"') ?>
                        <input type="hidden" name="act" value="kegiatan-rekognisi">
                        <button class="btn btn-sm btn-primary mb-3 w-100" type="submit">Master Jenis Kegiatan</button>
                        <?= form_close() ?>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                        <?= form_open('admin/get-master', 'id="form-get-master2"') ?>
                        <input type="hidden" name="act" value="jenis-rekognisi">
                        <button class="btn btn-sm btn-primary mb-3 w-100" type="submit">Master Jenis
                            Rekognisi</button>
                        <?= form_close() ?>
                    </div>
                </div>
                <table class="table table-bordered table-sm" id="main-table">
                    <thead>
                        <tr class="table-secondary">
                            <th>#</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Tahun</th>
                            <th>Penyelenggara</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 text-light" id="staticBackdropLabel">Modal title</h1>
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


<div class="modal" id="modalMaster1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title text-light fs-5" id="staticBackdropLabel">Master Jenis Kegiatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('admin/add-master', 'id="form-modal-master1"') ?>
            <input type="hidden" name="act" value="kegiatan-rekognisi">
            <div class="modal-body">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr class="table-secondary">
                            <th>Jenis Kegiatan</th>
                            <th width="10%" class="text-center"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="add_form_master1()">Tambah Form</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>


<div class="modal" id="modalMaster2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title text-light fs-5" id="staticBackdropLabel">Master Jenis Rekognisi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('admin/add-master', 'id="form-modal-master2"') ?>
            <input type="hidden" name="act" value="jenis-rekognisi">
            <div class="modal-body">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr class="table-secondary">
                            <th>Jenis Rekognisi</th>
                            <th width="10%" class="text-center"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="add_form_master2()">Tambah Form</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>