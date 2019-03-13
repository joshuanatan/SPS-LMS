
<div class="row">
    <div class="col-xl-12"> 
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">LIST GURU</h4>
                <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-stats">
                    <table class="table table-stripped" id = "bootstrap-data-table-export">
                        <thead>
                            <tr>
                                <th>ID Guru</th>
                                <th>Nama Guru</th>
                                <th>Mata Pelajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($gurutahun as $a){ ?> 
                            <tr>
                                <td><?php echo $a->id_gurutahunan;?></td>
                                <td><?php echo $a->nama_depan." ".$a->nama_belakang;?></td>
                                <td><?php echo $a->nama_matpel;?></td>
                                <td><button class = "btn btn-danger col-lg-12">REMOVE</button></td>
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
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN KELAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action = "<?php echo base_url();?>master/gurutahun/tambah" method="post">
                <div class="modal-body">
                    <div class = "form-group col-lg-12">
                        <label>GURU</label>
                        <select class = "form-control col-lg-12" name = "id_guru">
                            <?php foreach($guru as $a){ ?> 
                            <option value = "<?php echo $a->id_guru;?>"><?php echo $a->nama_depan." ".$a->nama_belakang;?></option>
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