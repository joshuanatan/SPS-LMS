
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Tahun Ajaran</strong>
            </div>
            <div class="card-body">
                
                
                <a href="<?php echo base_url(). 'user/tahunajaran/tambahtahunajaran' ?>"> 
                    <button class = "btn btn-success">TAMBAH TAHUN AJARAN</button></a>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID Tahun Ajaran</th>
                            <th>Tahun Awal</th>
                            <th>Tahun Akhir</th>
                            <th>Status Tahun Ajaran</th>
                            <th>Tanggal Submit Tahun Ajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                $a = 0;
            foreach ($tahunajaran as $list) {
              $a++;  ?>
            <tr>
                <td><?php echo $list->id_tahun_ajaran ?></td>
                <td><?php echo $list->tahun_awal ?></td>
                <td><?php echo $list->tahun_akhir ?></td>
                <td><?php if ($list->status_tahunajaran == 0){
                echo 'Aktif';  
                }  else {echo 'Tidak Aktif';} ?></td>
                <td><?php echo $list->tgl_submit_tahunajaran ?></td>
                
                <td><a href="<?php echo base_url().'user/tahunajaran/edittahunajaran/'.$list->id_tahun_ajaran;?>"><button class = "btn btn-warning">EDIT</button></a><a href="<?php echo base_url().'user/tahunajaran/hapustahunajaran/'.$list->id_tahun_ajaran;?>"><button class = "btn btn-danger">HAPUS</button></a></td>
            
            </tr>
            <?php
             }
            ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- /.card -->
    </div>
</div>