
<div class = "row">
    <div class="col-lg-3 col-md-6"> <!-- ganti ukuran sesuai yang diinginkan -->
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-1">
                        <i class="fa fa-book"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib"> 
                            <div class="stat-text"><span class="count">0</span></div>
                            <div class="stat-heading">Jumlah Murid</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- kalau mau nambah widget lainnya -->
</div>
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
                <h4 class="box-title">Murid</h4>
            </div>
            <div class="card-body">
                <div class="table-stats">
                    <table class="table table-stripped" id = "bootstrap-data-table-export">
                        <thead>
                            <tr>
                                <th>ID Murid</th>
                                <th>Nama Murid</th>
                                <th>Jurusan Murid</th>
                                <th>Nama Orang Tua</th>
                                <th>No Orang Tua</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Joshua Natan</td>
                                <td>IPA</td>
                                <td>Papasaya</td>
                                <td>089651513807</td>
                                <td>Aktif</td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
            </div>
        </div> <!-- /.card -->
    </div>  <!-- /.col-lg-8 -->

</div> 