<body class="hold-transition login-page">


    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>ADMIN PORTAL PAM JAYA</b></a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Admin Login</p>

                <?= $this->session->flashdata('message'); ?>

                <form action="<?= base_url('login'); ?>" method="post">
                    <div class="input-group mt-4">
                        <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mt-3">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
                        </div>

                    </div>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="<?= base_url('login/registration'); ?>">Register New Account</a>
                    <form method="post" action="<?= base_url() ?>">
                        <button type="submit" class="btn btn-sm btn-outline-primary mt-3">Back to Portal</button>
                    </form>
                </div>



            </div>

        </div>

    </div>

</body>