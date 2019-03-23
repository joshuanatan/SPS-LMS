<script>
    function nilaimurid(){
        $(document).ready(function(){
            var idkelas = $("#minggu").val();
            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>validate/nilaikelas",
                data:{id_aktivitas:idkelas},
                dataType: "JSON",
                success: function(respond){
                    $("#nilaikelas").html(respond);
                }
                
            })
        });   
    }
</script>