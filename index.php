<?php include('config/setup.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $site_title.' | '.$page['title'] ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include('config/css.php'); ?>
    <?php include('config/js.php'); ?>
</head>

<body>
    <!-- Main navigation-->
    <?php include(DEFAULT_TEMPLATE_PATH.'/navigation.php'); ?>
    <div class="container">
        <h1><?php echo $page['header'];  ?></h1>
        <?php echo $page['body_formatted'];  ?>
    </div>
    <!-- Footer -->
    <?php include(DEFAULT_TEMPLATE_PATH.'/footer.php'); ?>
    <!-- Debug button and console -->
    <?php if ($debug_status=='active') { include('widgets/debug_console.php'); } ?>
</body>

</html>

