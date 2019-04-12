<html>
<head>
    <style>
        table {
          border-collapse: collapse;
        }

        table, th, td {
          border: 1px solid black;
            padding: 10px;
        }
        h3{
            margin-bottom: 0px;
        }
    </style>
	
</head>
<body>
    
    <section>
        <h3>Edit Sekolah</h3>

        <?php foreach($sekolah as $lista){?>
        <form action="<?php echo base_url(). 'superadmin/updatesekolah/'.$lista->id_sekolah;?>" method ="post">

        <table style="border:20px">
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
                
                <td>Logo Sekolah</td>
                <td><a target="_blank" href="<?php echo base_url().'/logo_sekolah/'.$lista->logo_sekolah?>"><?php echo $lista->logo_sekolah?></a>&nbsp;<a href="<?php echo base_url().'superadmin/editlogosekolah/'.$lista->id_sekolah?>"><input type="button" value="Replace"></a></td>
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
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan Sekolah"/></td>
            </tr>
            
            
            
        </table>

        </form> 
        <?php }?>
    </section>
    <section>
        <h3>Edit Logo Sekolah (Update Foto Logo Sekolah)</h3>
        
        <?php foreach($sekolah as $lista){?>
        <?php echo form_open_multipart('superadmin/updatelogosekolah/'.$lista->id_sekolah);?>

        <table style="border:20px">
            
            
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
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan Logo Sekolah"/></td>
            </tr>
            
            
           
        </table>

        <?php echo"</form>"; }?> 
    </section>
    
   <section>
        <h3>Edit Tagihan</h3>

        <?php foreach($tagihan as $lista){?>
        <form action="<?php echo base_url(). 'superadmin/updatetagihan/'.$lista->id_tagihan;?>" method ="post">

        <table style="border:20px">
            <tr>
                <td>ID Tagihan</td>
                <td><?php echo $lista->id_tagihan?></td>
            </tr>
            <tr>
                <td>ID Sekolah - Nama Sekolah</td>
                <td><select name="id_sekolah">
                        <option disabled> Pilih Sekolah</option>
                        <?php foreach ($sekolah1 as $listb){?>
                        <option value="<?php echo $listb->id_sekolah?>"<?php if($lista->id_sekolah == $listb->id_sekolah) echo "selected"?>><?php echo $listb->id_sekolah.' - '.$listb->nama_sekolah?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ID Tahun Ajaran - Tahun Ajaran</td>
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
                <td><input type="text" name="jumlah_tagihan" value="<?php echo $lista->jumlah_tagihan?>"></td>
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
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan Tagihan"/></td>
            </tr>
            
            
            
        </table>

        </form> 
        <?php }?>
    </section>
    
   
    
    

</body>
</html>