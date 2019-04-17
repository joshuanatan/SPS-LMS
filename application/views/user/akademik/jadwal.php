<?php
$idmatpel = array();
$i = 0;
foreach($senin as $a){
    $idmatpel[0][$i] = $a->id_gurutahunan;
    $i++;
}
$i = 0;
foreach($selasa as $a){
    $idmatpel[1][$i] = $a->id_gurutahunan;
    $i++;
}
$i = 0;
foreach($rabu as $a){
    $idmatpel[2][$i] = $a->id_gurutahunan;
    $i++;
}
$i = 0;
foreach($kamis as $a){
    $idmatpel[3][$i] = $a->id_gurutahunan;
    $i++;
}
$i = 0;
foreach($jumat as $a){
    $idmatpel[4][$i] = $a->id_gurutahunan;
    $i++;
}
?>

<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">List Kelas</h4>
            </div>
            <div class="card-body">
                <form class = "form-inline" action = "<?php echo base_url();?>master/jadwal/kelas" method="post">
                    <select class = "form-control col-lg-8" name = "kelas">
                        <?php foreach($kelas as $a){ ?> 
                        <option value = "<?php echo $a->id_kelas;?>" <?php if($this->session->pilihkelas != null) if($this->session->pilihkelas == $a->id_kelas) echo "selected";?>><?php echo $a->kelas." ".$a->jurusan." ".$a->urutan;?></option>
                        <?php } ?>
                    </select>
                    <input type = "submit" class = "form-control col-lg-3" style = "margin-left:20px">
                </form>
            </div>
        </div> <!-- /.card -->
    </div>
</div>
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Jadwal</h4>
            </div>
            <div class="card-body">
                <form action = "<?php echo base_url();?>master/jadwal/assignjadwal" method="post">
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
                        <?php $hari = ["senin","selasa","rabu","kamis","jumat"]; ?>
                        <tbody>
                            <?php for($c = 0; $c<9; $c++){ ?> 
                            <tr>
                                <?php for($b = 0; $b<count($hari); $b++){ ?> 
                                <td>
                                    <select <?php if($this->session->pilihkelas == "") echo "disabled"; ?> class = "form-control" name = "<?php echo $hari[$b];?>[]" onmouseover = "abc('<?php echo $hari[$b]; ?>','<?php echo ($c+1);?>','<?php echo $hari[$b].$c;?>')" id = "<?php echo $hari[$b].$c;?>">
                                        <option value = "0" >-</option>
                                        <?php foreach($guru as $a){ ?> 

                                        <option value = "<?php echo $a->id_gurutahunan?>" <?php if($idmatpel[$b][$c] == $a->id_gurutahunan) echo "selected";?>><?php echo $a->nama_matpel." - ".$a->nama_depan." ".$a->nama_belakang;?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <input type = "submit" class = "btn btn-success">
                </form>
            </div>
        </div> <!-- /.card -->
    </div>
</div>