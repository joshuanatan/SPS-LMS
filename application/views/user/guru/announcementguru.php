<div class="row">
    
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Pengumuman Mata Pelajaran</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Topik pengumuman</th>
                            <th>Isi pengumuman</th>
                            <th>Tanggal Submit</th>
                            <th>Dateline</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($announcement as $a){ ?> 
                        <tr>
                            <td><?php echo $a->topik;?></td>
                            <td><?php echo $a->konten;?></td>
                            <td><?php echo $a->tgl_submit_pengumuman;?></td>
                            <td><?php echo $a->dateline;?></td>
                            <td><a class = "btn btn-danger col-lg-12" href = "<?php echo base_url();?>user/guru/announcement/delete/<?php echo $a->id_pengumuman;?>">HAPUS</a></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action = "<?php echo base_url();?>user/guru/announcement/tambahpengumuman" method = "post">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Tambah Pengumuman</strong>
                </div>
                <div class="card-body">
                    <table class = "table table-bordered">
                        <tr>
                            <th>Topik Pengumuman</th>
                            <td><textarea class = "form-control" name = "topik"></textarea></td>
                        </tr>
                        <tr>
                            <th>Dateline</th>
                            <td><input type = "date" name = "dateline" class = "form-control"></td>
                        </tr>
                        <tr>
                            <th>Isi Pengumuman</th>
                            <td><textarea class = "form-control" name = "konten"></textarea></td>
                        </tr>
                    </table>
                <input type = "submit" class ="form-control">
                </div>
            </div>
        </form>
    </div>
</div>