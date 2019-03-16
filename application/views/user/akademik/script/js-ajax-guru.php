<script>
    function abc(hari,jam,id){
        //alert(hari);
        //alert(jam);
        $(document).ready(function(){
            var hari2 = hari;
            var jam2 = jam;
            $.ajax({
                type:'POST',
                url: "<?php echo base_url('validate/validate')."/";?>"+hari2,
                dataType: "JSON",
                data : {jam:jam2},
                success: function(respond){
                    //alert("hai");
                    $('#'+id).html(respond); //supaya bisa masuk ke respond ini, harus bersih gaboleh ada coding html lainnya yang ikut. harus pure jsonnya aja
                }

            })
        });
    }
</script>