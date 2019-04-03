<script>
function checkid(){
    $(document).ready(function(){
        var id_user = $("#id").val();
        var pass = $("#pass").val();
        //alert(id_user);
        //alert(pass);
        $.ajax({
            url:"<?php echo base_url();?>validate/detailidsiswa",
            data: {id_user:id_user,password:pass},
            type: "POST",
            dataType: "JSON",
            success: function(response){
                $("#detailsiswa").html(response);   
            }
        });
    });
}
</script>