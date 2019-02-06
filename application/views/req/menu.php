<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class ="menu-item">
                    <a href="<?php echo base_url();?>welcome"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <?php foreach($menu as $a){ 
                    if($a->id_parent == 0){ ?>
                <li class="menu-title"><?php echo $a->nama;?></li><!-- /.menu-title -->
                <?php } else { ?>
                <li class ="menu-item active"><a href="<?php echo base_url();?><?php echo $a->link;?>"> <i class="menu-icon fa fa-<?php echo $a->icon;?>"></i><?php echo $a->nama;?></a></li>
                <?php } } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>

