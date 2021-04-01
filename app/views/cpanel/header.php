<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="icon" href="<?php echo BASE_URL; ?>/public/images/solid.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/template/css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/template/css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/template/css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/template/css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/template/css/nav.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/template/css/dashboard.css" media="screen" />

    <link href="<?php echo BASE_URL ?>/public/template/css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/template/css/dashboard.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- BEGIN: load jquery -->
    <script src="<?php echo BASE_URL ?>/public/template/js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo BASE_URL ?>/public/template/js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="<?php echo BASE_URL ?>/public/template/js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL ?>/public/template/js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL ?>/public/template/js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL ?>/public/template/js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL ?>/public/template/js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL ?>/public/template/js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL ?>/public/template/js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="<?php echo BASE_URL ?>/public/template/js/table/table.js"></script>
    <script src="<?php echo BASE_URL ?>/public/template/js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>

</head>


<body>
    <div class="row dashboard">