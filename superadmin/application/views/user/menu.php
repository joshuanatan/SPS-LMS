<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                
                <li class="menu-title">Interface Super Admin</li><!-- /.menu-title -->
                

                    <?php
                    
                    if ($_SESSION["role"] == "0"){
                        
                    ?>
                
                
                <li>
                    <a href="<?php echo base_url();?>user/user"> <i class="menu-icon fa fa-table"></i>User</a>
                </li>
                
                <?php } ?>
                <li>
                    <a href="<?php echo base_url();?>user/tahunajaran"> <i class="menu-icon fa fa-table"></i>Tahun Ajaran</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>user/sekolah"> <i class="menu-icon fa fa-table"></i>Sekolah</a>
                </li>
                
                <li>
                    <a href="<?php echo base_url();?>user/tagihan"> <i class="menu-icon fa fa-table"></i>Tagihan</a>
                </li>
                
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>

