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
        <h3>Edit Kelas</h3>

        <?php foreach($kelas as $lista){?>
        <form action="<?php echo base_url(). 'kelas/updatekelas/'.$lista->id_kelas;?>" method ="post">

        <table style="border:20px">
            <tr>
                <td>ID Kelas</td>
                <td><?php echo $lista->id_kelas?></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" value="<?php echo $lista->jurusan?>"></td>
            </tr>
            <tr>
                <td>Urutan</td>
                <td><input type="number" name="urutan" value="<?php echo $lista->urutan?>"></td>
            </tr>
            <tr>
                <td>ID Guru Tahunan</td>
                <td><select name="id_gurutahunan">
                        <option> Pilih ID Guru Tahunan </option>
                        <?php foreach ($gurutahunan as $listb){?>
                        <option value="<?php echo $listb->id_gurutahunan?>" <?php if($lista->id_gurutahunan == $listb->id_gurutahunan) echo "selected"?>><?php echo $listb->id_gurutahunan?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status Kelas</td>
                <td><select name="status_kelas">
                        <option> Pilih Status Kelas </option>
                        <option value="0" <?php if($lista->status_kelas =="0") echo "selected"?>>Aktif</option>
                        <option value="1" <?php if($lista->status_kelas =="1") echo "selected"?>>Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Kelas</td>
                <td><?php echo $lista->tgl_submit_kelas ?></td>
            </tr>    
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan Kelas"/></td>
            </tr>
        </table>

        </form> 
        <?php }?>
    </section>
    
    <section>
        <h3>Edit Penilaian</h3>

        <?php foreach($penilaian as $lista){?>
        <form action="<?php echo base_url(). 'penilaian/updatepenilaian/'.$lista->id_penilaian;?>" method ="post">

        <table style="border:20px">
            <tr>
                <td>ID Penilaian</td>
                <td><?php echo $lista->id_penilaian?></td>
            </tr>
            <tr>
                <td>ID Kelas Siswa</td>
                <td><select name="id_kelas_siswa">
                        <option> Pilih ID Kelas Siswa </option>
                        <?php foreach ($kelassiswa as $listb){?>
                        <option value="<?php echo $listb->id_kelas_siswa?>" <?php if($lista->id_kelas_siswa == $listb->id_kelas_siswa) echo "selected"?>><?php echo $listb->id_kelas_siswa?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ID Jadwal</td>
                <td><select name="id_jadwal">
                        <option> Pilih ID Jadwal </option>
                        <?php foreach ($jadwal as $listc){?>
                        <option value="<?php echo $listc->id_jadwal?>" <?php if($lista->id_jadwal == $listc->id_jadwal) echo "selected"?>><?php echo $listc->id_jadwal?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ID Jenis Dokumen</td>
                <td><select name="id_jenis_dokumen">
                        <option> Pilih ID Jenis Dokumen </option>
                        <?php foreach ($jenis as $listd){?>
                        <option value="<?php echo $listd->id_jenis_dokumen?>" <?php if($lista->id_jenis_dokumen == $listd->id_jenis_dokumen) echo "selected"?>><?php echo $listd->id_jenis_dokumen?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nilai</td>
                <td><input type="number" name="nilai" value="<?php echo $lista->nilai ?>"></td>
            </tr>
            <tr>
                <td>Status Penilaian</td>
                <td><select name="status_penilaian">
                        <option> Pilih Status Penilaian </option>
                        <option value="0" <?php if($lista->status_penilaian =="0") echo "selected"?>>Aktif</option>
                        <option value="1" <?php if($lista->status_penilaian =="1") echo "selected"?>>Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Penilaian</td>
                <td><?php echo $lista->tgl_submit_penilaian ?></td>
            </tr> 
               
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan Penilaian"/></td>
            </tr>
        </table>

        </form> 
        <?php }?>
    </section>
    
    <section>
        <h3>Edit Soal</h3>

        <?php foreach($soal as $lista){?>
        <form action="<?php echo base_url(). 'soal/updatesoal/'.$lista->id_soal;?>" method ="post">

        <table style="border:20px">
            <tr>
                <td>ID Soal</td>
                <td><?php echo $lista->id_soal?></td>
            </tr>
            <tr>
                <td>Pertanyaan</td>
                <td><input type="text" name="pertanyaan" value="<?php echo $lista->pertanyaan?>"></td>
            </tr>
            <tr>
                <td>Opsi 1</td>
                <td><input type="text" name="opsi1" value="<?php echo $lista->opsi1?>"></td>
            </tr>
            <tr>
                <td>Opsi 2</td>
                <td><input type="text" name="opsi2" value="<?php echo $lista->opsi2?>"></td>
            </tr>
            <tr>
                <td>Opsi 3</td>
                <td><input type="text" name="opsi3" value="<?php echo $lista->opsi3?>"></td>
            </tr>
            <tr>
                <td>Opsi 4</td>
                <td><input type="text" name="opsi4" value="<?php echo $lista->opsi4?>"></td>
            </tr>
            <tr>
                <td>Jawaban</td>
                <td><input type="text" name="jawaban" value="<?php echo $lista->jawaban?>"></td>
            </tr>
            <tr>
                <td>ID Quiz</td>
                <td><select name="id_quiz">
                        <option> Pilih ID Quiz </option>
                        <?php foreach ($quiz as $listb){?>
                        <option value="<?php echo $listb->id_quiz?>" <?php if( $lista->id_quiz == $listb->id_quiz) echo "selected"?>><?php echo $listb->id_quiz?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status Soal</td>
                <td><select name="status_soal">
                        <option> Pilih Status Soal </option>
                        <option value="0" <?php if($lista->status_soal =="0") echo "selected"?>>Aktif</option>
                        <option value="1" <?php if($lista->status_soal =="1") echo "selected"?>>Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Soal</td>
                <td><?php echo $lista->tgl_submit_soal ?></td>
            </tr> 
               
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan Soal"/></td>
            </tr>
        </table>

        </form>
        <?php }?>
    </section>
    
    <section>
        <h3>Edit Assignment Submission</h3>
        
        <?php foreach($assignmentsubmission as $lista){?>
        <?php echo form_open_multipart('assignmentsubmission/updateassignmentsubmission/'.$lista->id_assignment_submission);?>

        <table style="border:20px">
            <tr>
                <td>ID Assignment Submission</td>
                <td><?php echo $lista->id_assignment_submission ?></td>
            </tr>
            <tr>
                <td>ID Siswa</td>
                <td><select name="id_siswa">
                        <option> Pilih ID Siswa </option>
                        <?php foreach ($siswa as $listb){?>
                        <option value="<?php echo $listb->id_siswa?>" <?php if($lista->id_siswa == $listb->id_siswa) echo "selected"?>><?php echo $listb->id_siswa?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ID Dokumen</td>
                <td><select name="id_dokumen">
                        <option> Pilih ID Dokumen </option>
                        <?php foreach ($dokumen as $listb){?>
                        <option value="<?php echo $listb->id_dokumen?>"<?php if($lista->id_dokumen == $listb->id_dokumen) echo "selected"?>><?php echo $listb->id_dokumen?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>File Submission</td>
                <td><a target="_blank" href="<?php echo base_url().'/assignment_submission/'.$lista->file_submission?>"><?php echo $lista->file_submission?></a>&nbsp;<a href="<?php echo base_url().'assignmentsubmission/editfilesubmission/'.$lista->id_assignment_submission?>"><input type="button" value="Replace"></a></td>
            </tr>
            <tr>
                <td>Status Assignment</td>
                <td><select name="status_assignment">
                        <option> Pilih Status Assignment </option>
                        <option value="0" <?php if($lista->status_assignment =="0") echo "selected"?>>Aktif</option>
                        <option value="1" <?php if($lista->status_assignment =="1") echo "selected"?>>Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Assignment</td>
                <td><?php echo $lista->tgl_submit_assignment ?></td>
            </tr> 
               
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan Assignment Submission"/></td>
            </tr>
        </table>

        <?php echo"</form>"; }?> 
    </section>
    
    <section>
        <h3>Edit File Submission (Update Attachment Assignment Submission)</h3>
        
        <?php foreach($filesubmission as $lista){?>
        <?php echo form_open_multipart('assignmentsubmission/updatefilesubmission/'.$lista->id_assignment_submission);?>

        <table style="border:20px">
            <tr>
                <td>ID Assignment Submission</td>
                <td><?php echo $lista->id_assignment_submission ?></td>
            </tr>
            <tr>
                <td>ID Siswa</td>
                <td><?php echo $lista->id_siswa ?>
                </td>
            </tr>
            <tr>
                <td>ID Dokumen</td>
                <td><?php echo $lista->id_dokumen ?>
                </td>
            </tr>
            <tr>
                <td>File Submission</td>
                <td><input type="file" name="file_submission"></td>
            </tr>
            <tr>
                <td>Status Assignment</td>
                <td><?php if ($lista->status_assignment == 0){
                echo 'Aktif';  
                }  else {echo 'Tidak Aktif';} ?></td>
            </tr>
            <tr>
                <td>Tanggal Submit Assignment</td>
                <td><?php echo date('Y-m-d')?></td>
            </tr> 
               
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan File Submission"/></td>
            </tr>
        </table>

        <?php echo"</form>"; }?> 
    </section>
    
    <section>
        <h3>Edit Kelas Siswa</h3>
        
        <?php foreach($kelassiswa as $lista){?>
        <form action="<?php echo base_url(). 'kelassiswa/updatekelassiswa/'.$lista->id_kelas_siswa;?>" method ="post">

        <table style="border:20px">
            <tr>
                <td>ID Kelas Siswa</td>
                <td><?php echo $lista->id_kelas_siswa ?></td>
            </tr>
            <tr>
                <td>ID Siswa Angkatan</td>
                <td><select name="id_siswa_angkatan">
                        <option> Pilih ID Siswa Angkatan</option>
                        <?php foreach ($siswaangkatan as $listb){?>
                        <option value="<?php echo $listb->id_siswa_angkatan?>" <?php if($lista->id_siswa_angkatan == $listb->id_siswa_angkatan) echo "selected"?>><?php echo $listb->id_siswa_angkatan?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ID Kelas</td>
                <td><select name="id_kelas">
                        <option> Pilih ID Kelas </option>
                        <?php foreach ($kelas as $listc){?>
                        <option value="<?php echo $listc->id_kelas?>" <?php if($lista->id_kelas == $listc->id_kelas) echo "selected"?>><?php echo $listc->id_kelas?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status Kelas Siswa</td>
                <td><select name="status_kelas_siswa">
                        <option> Pilih Status Kelas Siswa </option>
                        <option value="0" <?php if($lista->status_kelas_siswa =="0") echo "selected"?>>Aktif</option>
                        <option value="1" <?php if($lista->status_kelas_siswa =="1") echo "selected"?>>Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Kelas Siswa</td>
                <td><?php echo $lista->tgl_submit_kelas_siswa ?></td>
            </tr> 
               
            <tr>
                <td></td>
                <td><input type="submit" value="Update Kelas Siswa"/></td>
            </tr>
        </table>

        </form>
        <?php }?>
    </section>
    
    <section>
        <h3>Edit Siswa</h3>
        
        <?php foreach($siswa as $lista){?>
        <form action="<?php echo base_url(). 'siswa/updatesiswa/'.$lista->id_siswa;?>" method ="post">

        <table style="border:20px">
            <tr>
                <td>ID Siswa</td>
                <td><?php echo $lista->id_siswa ?></td>
            </tr>
            <tr>
                <td>ID User</td>
                <td><select name="id_user">
                        <option> Pilih ID User</option>
                        <?php foreach ($user as $listb){?>
                        <option value="<?php echo $listb->id_user?>" <?php if($lista->id_user == $listb->id_user) echo "selected"?>><?php echo $listb->id_user?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" value="<?php echo $lista->jurusan?>"></td>
            </tr>
            <tr>
                <td>ID Orang Tua</td>
                <td><select name="id_orangtua">
                        <option> Pilih ID Orang Tua </option>
                        <?php foreach ($orangtua as $listc){?>
                        <option value="<?php echo $listc->id_orangtua?>" <?php if($lista->id_orangtua == $listc->id_orangtua) echo "selected"?>><?php echo $listc->id_orangtua?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status Siswa</td>
                <td><select name="status_siswa">
                        <option> Pilih Status Siswa </option>
                        <option value="0" <?php if($lista->status_siswa =="0") echo "selected"?>>Aktif</option>
                        <option value="1" <?php if($lista->status_siswa =="1") echo "selected"?>>Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Submit Siswa</td>
                <td><?php echo $lista->tgl_submit_siswa ?></td>
            </tr> 
               
            <tr>
                <td></td>
                <td><input type="submit" value="Update Siswa"/></td>
            </tr>
        </table>

        </form>
        <?php }?>
    </section>
    
    

</body>
</html>