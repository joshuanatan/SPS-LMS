
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
                        <div class = "form-group col-lg-12">
                            <label>KKM</label>
                            <input type = "number" class = "form-control col-lg-12" value = "<?php echo $kkm;?>" name = "kkm">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>TUGAS</label>
                            <input type = "number" class = "form-control col-lg-12" value = "<?php echo $tugas;?>" name = "tugas">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>LAB</label>
                            <input type = "number" class = "form-control col-lg-12" value = "<?php echo $lab;?>" name = "lab">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>QUIZ</label>
                            <input type = "number" class = "form-control col-lg-12" value = "<?php echo $quiz;?>" name = "quiz">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>ULANGAN HARIAN</label>
                            <input type = "number" class = "form-control col-lg-12" value = "<?php echo $uh;?>" name = "uh">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>UTS</label>
                            <input type = "number" class = "form-control col-lg-12" value = "<?php echo $uts;?>" name = "uts">
                        </div>
                        <div class = "form-group col-lg-12">
                            <label>UAS</label>
                            <input type = "number" class = "form-control col-lg-12" value = "<?php echo $uas;?>" name = "uas">
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