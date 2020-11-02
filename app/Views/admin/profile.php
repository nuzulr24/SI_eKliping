<div class="container">
    <a class="btn btn-info mb-2" href="<?= base_url('dashboard') ?>">Back to Dashboard</a>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile</h4>
                    <form action="profile/update" method="post">
                    <?php
                    $inputs = session()->getFlashdata('inputs');
                    $errors = session()->getFlashdata('errors');
                    $success = session()->getFlashdata('success');
                    if(!empty($errors)){ ?>
                    <div class="alert alert-danger" role="alert">
                        Whoops! Ada kesalahan saat input data, yaitu:
                        <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                    <?php
                    }
                    if(!empty($success)){ ?>
                    <div class="alert alert-success" role="alert">
                        Sukses! Berhasil melakukan registrasi.
                    </div>
                    <?php } 
                ?>
                        <input type="hidden" name="id" class="form-control" value="<?= $id; ?>">
                        <div class="form-group">
                            <label for="exampleEmail1">Fullname</label>
                            <input type="text" readonly class="form-control" name="nama" value="<?= $nama ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleEmail1">Current Password</label>
                            <input type="password" readonly class="form-control" name="password" value="<?= $password ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleEmail1">New Password</label>
                            <input type="password" class="form-control" name="new_password" placeholder="Fill Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleEmail1">Retype Password</label>
                            <input type="password" class="form-control" name="retype_password" placeholder="Fill Retype Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-info text-capitalize">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>