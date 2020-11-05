<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class=" mx-auto mb-3 mt-4">
                    <h1>Change Password</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row ml-5 mr-5">
                <div class="col-md-6 mx-auto">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('Admin/Admin_home/changepassword'); ?>" method="post">
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">

                            <?= form_error('current_password', '<small class="text-danger pl-2">', '</small>'); ?>



                        </div>
                        <div class="form-group">
                            <label for="new_password1">New Password</label>
                            <input type="password" class="form-control" id="new_password1" name="new_password1" style=" box-sizing: border-box;">
                            <?= form_error('new_password1', '<small class="text-danger pl-2">', '</small>'); ?>
                            <span style="color: #7a797e;position: absolute; right: 20px;transform: translate(0,-55%);top: 43%;cursor: pointer;">
                                <i class="fa fa-eye ml-2 mr-2" id="eye" onclick="togglepassword()"></i>

                            </span>
                        </div>
                        <div class="form-group">
                            <label for="new_password2">Repeat Password</label>
                            <input type="password" class="form-control" id="new_password2" name="new_password2">
                            <?= form_error('new_password2', '<small class="text-danger pl-2">', '</small>'); ?>

                            <span style="color: #7a797e;position: absolute; right: 20px;transform: translate(0,-55%);top: 73%;cursor: pointer;">
                                <i class="fa fa-eye ml-2 mr-2" id="eye2" onclick="togglepassword2()"></i>

                            </span>


                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>



</div>

</div>