
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Sekolah</strong>
            </div>
            <div class="card-body">
                
                
                <a href="<?php echo base_url(). 'user/sekolah/tambahsekolah' ?>"> 
                    <button class = "btn btn-success">TAMBAH SEKOLAH</button></a>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID Sekolah</th>
                            <th>Nama Sekolah</th>
                            <th>Alamat Sekolah</th>
                            <th>Logo Sekolah</th>
                            <th>Status Sekolah</th>
                            <th>Tanggal Submit Sekolah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                $a = 0;
            foreach ($sekolah as $list) {
              $a++;  ?>
            <tr>
                <td><?php echo $list->id_sekolah ?></td>
                <td><?php echo $list->nama_sekolah ?></td>
                <td><?php echo $list->alamat_sekolah ?></td>
                
                <?php $logo_sekolah = $list->logo_sekolah;
                    if($logo_sekolah == NULL){
                      $logo_sekolah = "default.png";  
                    }
                    else{
                        $logo_sekolah = $list->logo_sekolah;  
                    };?>
                
                <td><img style="width:200px" src="<?php echo base_url().'logo_sekolah/'.$logo_sekolah ?>"></td>
                
                <td><?php if ($list->status_sekolah == 0){
                echo 'Aktif';  
                }  else {echo 'Tidak Aktif';} ?></td>
                <td><?php echo $list->tgl_submit_sekolah ?></td>
                
                <td><a href="<?php echo base_url().'user/sekolah/editsekolah/'.$list->id_sekolah;?>"><button class = "btn btn-warning">EDIT</button></a><a href="<?php echo base_url().'user/sekolah/hapussekolah/'.$list->id_sekolah;?>"><button class = "btn btn-danger">HAPUS</button></a></td>
            </tr>
            <?php
             }
            ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- /.card -->
    </div>
</div>