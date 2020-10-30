<body class="hold-transition login-page" style="background: rgb(33,162,246);
background: linear-gradient(180deg, rgba(33,162,246,1) 0%, rgba(46,55,142,1) 100%);">
    <div class="login-box">
        <div class="login-logo">
            <h4 class="mt-3"><b>Login<br>Admin Portal PAM JAYA</b></h4>
        </div>

        <div class="card">
            <div class="card-body login-card-body" style="border-radius: 20px;">

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
                    <a class="" href="<?= base_url('login/registration'); ?>">Register New Admin Account</a>
                    <form method="post" action="<?= base_url() ?>">
                        <button type="submit" class="btn btn-outline-primary mt-3">Back to Portal</button>
                    </form>
                </div>



            </div>

        </div>

    </div>

</body>