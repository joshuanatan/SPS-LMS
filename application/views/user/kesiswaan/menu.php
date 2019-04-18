<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title">Wakasek Kesiswaan</li><!-- /.menu-title -->
                
                <li>
                    <a href="<?php echo base_url();?>master/setting"> <i class="menu-icon fa fa-globe"></i>Global Setting</a>
                </li>
                <?php if($this->session->tahunajaran != ""){ ?> 
                <li>
                    <a href="<?php echo base_url();?>master/siswa"> <i class="menu-icon fa fa-male"></i>Siswa</a>
                </li>  
                <li>
                    <a href="<?php echo base_url();?>master/kelassiswa"> <i class="menu-icon fa fa-lock"></i>Kelas Siswa</a>
                </li>  
                <li>
                    <a href="<?php echo base_url();?>master/orangtua"> <i class="menu-icon fa fa-heart  "></i>Orang Tua</a>
                </li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>

