<?php
session_start();
include("connection.php");
if(isset($_POST['login'])){
    $flag=0;
    $sql="SELECT * from receptionist";
    $username=$_POST['uname'];
    $password=$_POST['pass'];
    $error = array();
    if(empty($username)){
        $error['receptionist']='Enter Username';
    }else if(empty($password)){
        $error['receptionist']='Enter Password';
    }
    $result = $conn->query($sql);
    while ($row=$result->fetch_assoc()){
        if($row["r_name"] == $username && $row["r_password"] == $password){
         $flag=1;
        }
    }
    if($flag==1){
        echo"<script>alert('You Have Loged_in As receptionist!')</script>";
        $_SESSION['receptionist']=$username;
        header("Location:receptionist_dashboard.php",true,301);
        exit();
    }else{
        echo"<script>alert('Invalid username or Password')</script>";
        }
}



?>


<!doctype html>
<head>
<title>Receptionist Login Page</title>
</head>
<body style="background-image:url(images/hospital.jpg); background-repeat: no-repeat; 
background-size:cover">
<?php
include("include.php");
?>
<div style="margin-top:20px;"></div>
<div class="container jumbotron">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 jumbotron"></div>
            <div class="col-md-6 jumbotron">
                <img src="images/res.jpg" class="col-md-12">
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