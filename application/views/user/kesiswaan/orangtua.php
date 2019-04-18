<!-- ini menampilkan nama orang tua setiap kelas / siswa sehingga lebih ringan sesuai dengan kelas anak yang hendak dicari-->
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">List Kelas</h4>
            </div>
            <div class="card-body">
                <form class = "form-inline" action = "<?php echo base_url();?>master/orangtua/kelas" method="post">
                    <select class = "form-control col-lg-8" name = "kelas">
                        <?php foreach($kelas as $a){ ?> 
                        <option value = "<?php echo $a->id_kelas;?>" <?php if($this->session->pilihkelas != null) if($this->session->pilihkelas == $a->id_kelas) echo "selected";?>><?php echo $a->kelas." ".$a->jurusan." ".$a->urutan;?></option>
                        <?php } ?>
                    </select>
                    <input type = "submit" class = "form-control col-lg-3" style = "margin-left:20px">
                </form>
            </div>
        </div> <!-- /.card -->
    </div>
</div>
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">LIST MURID</h4>
            </div>
            <div class="card-body">
                <div class="table-stats">
                    <table class="table table-stripped" id = "bootstrap-data-table-export">
                        <thead>
                            <tr>
                                <th>ID Siswa</th>
                                <th>Nama Siswa</th>
                                <th>Nama Orangtua</th>
                                <th>No HP Orangtua</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orangtua->result() as $a){ ?> 
                            <tr>
                                <td><?php echo $a->id_user;?></td>
                                <td><?php echo $a->nama_depan." ".$a->nama_belakang;?></td>
                                <td><?php echo $a->nama_orangtua; ?></td>
                                <td><?php echo $a->nomor_telpon_ortu;?></td>
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