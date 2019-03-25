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
                    <button type="button" onclick = 'abc(<?php echo $a->id_mingguan;?>);' class="btn btn-secondary btn-warning col-lg-12" style = "margin-top:10px;" data-toggle="modal" data-target="#mediumModal2">Dokumen</button>
                </div>
                <div class = "form-group">
                    <button onclick = "cekadaquiz(<?php echo $a->id_mingguan;?>)" id ="quiz<?php echo $a->id_mingguan;?>" class = "btn btn-success col-md-12">Quiz</button>
                </div>
            </div>
        </div>
    </div>
<?php $i++; } ?>
</div>
<div class="modal fade" id="mediumModal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">DOKUMEN MINGGUAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class = "form-group col-lg-12">
                    <table class = "table table-stripped col-lg-12" id = "bootstrap-data-table-export">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>MATERI KELAS</td>
                                <td>FILE</td>
                            </tr>
                        </thead>
                        <tbody id ="dokumenminggu">
                            <tr>
                                <td>1</td>
                                <td>ASDF</td>
                                <td>ASDF</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>