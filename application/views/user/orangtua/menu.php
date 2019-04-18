<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php foreach($siswa as $a){ ?> 
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i><?php echo ucwords($a->nama_depan)." ".ucwords($a->nama_belakang); ?></a>
                    <ul class="sub-menu children dropdown-menu">
                         <li>
                            <a href="<?php echo base_url()?>user/orangtua/siswa/absen/<?php echo $a->id_siswa_angkatan;?>">Absen</a>
                            <a href="<?php echo base_url()?>user/orangtua/siswa/nilai/<?php echo $a->id_siswa_angkatan;?>">Nilai</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <li>
                    <a style = "text-align:center;width:100%" href = "#" class = "col-lg-12" data-toggle="modal" data-target="#mediumModal">TAMBAH SISWA</a>
                    <hr/>
                </li>
               
            </ul>
            <hr/>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN SISWA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action = "<?php echo base_url();?>user/orangtua/index/tambahanak" method="post">
                <div class="modal-body">
                    <div class = "form-group">
                        <label>ID Siswa</label>
                        <input type = "number" class = "form-control col-lg-12 col-sm-12" name = "id" id = "id">
                    </div>
                    <div class = "form-group">
                        <label>Password Siswa</label>
                        <input type = "text" class = "form-control col-lg-12 col-sm-12" name = "pass" id = "pass">
                    </div>
                    <div class = "form-group">
                        <button type = "button" class = "btn btn-success col-lg-4 col-sm-12" onclick = "checkid()">PERIKSA ID SISWA</button>
                    </div>
                    <div id = "detailsiswa"></div> <!--diisi dari ajax-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
