<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">TAHUN AJARAN</h4>
            </div>
            <div class="card-body">
                <form class = "form-inline" action = "<?php echo base_url();?>master/tahunajaran/setTahunAjaran" method="post">
                    <select class = "form-control col-lg-7" name = "id_tahun_ajaran">
                        <?php foreach($tahunajaran as $a){ ?> 
                        <option value = "<?php echo $a->id_tahun_ajaran?>" <?php if($a->id_tahun_ajaran == $this->session->tahunajaran) echo "selected";?>><?php echo $a->tahun_awal;?>/<?php echo $a->tahun_akhir;?></option>
                        <?php } ?>
                    </select>
                    <input type ="submit" class = "form-control col-lg-2" style = "margin-left:10px;">
                    <button type="button" class="btn btn-success col-lg-2" style = "margin-left:10px;" data-toggle="modal" data-target="#mediumModal2">TAMBAH</button>
                </form>
            </div>
        </div> <!-- /.card -->
    </div>
</div>
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Mata Pelajaran</h4>
            </div>
            <div class="card-body">
                <div class="table-stats">
                    <table class="table table-stripped" id = "bootstrap-data-table-export">
                        <thead>
                            <tr>
                                <th>ID Mata Pelajaran</th>
                                <th>Nama Mata Pelajaran</th>
                                <!--<th>Status</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($matapelajaran as $a){ ?> 
                            <tr>
                                <td><?php echo $a->id_matpel;?></td>
                                <td><?php echo $a->nama_matpel;?></td>
                                <!--<td>
                                    <?php if($a->status_matpel == 1) echo "TIDAK AKTIF"; else echo "AKTIF";?>
                                </td>-->
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
            </div>
        </div> <!-- /.card -->
    </div>  <!-- /.col-lg-8 -->

</div>
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Guru</h4>
            </div>
            <div class="card-body">
                <div class="table-stats">
                    <table class="table table-stripped" id = "bootstrap-data-table-export2">
                        <thead>
                            <tr>
                                <th>ID Guru</th>
                                <th>Nama Guru</th>
                                <th>Expertise Guru</th>
                                <!--<th>Status</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($guru as $a){ ?>
                            <tr>
                                <td><?php echo $a->id_guru;?></td>
                                <td><?php echo $a->nama_depan." ".$a->nama_belakang;?></td>
                                <td><?php echo $a->nama_matpel;?></td>
                                <!--<td><?php if($a->status == 0) echo "AKTIF"; else echo "TIDAK AKTIF";?></td>-->
                            </tr> 
                            <?php } ?>
                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
            </div>
        </div> <!-- /.card -->
    </div>  <!-- /.col-lg-8 -->

</div> 

<div class="modal fade" id="mediumModal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN TAHUN AJARAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action = "<?php echo base_url();?>master/tahunajaran/insertTahunAjaran" method="post">
                <div class="modal-body">
                        <div class = "form-group col-lg-12">
                            <label>AWAL TAHUN AJARAN</label>
                            <input type = "number" class = "form-control"  name = "awal" id = "awal">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>AKHIR TAHUN AJARAN</label>
                            <input type = "number" class = "form-control" onclick = "abc()" name = "akhir" id = "akhir" readonly placeholder="Tekan disini" required>
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
<script>
    function abc(){
        var angka = parseInt(document.getElementById("awal").value)+1;
        //alert(angka);
        document.getElementById("akhir").value = angka;
    }
</script>