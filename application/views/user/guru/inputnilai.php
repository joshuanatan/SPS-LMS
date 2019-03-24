
<div class = "row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Input nilai</strong>
            </div>
            <form action = "<?php echo base_url();?>user/guru/grade/insertnilai" method ="post">
                <div class="card-body">
                    <table class = "table table-bordered" id="bootstrap-data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th style = "width: 40%">Nama Siswa</th>
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
                                <td><input type = "number"  required class = "form-control" readonly name = "id[]" value = "<?php echo $a->id_siswa_angkatan;?>"></td>
                                <td><input type = "text" required class = "form-control" value = "<?php echo $a->nama_depan." ".$a->nama_belakang;?>" readonly></td>
                                <td><input type = "number" required class = "Form-control" required value = "<?php if($a->nilai_lab == null) echo "0"; else echo $a->nilai_lab; ?>" name = "lab[]"></td>
                                <td><input type = "number" required class = "Form-control" required value = "<?php if($a->nilai_tugas == null) echo "0"; else echo $a->nilai_tugas; ?>" name = "tugas[]"></td>
                                <td><input type = "number" required class = "Form-control" readonly value = "<?php echo $a->a;?>" name = "uh[]"></td>
                                <td><input type = "number" required class = "Form-control" required value = "<?php if($a->nilai_uts == null) echo "0"; else echo $a->nilai_uts; ?>" name = "uts[]"></td>
                                <td><input type = "number" required class = "Form-control" required value = "<?php if($a->nilai_uas == null) echo "0"; else echo $a->nilai_uas; ?>" name = "uas[]"></td>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <input type = "submit" class = "form-control">
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>


                