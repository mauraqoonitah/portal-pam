<body class="hold-transition login-page" style="background: rgb(33,162,246);
background: linear-gradient(180deg, rgba(33,162,246,1) 0%, rgba(46,55,142,1) 100%);">
    <div class="login-box">
        <div class="login-logo">
            <div class="mx-auto " style="background-color: white;width: 90px; border-radius: 5px; ">
                <img alt="logo" style="width: 90px" src="<?= base_url('assets/img/pamjaya-logo.png'); ?>">
            </div>
            <h4 class="text-white"><b><br>Admin Portal PAM JAYA</b></h4>
        </div>

        <div class="card">
            <div class="card-body login-card-body" style="border-radius: 20px;">

                <?= $this->session->flashdata('message'); ?>
                <p class="text-center font-weight-bold" style="font-size:larger">LOGIN</p>
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
                    <label for="password"></label>
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password" style="background-color: transparent;">
                        <span style="color: #7a797e;position: absolute; right: 12px;transform: translate(0,-55%);top: 43%;cursor: pointer; ">
                                <i class="fa fa-eye " id="eye" onclick="togglepasswordLogin()"></i>
                        </span>
                        <div class="input-group-append">
                            <div class="input-group-text">
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
                    <a class="" href="<?= base_url('login/registration'); ?>">Register Admin Account</a>
                    <form method="post" action="<?= base_url() ?>">
                        <button type="submit" class="btn btn-outline-primary mt-3">Back to Portal</button>
                    </form>
                </div>



            </div>

        </div>

    </div>

    <script>
        var state = false;   
        function togglepasswordLogin() {
            if (state) {
            document.getElementById("password").setAttribute("type", "password");
            document.getElementById("eye").style.color = '#7a797e';
            state = false;
            } else {
            document.getElementById("password").setAttribute("type", "text");
            document.getElementById("eye").style.color = '#5887ef';
            state = true;
            }
        }
     </script>

</body>