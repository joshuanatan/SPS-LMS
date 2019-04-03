<script>
function ambilabsen(){
    jumlahyanghadir = null;
    jumlahyangtidakhadir = null;
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
                $.ajax({
                    url:"<?php echo base_url();?>validate/dataabsenchart",
                    data:{matapelajaran:idmatapelajaran, bulan:idbulan},
                    type:"POST",
                    dataType:"JSON",
                    success:function(response){
                        var result = response.split(",");
                        jumlahyanghadir = result[0];
                        jumlahyangtidakhadir = result[1];


                        /*pie chart here */
                        (function ( $ ) {
                            var ctx = document.getElementById( "pieChart" );
                                ctx.height = 300;
                                var myChart = new Chart( ctx, {
                                    type: 'pie',
                                    data: {
                                        datasets: [ {
                                            data: [  result[0],result[1] ],
                                            backgroundColor: [
                                                                "rgba(0, 194, 146,0.9)",
                                                                "rgba(255, 0, 0,1)",
                                                            ],
                                            hoverBackgroundColor: [
                                                                "rgba(0, 194, 146,0.9)",
                                                                "rgba(255, 0, 0,1)",
                                                            ]
                            
                                                        } ],
                                        labels: [
                                                        "HADIR",
                                                        "TIDAK HADIR",
                                                    ]
                                    },
                                    options: {
                                        responsive: true
                                    }
                                } );
                            })(jQuery);
                    }
                });
            }
        });
    });
    console.log(jumlahyanghadir);
}
</script>
<script>


    
    
</script>