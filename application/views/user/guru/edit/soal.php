<div class = "row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Soal <?php echo $urut;?></strong>
            </div>
            <div class="card-body">
                <div class = "form-group">
                    <label>Pertanyaan</label>
                    <input type = "text" class = "form-control" placeholder="Pertanyaan" value = "<?php echo $pertanyaan;?>" name = "pertanyaan[]">
                </div>
                <div class = "form-group">
                    <label>Pilihan 1</label>
                    <input type = "text" class = "form-control" placeholder="Pilihan 1" value = "<?php echo $opsi1;?>" name = "pilihan1[]">
                    </div>
                <div class = "form-group">
                    <label>Pilihan 2</label>
                    <input type = "text" class = "form-control" placeholder="Pilihan 2" value = "<?php echo $opsi2;?>" name = "pilihan2[]">
                    </div>
                <div class = "form-group">
                    <label>Pilihan 3</label>
                    <input type = "text" class = "form-control" placeholder="Pilihan 3" value = "<?php echo $opsi3;?>" name = "pilihan3[]">
                    </div>
                <div class = "form-group">
                    <label>Pilihan 4</label>
                    <input type = "text" class = "form-control" placeholder="Pilihan 4" value = "<?php echo $opsi4;?>" name = "pilihan4[]">
                    </div>
                <div class = "form-group">
                    <label>Jawaban</label>
                    <select class = "form-control" name = "jawaban[]">
                        <option value ="1">Pilihan 1</option>
                        <option value ="2" <?php if($jawaban == 2) echo "selected";?>>Pilihan 2</option>
                        <option value ="3" <?php if($jawaban == 3) echo "selected";?>>Pilihan 3</option>
                        <option value ="4" <?php if($jawaban == 4) echo "selected";?>>Pilihan 4</option>
                    </select>
                </div>
                <a href = "<?php echo base_url();?>user/guru/mingguan/quiz/remove/<?php echo $id_soal;?>" class = "col-lg-12 btn btn-danger">HAPUS SOAL</a>
            </div>
        </div>
    </div>
</div>