<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <?php
                if (!$this->session->userData('role')=='Admin') {?>
                <a class="nav-link" href="<?php echo base_url()?>hobbies">Home <span class="sr-only">(current)</span></a> </li>
               <?php } else {?>
                    <a class="nav-link" href="<?php echo base_url()?>dashboard">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="navitem active">
                <a class="nav-link" href="<?php echo base_url()?>hobbies">Add Hobbies <span class="sr-only">(current)</span></a>
            </li>
            <?php } ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <?php if ($this->session->userdata("logged_in")) {?>
            <a class="navbar-item mr-3" href="#">
                <?php echo $this->session->userdata("username");?></a>
                <a href="<?php echo base_url(); ?>auth/logout" class="btn btn-dark">Logout</a>
            <?php } else {?>
                <a href="<?php echo base_url(); ?>auth" class="btn btn-dark">Login</a>
            <?php }?>
        </form>
    </div>
</nav>