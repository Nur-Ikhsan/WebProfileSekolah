<div class="admin">
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div id="SweetAlert2">
            <?php if (isset($model['error'])): ?>
                <script>
                  Swal.fire({
                    icon: 'error',
                    title: 'Login Failed',
                    html: '<?= $model['error'] ?>',
                    confirmButtonText: 'Try Again',
                    showCancelButton: false,
                    allowOutsideClick: false,
                    customClass: {
                      confirmButton: 'button-admin delete px-4'
                    }
                  }).then(function (result) {
                    if (result.isConfirmed) {
                      window.location.href = '/admin/login';
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
                <div class="card-title"><h3>Login</h3></div>
                <p class="text-center">Masukkan Username dan Password Anda</p>
                <form class="mt-3 col-12" method="post" action="/admin/login">
                    <div class="mb-5 col-12">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control col-12" id="username"
                               placeholder="username"
                               value="<?= $_POST['username'] ?? '' ?>">
                    </div>
                    <div class="mb-5">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control col-12" id="password"
                               placeholder="password"
                               value="<?= $_POST['password'] ?? '' ?>">
                    </div>
                    <button type="submit" id="button-simpan" class="button-admin px-4 col-12 mb-5">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>