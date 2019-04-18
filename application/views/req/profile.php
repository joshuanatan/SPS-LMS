<div class="user-area dropdown float-right">
    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="user-avatar rounded-circle" src="<?php echo base_url();?>assets/img/admin.jpg" alt="User Avatar">
    </a>

    <div class="user-menu dropdown-menu" style = "width: auto">
        <a class="nav-link" href="#"><i class="fa fa-user"></i><?php echo $this->session->username;?></a>

<?php if($this->session->role == "kesiswaan"){ ?><a class="nav-link" href="<?php echo base_url();?>user/kesiswaan/SystemProfile"><i class="fa fa-cog"></i>Settings</a> <?php } ?>

        <a class="nav-link" href="<?php echo base_url();?>login/signout"><i class="fa fa-power-off"></i>Logout</a>
    </div>
</div>

<!-- nutup header -->
    </div>
</div>
