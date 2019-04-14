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
        <h3>Tambah Sekolah</h3>
        
        <?php echo form_open_multipart('user/sekolah/simpansekolah');?>

        <table style="border:20px">
            <tr>
                <td>ID Sekolah</td>
                <td><input type="text" name="id_sekolah"></td>
            </tr>
            <tr>
                <td>Nama Sekolah</td>
                <td><input type="text" name="nama_sekolah"></td>
            </tr>
            <tr>
                <td>Alamat Sekolah</td>
                <td><input type="text" name="alamat_sekolah"></td>
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
               
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah Sekolah"/></td>
            </tr>
        </table>

        <?php echo"</form>"?> 
    </section>
    
    <section>
        <h3>Tambah Tagihan</h3>
        
        <form action="<?php echo base_url(). 'superadmin/simpantagihan';?>" method ="post">

        <table style="border:20px">
            <tr>
                <td>ID Tagihan</td>
                <td><input type="text" name="id_tagihan"></td>
            </tr>
            <tr>
                <td>ID Sekolah</td>
                <td><select name="id_sekolah">
                        <option disabled> Pilih ID Sekolah</option>
                        <?php foreach ($sekolah as $list){?>
                        <option value="<?php echo $list->id_sekolah?>"><?php echo $list->id_sekolah?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ID Tahun Ajaran</td>
                <td><select name="id_tahun_ajaran">
                        <option disabled> Pilih ID Tahun Ajaran </option>
                        <?php foreach ($tahunajaran as $list){?>
                        <option value="<?php echo $list->id_tahun_ajaran?>"><?php echo $list->id_tahun_ajaran?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Tagihan</td>
                <td><input type="text" name="jumlah_tagihan"></td>
            </tr>
            <tr>
                <td>Status Tagihan</td>
                <td><select name="status_tagihan">
                        <option disabled> Pilih Status Tagihan </option>
                        <option value="0">Aktif</option>
                        <option value="1">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Tagihan</td>
                <td><?php echo date('Y-m-d')?></td>
            </tr> 
               
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah Tagihan"/></td>
            </tr>
        </table>

        </form>
    </section>
    
    
    

</body>
</html>