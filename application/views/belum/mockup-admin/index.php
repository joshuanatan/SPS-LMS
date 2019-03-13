<div class = "row">
    <div class="col-lg-3 col-md-6"> <!-- ganti ukuran sesuai yang diinginkan -->
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-1">
                        <i class="fa fa-book"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib"> 
                            <div class="stat-text"><span class="count">0</span></div>
                            <div class="stat-heading">Jumlah Guru</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6"> <!-- ganti ukuran sesuai yang diinginkan -->
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-1">
                        <i class="fa fa-book"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib"> 
                            <div class="stat-text"><span class="count">0</span></div>
                            <div class="stat-heading">Wakasek Akademik</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6"> <!-- ganti ukuran sesuai yang diinginkan -->
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-1">
                        <i class="fa fa-book"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib"> 
                            <div class="stat-text"><span class="count">0</span></div>
                            <div class="stat-heading">Wakasek Kesiswaan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- kalau mau nambah widget lainnya -->
</div>
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Pemegang Akun</h4>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#mediumModal">TAMBAH</button>
            </div>
            <div class="card-body">
                <div class="table-stats">
                    <table class="table table-stripped" id = "bootstrap-data-table-export">
                        <thead>
                            <tr>
                                <th>ID User</th>
                                <th>Nama User</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($ae as $a){ 
                                $role = "";
                                switch($a->id_role){
                                    case 1: $role = "guru";break;
                                    case 2: $role = "kesiswaan";break;
                                    case 3: $role = "kesiswaan";break;
                                    case 4: $role = "siswa";break;
                                    case 5: $role = "orangtua";
                                        
                                }
                            ?>
                            <tr>
                                <td><?php echo $a->id_user;?></td>
                                <td><?php echo $a->nama_depan.$a->nama_belakang;?></td>
                                <td><?php echo $role;?></td>
                                <td><?php if($a->status == 0) echo "Aktif"; else echo "Non aktif";?></td>
                                <?php if($a->status == 1){ ?><td><a href = "<?php echo base_url();?>admin/active/<?php echo $a->id_user;?>" class = "btn btn-success">GAIN PRIVILAGE</a></td><?php } ?>
                                <?php if($a->status == 0){ ?><td><a href = "<?php echo base_url();?>admin/remove/<?php echo $a->id_user;?>" class = "btn btn-danger">REMOVE PRIVILAGE</a></td><?php } ?>
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
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN AKUN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action = "<?php echo base_url();?>admin/insertUser" method = "post">
            <div class="modal-body">
                    <div class = "form-group col-lg-12">
                        <label>Nama Depan</label>
                        <input type = "text" class = "form-control col-lg-12" name = "namadepan">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Nama Belakang</label>
                        <input type = "text" class = "form-control col-lg-12" name = "namabelakang">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Tanggal Lahir</label>
                        <input type = "date" class = "form-control col-lg-12" name = "tgllahir">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Nomor telpon</label>
                        <input type = "number" class = "form-control col-lg-12" name = "nohp">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Email</label>
                        <input type = "email" class = "form-control col-lg-12" name = "email">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Alamat</label>
                        <textarea class = "form-control col-lg-12" name = "alamat"></textarea>
                    </div>
                    <hr/>
                    <div class = "form-group col-lg-12">
                        <label>Password</label>
                        <input type = "password" class = "form-control col-lg-12" name = "password">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Jabatan</label>
                        <select class = "form-control col-lg-12" name = "role">
                            <option value = "1">GURU</option>
                            <option value = "2">WAKASEK AKADEMIK</option>
                            <option value = "3">WAKASEK KESISWAAN</option>
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