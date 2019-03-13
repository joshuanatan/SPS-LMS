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
        <h3>Lihat Kelas</h3>
        
        <a href="<?php echo base_url(). 'kelas/tambahkelas' ?>"> <button> Tambah Kelas </button></a>

        <table border="1">
            <tr>
                <th>ID Kelas</th>
                <th>Jurusan</th>
                <th>Urutan</th>
                <th>ID Guru Tahunan</th>
                <th>Status Kelas</th>
                <th>Tanggal Submit Kelas</th>
                <th>Aksi</th>
            </tr>
            <?php
                $a = 0;
            foreach ($kelas as $list) {
              $a++;  ?>
            <tr>
                <td><?php echo $list->id_kelas ?></td>
                <td><?php echo $list->jurusan ?></td>
                <td><?php echo $list->urutan ?></td>
                <td><?php echo $list->id_gurutahunan ?></td>
                <td><?php if ($list->status_kelas == 0){
                echo 'Aktif';  
                }  else {echo 'Tidak Aktif';} ?></td>
                <td><?php echo $list->tgl_submit_kelas ?></td>
                
                <td><a href="<?php echo base_url().'kelas/editkelas/'.$list->id_kelas;?>">Edit</a> || <a href="<?php echo base_url().'kelas/hapuskelas/'.$list->id_kelas;?>">Hapus</a></td>
            </tr>
            <?php
             }
            ?>
            
        </table>
    </section>
    
    <section>
        <h3>Lihat Penilaian</h3>

        <a href="<?php echo base_url(). 'penilaian/tambahpenilaian' ?>"> <button> Tambah Penilaian </button></a>

        <table border="1">
            <tr>
                <th>ID Penilaian</th>
                <th>ID Kelas Siswa</th>
                <th>ID Jadwal</th>
                <th>ID Jenis Dokumen</th>
                <th>Nilai</th>
                <th>Status Penilaian</th>
                <th>Tanggal Submit Penilaian</th>
                <th>Aksi</th>
            </tr>
            <?php
                $a = 0;
            foreach ($penilaian as $list) {
              $a++;  ?>
            <tr>
                <td><?php echo $list->id_penilaian ?></td>
                <td><?php echo $list->id_kelas_siswa ?></td>
                <td><?php echo $list->id_jadwal ?></td>
                <td><?php echo $list->id_jenis_dokumen ?></td>
                <td><?php echo $list->nilai ?></td>
                <td><?php if ($list->status_penilaian == 0){
                echo 'Aktif';  
                }  else {echo 'Tidak Aktif';} ?></td>
                <td><?php echo $list->tgl_submit_penilaian ?></td>
                
                <td><a href="<?php echo base_url().'penilaian/editpenilaian/'.$list->id_penilaian;?>">Edit</a> || <a href="<?php echo base_url().'penilaian/hapuspenilaian/'.$list->id_penilaian;?>">Hapus</a></td>
            </tr>
            <?php
             }
            ?>
            
        </table>
    </section>
    
    <section>
        <h3>Lihat Soal</h3>

        <a href="<?php echo base_url(). 'soal/tambahsoal' ?>"> <button> Tambah Penilaian </button></a>

        <table border="1">
            <tr>
                <th>ID Soal</th>
                <th>Pertanyaan</th>
                <th>Opsi 1</th>
                <th>Opsi 2</th>
                <th>Opsi 3</th>
                <th>Opsi 4</th>
                <th>Jawaban</th>
                <th>ID Quiz</th>
                <th>Status Soal</th>
                <th>Tanggal Submit Soal</th>
                <th>Aksi</th>
            </tr>
            <?php
                $a = 0;
            foreach ($soal as $list) {
              $a++;  ?>
            <tr>
                <td><?php echo $list->id_soal ?></td>
                <td><?php echo $list->pertanyaan ?></td>
                <td><?php echo $list->opsi1 ?></td>
                <td><?php echo $list->opsi2 ?></td>
                <td><?php echo $list->opsi3 ?></td>
                <td><?php echo $list->opsi4 ?></td>
                <td><?php echo $list->jawaban ?></td>
                <td><?php echo $list->id_quiz ?></td>
                <td><?php if ($list->status_soal == 0){
                echo 'Aktif';  
                }  else {echo 'Tidak Aktif';} ?></td>
                <td><?php echo $list->tgl_submit_soal ?></td>
                
                <td><a href="<?php echo base_url().'soal/editsoal/'.$list->id_soal;?>">Edit</a> || <a href="<?php echo base_url().'soal/hapussoal/'.$list->id_soal;?>">Hapus</a></td>
            </tr>
            <?php
             }
            ?>
            
        </table>
    </section>
    
    <section>
        <h3>Lihat Assignment Submission</h3>
        
        <a href="<?php echo base_url(). 'assignmentsubmission/tambahassignmentsubmission' ?>"> <button> Tambah Assignment Submission </button></a>

        <table border="1">
            <tr>
                <th>ID Assignment Submission</th>
                <th>ID Siswa</th>
                <th>ID Dokumen</th>
                <th>File Submission</th>
                <th>Status Assignment</th>
                <th>Tanggal Submit Assignment</th>
                <th>Aksi</th>
            </tr>
            <?php
                $a = 0;
            foreach ($assignmentsubmission as $list) {
              $a++;  ?>
            <tr>
                <td><?php echo $list->id_assignment_submission ?></td>
                <td><?php echo $list->id_siswa ?></td>
                <td><?php echo $list->id_dokumen ?></td>
                <td><a target="_blank" href="<?php echo base_url().'/assignment_submission/'.$list->file_submission?>"><?php echo $list->file_submission?></a></td>
                <td><?php if ($list->status_assignment == 0){
                echo 'Aktif';  
                }  else {echo 'Tidak Aktif';} ?></td>
                <td><?php echo $list->tgl_submit_assignment ?></td>
                
                <td><a href="<?php echo base_url().'assignmentsubmission/editassignmentsubmission/'.$list->id_assignment_submission;?>">Edit</a> || <a href="<?php echo base_url().'assignmentsubmission/hapusassignmentsubmission/'.$list->id_assignment_submission;?>">Hapus</a></td>
            </tr>
            <?php
             }
            ?>
            
        </table>
    </section>
    
    <section>
        <h3>Lihat Kelas Siswa</h3>
        
        <a href="<?php echo base_url(). 'kelassiswa/tambahkelassiswa' ?>"> <button> Tambah Kelas Siswa </button></a>

        <table border="1">
            <tr>
                <th>ID Kelas Siswa</th>
                <th>ID Siswa Angkatan</th>
                <th>ID Kelas</th>
                <th>Status Kelas Siswa</th>
                <th>Tanggal Submit Kelas Siswa</th>
                <th>Aksi</th>
            </tr>
            <?php
                $a = 0;
            foreach ($kelassiswa as $list) {
              $a++;  ?>
            <tr>
                <td><?php echo $list->id_kelas_siswa ?></td>
                <td><?php echo $list->id_siswa_angkatan ?></td>
                <td><?php echo $list->id_kelas ?></td>
                
                <td><?php if ($list->status_kelas_siswa == 0){
                echo 'Aktif';  
                }  else {echo 'Tidak Aktif';} ?></td>
                <td><?php echo $list->tgl_submit_kelas_siswa ?></td>
                
                <td><a href="<?php echo base_url().'kelassiswa/editkelassiswa/'.$list->id_kelas_siswa;?>">Edit</a> || <a href="<?php echo base_url().'kelassiswa/hapuskelassiswa/'.$list->id_kelas_siswa;?>">Hapus</a></td>
            </tr>
            <?php
             }
            ?>
            
        </table>

    </section>
    
    <section>
        <h3>Lihat Siswa</h3>
        
        <a href="<?php echo base_url(). 'siswa/tambahsiswa' ?>"> <button> Tambah Siswa </button></a>

        <table border="1">
            <tr>
                <th>ID Siswa</th>
                <th>ID User</th>
                <th>ID Orang Tua</th>
                <th>Status Siswa</th>
                <th>Tanggal Submit Siswa</th>
                <th>Aksi</th>
            </tr>
            <?php
                $a = 0;
            foreach ($siswa as $list) {
              $a++;  ?>
            <tr>
                <td><?php echo $list->id_siswa ?></td>
                <td><?php echo $list->id_user ?></td>
                <td><?php echo $list->id_orangtua ?></td>
                
                <td><?php if ($list->status_siswa == 0){
                echo 'Aktif';  
                }  else {echo 'Tidak Aktif';} ?></td>
                <td><?php echo $list->tgl_submit_siswa ?></td>
                
                <td><a href="<?php echo base_url().'siswa/editsiswa/'.$list->id_siswa;?>">Edit</a> || <a href="<?php echo base_url().'siswa/hapussiswa/'.$list->id_siswa;?>">Hapus</a></td>
            </tr>
            <?php
             }
            ?>
            
        </table>

        
    </section>
    
    

</body>
</html>