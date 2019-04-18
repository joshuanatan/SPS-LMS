<div class="top-left">
    <div class="navbar-header">
        
        <?php foreach($profile->result() as $a){ ?> 
        <a class="navbar-brand" href="<?php echo base_url();?>user/<?php echo $this->session->role;?>/index"><img src="<?php echo base_url();?>document/detailsekolah/<?php echo $a->logo_sekolah;?>" style = "height:80%" alt="Logo"></a>
        <a class="navbar-brand hidden" href="<?php echo base_url();?>user/<?php echo $this->session->role;?>/index"><img src="<?php echo base_url();?>document/detailsekolah/<?php echo $a->logo_sekolah;?>" style = "height:80%" alt="Logo"></a>
        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        <?php } ?>
    </div>
</div>
