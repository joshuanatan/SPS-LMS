
<!--<form action = "<?php echo base_url();?>user/guru/attendance/absen" method= "post">-->
<div class = "row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Pilih Kelas</strong>
            </div>
            <div class="card-body">
                <form action = "<?php echo base_url();?>user/guru/attendance/ceksiswa" method = "post">
                    <div class = "form-group">
                        <select class="form-control" tabindex="1" onchange = "kelasminggu()" name = "id_kelas" id = "aktivitaskelas">
                            <option value="" label="default">Pilih Kelas</option>
                            <?php foreach($kelas as $a){ ?> 
                            <option value = "<?php echo $a->id_kelas ?>" <?php if($this->session->idkelas != "") if($this->session->idkelas == $a->id_kelas) echo "Selected"; ?>><?php echo $a->kelas." ".$a->jurusan." ".$a->urutan;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class = "form-group">
                        <select class="form-control" tabindex="1" id = "mingguan" name = "id_mingguan"></select>
                    </div>
                    <div class = "form-group">
                        <input type = "submit" class = "col-lg-12 btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
//ngeload yang udah absen
$i = 0;
$terabsen = array();
$iduser = array();

foreach($absen as $a){
    $iduser[$i] = $a->id_siswaangkatan;
    $terabsen[$iduser[$i]] = 1;
    $i++;
}
?>
<div class = "row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Absen</strong>
            </div>
            <form action = "<?php echo base_url();?>user/guru/attendance/absen" method="post">
                <div class="card-body">
                    <table class = "table table-bordered" id = "siswa">
                        <?php foreach($siswa as $a){ ?> 
                        <tr><td><?php echo $a->nama_depan." ".$a->nama_belakang;?></td><td><input type = 'checkbox' name = 'status[]' value = '<?php echo $a->id_siswa_angkatan ?>' <?php if(in_array($a->id_siswa_angkatan,$iduser)) echo "checked"; ?> ></td></tr>
                        <?php } ?>
                    </table>
                    <input type = "submit" class="col-lg-12 btn btn-success">
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Agenda Minggu Ini</strong>
            </div>
            <form action = "<?php echo base_url();?>user/guru/assignment/agenda" method="post">
                <div class="card-body">
                    <div class = "form-group">
                        <label>AGENDA</label>
                        <?php foreach($agenda as $bd){ ?> 
                        <textarea class = "form-control col-lg-12" name = "agenda"><?php echo $bd->deskripsi_materi;?></textarea>
                        <?php } ?>
                    </div>
                    <div class = "form-group">
                        <input type = "submit" class = "btn btn-success col-lg-12">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--</form>-->
<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>

                