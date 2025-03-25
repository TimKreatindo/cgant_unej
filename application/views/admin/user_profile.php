<div class="row">
    <div class="col-8">
        <h4 class="text-primary">User Profile</h4>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-body table-responsive">
                <?= form_open_multipart('admin/edit-profile', 'id="form_profile"') ?>
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $user->id ?>" />
                <div class="mb-3">
                    <label class="form-label"><b>Nama</b></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user->nama ?>" />
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><b>NIP</b></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= $user->nip ?>" />
                        <div class="input-group-text"><i class="fas fa-at"></i></div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"><b>Role</b></label>
                    <div class="col-sm-10">
                        <p class="form-control-plaintext"><?= $user->nama_role ?></p>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label><b>Foto Profil</b></label>

                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user->image ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <label class="custom-file-label">Upload File</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <small>
                                    <ul>
                                        <li>Ukuran file max 3mb</li>
                                        <li>File yang di izinkan (jpg, jpeg, png)
                                        </li>
                                    </ul>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" id="to_profile">Ubah Profile</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body table-responsive">
                <?= form_open('admin/change_password', 'id="form_change_pass"') ?>
                <input type="hidden" class="form-control" id="id_pass" name="id_pass" value="<?= $user->id ?>" />
                <div class="mb-3">
                    <label class="form-label">Current Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="old_pass" name="old_pass" />
                        <div class="input-group-text"><i class="fas fa-user-lock"></i></div>
                    </div>
                    <small class="text-danger" id="err_old_pass"></small>
                </div>
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="new_pass" name="new_pass" />
                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                    </div>
                    <small class="text-danger" id="err_new_pass"></small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Repeat Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="repeat_new_pass" name="repeat_new_pass" />
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                    </div>
                    <small class="text-danger" id="err_repeat_new_pass"></small>
                </div>
                <div class="card-footer">
                    <button class="btn btn-info" type="submit" id="to_password">Ganti Password</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>