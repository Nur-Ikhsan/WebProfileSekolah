<div class="container col-xl-10 col-xxl-8 px-4 py-5">

    <?php
    if (isset($model['error'])) {
        echo '<div class="row">
                    <div class="alert alert-danger" role="alert">
                        ' . $model['error'] . '
                    </div>
                </div>';
    }
    ?>
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Register</h1>
            <p class="col-lg-10 fs-4">by <a target="_blank" href="#">Ruby Group</a></p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/admin/register">
                <div class="form-floating mb-3">
                    <input name="username" type="text" class="form-control" id="username" placeholder="username"
                           value="<?= $_POST['username'] ?? '' ?>">
                    <label for="username">Username</label>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="password" placeholder="password"
                               value="<?= $_POST['password'] ?? '' ?>">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="id_guru_staff" class="form-select" id="id_guru_staff">
                            <?php foreach ($model['guruStaff'] as $guruStaff) : ?>
                                <option value="<?= $guruStaff->getIdGuruStaff() ?>"><?= $guruStaff->getNamaGuru() ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="id_guru_staff">Pilih Guru</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            </form>
        </div>
    </div>
</div>