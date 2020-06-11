<div class="container">
    <div class="row login-wrapper">
        <div class="col-md-4 col-xs-6 col-md-offset-4 col-xs-offset-3 login-col">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Registration Form</strong>
                </div>
                <div class="panel-body">
                    <?php $error = $this->session->flashdata("error"); ?>
                    <div class="alert alert-<?php echo $error ? 'warning' : 'info' ?> alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $error ? $error : 'Enter username and password for registration' ?>
                    </div>

                    <?php echo form_open(base_url().'register/validation'); ?>
                    <?php $error = form_error("user_email", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                        <label for="user_email">Enter Email</label>
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </span>
                            <input type="text" name="user_email" value="<?php echo set_value("user_email") ?>" id="username" class="form-control">
                        </div>
                        <?php echo $error; ?>
                    </div>
                    <?php $error = form_error("user_password", "<p class='text-danger'>", '</p>'); ?>
                    <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                        <label for="password">Enter Password</label>
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-lock"></i>
                                    </span>
                            <input type="password" name="user_password" id="password" class="form-control">
                        </div>
                        <?php echo $error; ?>
                    </div>
                    <input type="submit" value="Register" class="btn btn-primary">
                    <a href="<?php echo base_url(); ?>auth" class="btn btn-dark">Login</a>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>