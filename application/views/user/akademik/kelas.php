
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">DAFTAR KELAS</h4><Br/>
                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-stats">
                    <table class="table table-stripped" id = "bootstrap-data-table-export">
                        <thead>
                            <tr>
                                <th>ID User WK</th>
                                <th>ID Kelas</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Urutan</th>
                                <th>Wali Kelas</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($kelas as $a){ ?> 
                            <tr>
                                <td><?php echo $a->id_user;?></td>
                                <td><?php echo $a->id_kelas;?></td>    
                                <td><?php echo $a->kelas;?></td>    
                                <td><?php echo $a->jurusan;?></td>    
                                <td><?php echo $a->urutan;?></td>    
                                <td>
                                    <form action = "<?php echo base_url();?>master/kelas/updateWalikelas/<?php echo $a->id_kelas; ?>" method = "post">
                                        <select class = "form-control col-lg-12" name = "id_guru">
                                            <?php foreach($walikelas as $b){ ?>
                                            
                                            <option value = "<?php echo $b->id_guru?>" <?php if($b->id_guru == $a->id_guru) echo "selected";?>><?php echo $b->nama_depan." ".$b->nama_belakang;?></option>
                                            
                                            <?php } ?>
                                        </select><Br/>
                                        <input type = "submit" class = "Form-control">
                                    </form>
                                </td>  
                                <td><?php if($a->status_kelas == 0) echo "AKTIF"; else echo "TIDAK AKTIF";?></td>  
                                <td>
                                    <?php if($a->status_kelas == 0){ ?> 
                                    <a href = "<?php echo base_url();?>master/kelas/remove/<?php echo $a->id_kelas;?>" class = "btn btn-danger col-lg-12">HAPUS</a>
                                    <?php } ?>
                                    <?php if($a->status_kelas == 1){ ?> 
                                    <a href = "<?php echo base_url();?>master/kelas/active/<?php echo $a->id_kelas;?>" class = "btn btn-success col-lg-12">AKTIFKAN</a>
                                    <?php } ?>
                                </td>
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
            <form action = "<?php echo base_url();?>master/kelas/tambahKelas" method="post">
                <div class="modal-body">
                    <div class = "form-group col-lg-12">
                        <label>Kelas</label>
                        <select class = "form-control col-lg-12" name = "kelas">
                            <option value = "10">10</option>
                            <option value = "11">11</option>
                            <option value = "12">12</option>
                        </select>
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Jurusan</label>
                        <select class = "form-control col-lg-12" name = "jurusan">
                            <option value = "IPA">IPA</option>
                            <option value = "IPS">IPS</option>
                        </select>
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Wali Kelas</label>
                        <select class = "form-control col-lg-12" name="walikelas">
                            <?php foreach($walikelas as $b){ ?> 
                            <option value = "<?php echo $b->id_guru;?>"><?php echo $b->nama_depan." ".$b->nama_belakang?></option>
                            <?php } ?>
                        </select>
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