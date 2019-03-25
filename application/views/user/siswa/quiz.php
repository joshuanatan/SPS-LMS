<div class = "row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3">Quiz X</strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <h5 class="text-sm-center mt-2 mb-1">Detail Quiz</h5>
                    <div class="location text-sm-center">Materi</div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
<?php if($statusquiz == 0){ ?> 
<form action = "<?php echo base_url();?>user/siswa/mingguan/index/submitquiz/<?php echo $id_quiz;?>" method = "post">
<?php $i = 0;foreach($quiz as $a){ ?> 
<div class = "row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <strong class="card-title mb-3"><?php echo $a->pertanyaan;?></strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <input name = "soal<?php echo $i;?>" value = "<?php echo $a->opsi1;?>" type = "radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $a->opsi1;?>
                    <br/>
                    <input name = "soal<?php echo $i;?>" value = "<?php echo $a->opsi2;?>" type = "radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $a->opsi2;?>
                    <br/>
                    <input name = "soal<?php echo $i;?>" value = "<?php echo $a->opsi3;?>" type = "radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $a->opsi3;?>
                    <br/>
                    <input name = "soal<?php echo $i;?>" value = "<?php echo $a->opsi4;?>" type = "radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $a->opsi4;?>
                    <br/>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div> 
<?php $i++;} ?>
<input type = "submit" class = "btn btn-success col-lg-12">
</form>
<?php } else echo "<h5 align = 'center'>ANDA TELAH MENYELESAIKAN QUIZ PADA MINGGU INI</h5>";?>
