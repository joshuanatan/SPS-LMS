<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Settings</h4>
                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-stats">
                    <table class="table table-stripped" id = "bootstrap-data-table-export">
                        <thead>
                            <tr>
                                <th>ID Setting</th>
                                <th>Tahun Ajaran</th>
                                <th>Tahun Ajaran Berikutnya</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($setting->result() as $a){ ?> 
                                <tr>
                                    
                                <form action = "<?php echo base_url();?>master/setting/edit/<?php echo $a->id_setting;?>" method="post">
                                    <td><?php echo $a->id_setting;?></td>
                                    <td>
                                        <select class = "form-control col-lg-12" name = "id_tahun_ajaran">
                                            
                                        <?php foreach($tahunajaran->result() as $b){ ?> 
                                            <option value = "<?php echo $b->id_tahun_ajaran?>" <?php if($b->id_tahun_ajaran == $a->id_tahun_ajaran) echo "selected"; ?>><?php echo $b->tahun_awal."/".$b->tahun_akhir;?></option>        
                                        
                                        <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class = "form-control col-lg-12" name = "id_next_tahun_ajaran">
                                            
                                        <?php foreach($tahunajaran->result() as $b){ ?> 
                                            <option value = "<?php echo $b->id_tahun_ajaran?>" <?php if($b->id_tahun_ajaran == $a->id_next_tahun_ajaran) echo "selected"; ?>><?php echo $b->tahun_awal."/".$b->tahun_akhir;?></option>        
                                        
                                        <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        
                                        <?php if($a->status == 1){ ?> 
                                        <a href = "<?php echo base_url();?>master/setting/active/<?php echo $a->id_setting;?>" class = "btn btn-success col-lg-12">AKTIFKAN</a>
                                        <?php } else { ?>
                                        <a href = "<?php echo base_url();?>master/setting/nonactive/<?php echo $a->id_setting;?>" class = "btn btn-danger col-lg-12">NON AKTIFKAN</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div class = "form-group">
                                            <input type = "submit" class = "form-control" value = "UBAH">
                                        </div>
                                        <div class = "form-group">
                                            <a href = "<?php echo base_url();?>master/setting/hapus/<?php echo $a->id_setting;?>" class = "btn btn-danger col-lg-12">HAPUS</a>
                                        </div>
                                    </td>
                                    
                            </form>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
            </div>
        </div> <!-- /.card -->
    </div>  <!-- /.col-lg-8 -->

</div>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN SETTING</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action = "<?php echo base_url();?>master/setting/tambahSetting" method="post">
                <div class="modal-body">
                    <div class = "form-group">
                        <label>Tahun Ajaran Aktif</label>
                        <select class = "form-control" name = "id_tahun_ajaran">
                            
                        <?php foreach($tahunajaran->result() as $a){ ?> 
                            <option value = "<?php echo $a->id_tahun_ajaran ?>"><?php echo $a->tahun_awal ?>/<?php echo $a->tahun_akhir ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class = "form-group">
                        <label>Tahun Ajaran Depan</label>
                        <select class = "form-control" name = "id_tahun_berikut">
                            
                        <?php foreach($tahunajaran->result() as $a){ ?> 
                            <option value = "<?php echo $a->id_tahun_ajaran ?>"><?php echo $a->tahun_awal ?>/<?php echo $a->tahun_akhir ?></option>
                        <?php } ?>
                        </select>
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