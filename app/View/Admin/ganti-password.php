<div class="admin">
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div id="SweetAlert2">
            <?php if (isset($model['error'])): ?>
                <script>
                  Swal.fire({
                    icon: 'error',
                    title: 'Change Password Failed',
                    html: '<?= $model['error'] ?>',
                    confirmButtonText: 'Try Again',
                    showCancelButton: false,
                    allowOutsideClick: false,
                    customClass: {
                      confirmButton: 'button-admin delete px-4'
                    }
                  }).then(function (result) {
                    if (result.isConfirmed) {
                      window.location.href = '/admin/ganti-password';
                    }
                  });;
                </script>
            <?php endif; ?>
            <?php if (isset($model['success'])): ?>
                <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Change Password Success',
                    html: '<?= $model['success'] ?>',
                    confirmButtonText: 'Ok',
                    showCancelButton: false,
                    allowOutsideClick: false,
                    customClass: {
                      confirmButton: 'button-admin px-4'
                    }
                  }).then(function (result) {
                    if (result.isConfirmed) {
                      window.location.href = '/admin';
                    }
                  });;
                </script>
            <?php endif; ?>
        </div>
        <div class="row justify-content-center align-items-center gap-3">
            <div class="d-flex align-items-center justify-content-center">
                <a class="navbar-brand logo d-flex align-items-center" href="/index">
                    <img src="/images/logo1.png" alt="logo"/>
                    <span class="d-block" style="color: #314081">MTs NEGERI 2 SAMBAS</span>
                </a>
            </div>
            <div class="card justify-content-center align-items-center col-12 col-md-8 col-lg-6 p-4">
                <div class="card-title"><h3>Password</h3></div>
                <p class="text-center">by <a target="_blank" href="#">Ruby Group</a></p>
                <form class="mt-3 col-12" method="post" action="/admin/ganti-password">
                    <div class="mb-5 col-12">
                        <label for="oldPassword" class="form-label">Old Password</label>
                        <input name="oldPassword" type="password" class="form-control col-12" id="oldPassword" placeholder="old password">
                    </div>
                    <div class="mb-5">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input name="newPassword" type="password" class="form-control col-12" id="newPassword" placeholder="new password">
                    </div>
                    <div class="mb-5">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input name="confirmNewPassword" type="password" class="form-control col-12" id="confirmPassword" placeholder="confirm password">
                    </div>
                    <button type="submit" id="button-simpan" class="button-admin px-4 col-12 mb-5">Ganti Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
