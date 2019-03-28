<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Pengumuman</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id = "#bootstrap-data-table-export2">
                    <thead>
                        <tr>
                            <th>Judul Pengumuman</th>
                            <th>Isi Pengumuman</th>
                            <th>Tanggal Pengumuman</th>
                            <th>PIC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pengumuman->result() as $a){ ?>
                        <tr>
                            <td><?php echo $a->topik;?></td>
                            <td><?php echo $a->konten;?></td>
                            <td><?php echo $a->dateline ;?></td>
                            <td><?php echo $a->nama_depan." ".$a->nama_belakang;?></td>
                        </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
