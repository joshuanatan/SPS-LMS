
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data User</strong>
            </div>
            <div class="card-body">
                
                
                <a href="<?php echo base_url(). 'user/user/tambahuser' ?>"> 
                    <button class = "btn btn-success">TAMBAH USER</button></a>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            
                            <th>Tanggal Submit User</th>
                            <th>Status User</th>
                            <th>Role User</th>
                            
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                $a = 0;
            foreach ($user as $list) {
              $a++;  ?>
            <tr>
                <td><?php echo $list->id_user ?></td>
                <td><?php echo $list->nama_depan." ".$list->nama_belakang ?></td>
                <td><?php echo $list->tanggal_lahir ?></td>
                <td><?php echo $list->nomor_telepon ?></td>
                <td><?php echo $list->email ?></td>
                <td><?php echo $list->alamat ?></td>
                
                <td><?php echo $list->tgl_submit ?></td>
                
                
                <td><?php if ($list->status == 0){
                echo 'Aktif';  
                }  else {echo 'Tidak Aktif';} ?></td>
                <td><?php if ($list->role == 0){
                echo 'Super Admin';  
                }  else {echo 'Admin';} ?></td>
                
                
                <?php if($list->role == 0){
                  echo "<td></td>";
              } else{ ?>
                  
              
                
                <td><a href="<?php echo base_url().'user/user/edituser/'.$list->id_user;?>"><button class = "btn btn-warning">EDIT</button></a><a href="<?php echo base_url().'user/user/hapususer/'.$list->id_user;?>"><button class = "btn btn-danger">HAPUS</button></a></td>
            <?php } ?>
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