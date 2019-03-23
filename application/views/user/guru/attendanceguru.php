

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
                            <option value = "<?php echo $a->id_kelas ?>" <?php if($this->session->idkelas != "") //if($this->session->idkelas == $a->id_kelas) echo "Selected"; ?>><?php echo $a->kelas." ".$a->jurusan." ".$a->urutan;?></option>
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
<div class = "row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Absen</strong>
            </div>
                <div class="card-body">
                    <table class = "table table-bordered" id = "siswa">

                    </table>
                </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Agenda Minggu Ini</strong>
            </div>
            <div class="card-body">
                    <div class = "form-group">
                        <label>AGENDA</label>
                        <textarea class = "form-control col-lg-12"></textarea>
                    </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>

                