<script>
function abc(minggu){
    $(document).ready(function(){
        var id_mingguan = minggu;
        $.ajax({
            url:"<?php echo base_url()?>validate/dokumen/"+id_mingguan,
            type:"POST",
            dataType: "JSON",
            success: function(respond){
                $("#dokumenminggu").html(respond);
            }
        });
    });
}
</script>