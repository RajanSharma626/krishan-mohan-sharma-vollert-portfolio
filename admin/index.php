<?php 
$pageid = 1;

if (isset($_SESSION['admin_login']) || isset($_COOKIE['admin_loggedin'])) {
}else{
    header('Location: login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <?php include('includes/head.php') ?>
</head>

<body class="light-sidebar-nav">

    <section id="container">
        <!--header start-->
        <?php include('includes/header.php')?>
        <!--header end-->
        <!--sidebar start-->
        <?php include('includes/sidebar.php')?>
        <!--sidebar end-->
        <!--main content start-->
       
        <!--main content end-->

        <!--footer start-->
        <?php include('includes/footer.php') ?>
        <!--footer end-->
    </section>

    <?php include('includes/foot.php') ?>

</body>

</html>