<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3"><?php echo $nama_matpel;?></strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $nama_guru;?></h5>
                </div>
                <hr>

            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-1">
                        <i class="fa fa-book"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib"> 
                            <div class="stat-text">$<span class="count">0</span></div>
                            <div class="stat-heading">Persentase Kehadiran</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<?php $i = 1;foreach($aktivitas as $a){?> 
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3">Meeting <?php echo $i;?></strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $a->tgl_kelas;?></h5>
                    <div class="location text-sm-center"><?php echo $a->materi_mingguan;?><br/><?php echo $a->deskripsi_materi;?></div>
                </div>
                <hr>
                <div class = "form-group">
                    <button class = "form-control col-md-12" disabled>Download Materi</button> <!-- nanti pake ajax onclick aja -->
                    <button class = "form-control col-md-12" disabled>Quiz</button>
                </div>
            </div>
        </div>
    </div>
<?php $i++; } ?>
</div>