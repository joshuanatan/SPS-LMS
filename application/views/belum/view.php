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
        <h3>Tambah Kelas</h3>

        <form action="<?php echo base_url(). 'kelas/simpankelas';?>" method ="post">

        <table style="border:20px">
            <tr>
                <td>ID Kelas</td>
                <td><input type="text" name="id_kelas"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan"></td>
            </tr>
            <tr>
                <td>Urutan</td>
                <td><input type="number" name="urutan"></td>
            </tr>
            <tr>
                <td>ID Guru Tahunan</td>
                <td><select name="id_gurutahunan">
                        <option> Pilih ID Guru Tahunan </option>
                        <?php foreach ($gurutahunan as $list){?>
                        <option value="<?php echo $list->id_gurutahunan?>"><?php echo $list->id_gurutahunan?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status Kelas</td>
                <td><select name="status_kelas">
                        <option> Pilih Status Kelas </option>
                        <option value="0">Aktif</option>
                        <option value="1">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Kelas</td>
                <td><?php echo date('Y-m-d')?></td>
            </tr>    
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah Kelas"/></td>
            </tr>
        </table>

        </form> 
    </section>
    
    <section>
        <h3>Tambah Penilaian</h3>

        <form action="<?php echo base_url(). 'penilaian/simpanpenilaian';?>" method ="post">

        <table style="border:20px">
            <tr>
                <td>ID Penilaian</td>
                <td><input type="text" name="id_penilaian"></td>
            </tr>
            <tr>
                <td>ID Kelas Siswa</td>
                <td><select name="id_kelas_siswa">
                        <option> Pilih ID Kelas Siswa </option>
                        <?php foreach ($kelassiswa as $list){?>
                        <option value="<?php echo $list->id_kelas_siswa?>"><?php echo $list->id_kelas_siswa?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ID Jadwal</td>
                <td><select name="id_jadwal">
                        <option> Pilih ID Jadwal </option>
                        <?php foreach ($jadwal as $list){?>
                        <option value="<?php echo $list->id_jadwal?>"><?php echo $list->id_jadwal?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ID Jenis Dokumen</td>
                <td><select name="id_jenis_dokumen">
                        <option> Pilih ID Jenis Dokumen </option>
                        <?php foreach ($jenis as $list){?>
                        <option value="<?php echo $list->id_jenis_dokumen?>"><?php echo $list->id_jenis_dokumen?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nilai</td>
                <td><input type="number" name="nilai"></td>
            </tr>
            <tr>
                <td>Status Penilaian</td>
                <td><select name="status_penilaian">
                        <option> Pilih Status Penilaian </option>
                        <option value="0">Aktif</option>
                        <option value="1">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Penilaian</td>
                <td><?php echo date('Y-m-d')?></td>
            </tr> 
               
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah Penilaian"/></td>
            </tr>
        </table>

        </form> 
    </section>
    
    <section>
        <h3>Tambah Soal</h3>

        <form action="<?php echo base_url(). 'soal/simpansoal';?>" method ="post">

        <table style="border:20px">
            <tr>
                <td>ID Soal</td>
                <td><input type="text" name="id_soal"></td>
            </tr>
            <tr>
                <td>Pertanyaan</td>
                <td><input type="text" name="pertanyaan"></td>
            </tr>
            <tr>
                <td>Opsi 1</td>
                <td><input type="text" name="opsi1"></td>
            </tr>
            <tr>
                <td>Opsi 2</td>
                <td><input type="text" name="opsi2"></td>
            </tr>
            <tr>
                <td>Opsi 3</td>
                <td><input type="text" name="opsi3"></td>
            </tr>
            <tr>
                <td>Opsi 4</td>
                <td><input type="text" name="opsi4"></td>
            </tr>
            <tr>
                <td>Jawaban</td>
                <td><input type="text" name="jawaban"></td>
            </tr>
            <tr>
                <td>ID Quiz</td>
                <td><select name="id_quiz">
                        <option> Pilih ID Quiz </option>
                        <?php foreach ($quiz as $list){?>
                        <option value="<?php echo $list->id_quiz?>"><?php echo $list->id_quiz?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status Soal</td>
                <td><select name="status_soal">
                        <option> Pilih Status Soal </option>
                        <option value="0">Aktif</option>
                        <option value="1">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Soal</td>
                <td><?php echo date('Y-m-d')?></td>
            </tr> 
               
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah Soal"/></td>
            </tr>
        </table>

        </form> 
    </section>
    
    <section>
        <h3>Tambah Assignment Submission</h3>
        
        <?php echo form_open_multipart('assignmentsubmission/simpanassignmentsubmission');?>

        <table style="border:20px">
            <tr>
                <td>ID Assignment Submission</td>
                <td><input type="text" name="id_assignment_submission"></td>
            </tr>
            <tr>
                <td>ID Siswa</td>
                <td><select name="id_siswa">
                        <option> Pilih ID Siswa </option>
                        <?php foreach ($siswa as $list){?>
                        <option value="<?php echo $list->id_siswa?>"><?php echo $list->id_siswa?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ID Dokumen</td>
                <td><select name="id_dokumen">
                        <option> Pilih ID Dokumen </option>
                        <?php foreach ($dokumen as $list){?>
                        <option value="<?php echo $list->id_dokumen?>"><?php echo $list->id_dokumen?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>File Submission</td>
                <td><input type="file" name="file_submission"></td>
            </tr>
            <tr>
                <td>Status Assignment</td>
                <td><select name="status_assignment">
                        <option> Pilih Status Assignment </option>
                        <option value="0">Aktif</option>
                        <option value="1">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Assignment</td>
                <td><?php echo date('Y-m-d')?></td>
            </tr> 
               
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah Assignment Submission"/></td>
            </tr>
        </table>

        <?php echo"</form>"?> 
    </section>
    
    <section>
        <h3>Tambah Kelas Siswa</h3>
        
        <form action="<?php echo base_url(). 'kelassiswa/simpankelassiswa';?>" method ="post">

        <table style="border:20px">
            <tr>
                <td>ID Kelas Siswa</td>
                <td><input type="text" name="id_kelas_siswa"></td>
            </tr>
            <tr>
                <td>ID Siswa Angkatan</td>
                <td><select name="id_siswa_angkatan">
                        <option> Pilih ID Siswa Angkatan</option>
                        <?php foreach ($siswaangkatan as $list){?>
                        <option value="<?php echo $list->id_siswa_angkatan?>"><?php echo $list->id_siswa_angkatan?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ID Kelas</td>
                <td><select name="id_kelas">
                        <option> Pilih ID Kelas </option>
                        <?php foreach ($kelas as $list){?>
                        <option value="<?php echo $list->id_kelas?>"><?php echo $list->id_kelas?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status Kelas Siswa</td>
                <td><select name="status_kelas_siswa">
                        <option> Pilih Status Kelas Siswa </option>
                        <option value="0">Aktif</option>
                        <option value="1">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Kelas Siswa</td>
                <td><?php echo date('Y-m-d')?></td>
            </tr> 
               
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah Kelas Siswa"/></td>
            </tr>
        </table>

        </form>
    </section>
    
    <section>
        <h3>Tambah Siswa</h3>
        
        <form action="<?php echo base_url(). 'siswa/simpansiswa';?>" method ="post">

        <table style="border:20px">
            <tr>
                <td>ID Siswa</td>
                <td><input type="text" name="id_siswa"></td>
            </tr>
            <tr>
                <td>ID User</td>
                <td><select name="id_user">
                        <option> Pilih ID User</option>
                        <?php foreach ($user as $list){?>
                        <option value="<?php echo $list->id_user?>"><?php echo $list->id_user?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan"></td>
            </tr>
            <tr>
                <td>ID Orang Tua</td>
                <td><select name="id_orangtua">
                        <option> Pilih ID Orang Tua</option>
                        <?php foreach ($orangtua as $list){?>
                        <option value="<?php echo $list->id_orangtua?>"><?php echo $list->id_orangtua?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status Siswa</td>
                <td><select name="status_siswa">
                        <option> Pilih Status Siswa </option>
                        <option value="0">Aktif</option>
                        <option value="1">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Siswa</td>
                <td><?php echo date('Y-m-d')?></td>
            </tr> 
               
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah Kelas Siswa"/></td>
            </tr>
        </table>

        </form>
    </section>
    
    

</body>
</html>