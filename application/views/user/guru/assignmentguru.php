<?php
$assignment = array();//ini buat hari
$tanggal = array();//ini buat hari
$idkelas = array();
$namakelas = array();
$idmingguan = array();
$kelascounter = 0;
$kelas = 0;
$counter = 0;
    //echo $this->session->id_user;
foreach($assignments as $a){ //gamasuk sini
    if($kelas != $a->id_kelas){
        $idkelas[$kelascounter] = $a->id_kelas; //nyatet kelas biar ngefornya ga usah sampe 13
        $namakelas[$kelascounter] = $a->kelas." ".$a->jurusan." ".$a->urutan; //nyatet kelas biar ngefornya ga usah sampe 13
        $jadwal[$kelascounter] = $a->id_jadwal;
        $kelas = $a->id_kelas;
        $counter =0;
        $kelascounter++;
    }
    $idmingguan[$a->id_kelas][$counter] = $a->id_mingguan;
    $assignment[$a->id_kelas][$counter] = $a->materi_mingguan;
    $tanggal[$a->id_kelas][$counter] = $a->tgl_kelas;
    $counter++;
    
}
?>
<button type="button" class="form-control" style = "margin-top:10px;" data-toggle="modal" data-target="#mediumModal2">TAMBAH MATERI MINGGUAN</button>
<br/>
<?php for($b = 0; $b<count($idkelas); $b++){  ?>
<div class = "row">
    <div class = "col-lg-12">
        <div class = "card">
            <div class = "card-header">
                <div class = "mx-auto d-block">
                    <h5 class ="text-sm-center mt-2 mb-1"><?php echo $namakelas[$b];?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
   
    <?php for($a = 0; $a<count($assignment[$idkelas[$b]]); $a++){ ?> 
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3"><?php echo $tanggal[$idkelas[$b]][$a]?></strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <h5 class="text-sm-center mt-2 mb-1"></h5>
                    <div class="location text-sm-center"><?php echo $assignment[$idkelas[$b]][$a]?></div>
                </div>
                <hr>
                <a href ="<?php echo base_url();?>user/guru/mingguan/quiz/minggu/<?php echo $idmingguan[$idkelas[$b]][$a];?>"><button class = "form-control">Tambah Quiz</button></a>
                <button type="button" class="btn btn-secondary btn-warning col-lg-12" style = "margin-top:10px;" data-toggle="modal" data-target="#mediumModal<?php echo $idmingguan[$idkelas[$b]][$a];?>" onclick = "abc('<?php echo $idmingguan[$idkelas[$b]][$a]?>','<?php echo "tabel".$idmingguan[$idkelas[$b]][$a];?>')">Dokumen</button>
                <a href = "<?php echo base_url();?>user/guru/assignment/remove/<?php echo $idmingguan[$idkelas[$b]][$a];?>" class="btn btn-secondary btn-danger col-lg-12" style = "margin-top:10px;">Delete</a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mediumModal<?php echo $idmingguan[$idkelas[$b]][$a];?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN DOKUMEN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action = "<?php echo base_url();?>user/guru/assignment/dokumen/<?php echo $idmingguan[$idkelas[$b]][$a];?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12"> 
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="box-title"><?php echo $this->session->role;?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-stats">
                                            <table class="table table-stripped">
                                                <thead>
                                                    <tr>
                                                        <th class="serial">#</th>
                                                        <th>Nama File</th>
                                                        <th>Tanggal</th>
                                                        <?php if($this->session->role == "guru"){ ?><th>Aksi</th><?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody id = "tabel<?php echo $idmingguan[$idkelas[$b]][$a]; ?>">
                                                    <tr>
                                                        <td>1</td>
                                                        <td>KURNIA.docx</td>
                                                        <td>28/02/2019</td>
                                                        <td><button class = "col-lg-12">HAPUS</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> <!-- /.table-stats -->
                                    </div>
                                </div> <!-- /.card -->
                            </div>  <!-- /.col-lg-8 -->

                        </div> 
                        <div class = "form-group col-lg-12">
                            <label>Judul Dokumen</label>
                            <input type = "text" class = "form-control" name = "judul">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>Tipe Dokumen</label>
                            <select class = "form-control" name = "id_jenis_dokumen">
                                <option value = "TUGAS">TUGAS</option>
                                <option value = "MATERI">MATERI</option>
                            </select>
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>File Dokumen</label><br/>
                            <input type = "file" name = "file_assignment">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
 <?php } ?>
<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>

<div class="modal fade" id="mediumModal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">DATA MINGGUAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action = "<?php echo base_url();?>user/guru/assignment/mingguan" method="post">
                <div class="modal-body">
                    <div class = "form-group col-lg-12">
                        <label>Tanggal</label>
                        <input type = "date" class = "form-control" name = "tglkelas">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Kelas</label>
                        <select class = "form-control" name = "kelas">
                        <?php foreach($jadwale as $asdf){ ?> 
                            <option value = "<?php echo $asdf->id_jadwal;?>"><?php echo $asdf->kelas." ".$asdf->jurusan." ".$asdf->urutan;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Materi</label><br/>
                        <input type = "text" class = "form-control" name = "materi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>