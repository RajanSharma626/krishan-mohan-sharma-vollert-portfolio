<?php
include("includes/conn.php");
$pageid = 2;

$id = '';
$heading = '';
$desc = '';
$img = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $fetchSql = mysqli_query($conn, "SELECT * FROM `projects` WHERE `id`= '$id'");
    $numrow = mysqli_num_rows($fetchSql);
    if ($numrow > 0) {
        $row = mysqli_fetch_assoc($fetchSql);
        $heading = $row['heading'];
        $desc = $row['description'];
        $img = $row['img'];
    }
}

if (isset($_POST['addservices'])) {
    $heading = mysqli_escape_string($conn, $_POST['heading']);
    $desc = mysqli_escape_string($conn, $_POST['desc']);
    $img = rand(11111, 9999) . "_" . $_FILES['img']['name'];

    move_uploaded_file($_FILES["img"]["tmp_name"], "../images/services/" . $img);

    $sql = mysqli_query($conn, "INSERT INTO `projects`(`img`, `heading`, `description`  ) VALUES ('$img','$heading','$desc')");

    if ($sql) {
        header("Location: projects");
    }
}


if (isset($_POST['updateservices'])) {
    $heading = mysqli_escape_string($conn, $_POST['heading']);
    $id = mysqli_escape_string($conn, $_POST['id']);
    $desc = mysqli_escape_string($conn, $_POST['desc']);
    $img = rand(11111, 9999) . "_" . $_FILES['img']['name'];

    if ($_FILES['img']['name'] != '') {
        move_uploaded_file($_FILES["img"]["tmp_name"], "../images/services/" . $img);

        $sql = mysqli_query($conn, "UPDATE `projects` SET `img`='$img',`heading`='$heading',`description`='$desc' WHERE `id` = '$id'");
    } else {
        $sql = mysqli_query($conn, "UPDATE `projects` SET `heading`='$heading',`description`='$desc' WHERE `id` = '$id'");
    }
    if ($sql) {
        header("Location: projects");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Resume | Admin Panel</title>
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
                            } ?> Service
                        </span>
                        <span class="pull-right">
                            <a href="services" id="loading-btn" class="btn btn-warning btn-sm"> Back</a>
                        </span>
                    </header>

                    <section class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for=""> Image </label>
                                <input type="file" name="img" id="" class="form-control" placeholder="Enter Name" <?php echo isset($_GET['id']) ? "" : "required"; ?>>
                                <input type="text" name="id" id="" class="form-control" placeholder="Enter Name"
                                    value="<?php echo $id; ?>" hidden>

                                <?php
                                if ($img != '') { ?>
                                    <img src="../images/services/<?php echo $img ?>" alt="" class="mt-3" width="80px"
                                        style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                                <?php }
                                ?>
                            </div>
                            <div class="mb-3">
                                <label for=""> Heading </label>
                                <input type="text" name="heading" id="" value="<?php echo $heading ?>"
                                    class="form-control" placeholder="Enter Heading" required>
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="desc" id="" cols="30" rows="10" class="form-control"
                                    placeholder="Enter Description" required><?php echo $desc; ?></textarea>
                            </div>

                            <div class="text-right">
                                <?php
                                if (isset($_GET['id']) && $_GET['id'] != '') {
                                    ?>
                                    <input type="submit" class="btn btn-primary" name="updateservices" value="Update">
                                <?php } else { ?>
                                    <input type="submit" class="btn btn-primary" name="addservices" value="Submit">
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