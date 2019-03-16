
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">List Guru</h4>
            </div>
            <div class="card-body">
                <form class = "form-inline" action = "<?php echo base_url();?>master/gurumatpel/ubahguru" method="post">
                    <select class = "form-control col-lg-8" name = "guru">
                        <?php foreach($guru as $a){ ?> 
                        <option value = "<?php echo $a->id_gurutahunan?>" <?php if($a->id_gurutahunan == $this->session->idgurupilihkelas) echo "selected";?>><?php echo $a->nama_depan." ".$a->nama_belakang;?></option>
                        <?php } ?>
                    </select>
                    <input type = "submit" class = "form-control col-lg-3" style ="margin-left:30px">
                </form>
            </div>
        </div> <!-- /.card -->
    </div>
</div>
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">LIST KELAS</h4>
            </div>
            <div class="card-body">
                <div class="table-stats">
                    <table class="table table-stripped" id = "bootstrap-data-table-export">
                        <thead>
                            <tr>
                                <th>Angkatan</th>
                                <th>Jurusan</th>
                                <th>Urutan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($assigned as $b){ ?> 
                            <tr>
                                <td><?php echo $b->kelas;?></td>
                                <td><?php echo $b->jurusan;?></td>
                                <td><?php echo $b->urutan;?></td>
                                <td>ASSIGNED</td>
                                
                                <td><a href = "<?php echo base_url();?>master/gurumatpel/remove/<?php echo $b->id_penugasan;?>" class = "btn btn-danger col-lg-12">HAPUS</a></td>
                            </tr>
                            <?php } ?>
                            
                            <?php foreach($notassigned as $b){ ?> 
                            <tr>
                                <td><?php echo $b->kelas;?></td>
                                <td><?php echo $b->jurusan;?></td>
                                <td><?php echo $b->urutan;?></td>
                                <td>NOT ASSIGNED</td>
                                
                                <td><a href = "<?php echo base_url();?>master/gurumatpel/assign/<?php echo $b->id_kelas;?>" class = "btn btn-success col-lg-12">AKTIFKAN</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
            </div>
        </div> <!-- /.card -->
    </div>  <!-- /.col-lg-8 -->
</div>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN KELAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class = "form-group col-lg-12">
                        <label>GURU</label>
                        <select class = "form-control col-lg-12">
                            <option value = "#">TIANGGUR</option>
                            <option value = "#">PETRIANUS</option>
                            <option value = "#">MICHAEL</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mediumModal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN TAHUN AJARAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class = "form-group col-lg-12">
                        <label>AWAL TAHUN AJARAN</label>
                        <input type = "number" class = "form-control">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>AKHIR TAHUN AJARAN</label>
                        <input type = "number" class = "form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>