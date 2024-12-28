<?php
include("includes/conn.php");
$pageid = 3;


if (isset($_GET['del']) && $_GET['del'] != '') {
    $id = $_GET['del'];
    $sql = mysqli_query($conn, "DELETE FROM `service` WHERE `id` = '$id'");
    if($sql){
        header("Location: services");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cover Letter | Admin Panel</title>
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
                        <span class="bold">Services </span>
                        <span class="pull-right">
                            <a href="add-services" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                Add</a>
                        </span>
                    </header>

                    <section class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Image</th>
                                    <th>Heading</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $testSQL = mysqli_query($conn, "SELECT * FROM `service`");
                                $sno = 1;
                                while ($row = mysqli_fetch_assoc($testSQL)) {
                                ?>
                                    <tr>
                                        <td scope="row" class="align-middle">
                                            <?php echo $sno ?>
                                        </td>
                                        <td class="align-middle">
                                            <img src="../images/services/<?php echo $row['img'] ?>" alt="" class="img-fluid" width="60px" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                                        </td>
                                        <td class="align-middle">
                                            <?php echo $row['heading'] ?>
                                        </td>
                                        <td class="align-middle">
                                            <?php echo $row['description'] ?>
                                        </td>
                                        <td class="align-middle">
                                            <a href="?del=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                                            <a href="add-services?id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                <?php $sno++; } ?>
                            </tbody>
                        </table>
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