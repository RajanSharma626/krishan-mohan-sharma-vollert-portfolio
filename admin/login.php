<?php
include("includes/conn.php");
// ===========================  Login Validation ================
if (isset($_SESSION['admin_login']) || isset($_COOKIE['admin_loggedin'])) {
    header('Location: /');
    exit;
}

$passerr = '';
$usererr = '';
// Handle traditional login
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);
    $query = "SELECT * FROM `user` WHERE `email` = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['password'] == $password) {
            $_SESSION["admin_login"] = true;
            $cookie_expiry = time() + 30 * 24 * 60 * 60; // 30 days
            setcookie('admin_loggedin', true, $cookie_expiry, '/', '', true, true);

            header('Location: /admin');
            exit();
        } else {
            $passerr = "Incorrect password";
        }
    } else {
        $usererr = "email not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Admin Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />


</head>

<body class="login-body">

    <div class="container">

        <form class="form-signin" action="" method="post">
            <h2 class="form-signin-heading">Log in now</h2>
            <div class="login-wrap">
                <input type="text" class="form-control" name="email" placeholder="User ID" autofocus>
                <?php if ($usererr != '') {
                    echo "<p class='mb-0' style='color:red;font-size:14px;'>" . $usererr . "</p>";
                } ?>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <?php if ($passerr != '') {
                    echo "<p class='mb-0' style='color:red;font-size:14px;'>" . $passerr . "</p>";
                } ?>
                <button class="btn btn-lg btn-login btn-block" type="submit" name="login">log in</button>

            </div>


        </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


</body>

</html>