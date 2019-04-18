<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <?php foreach($profile->result() as $a){ ?> 
    <title><?php echo $a->nama_sekolah;?></title>
    <meta name="description" content="<?php echo $a->nama_sekolah.' '.$a->nama_sistem_sekolah;?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/img/favicon.png">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
    
    <?php } ?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/pe-icon-7-filled.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/lib/chosen/chosen.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/charts/chartist.min.css" >
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/lib/vector-map/jqvmap.min.css" >
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/weather/css/weather-icons.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/calendar/fullcalendar.css" />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' type='text/css'>
</head>
<body>
    