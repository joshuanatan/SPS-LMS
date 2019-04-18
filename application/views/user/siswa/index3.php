
<div class = "row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Mata Pelajaran</strong>
            </div>
            <div class="card-body">
                <select class="form-control" tabindex="1" onchange = "ambilnilai()" id = "idmatpel">
                    <option value="" label="default">Pilih Mata Pelajaran</option>
                    <?php foreach($matpel->result() as $a){ ?>
                    <option value = "<?php echo $a->id_matpel;?>"><?php echo $a->nama_matpel." - ".$a->nama_depan." ".$a->nama_belakang;?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Nilai Siswa Berdasarkan Rata-Rata Kelas</h4>
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Rata-Rata Nilai Siswa Setiap Mata Pelajaran</h4>
                <canvas id="lineChart2"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Nilai Utama</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Tema Ujian</th>
                            <th>Bobot</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody id = "nilaiutama">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Nilai</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Tema Ujian</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Nilai</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id = "nilaiharian">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>