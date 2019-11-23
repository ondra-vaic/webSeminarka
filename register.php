<?php
require 'dbconfing/config.php'


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatile" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>Title</title>
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css" >
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>

<div class="container">
    <div class="d-flex justify-content-center ">
        <div class="card">
            <div class="card-header">
                <h3>Register</h3>
            </div>
            <div class="card-body">
                <form action="register.php" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                        </div>
                        <input type="text" name="username" class="form-control" placeholder="username" required>

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="password" required>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"></i></span>
                        </div>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="confirm password" required>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                        </div>
                        <input type="text" name="firstname" class="form-control" placeholder="first name" required>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="e-mail" required>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                        </div>
                        <input type="text" name="organization" class="form-control" placeholder="organization" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register_btn" id="register_btn" value="Register" class="btn float-right">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="links">
                    Already have an account?<a href="signin.php">  Sign in</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['register_btn'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmpassword'];
        $firstName = $_POST['firstname'];
        $email = $_POST['email'];
        $organization = $_POST['organization'];

        if(!($username == "")){
            if($password==$confirmPassword){
                $query = "select * from user where username='$username'";
                $query_run = mysqli_query($dbConnection, $query);

                if(mysqli_num_rows($query_run) > 0){
                    echo 'username is already in use';
                }
                else{
                    $query = "insert into user values('$username', '$password', '$firstName', '$email', '$organization', NULL)";
                    $query_run = mysqli_query($dbConnection, $query);
                    if(!$query_run){
                        echo "error while trying to register";
                    }
                }
            }
            else{
                echo 'passwords dont match';
            }
        }
    }
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
