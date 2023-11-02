<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' and password = '$password'");

        if (mysqli_num_rows($query) != 0) {
            $row = mysqli_fetch_assoc($query);

            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];

            if ($row['role'] == 'admin') {
                header("location: index.php");
                exit;
            } else if ($row['role'] == 'user') {
                header("location: user.php");
                exit;
            } else {
                header("location: login.php");
                exit;
            }
        } else {
            $error = "Invalid username or password. Please try again.";
        }
    } else {
        $error = "Invalid input. Please fill out both username and password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
<form action="" method="post">
<?php if (isset($error)) : ?>
        <script>
            alert("username/password is wrong");
        </script>
    <?php endif; ?>


<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row border rounded-1 p-3 bg-white shadow box-area" style="width: 930PX">
        <div class="col-md-6 right-box">
            <div class="container align-items-center">
                <div class="header-text">
                    <p class="d-flex justify-content-center mt-4 mb-4" style="font-weight: 500;">Single Sign On</p>
                </div>
                <p>Email Address/Username</p>
                <div class="input-group mb-2">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email address" name="username" id="username">
                </div>
                <p>Password</p>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="password" id="password">
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                   <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="formCheck">
                    <label for="formCheck" class="form-check-label text-secondary mb-2"><small>Remember Me</small></label>
                   </div>
                    <div class="forgot">
                        <small><a href="#">Forgot Password?</a></small>
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" name="submit">Login<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="justify-content-end bi bi-arrow-right-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                          </svg></button>
                    </div>
                    <div class="row">
                        <small>Dont't have account? <a href="#">Register</a></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 rounded-2 d-flex justify-content-center align-items-center flex-column left-box" style="background-color: rgb(255, 255, 255);">
            <div class="feature-image mb-2">
                <img src="image/harvardlogo.png" class="img-fluid" style="width: 100%;">
            </div>
        </div>
    </div>
</div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>