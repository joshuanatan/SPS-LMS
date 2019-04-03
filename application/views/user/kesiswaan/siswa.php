<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Siswa</h4>
                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-stats">
                    <table class="table table-stripped" id = "bootstrap-data-table-export">
                        <thead>
                            <tr>
                                <th>ID Siswa</th>
                                <th>Nama Siswa</th>
                                <th>Jurusan Siswa</th>
                                <th>Email Siswa</th>
                                <th>No Siswa</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($siswa as $a){ ?> 
                            <tr>
                                <td><?php echo $a->id_siswa;?></td>
                                <td><?php echo ucfirst($a->nama_depan)." ".ucfirst($a->nama_belakang);?></td>
                                <td><?php echo $a->jurusan;?></td>
                                <td><?php echo $a->email;?></td>
                                <td><?php echo $a->nomor_telpon;?></td>
                                <td><?php if($a->status == "0") echo "AKTIF"; else echo "TIDAK AKTIF";?></td>
                                <td>
                                    <button class="btn btn-secondary btn-warning col-lg-12 mb-1" data-toggle="modal" data-target="#mediumModal<?php echo $a->id_user;?>">DETAIL</button>
                                    <?php if($a->status == 0){ ?> 
                                    <a href = "<?php echo base_url();?>master/siswa/remove/<?php echo $a->id_user;?>" class = "btn btn-danger col-lg-12">HAPUS</a>
                                    <?php } ?>
                                    <?php if($a->status == 1){ ?> 
                                    <a href = "<?php echo base_url();?>master/siswa/active/<?php echo $a->id_user;?>" class = "btn btn-success col-lg-12">AKTIFKAN</a>
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
                                                            "jurusan" => $a->jurusan,
                                                        );
                                                        $this->load->view("user/kesiswaan/edit/siswa",$data);
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
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN SISWA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action = "<?php echo base_url();?>master/siswa/tambahSiswa" method="post">
                <div class="modal-body">
                    <div class = "form-group col-lg-12">
                        <label>Nama Depan Siswa</label>
                        <input type = "text" class = "form-control col-lg-12" name = "namadepan">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Nama Belakang Siswa</label>
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
                        <label>Jurusan</label>
                        <select class = "form-control col-lg-12" name = "jurusan">
                            <option value = "IPA">IPA</option>
                            <option value = "IPS">IPS</option>
                        </select>
                    </div>
                    <hr>
                    <div class = "form-group col-lg-12">
                        <label>Nama Orang Tua</label>
                        <input type = "text" class = "form-control col-lg-12" name = "namaortu">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Nomor Telpon</label>
                        <input type = "number" class = "form-control col-lg-12" name = "nohportu">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Email</label>
                        <input type = "email" class = "form-control col-lg-12" name = "emailortu">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Password</label>
                        <input type = "password" class = "form-control col-lg-12" name = "passwordortu">
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