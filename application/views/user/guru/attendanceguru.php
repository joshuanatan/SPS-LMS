
<div class = "row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Pilih Kelas</strong>
            </div>
            <div class="card-body">
                <select class="form-control" tabindex="1">
                    <option value="" label="default">Pilih Kelas</option>
                    <?php foreach($kelas as $a){ ?> 
                    <option value = "<?php echo $a->id_kelas ?>" <?php if($this->session->idkelas != "") if($this->session->idkelas == $a->id_kelas) echo "Selected"; ?>><?php echo $a->kelas." ".$a->jurusan." ".$a->urutan;?></option>
                    <?php } ?>
                </select>
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
                <table class = "table table-bordered">
                    <tr>
                        <td>Nama Siswa</td>
                        <td><input type = checkbox></td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td><input type = checkbox></td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td><input type = checkbox></td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td><input type = checkbox></td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td><input type = checkbox></td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td><input type = checkbox></td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td><input type = checkbox></td>
                    </tr>
                </table>
                <input type = "submit" class = "form-control">
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Agenda Minggu Ini</strong>
            </div>
            <div class="card-body">
                <form>
                    <div class = "form-group">
                        <label>AGENDA</label>
                        <textarea class = "form-control col-lg-12"></textarea>
                    </div>
                    
                    <input type = "submit" class = "form-control">
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>

                