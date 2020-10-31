<body class="hold-transition login-page" style="background: rgb(33,162,246);
background: linear-gradient(180deg, rgba(33,162,246,1) 0%, rgba(46,55,142,1) 100%);">
    <div class="login-box">
        <div class="login-logo">
            <h4 class="mt-3"><b>Register<br>Admin Portal PAM JAYA</b></h4>
        </div>
        <div class="card">
            <div class="card-body login-card-body" style="border-radius: 20px;">
                <p class="login-box-msg"></p>

                <form action="<?= base_url('login/registration'); ?> " method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Full Name" id="name" name="name" value="<?= set_value('name'); ?>">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>

                    </div>
                    <?= form_error('name', '<small class="text-danger ml-2">', '</small>'); ?>

                    <div class="input-group mt-2">
                        <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('email', '<small class="text-danger ml-2" >', '</small>'); ?>

                    <div class="input-group mt-2">
                        <input type="password" class="form-control" placeholder="Password" id="password1" name="password1">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password1', '<small class="text-danger ml-2">', '</small>'); ?>


                    <div class="input-group mt-2">
                        <input type="password" class="form-control" placeholder="Repeat Password" id="password2" name="password2">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mt-2">
                        <?php $timezone = date_default_timezone_set('Asia/Jakarta');
                        ?>
                        <?php $date = date('j F y');
                        ?>
                        <input type="hidden" class="form-control" placeholder="date created" id="date_created" name="date_created" value="<?= set_value('date_created', $date); ?>">
                        <?php var_dump($date) ?>
                    </div>
                    <div class=" row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block mt-2">Register Account</button>
                        </div>

                    </div>
                </form>
                <hr>
                <div class="text-center">
                    <a class="div" href="<?= base_url('login'); ?>">Already have an account? Login!</a>
                    <form method="post" action="<?= base_url() ?>">
                        <button type="submit" class="btn btn-outline-primary mt-3 ">Back to Portal</button>
                    </form>
                </div>

            </div>

        </div>
    </div>

</body>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>