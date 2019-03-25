<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Mata Pelajaran</h4>
                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-stats">
                    <table class="table table-stripped" id = "bootstrap-data-table-export">
                        <thead>
                            <tr>
                                <th>ID Mata Pelajaran</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Jenis Mata Pelajaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($matpel as $a){ ?> 
                            <tr>
                                <td><?php echo $a->id_matpel;?></td>
                                <td><?php echo $a->nama_matpel;?></td>
                                <td><?php echo $a->jenis_matpel;?></td>
                                <td><?php if($a->status_matpel == 1) echo "Tidak Aktif"; else echo "Aktif";?></td>
                                <td>
                                    <?php if($a->status_matpel == 0) { ?> 
                                    <a href = "<?php echo base_url();?>master/matapelajaran/deleteMatpel/<?php echo $a->id_matpel;?>" class = "btn btn-danger col-lg-12">HAPUS</a>
                                    <?php } ?>
                                    <?php if($a->status_matpel == 1) { ?> 
                                    <a href = "<?php echo base_url();?>master/matapelajaran/activeMatpel/<?php echo $a->id_matpel;?>" class = "btn btn-success col-lg-12">AKTIFKAN</a>
                                    <?php } ?>
                                    <button data-toggle="modal" data-target="#mediumModal<?php echo $a->id_matpel;?>" class = "btn btn-warning col-lg-12">EDIT</button>
                                    
                                </td>
                            </tr>
                            <?php 
                                 $data = array(
                                     "id" => $a->id_matpel,
                                     "nama" => $a->nama_matpel,
                                     "jenis" => $a->jenis_matpel,
                                     "kkm" => $a->kkm,
                                     "tugas" => $a->tugas,
                                     "lab" => $a->lab,
                                     "quiz" => $a->quiz,
                                     "uh" => $a->uh,
                                     "uts" => $a->uts,
                                     "uas" => $a->uas,
                                 );
                                 $this->load->view("user/akademik/edit/matapelajaran",$data);
                            
                            ?>
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
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN MATAPELAJARAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action = "<?php echo base_url();?>master/matapelajaran/insertMatpel" method = "post">
                <div class="modal-body">
                        <div class = "form-group col-lg-12">
                            <label>Nama Mata Pelajaran</label>
                            <input type = "text" class = "form-control col-lg-12" name = "nama">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>Jurusan</label>
                            <select class = "form-control col-lg-12" name = "jenis">
                                <option value = "UMUM">UMUM</option>
                                <option value = "IPA">IPA</option>
                                <option value = "IPS">IPS</option>
                            </select>
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>KKM</label>
                            <input type = "number" class = "form-control col-lg-12" name = "kkm">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>TUGAS</label>
                            <input type = "number" class = "form-control col-lg-12" name = "tugas">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>LAB</label>
                            <input type = "number" class = "form-control col-lg-12" name = "lab">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>QUIZ</label>
                            <input type = "number" class = "form-control col-lg-12" name = "quiz">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>ULANGAN HARIAN</label>
                            <input type = "number" class = "form-control col-lg-12" name = "uh">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>UTS</label>
                            <input type = "number" class = "form-control col-lg-12" name = "uts">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>UAS</label>
                            <input type = "number" class = "form-control col-lg-12" name = "uas">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>