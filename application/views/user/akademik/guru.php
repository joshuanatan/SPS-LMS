<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Guru</h4>
                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-stats">
                    <table class="table table-stripped" id = "bootstrap-data-table-export">
                        <thead>
                            <tr>
                                <th>ID Guru</th>
                                <th>Nama Guru</th>
                                <th>Mata Pelajaran Guru</th>
                                <th>Email Guru</th>
                                <th>No Guru</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($guru as $a){ ?> 
                            <tr>
                                <td><?php echo $a->id_guru;?></td>
                                <td><?php echo ucfirst($a->nama_depan)." ".ucfirst($a->nama_belakang);?></td>
                                <td>
                                    <form action = "<?php echo base_url();?>master/guru/updateMatpel/<?php echo $a->id_guru;?>" method="post">
                                        <select class = "form-control col-lg-12" name = "id_matpel">
                                            <?php foreach($matpel as $b){?> 
                                            <option value = "<?php echo $b->id_matpel;?>" <?php if($b->id_matpel == $a->id_matpel) echo "selected"; ?>><?php echo $b->nama_matpel;?></option>
                                            <?php }?>
                                        </select>
                                        <hr/>
                                        <input type = "submit" class = "col-lg-12 form-control">
                                    </form>
                                </td>
                                <td><?php echo $a->email;?></td>
                                <td><?php echo $a->nomor_telpon;?></td>
                                <td><?php if($a->status == "0") echo "AKTIF"; else echo "TIDAK AKTIF";?></td>
                                <td>
                                    <button class="btn btn-secondary btn-warning col-lg-12 mb-1" data-toggle="modal" data-target="#mediumModal<?php echo $a->id_user;?>">DETAIL</button>
                                    <?php if($a->status == 0){ ?> 
                                    <a href = "<?php echo base_url();?>master/guru/remove/<?php echo $a->id_user;?>" class = "btn btn-danger col-lg-12">HAPUS</a>
                                    <?php } ?>
                                    <?php if($a->status == 1){ ?> 
                                    <a href = "<?php echo base_url();?>master/guru/active/<?php echo $a->id_user;?>" class = "btn btn-success col-lg-12">AKTIFKAN</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php 
                                                        $data = array(
                                                            "id_user" => $a->id_user,
                                                            "nama_depan" => $a->nama_depan,
                                                            "nama_belakang" => $a->nama_belakang,
                                                            "tanggal_lahir" => $a->tanggal_lahir,
                                                            "nomor_telpon" => $a->nomor_telpon,
                                                            "email" => $a->email,
                                                            "alamat" => $a->alamat,
                                                            "mata_pelajaran" => $a->nama_matpel,
                                                        );
                                                        $this->load->view("user/akademik/edit/guru",$data);
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
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN GURU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action = "<?php echo base_url();?>master/guru/tambah" method="post">
                <div class="modal-body">
                    <div class = "form-group col-lg-12">
                        <label>Nama Depan Guru</label>
                        <input type = "text" class = "form-control col-lg-12" name = "namadepan">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Nama Belakang Guru</label>
                        <input type = "text" class = "form-control col-lg-12" name = "namabelakang">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Tanggal Lahir</label>
                        <input type = "date" class = "form-control col-lg-12" name = "tgllahir">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Nomor Telpon</label>
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
                    <div class = "form-group col-lg-12">
                        <label>Password</label>
                        <input type = "password" class = "form-control col-lg-12" name = "password">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Bidang Mengajar</label>
                        <select class = "form-control col-lg-12" name = "jurusan">
                            <?php foreach($matpel as $b){ ?> 
                            <option value = "<?php echo $b->id_matpel;?>"><?php echo $b->nama_matpel;?></option>
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