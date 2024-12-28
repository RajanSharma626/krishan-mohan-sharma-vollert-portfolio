<?php
include("includes/conn.php");
$pageid = 2;

$id = '';
$title = '';
$url = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $fetchSql = mysqli_query($conn, "SELECT * FROM `gallary` WHERE `id`= '$id'");
    $numrow = mysqli_num_rows($fetchSql);
    if ($numrow > 0) {
        $row = mysqli_fetch_assoc($fetchSql);
        $title = $row['title'];
        $url = $row['url'];
    }
}

if (isset($_POST['addvideo'])) {
    $title = mysqli_escape_string($conn, $_POST['title']);
    $url = mysqli_escape_string($conn, $_POST['url']);

    $sql = mysqli_query($conn, "INSERT INTO `gallary`(`url`, `title`) VALUES ('$url','$title')");

    if ($sql) {
        header("Location: gallaries");
    }
}


if (isset($_POST['updateVideo'])) {
    $title = mysqli_escape_string($conn, $_POST['title']);
    $id = mysqli_escape_string($conn, $_POST['id']);
    $url = mysqli_escape_string($conn, $_POST['url']);

    $sql = mysqli_query($conn, "UPDATE `gallary` SET `title`='$title',`url`='$url' WHERE `id` = '$id'");

    if ($sql) {
        header("Location: gallaries");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Video | Admin Panel</title>
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
                        <span class="bold">
                            <?php if (isset($_GET['id'])) {
                                echo "Edit";
                            } else {
                                echo "Add";
                            } ?> Gallary
                        </span>
                        <span class="pull-right">
                            <a href="gallaries" id="loading-btn" class="btn btn-warning btn-sm"> Back</a>
                        </span>
                    </header>

                    <section class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for=""> Title </label>
                                <input type="text" name="title" id="" value="<?php echo $title ?>" class="form-control"
                                    placeholder="Enter Title" required>

                                <input type="number" name="id" value="<?php echo $id ?>" hidden>
                            </div>

                            <div class="mb-3">
                                <label for="">iFrame URL</label>
                                <input type="url" name="url" id="" value="<?php echo $url ?>" class="form-control"
                                    placeholder="Past URL" required>
                            </div>

                            <div class="text-right">
                                <?php
                                if (isset($_GET['id']) && $_GET['id'] != '') {
                                    ?>
                                    <input type="submit" class="btn btn-primary" name="updateVideo" value="Update">
                                <?php } else { ?>
                                    <input type="submit" class="btn btn-primary" name="addvideo" value="Submit">
                                <?php } ?>
                            </div>
                        </form>
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