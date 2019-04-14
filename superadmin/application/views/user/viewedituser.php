
<div class="row">
    <div class="col-xl-12"> 
        
        
        
        <?php foreach($user as $lista){?>
        <form action="<?php echo base_url(). 'user/user/updateuser/'.$lista->id_user;?>" method ="post">

        
        
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Edit User</strong>
            </div>
                
            <div class="card-body">
                
                
            </div>
            <div class="card-body">
            
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    
            
            <tr>
                <td>ID User</td>
                <td><?php echo $lista->id_user?></td>
            </tr>
                
            <tr>
                <td>Nama Depan</td>
                <td><input type="text" name="nama_depan" value="<?php echo $lista->nama_depan?>"></td>
            </tr>    
                
            <tr>
                <td>Nama Belakang</td>
                <td><input type="text" name="nama_belakang" value="<?php echo $lista->nama_belakang?>"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="tanggal_lahir" value="<?php echo $lista->tanggal_lahir?>"></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td><input type="text" name="nomor_telepon" value="<?php echo $lista->nomor_telepon?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $lista->email?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $lista->alamat?>"></td>
            </tr>
            <tr>
                <td>Tanggal Submit User</td>
                <td><?php echo $lista->tgl_submit ?></td>
            </tr> 
                
                
                
                
            
            <tr>
                <td>Status User</td>
                <td><select name="status_user">
                        <option disabled> Pilih Status User </option>
                        <option value="0" <?php if($lista->status =="0") echo "selected"?>>Aktif</option>
                        <option value="1" <?php if($lista->status =="1") echo "selected"?>>Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Role User</td>
                <td><?php if($lista->role =="0") echo "Super Admin"; else echo "Admin" ?></td>
            </tr>     
             
               
        </table>
                <button class="btn btn-success" type="submit">UPDATE USER </button>

        
            </div>
            </div>
        </form>
        <?php }?>
    </div>
     <!-- /.card -->
    
