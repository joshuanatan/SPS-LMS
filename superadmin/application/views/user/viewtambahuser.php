
<div class="row">
    <div class="col-xl-12"> 
        
        
        
        
        <form action="<?php echo base_url(). 'user/user/simpanuser';?>" method ="post">

        
        
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Tambah User</strong>
            </div>
                
            <div class="card-body">
                
                
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    
            
            <tr>
                
            </tr>
            <tr>
                
            </tr>
            <tr>
                <td>Nama Depan</td>
                <td><input type="text" name="nama_depan"></td>
            </tr>
            <tr>
                <td>Nama Belakang</td>
                <td><input type="text" name="nama_belakang"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="tanggal_lahir"></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td><input type="text" name="nomor_telepon"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Tanggal Submit User</td>
                <td><?php echo date('Y-m-d')?></td>
            </tr>
            <tr>
                <td>Status User</td>
                <td><select name="status">
                        <option disabled> Pilih Status User </option>
                        <option value="0">Aktif</option>
                        <option value="1">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Role User</td>
                <td>Admin
                </td>
            </tr>
               
        </table>
                <button class="btn btn-success" type="submit">SIMPAN USER </button>

        
            </div>
            </div>
        </form>
    </div> <!-- /.card -->
    
