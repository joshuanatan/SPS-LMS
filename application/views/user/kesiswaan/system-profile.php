<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">System Profile</h4>
            </div>
            <form action = "<?php echo base_url();?>kesiswaan/systemprofile/submit" method="post">
                <div class="card-body">
                    <div class="table-stats">
                        <table class="table table-stripped" id = "bootstrap-data-table-export">
                            <thead>
                                <tr>
                                    <th>Logo Sekolah</th>
                                    <th>Nama Sekolah</th>
                                    <th>Nama Sistem</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($profile->result() as $a){ ?> 
                                <tr>
                                    <td><a href = "<?php echo base_url();?>document/detailsekolah/<?php echo $a->logo_sekolah;?>" target="_blank"><?php echo $a->logo_sekolah?></a></td>
                                    <td><?php echo $a->nama_sekolah;?></td>
                                    <td><?php echo $a->nama_sistem_sekolah;?></td>
                                    <td><?php if($a->status_profile == 0) echo "AKTIF"; else echo "TIDAK AKTIF"; ?></td>
                                    <td>
                                    <?php if($a->status_profile == 1){ ?> 
                                        <a href = "<?php echo base_url();?>user/kesiswaan/SystemProfile/active/<?php echo $a->id_profile;?>" class = "btn btn-success col-lg-12">AKTIFKAN</a>
                                        <?php } else { ?>
                                        <a href = "#" class = "btn btn-danger col-lg-12">NON AKTIFKAN</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                <input type = "submit" class = "btn btn-success"> 
            </div>
            </form>
        </div> <!-- /.card -->
    </div>  <!-- /.col-lg-8 -->
</div>
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">System Profile</h4>
            </div>
            <form action = "<?php echo base_url();?>user/kesiswaan/systemprofile/submit" method="post" enctype= multipart/form-data>
                <div class="card-body">
                    <div class="table-stats">
                        <table class="table table-stripped" id = "bootstrap-data-table-export">
                            <tr> 
                                <div class = "form-group">
                                    <label>Logo Sekolah</label>
                                    <input type = "file" class = "form-control" name = "logo_sekolah">
                                </div>
                            </tr>
                            <tr>
                                <div class = "form-group">
                                    <label>Nama Sekolah</label>
                                    <input type = "text" class = "form-control" name = "nama_sekolah">
                                </div>
                            </tr>
                            <tr>
                                <div class = "form-group">
                                    <label>Nama Sistem</label>

                                    <input type = "text" class = "form-control" name = "nama_sistem_sekolah">
                                </div>
                            </tr>
                        </table>
                        <th><input type = "submit" class = "btn btn-success"></th>
                    </div> <!-- /.table-stats -->
                </div>
            </form>
        </div> <!-- /.card -->
    </div>  <!-- /.col-lg-8 -->
</div>

