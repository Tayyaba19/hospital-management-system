<?php
session_start();
include("connection.php");
if(isset($_POST['login'])){
    $flag=0;
    $sql="SELECT * from admin";
    $username=$_POST['uname'];
    $password=$_POST['pass'];
    $error = array();
    if(empty($username)){
        $error['admin']='Enter Username';
    }else if(empty($password)){
        $error['admin']='Enter Password';
    }
    $result = $conn->query($sql);
    while ($row=$result->fetch_assoc()){
        if($row["a_name"] == $username && $row["a_password"] == $password){
         $flag=1;
        }
    }
    if($flag==1){
        echo"<script>alert('You Have Loged_in As Admin!')</script>";
        $_SESSION['admin']=$username;
        header("Location: admin_dashboard.php",true,301);
        exit();
    }else{
        echo"<script>alert('Invalid username or Password')</script>";
        }
}



?>


<!doctype html>
<head>
<title>Admin Login Page</title>
</head>
<body style="background-image:url(images/hospital.jpg); background-repeat: no-repeat; 
background-size:cover">
<?php
include("include.php");
?>
<h5 style="color:black;">!If not admin click on Reseptionist button to Sign in as receptionist!</h5>
<button type="button" class="receptionist" name="button" style="background-color:black; color:blanchedalmond;" onclick="location.href='respecianist.php'" >Receptionist</button>
<div style="margin-top:20px;"></div>
<div class="container jumbotron">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 jumbotron"></div>
            <div class="col-md-6 jumbotron">
                <img src="images/adminLogin.jfif" class="col-md-12">
                <form method="post" name="my-2">
                    <div ></div>
                    <?php
                        if(isset($error['admin'])){
                            $sh=$error['admin'];
                            $show="<h4 class='alert alert-danger'>$sh</h4>";
                        }else{
                            $show="";
                        }
                        echo $show;
                    ?>
                    <div class="form-group">
                        <label1 style="color:black">Username</label1>
                        <input type="text" name="uname" class="form-control"
                        autocomplete="off" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label1 style="color:black">Password</label1>
                        <input type="password" name="pass" class="form-control">
                    </div>
                    </br>
                    <input type="submit" name="login" class="btn btn-success" style="background-color:black">
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>

</body>

</html>