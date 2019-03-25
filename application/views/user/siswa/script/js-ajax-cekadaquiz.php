<script>
function cekadaquiz(idminggu){
    var id_mingguan = idminggu;
    $(document).ready(function(){
        
        $.ajax({
            type: "POST",
            dataType:"JSON",
            url:"<?php echo base_url();?>validate/cekujian",
            data:{id_mingguan:id_mingguan},
            success: function(respond){
                if(respond == 0){
                    $("#quiz"+idminggu).prop("href","#");
                    alert("Tidak ada Quiz Minggu Ini!");
                }
                else{
                    window.location.href = "<?php echo base_url();?>user/siswa/mingguan/index/quiz/"+id_mingguan;
                }
            }

        });
    });
}
</script>