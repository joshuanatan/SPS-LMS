<script>
function ambilabsen(){
    $(document).ready(function(){
        var idmatapelajaran = $("#matapelajaran").val();
        var idbulan = $("#bulan").val();
        $.ajax({
            url:"<?php echo base_url();?>validate/ambilabsensiswa",
            data:{matapelajaran:idmatapelajaran, bulan:idbulan},
            type:"POST",
            dataType:"JSON",
            success:function(response){
                $("#laporanabsen").html(response);
            }
        });
    });
}
</script>