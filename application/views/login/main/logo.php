<div class="login100-pic js-tilt" data-tilt>
    <?php foreach($profile->result() as $a){ ?> 
    <img src="<?php echo base_url();?>document/detailsekolah/<?php echo $a->logo_sekolah;?>" alt="IMG">
    <?php } ?>
</div>