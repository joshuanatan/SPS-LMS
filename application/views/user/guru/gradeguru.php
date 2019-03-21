
<div class = "row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Pilih Kelas</strong>
            </div>
            <div class="card-body">
                <form class = "form-inline" action="<?php echo base_url();?>user/guru/grade/kelas" method = "post">
                    <select class="form-control col-lg-8" tabindex="1" name = "kelas">
                        <option value="#" label="default">Pilih Kelas</option>
                        <?php foreach($kelas as $a){ ?> 
                        <option value = "<?php echo $a->id_kelas ?>" <?php if($this->session->idkelas != "") if($this->session->idkelas == $a->id_kelas) echo "Selected"; ?>><?php echo $a->kelas." ".$a->jurusan." ".$a->urutan;?></option>
                        <?php } ?>
                    </select>
                    <input type = "submit" class = "form-control col-lg-3" style= "margin-left:20px">
                </form>
            </div>
        </div>
    </div>
</div>
<div class = "row">
    <div class = "col-lg-12">
        <a style= "margin-bottom:20px;" href = "<?php echo base_url();?>user/guru/grade/ujian"><button class = "btn btn-success col-lg-12 col-sm-12">Memasukan nilai ujian</button></a>
        
        <a href = "<?php echo base_url();?>user/guru/grade/harian"><button class = "btn btn-warning col-lg-12 col-sm-12">Memasukan nilai harian</button></a>

    
    </div>
</div>
<br/>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Grade Quiz Kelas 1</h4>
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Grade Quiz Kelas 1</h4>
                <canvas id="lineChart2"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Siswa yang sering remedial</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID Mahasiswa</th>
                            <th>Nama Mahasiswa</th>
                            <th>Kelas</th>
                            <th>Rata-rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Joshua Natan</td>
                            <td>10 IPA 1</td>
                            <td>50</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>

                