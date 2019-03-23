
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
                            <th>Lab</th>
                            <th>Tugas</th>
                            <th>ULANGAN HARIAN</th>
                            <th>UTS</th>
                            <th>UAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($siswa as $a){ ?> 
                        <tr>
                            <td><?php echo $a->nama_depan." ".$a->nama_belakang;?></td>
                            <td><input type = "number" class = "Form-control" required name = ""></td>
                            <td><input type = "number" class = "Form-control" required name = ""></td>
                            <td><input type = "number" class = "Form-control" required name = ""></td>
                            <td><input type = "number" class = "Form-control" required name = ""></td>
                            <td><input type = "number" class = "Form-control" required name = ""></td>
                            
                        </tr>
                        <?php } ?>
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


                