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
                    <?php $hari = ["SENIN","SELASA","RABU","KAMIS","JUMAT"]; ?>
                    <tbody>
                        <?php for($c = 0; $c<9; $c++){ ?> 
                        <tr>
                            <?php for($b = 0; $b<count($hari); $b++){ ?> 
                            <td>
                                <select class = "form-control" name = "<?php $hari[$b];?>[]">
                                    <?php foreach($guru as $a){ ?> 
                                    
                                    <option value = "<?php echo $a->id_guru?>"><?php echo $a->nama_depan." ".$a->nama_belakang." - ".$a->nama_matpel;?></option>
                                    <?php } ?>
                                    <?php foreach($guruumum as $a){ ?> 
                                    
                                    <option value = "<?php echo $a->id_guru?>"><?php echo $a->nama_depan." ".$a->nama_belakang." - ".$a->nama_matpel;?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input type = "submit" class = "btn btn-success">
            </div>
        </div> <!-- /.card -->
    </div>
</div>