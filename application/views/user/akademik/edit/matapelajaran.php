
<div class="modal fade" id="mediumModal<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN MATAPELAJARAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action = "<?php echo base_url();?>master/matapelajaran/editMatpel/<?php echo $id;?>" method = "post">
                <div class="modal-body">
                        <div class = "form-group col-lg-12">
                            <label>Nama Mata Pelajaran</label>
                            <input type = "text" class = "form-control col-lg-12" name = "nama" value = "<?php echo $nama;?>">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>Jurusan</label>
                            <select class = "form-control col-lg-12" name = "jenis">
                                <option value = "UMUM">UMUM</option>
                                <option value = "IPA" <?php if($jenis == "IPA") echo "selected";?>>IPA</option>
                                <option value = "IPS" <?php if($jenis == "IPS") echo "selected";?>>IPS</option>
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