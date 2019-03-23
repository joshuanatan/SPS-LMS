<script>
    function kelasminggu(){
        var kelas = $("#aktivitaskelas").val();
        //alert(kelas);
        //alert(id);
        $(document).ready(function(){
            $.ajax({
                type:'POST',
                url: "<?php echo base_url('validate/aktivitasmingguan')."/";?>"+kelas,
                dataType: "JSON",
                success: function(respond){
                    //alert("hai");
                    $('#mingguan').html(respond); //supaya bisa masuk ke respond ini, harus bersih gaboleh ada coding html lainnya yang ikut. harus pure jsonnya aja
                    
                }

            });
            
        });
    }
</script>