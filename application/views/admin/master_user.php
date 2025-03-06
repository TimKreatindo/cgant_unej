<div class="row">
    <div class="col-12">
        <h4 class="text-primary">Master User</h4>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">

                <button class="btn btn-sm btn-primary mb-3" onclick="add_data()"><i class="fa fa-plus"></i></button>

                <table class="table table-bordered table-sm" id="main-table">
                    <thead>
                        <tr class="table-secondary">
                            <th>#</th>
                            <th>Foto</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Jurusan</th>
                            <th>Status</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

            </div>
        </div>
    </div>
</div>


<div class="modal" id="modalUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
                <h1 class="modal-title fs-5 text-light" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <?= form_open('admin/validasi-user', 'id="form_modal"') ?>
            <input type="hidden" name="act" id="act_modal">
            <input type="hidden" name="id" id="id_modal">
            <div class="modal-body">

                <div class="form-group my-1">
                    <label for="nip"><b>NIP</b></label>
                    <input type="text" name="nip" id="nip" class="form-control">
                    <small class="text-danger" id="err_nip"></small>
                </div>

                <div class="form-group my-1">
                    <label for="name"><b>Nama Lengkap dan Gelar</b></label>
                    <input type="text" name="name" id="name" class="form-control">
                    <small class="text-danger" id="err_name"></small>
                </div>

                <div class="form-group my-1">
                    <label for="role"><b>Role</b></label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="">--pilih--</option>
                        <?php
                            foreach($role as $r){
                                echo '<option value="'.$r->id.'">'.$r->nama_role.'</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group my-1">
                    <label for="jurusan"><b>Jurusan</b></label>
                    <select name="jurusan" id="jurusan" class="form-control" required>
                        <option value="">--pilih--</option>
                        <?php
                            foreach($jurusan as $j){
                                echo '<option value="'.$j->id.'">'.$j->nama_jurusan.'</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group my-1" id="form_new_pass">
                    <label for="new_pass"><b>Password Baru</b></label>
                    <input type="password" name="new_pass" id="new_pass" class="form-control">
                    <small class="text-danger" id="err_new_pass"></small>
                </div>

                <div class="form-group my-1" id="form_conf_new_pass">
                    <label for="conf_new_pass"><b>Konfirmasi Password Baru</b></label>
                    <input type="password" name="conf_new_pass" id="conf_new_pass" class="form-control">
                    <small class="text-danger" id="err_conf_new_pass"></small>
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