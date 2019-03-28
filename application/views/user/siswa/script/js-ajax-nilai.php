<script>
function ambilnilai(){
    $(document).ready(function(){
        var idmatpel = $("#idmatpel").val();
        $.ajax({
            url:"<?php echo base_url();?>validate/nilaiulangansiswa",
            data: {id_matpel:idmatpel},
            type: "POST",
            dataType:"JSON",
            success:function(respond){
                $("#nilaiharian").html(respond);
                $.ajax({
                    url:"<?php echo base_url();?>validate/nilaiutamasiswa",
                    data: {id_matpel:idmatpel},
                    type: "POST",
                    dataType:"JSON",
                    success:function(respond){
                        $("#nilaiutama").html(respond);
                    }
                });
            }
        });
    });
}
</script>