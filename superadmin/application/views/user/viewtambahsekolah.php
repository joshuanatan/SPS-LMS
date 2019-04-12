
<div class="row">
    <div class="col-xl-12"> 
        
        
        
        
        <?php echo form_open_multipart('user/sekolah/simpansekolah');?>

        
        
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Tambah Sekolah</strong>
            </div>
                
            <div class="card-body">
                
                
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    
            
            
            <tr>
                <td>Nama Sekolah</td>
                <td><input type="text" name="nama_sekolah"></td>
            </tr>
            <tr>
                <td>Alamat Sekolah</td>
                <td><input type="text" name="alamat_sekolah"></td>
            </tr>
            <tr>
                <td>Email Sekolah</td>
                <td><input type="text" name="email_sekolah"></td>
            </tr>
            <tr>
                <td>Logo Sekolah</td>
                <td><input type="file" name="logo_sekolah"></td>
            </tr>
            <tr>
                <td>Status Sekolah</td>
                <td><select name="status_sekolah">
                        <option disabled> Pilih Status Sekolah </option>
                        <option value="0">Aktif</option>
                        <option value="1">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Sekolah</td>
                <td><?php echo date('Y-m-d')?></td>
            </tr>  
               
        </table>
                <button class="btn btn-success" type="submit">SIMPAN SEKOLAH </button>

        
            </div>
            </div>
        <?php echo"</form>"?> 
    </div> <!-- /.card -->
    
