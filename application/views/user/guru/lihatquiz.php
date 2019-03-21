<?php

?>
<div class = "row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Jumlah Soal</strong>
            </div>
            <div class="card-body">
                <select class="form-control" tabindex="1" id="jumlah" onchange = "def()">
                    <option value="0" label="default">Pilih Jumlah Tambahan Soal</option>
                    <option value="5" label="default">5 Soal</option>
                    <option value="10" label="default">10 Soal</option>
                    <option value="25" label="default">25 Soal</option>
                    <option value="40" label="default">40 Soal</option>
                    <option value="50" label="default">50 Soal</option>
                </select>
            </div>
        </div>
    </div>
</div>
<form action = "<?php echo base_url();?>user/guru/mingguan/quiz/update" method="post">
    <div id = "quiz1">
        <?php 
    $i = 1;foreach($soal as $a){ 
            $data = array(
                "urut" => $i,
                "id_soal" => $a->id_soal,
                "pertanyaan" => $a->pertanyaan,
                "opsi1" => $a->opsi1,
                "opsi2" => $a->opsi2,
                "opsi3" => $a->opsi3,
                "opsi4" => $a->opsi4,
                "jawaban" => $a->jawaban,
            );
            $this->load->view("user/guru/edit/soal",$data);
    $i++;
        } ?>
    </div>
    <div id ="quiz"></div>
    <div class = "row">
        <div class ="col-lg-12">
            <div class = "card">
                <div class = "card-body">
                    <input type = "submit" class = "col-lg-12 btn btn-success" value = "PERBAHARUI QUIZ">
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table').DataTable();
  } );
</script>

                