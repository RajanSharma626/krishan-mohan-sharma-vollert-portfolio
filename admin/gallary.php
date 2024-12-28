<?php
include("includes/conn.php");
$pageid = 2;


if (isset($_GET['del']) && $_GET['del'] != '') {
    $id = $_GET['del'];
    $sql = mysqli_query($conn, "DELETE FROM `gallary` WHERE `id` = '$id'");
    if ($sql) {
        header("Location: gallaries");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gallaries | Admin Panel</title>
    <?php include('includes/head.php') ?>
</head>

<body class="light-sidebar-nav">

    <section id="container">
        <!--header start-->
        <?php include('includes/header.php') ?>
        <!--header end-->
        <!--sidebar start-->
        <?php include('includes/sidebar.php') ?>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <section class="card">
                    <header class="card-header">
                        <span class="bold">Gallaries </span>
                        <span class="pull-right">
                            <a href="add-video" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                Add</a>
                        </span>
                    </header>

                    <section class="card-body">
                        <div class="row">
                            <?php
                            $testSQL = mysqli_query($conn, "SELECT * FROM `gallary`");
                            $sno = 1;
                            while ($row = mysqli_fetch_assoc($testSQL)) {
                                ?>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="card border">
                                        <iframe class="card-img-top" width="100%" src="<?php echo $row['url'] ?>"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        <div class="card-body">
                                            <h5 class="card-title mb-2 text-truncate w-100"><?php echo $row['title'] ?>
                                            </h5>
                                            <a href="add-video?id=<?php echo $row['id'] ?>"
                                                class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                                            <a href="gallaries?del=<?php echo $row['id'] ?>"
                                                class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <?php $sno++;
                            } ?>
                        </div>
                    </section>
                </section>
            </section>
            <!--main content end-->

            <!--footer start-->
            <?php include('includes/footer.php') ?>
            <!--footer end-->
        </section>

        <?php include('includes/foot.php') ?>

</body>

</html>