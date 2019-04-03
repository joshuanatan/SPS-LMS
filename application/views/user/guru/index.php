<?php
$i = 0;
$hari = 0;

for($hari = 0; $hari < 5; $hari++){
    for($jampel = 0; $jampel < 9; $jampel++){
        $data[$hari][$jampel] = "-";
    }
}
foreach($jadwal as $a){
    switch($a->hari){
        case "SENIN" : $hari = 0;
            break;
        case "SELASA":$hari = 1;
            break;
        case "RABU" :$hari = 2;
            break;
        case "KAMIS":$hari = 3;
            break;
        case "JUMAT":$hari = 4;
            break;
    }
    $data[$hari][($a->jam_pelajaran-1)] = $a->kelas." ".$a->jurusan." ".$a->urutan;
    $i++;
}
?>
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Jadwal</h4>
                <a href = "<?php echo base_url();?>user/guru/index/jadwalpdf"><button class = "btn btn-success">PRINT</button></a>
            </div>
            <div class="card-body">
                <table class = "table table-bordered">
                    <thead>
                        <tr>
                            <th>SENIN</th>
                            <th>SELASA</th>
                            <th>RABU</th>
                            <th>KAMIS</th>
                            <th>JUMAT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        for($jampel = 0; $jampel < 9; $jampel++){ ?>
                        <tr>
                        <?php
                            for($hari = 0; $hari < 5; $hari++){ ?>
                            <td><?php echo $data[$hari][$jampel];?></td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- /.card -->
    </div>
</div>