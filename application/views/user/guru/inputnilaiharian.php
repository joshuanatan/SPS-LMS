
<form action = "<?php echo base_url();?>user/guru/grade/inputharian" method="post">
    <div class = "row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Materi Mingguan</strong>
                </div>
                <div class="card-body">
                    <div class = "form-group">
                        <label>Materi Ujian</label>
                        <Select class = "form-control col-lg-12" name = "aktivitas" id = "minggu" onchange = "nilaimurid()">
                            <option>Pilih Aktivitas</option>
                            <?php foreach($mingguan as $a){ ?> 
                            <option value = "<?php echo $a->id_mingguan?>"><?php echo $a->materi_mingguan;?></option>
                            <?php } ?>
                        </Select>
                    </div>  
                    <div class = "form-group" id = "buka">         
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <th>ID Siswa</th>
                                <th>Nama Siswa</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody id = 'nilaikelas'>
                        </tbody>
                    </table>
                    <input type = "submit" class = "form-control">
                </div>
            </div>
        </div>
    </div>
</form>
                