<script>
    function nilaimurid(){
        $(document).ready(function(){
            var idkelas = $("#minggu").val();
            
            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>validate/cekulangankelas",
                data:{id_aktivitas:idkelas},
                dataType: "JSON",
                success: function(respond){
                    $("#buka").html(respond);
                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url();?>validate/nilaikelas",
                        data:{id_aktivitas:idkelas},
                        dataType: "JSON",
                        success: function(respond){
                            //alert(respond);
                            $("#nilaikelas").empty();
                            $("#nilaikelas").html(respond);
                        }
                        
                    });
                }
                
            });
            
        });   
    }
</script>
<script>
    function bukaulangan(){
        $(document).ready(function(){
            var idkelas = $("#minggu").val();
                
            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>validate/bukaulangan",
                data:{aktivitas:idkelas},
                dataType: "JSON",
                success: function(respond){
                    $("#buka").empty();
                    $("#nilaikelas").html(respond);
                }
            });
            
            
        });   
    }
</script>