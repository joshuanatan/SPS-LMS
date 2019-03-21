<div class = "row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Ulangan Harian</strong>
            </div>
            <div class="card-body">
                <div class = "form-group">
                    <label>Tanggal Ujian</label>
                    <input type = "date" class = "form-control" required>
                </div>  
                <div class = "form-group">
                    <label>Tema Ujian</label>
                    <input type = "text" class = "form-control" required>
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
                            <th>Nama Siswa</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach($siswa as $a){ ?> 
                            <td><?php echo $a->nama_depan." ".$a->nama_belakang;?></td>
                            <td><input type = "number" class = "Form-control" required></td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
                <input type = "submit" class = "form-control">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>

                