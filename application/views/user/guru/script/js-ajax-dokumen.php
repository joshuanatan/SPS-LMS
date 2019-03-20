<script>
    function abc(minggu,id){
        //alert(minggu);
        //alert(id);
        $(document).ready(function(){
            $.ajax({
                type:'POST',
                url: "<?php echo base_url('validate/dokumen')."/";?>"+minggu,
                dataType: "JSON",
                //data : {jam:jam2},
                success: function(respond){
                //    alert("hai");
                    $('#'+id).html(respond); //supaya bisa masuk ke respond ini, harus bersih gaboleh ada coding html lainnya yang ikut. harus pure jsonnya aja
                }

            })
        });
    }
</script>