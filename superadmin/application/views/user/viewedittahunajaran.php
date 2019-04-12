
<div class="row">
    <div class="col-xl-12"> 
        
        
        
        <?php foreach($tahunajaran as $lista){?>
        <form action="<?php echo base_url(). 'user/tahunajaran/updatetahunajaran/'.$lista->id_tahun_ajaran;?>" method ="post">

        
        
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Edit Tahun Ajaran</strong>
            </div>
                
            <div class="card-body">
                
                
            </div>
            <div class="card-body">
            
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    
            
            <tr>
                <td>ID Tahun Ajaran</td>
                <td><?php echo $lista->id_tahun_ajaran?></td>
            </tr>
            
            <tr>
                <td>Tahun Awal</td>
                <td><input type="text" name="tahun_awal" value="<?php echo $lista->tahun_awal?>"></td>
            </tr>
                
            <tr>
                <td>Tahun Akhir</td>
                <td><input type="text" name="tahun_akhir" value="<?php echo $lista->tahun_akhir?>"></td>
            </tr>
            
            <tr>
                <td>Status Tahun Ajaran</td>
                <td><select name="status_tahunajaran">
                        <option disabled> Pilih Status Tahun Ajaran </option>
                        <option value="0" <?php if($lista->status_tahunajaran =="0") echo "selected"?>>Aktif</option>
                        <option value="1" <?php if($lista->status_tahunajaran =="1") echo "selected"?>>Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Tahun Ajaran</td>
                <td><?php echo $lista->tgl_submit_tahunajaran ?></td>
            </tr>  
               
        </table>
                <button class="btn btn-success" type="submit">UPDATE TAHUN AJARAN </button>

        
            </div>
            </div>
        </form>
        <?php }?>
    </div>
     <!-- /.card -->
    
