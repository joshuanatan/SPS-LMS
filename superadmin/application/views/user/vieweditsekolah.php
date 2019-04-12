
<div class="row">
    <div class="col-xl-12"> 
        
        
        
         <?php foreach($sekolah as $lista){?>
        <form action="<?php echo base_url(). 'user/sekolah/updatesekolah/'.$lista->id_sekolah;?>" method ="post">

        
        
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Edit Sekolah</strong>
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
                <td><input type="text" name="nama_sekolah" value="<?php echo $lista->nama_sekolah?>"></td>
            </tr>
            <tr>
                <td>Alamat Sekolah</td>
                <td><input type="text" name="alamat_sekolah" value="<?php echo $lista->alamat_sekolah?>"></td>
            </tr>
            <tr>
                <td>Email Sekolah</td>
                <td><input type="text" name="email_sekolah" value="<?php echo $lista->email_sekolah?>"></td>
            </tr>    
            <tr>
                <td>Logo Sekolah</td>
                
                <?php $logo_sekolah = $lista->logo_sekolah;
                    if($logo_sekolah == NULL){
                      $logo_sekolah = "default.png";  
                    }
                    else{
                        $logo_sekolah = $lista->logo_sekolah;  
                    };?>
                
                
                
                
                <td><a target="_blank" href="<?php echo base_url().'/logo_sekolah/'.$logo_sekolah?>"><img style="width:200px" src="<?php echo base_url().'logo_sekolah/'.$logo_sekolah ?>"></a>&nbsp;<a href="<?php echo base_url().'user/sekolah/editlogosekolah/'.$lista->id_sekolah?>"><br/><br/><input class="btn btn-warning" style="width:200px" type="button" value="EDIT"></a></td>
                
            </tr>
            
            <tr>
                <td>Status Sekolah</td>
                <td><select name="status_sekolah">
                        <option disabled> Pilih Status Sekolah </option>
                        <option value="0" <?php if($lista->status_sekolah =="0") echo "selected"?>>Aktif</option>
                        <option value="1" <?php if($lista->status_sekolah =="1") echo "selected"?>>Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Sekolah</td>
                <td><?php echo $lista->tgl_submit_sekolah ?></td>
            </tr>     
               
        </table>
                <button class="btn btn-success" type="submit">UPDATE SEKOLAH </button>

        
            </div>
            </div>
        </form>
        <?php }?>
    </div>
     <!-- /.card -->
    
