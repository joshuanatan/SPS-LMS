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
                    <?php if($this->session->nobuka == 1){ ?>
                        alert("hai"); 
                        $("#buka").hide();
                        <?php }
                        else { ?> 
                        alert("hei");
                        $("#buka").show();
                    <?php } $this->session->nobuka = 0; ?> 
                    $("#nilaikelas").html(respond);
                }
            });
            
            
        });   
    }
</script>