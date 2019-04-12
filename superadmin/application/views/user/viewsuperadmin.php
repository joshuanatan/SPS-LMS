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
        <h3>Lihat Sekolah</h3>
        
        <a href="<?php echo base_url(). 'superadmin/tambahsekolah' ?>"> <button> Tambah Sekolah </button></a>

        <table border="1">
            <tr>
                <th>ID Sekolah</th>
                <th>Nama Sekolah</th>
                <th>Alamat Sekolah</th>
                <th>Logo Sekolah</th>
                <th>Status Sekolah</th>
                <th>Tanggal Submit Sekolah</th>
                <th>Aksi</th>
            </tr>
            <?php
                $a = 0;
            foreach ($sekolah as $list) {
              $a++;  ?>
            <tr>
                <td><?php echo $list->id_sekolah ?></td>
                <td><?php echo $list->nama_sekolah ?></td>
                <td><?php echo $list->alamat_sekolah ?></td>
                
                <td><img style="width:200px" src="<?php echo base_url().'logo_sekolah/'.$list->logo_sekolah ?>"></td>
                
                <td><?php if ($list->status_sekolah == 0){
                echo 'Aktif';  
                }  else {echo 'Tidak Aktif';} ?></td>
                <td><?php echo $list->tgl_submit_sekolah ?></td>
                
                <td><a href="<?php echo base_url().'superadmin/editsekolah/'.$list->id_sekolah;?>">Edit</a> || <a href="<?php echo base_url().'superadmin/hapussekolah/'.$list->id_sekolah;?>">Hapus</a></td>
            </tr>
            <?php
             }
            ?>
            
        </table>
    </section>
    
    <section>
        <h3>Lihat Tagihan</h3>

        <a href="<?php echo base_url(). 'superadmin/tambahtagihan' ?>"> <button> Tambah Tagihan </button></a>

        <table border="1">
            <tr>
                <th>ID Tagihan</th>
                <th>ID Sekolah</th>
                <th>Nama Sekolah</th>
                <th>ID Tahun Ajaran</th>
                <th>Tahun Ajaran</th>
                <th>Jumlah Tagihan</th>
                <th>Status Tagihan</th>
                <th>Tanggal Submit Tagihan</th>
                <th>Aksi</th>
            </tr>
            <?php
                $a = 0;
            foreach ($tagihanjoin as $list) {
              $a++;  ?>
            <tr>
                <td><?php echo $list->id_tagihan ?></td>
                <td><?php echo $list->id_sekolah ?></td>
                <td><?php echo $list->nama_sekolah ?></td>
                <td><?php echo $list->id_tahun_ajaran ?></td>
                <td><?php echo $list->tahun_awal.'-'.$list->tahun_akhir ?></td>
                <td><?php echo $list->jumlah_tagihan ?></td>
                <td><?php if ($list->status_tagihan == 0){
                echo 'Aktif';  
                }  else {echo 'Tidak Aktif';} ?></td>
                <td><?php echo $list->tgl_submit_tagihan ?></td>
                
                <td><a href="<?php echo base_url().'superadmin/edittagihan/'.$list->id_tagihan;?>">Edit</a> || <a href="<?php echo base_url().'superadmin/hapustagihan/'.$list->id_tagihan;?>">Hapus</a></td>
            </tr>
            <?php
             }
            ?>
            
        </table>
    </section>
    
    

</body>
</html>