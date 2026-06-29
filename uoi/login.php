<?php
session_start();
include "config.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($query)>0){

        $_SESSION['username']=$username;
        header("location:dashboard.php");
    }
    else{
        $error = "Invalid Credentials";
    }
}
?>

<?php include "includes/header.php"; ?>

<div class="login-page">

    <div class="login-card">

        <div class="text-center mb-4">
            <h2>Lab Automation</h2>
            <p class="mb-0">Professional Laboratory Management System</p>
        </div>

        <?php
        if(isset($error)){
            echo "<div class='alert alert-danger'>$error</div>";
        }
        ?>

        <form method="POST">

            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>

            <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>

            <button type="submit" name="login" class="btn btn-primary w-100">
                <i class="fa-solid fa-right-to-bracket"></i> Login
            </button>

        </form>

    </div>

</div>

<?php include "includes/footer.php"; ?>
