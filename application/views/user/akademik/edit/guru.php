<div class="modal fade" id="mediumModal<?php echo $id_user;?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">PERUBAHAN GURU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action = "<?php echo base_url();?>master/guru/editGuru/<?php echo $id_user;?>" method="post">
                <div class="modal-body">
                    <div class = "form-group col-lg-12">
                        <label>Nama Depan</label>
                        <input name = "namadepan" type = "text" class = "form-control col-lg-12" value = "<?php echo $nama_depan;?>">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Nama Belakang</label>
                        <input name = "namabelakang" type = "text" class = "form-control col-lg-12" value = "<?php echo $nama_belakang;?>">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Tanggal Lahir</label>
                        <input name = "tgllahir" type = "date" class = "form-control col-lg-12" value = "<?php echo $tanggal_lahir;?>">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Nomor Telpon</label>
                        <input name = "nohp" type = "number" class = "form-control col-lg-12" value = "<?php echo $nomor_telpon;?>">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Email</label>
                        <input name = "email" type = "email" class = "form-control col-lg-12" value = "<?php echo $email;?>">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Alamat</label>
                        <textarea name = "alamat" class = "form-control col-lg-12"><?php echo $alamat;?></textarea>
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
