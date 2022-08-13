<?php
include("include.php");
include("connection.php");
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> -->
    <title>TMS</title> -->
    <style>
    input[type=text], input[type=password], input[type=date], input[type=password],input[type=number], input[type=gender] {   
        width: 50%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid rgb(1, 8, 1);   
        box-sizing: border-box;   
    } 
    
</style>  
</head>

<body>
    <div class="bod">
        <h1>BOOK AN APPOINTMENT</h1>
        <hr>
        <h5 style="color: gray;">ALL FIELDS ARE MANDATORY</h5>
    </div>
    <div class="boxed">
        <form action="" method="POST">
            <div class="fm">
                <div>
                    <label for="fname">FIRST NAME :</label><br>
                    <input type="text" name="p_fname" id="fname">
                </div>
                <br>
                <div>
                    <label for="lname">LAST NAME :</label> <br>
                    <input type="text" name="p_lname" id="lname">
                </div>
                <br>
                <div>
                    <label for="dob">DATE OF BIRTH :</label> <br>
                    <input type="date" name="p_dob" id="dob">
                </div>
                <br>
                <div>
                    <label for="nfame">PHONE NUMBER :</label> <br>
                    <input type="number" name="p_phone" id="fnUM">
                </div>
                <div>
                    <label for="email">Email :</label> <br>
                    <input type="email" name="p_email" id="fmail">
                </div>
                <br>
                <div>
                    <label for="nfame">BLOOD TYPE :</label> <br>
                    <input type="text" name="p_bloodgroup" id="ftype">
                </div>
                <br>
               <div>
                    <label for="ta">DETAILL DISCRIPTION OF YOUR DISEASE:</label>
                    <br>
                    <textarea name="" id="" cols="150" rows="2"></textarea>
                </div>
                <br>
                <button type="submit" name="submit" class="submit" value="submit" >BOOk</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

<?php
if(isset($_POST['submit']))
{
//insertion

       $p_fname =$_POST['p_fname'];
       $p_lname =$_POST['p_lname'];
       $p_email=$_POST['p_email'];
       $p_bloodgroup=$_POST['p_bloodgroup'];
       $p_dob=$_POST['p_dob'];
       $p_phone=$_POST['p_phone'];

$sql= "INSERT INTO `patients`( `p_fname`, `p_lname`, `p_email`, `p_phone`, `p_bloodgroup`, `p_dob`) VALUES
 ('$p_fname','$p_lname','$p_email','$p_phone','$p_bloodgroup','$p_dob')";
if(mysqli_query($conn, $sql)){
           echo "record inserted successfully!";
       }else {
           echo "Error inserting records!".mysqli_connect_error();
       }
    }
?>