
<form action = "<?php echo base_url();?>user/guru/grade/inputharian" method="post">
<div class = "row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Materi Mingguan</strong>
            </div>
            <div class="card-body">
                <div class = "form-group">
                    <label>Materi Ujian</label>
                    <Select class = "form-control col-lg-12" name = "aktivitas" onchange = "nilaimurid()">
                        <option>Pilih Aktivitas</option>
                        <?php foreach($mingguan as $a){ ?> 
                        <option value = "<?php echo $a->id_mingguan?>"><?php echo $a->materi_mingguan;?></option>
                        <?php } ?>
                    </Select>
                </div>  
                    
            </div>
        </div>
    </div>
</div>
<div class = "row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Input nilai</strong>
            </div>
            <div class="card-body">
                <table class = "table table-bordered" id="bootstrap-data-table">
                    <thead>
                        <tr>
                            <th>ID Siswa</th>
                            <th>Nama Siswa</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody id = '#nilaikelas'>
                        <?php foreach($siswa as $a){ ?> 
                        <tr>
                            <td><input class = "form-control col-lg-12" type = "text" name = "id[]" value = "<?php echo $a->id_siswa_angkatan;?>" readonly></td>
                            <td><input class = "form-control col-lg-12" type = "text" value = "<?php echo $a->nama_depan." ".$a->nama_belakang;?>" readonly></td>
                            <td><input type = "number" class = "Form-control" name="nilai[]" required></td>
                        </tr>
                        <?php } ?>
                       
                    </tbody>
                </table>
                <input type = "submit" class = "form-control">
            </div>
        </div>
    </div>
</div>
</form>
<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>

                