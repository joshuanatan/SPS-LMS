<div class="modal fade" id="mediumModal<?php echo $id_user;?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">PENAMBAHAN SISWA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action = "<?php echo base_url();?>master/siswa/editSiswa/<?php echo $id_user;?>" method="post">
                    <div class = "form-group col-lg-12">
                        <label>Nama Depan</label>
                        <input type = "text" class = "form-control col-lg-12" value = "<?php echo $nama_depan;?>">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Nama Belakang</label>
                        <input type = "text" class = "form-control col-lg-12" value = "<?php echo $nama_belakang;?>">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Tanggal Lahir</label>
                        <input type = "date" class = "form-control col-lg-12" value = "<?php echo $tanggal_lahir;?>">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Nomor Telpon</label>
                        <input type = "number" class = "form-control col-lg-12" value = "<?php echo $nomor_telpon;?>">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Email</label>
                        <input type = "email" class = "form-control col-lg-12" value = "<?php echo $email;?>">
                    </div>
                    <div class = "form-group col-lg-12">
                        <label>Alamat</label>
                        <textarea class = "form-control col-lg-12"><?php echo $alamat;?></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
