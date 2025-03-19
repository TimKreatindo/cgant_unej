<div class="row">
    <div class="col-12">
        <h4 class="text-primary">Publikasi</h4>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?= form_open('admin/get-master', 'id="form-get-master"') ?>
                <input type="hidden" name="act" value="index-publikasi">
                <button class="btn btn-sm btn-primary mb-3" type="submit">Master Index Publikasi</button>
                <?= form_close() ?>

                <table class="table table-bordered table-sm" id="main-table">
                    <thead>
                        <tr class="table-secondary">
                            <th>#</th>
                            <th>NIP</th>
                            <th>Nama Dosen</th>
                            <th>Indeksasi</th>
                            <th>Tahun Terbit</th>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title text-light fs-5" id="staticBackdropLabel">Master Index Publikasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('admin/add-master', 'id="form-modal-master"') ?>
            <input type="hidden" name="act" value="index-publikasi">
            <div class="modal-body table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr class="table-secondary">
                            <th>Level</th>
                            <th>Index Publikasi</th>
                            <th width="10%" class="text-center"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
                <h1 class="modal-title text-light fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>