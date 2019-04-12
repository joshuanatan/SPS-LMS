
<div class="row">
    <div class="col-xl-12"> 
        
        
        
        <?php foreach($tagihan as $lista){?>
        <form action="<?php echo base_url(). 'user/tagihan/updatetagihan/'.$lista->id_tagihan;?>" method ="post">

        
        
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Edit Tagihan</strong>
            </div>
                
            <div class="card-body">
                
                
            </div>
            <div class="card-body">
            
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    
            
            <tr>
                <td>ID Tagihan</td>
                <td><?php echo $lista->id_tagihan?></td>
            </tr>
            <tr>
                <td>ID Sekolah</td>
                <td><select name="id_sekolah">
                        <option disabled> Pilih Sekolah</option>
                        <?php foreach ($sekolah1 as $listb){?>
                        <option value="<?php echo $listb->id_sekolah?>"<?php if($lista->id_sekolah == $listb->id_sekolah) echo "selected"?>><?php echo $listb->id_sekolah.' - '.$listb->nama_sekolah?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ID Tahun Ajaran</td>
                <td><select name="id_tahun_ajaran">
                        <option disabled> Pilih Tahun Ajaran </option>
                        <?php foreach ($tahunajaran1 as $listc){?>
                        <option value="<?php echo $listc->id_tahun_ajaran?>"<?php if($lista->id_tahun_ajaran == $listc->id_tahun_ajaran) echo "selected"?>><?php echo $listc->id_tahun_ajaran.' - '.$listc->tahun_awal.'-'.$listc->tahun_akhir?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Tagihan</td>
                <td>Rp. <input type="text" name="jumlah_tagihan" value="<?php echo $lista->jumlah_tagihan?>">,-</td>
            </tr>
            
            <tr>
                <td>Status Tagihan</td>
                <td><select name="status_tagihan">
                        <option disabled> Pilih Status Tagihan </option>
                        <option value="0" <?php if($lista->status_tagihan =="0") echo "selected"?>>Aktif</option>
                        <option value="1" <?php if($lista->status_tagihan =="1") echo "selected"?>>Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Tagihan</td>
                <td><?php echo $lista->tgl_submit_tagihan ?></td>
            </tr>  
               
        </table>
                <button class="btn btn-success" type="submit">UPDATE TAGIHAN </button>

        
            </div>
            </div>
        </form>
        <?php }?>
    </div>
     <!-- /.card -->
    
