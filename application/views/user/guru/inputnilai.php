
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
                                <?php foreach($matapelajaran as $abcd){ ?>
                                    <?php if($abcd->tugas != 0) echo "<td>TUGAS</td>"; ?>
                                    <?php if($abcd->lab != 0) echo "<td>LAB</td>"; ?>
                                    <?php if($abcd->uh != 0) echo "<td>ULANGAN HARIAN</td>"; ?>
                                    <?php if($abcd->uts != 0) echo "<td>UTS</td>"; ?>
                                    <?php if($abcd->uas != 0) echo "<td>UAS</td>"; ?>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($siswa as $a){ ?> 
                            <tr>
                                
                                <td><input type = "number"  required class = "form-control" readonly name = "id[]" value = "<?php echo $a->id_siswa_angkatan;?>"></td>
                                <td><input type = "text" required class = "form-control" value = "<?php echo $a->nama_depan." ".$a->nama_belakang;?>" readonly></td>
                                <?php foreach($matapelajaran as $abcd){ ?>
                                <?php if($abcd->lab != 0){ ?>
                                <td><input type = "number" required class = "Form-control" required value = "<?php if($a->nilai_lab == null) echo "0"; else echo $a->nilai_lab; ?>" name = "lab[]"></td>
                                <?php } ?>

                                <?php if($abcd->tugas != 0){ ?>
                                <td><input type = "number" required class = "Form-control" required value = "<?php if($a->nilai_tugas == null) echo "0"; else echo $a->nilai_tugas; ?>" name = "tugas[]"></td>
                                <?php } ?>

                                <?php if($abcd->uh != 0){ ?>
                                <td><input type = "number" required class = "Form-control" readonly value = "<?php echo $a->a;?>" name = "uh[]"></td>
                                <?php } ?>

                                <?php if($abcd->uts != 0){?>
                                <td><input type = "number" required class = "Form-control" required value = "<?php if($a->nilai_uts == null) echo "0"; else echo $a->nilai_uts; ?>" name = "uts[]"></td>
                                <?php } ?>

                                <?php if($abcd->uas != 0){?>
                                <td><input type = "number" required class = "Form-control" required value = "<?php if($a->nilai_uas == null) echo "0"; else echo $a->nilai_uas; ?>" name = "uas[]"></td>
                                <?php } ?>

                                <?php } ?>
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


                