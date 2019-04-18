
<div class = "row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Pilih Kelas</strong>
            </div>
            <div class="card-body">
                <form class = "form-inline" action="<?php echo base_url();?>user/guru/grade/kelas" method = "post">
                    <select class="form-control col-lg-8" tabindex="1" name = "kelas">
                        <option value="#" label="default">Pilih Kelas</option>
                        <?php foreach($kelas as $a){ ?> 
                        <option value = "<?php echo $a->id_kelas ?>" <?php if($this->session->idkelas != "") if($this->session->idkelas == $a->id_kelas) echo "Selected"; ?>><?php echo $a->kelas." ".$a->jurusan." ".$a->urutan;?></option>
                        <?php } ?>
                    </select>
                    <input type = "submit" class = "form-control col-lg-3" style= "margin-left:20px">
                </form>
            </div>
        </div>
    </div>
</div>
<?php if(is_numeric($this->session->idkelas)){?>
<div class = "row">
    <div class = "col-lg-12">
        <a style= "margin-bottom:20px;" href = "<?php echo base_url();?>user/guru/grade/ujian"><button class = "btn btn-success col-lg-12 col-sm-12">Memasukan nilai ujian</button></a>
        
        <a href = "<?php echo base_url();?>user/guru/grade/harian"><button class = "btn btn-warning col-lg-12 col-sm-12">Memasukan nilai harian</button></a>

    
    </div>
</div>
<br/>

<?php } ?>

                