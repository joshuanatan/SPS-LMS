
<div class="row">
    <div class="col-xl-12"> 
        
        
        
         <?php foreach($sekolah as $lista){?>
         <?php echo form_open_multipart('user/sekolah/updatelogosekolah/'.$lista->id_sekolah);?>

        
        
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Edit Logo Sekolah</strong>
            </div>
                
            <div class="card-body">
                
                
            </div>
            <div class="card-body">
            
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    
            
           
            <tr>
                <td>ID Sekolah</td>
                <td><?php echo $lista->id_sekolah?></td>
            </tr>
            
            <tr>
                <td>Nama Sekolah</td>
                <td><?php echo $lista->nama_sekolah?></td>
            </tr>
            <tr>
                <td>Alamat Sekolah</td>
                <td><?php echo $lista->alamat_sekolah?></td>
            </tr>
            <tr>
                
                <td>Logo Sekolah</td>
                <td><input type="file" name="logo_sekolah"></td>
            </tr>
            
            <tr>
                <td>Status Sekolah</td>
                <td><?php if ($lista->status_sekolah == 0){
                echo 'Aktif';  
                }  else {echo 'Tidak Aktif';} ?></td>
                
            </tr>
            <tr>
                <td>Tanggal Submit Sekolah</td>
                <td><?php echo $lista->tgl_submit_sekolah ?></td>
            </tr>     
               
        </table>
                <button class="btn btn-success" type="submit">UPDATE LOGO SEKOLAH </button>

        
            </div>
            </div>
        
        <?php echo"</form>"; }?> 
    </div>
     <!-- /.card -->
    
