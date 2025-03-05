<div class="row">
    <div class="col-12">
        <h4 class="text-primary">Master Jurusan</h4>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <button class="btn btn-sm btn-primary mb-3" onclick="add_data()"><i class="fa fa-plus"></i></button>

                <table class="table table-sm table-bordered" id="main_table">
                    <thead>
                        <tr class="table-secondary">
                            <th width="10%">#</th>
                            <th>Nama Jurusan</th>
                            <th width="20%"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data as $d){ ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $d->nama_jurusan ?></td>
                            <td>
                                <?=form_open('admin/delete_jurusan', 'class="form_action"')?>
                                <input type="hidden" name="id" value="<?= sha1($d->id) ?>">
                                <button class="btn btn-sm btn-success" type="button"
                                    onclick="edit_data('<?= sha1($d->id) ?>', '<?=$d->nama_jurusan?>')">
                                    <i class="fa fa-edit"></i>
                                </button>


                                <button class="btn btn-sm btn-danger" type="submit">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <?=form_close()?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalJurusan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary ">
                <h1 class="modal-title text-light fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('admin/validasi_jurusan', 'id="form_jurusan"') ?>
            <input type="hidden" name="act" id="act_form">
            <input type="hidden" name="id" id="id_form">
            <div class="modal-body">
                <div class="form-group">
                    <label for="jurusan"><b>Nama Jurusan</b></label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control" required>
                    <small class="text-danger" id="err_jurusan"></small>
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