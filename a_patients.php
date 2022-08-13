<?php
include("include.php");
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- <link rel="stylesheet" href="style.css"> -->
<style>
    html{
        /* background: linear-gradient(to right top, #0c008c, #002a8d, #003c82, #134971, #45535e) ; */
        background-color: light-pink;
        max-height:768px;
        height:100%;
        
        /* background-image: linear-gradient(to bottom, #00132e, #27485a, #648085, #acbbb7, #f7f8f7); */
    }
     
     .submit{
         height:40px;
         font-size:16px;
         border: 10px solid transparent;
         border-radius: 5px;
         background: black;
         font-weight:bold; 
         color: white;
         margin-top:20px;
         margin-right:10px !important;
         width:120px;
     

     }
     .clearfix::after {
  content: "";
  clear: both;
  display: inline;
}
     table{
         max-width:600px;
         width:80%;
         
         border: 2px solid black;
         margin-top:30px;
         text-align: center;
         padding:5px;
         background: white;
         color:black;
         border-collapse: collapse;
         margin:30px auto 0px;
         
        
     }
    table thead{

        font-size: 20px;
        font-weight: bold;
        border: 1px solid black;
        width:200px;
        color:black;
    }
    table  tr {
     border: 1px solid black;
     color:black;
    }
    table tr td{
color: black;
font-weight: bold;
border: 1px solid black;
    }
    h2{
        margin:30px auto 10px;
        width:200px;

    }
    h1{
        width:800px;
        margin:30px auto 0px;
        text-align:left;
    }

    .clearfix{
  height:40px;
         font-size:16px;
         border: 2px solid transparent;
         border-radius: 5px;
         font-weight:bold; 
         color: white;
         margin-top:20px;
         margin-right:100px !important;
         width:120px;
      display: inline;
}
.inner
   {
    display: inline-block;
   }  </style>
</head>
<body>
 
<form action="" method="POST" style="border:2px solid #ccc">
        <div><h4 style="color:black">Patient's database</h4></div>
        <label for="first Name" style="color:black">Enter Patient's first Name:</label>
        <input type="text" name="p_fname" required>
        <br><br>
        <label for="Last Name" style="color:black">Enter Patient's Last Name:</label>
        <input type="text" name="p_lname" required>
        <br><br>
        <label for="email" style="color:black">Enter Patient's Email ID:</label>
        <input type="email" name="p_email">
        <br><br>
        <label for="phone" style="color:black">Enter Patient's Phone no:</label>
        <input type="text" name="p_phone">
        <br><br>
        <label for="dob" style="color:black">Enter Patient's Date Of Birth:</label>
        <input type="text" name="p_dob">
        <br><br>
        <label for="bloodgroup" style="color:black">Enter Patient's Blood Group:</label>
        <input type="text" name="p_bloodgroup">
        <br><br>
        <div class="clearfix" class="inner">
        <button type="submit" name="insert" class="insert" value="insert" >Insert</button>
        <button type="submit" name="update" class="update" value="update" >Update</button>
        <button type="submit" name="delete" class="delete" value="delete" >Delete</button>
         </div>
</form> 
<button type="submit" name="Show_crud" class="Show_crud" value="Show_crud" >Show_Crud</button>
<button type="submit" name="submit" class="cancel" value="cancel" onclick="location.href='admin_dashboard.php'"></button>
<h4 style="margin:0px auto; color:black" >Database</h4>
    <table   cellpadding="1" cellspacing="1">
       <tr> <thead><td>ID</td><td>First Name</td><td>Last Name</td><td>email id</td><td>Phone num</td>
       <td>Blood Group</td><td>Date of Birth</td></thead></tr> 
    <tr>
           
<?php
$sql= "select * from patients";
$result= mysqli_query($conn, $sql);
$c=0;
//if ($result->num_rows>0){
while ($rows=$result->fetch_assoc())
{
    $c = $c + 1;
?>
            <td><?php echo $rows['p_id'] ?></td>
            <td><?php echo $rows['p_fname'] ?></td>
            <td><?php echo $rows['p_lname'] ?></td>
            <td><?php echo $rows['p_email'] ?></td>
            <td><?php echo $rows['p_phone'] ?></td>
            <td><?php echo $rows['p_bloodgroup'] ?></td>
            <td><?php echo $rows['p_dob'] ?></td>
        </tr>
        <div style="color: black;">
        <?php
        } 
        echo "Total no of patients in hospital: $c";
        ?></div>

    </table>
<!--    --><?php
//    }else{
//     echo "No Result is founded!!!";
//    }
//    ?>
</body>
</html>

<?php
if(isset($_POST['insert']))
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
if(isset($_POST['update']))
    {
    //updation
    
           $p_fname =$_POST['p_fname'];
           $p_lname =$_POST['p_lname'];
           $p_email=$_POST['p_email'];
           $p_bloodgroup=$_POST['p_bloodgroup'];
           $p_dob=$_POST['p_dob'];
           $p_phone=$_POST['p_phone'];
           $sql= "select `p_id` from patients where `p_email` = '$p_email'";
                  $result= mysqli_query($conn, $sql);
                  $rows=$result->fetch_assoc();
                  $id = $rows['p_id'];
              echo "$id";
                  $query = "UPDATE `patients` SET `p_fname`='$p_fname',`p_lname`='$p_lname',`p_email`='$p_email',
                  `p_phone`='$p_phone',`p_bloodgroup`='$p_bloodgroup',`p_dob`='$p_dob' WHERE `p_id`='$id'";
                      if($conn->query($query)){
                          echo "Recorded Updated!!";
                      }
                      else
                      {
                          echo "Error Updating records!".mysqli_connect_error();
                      }
        }
    if(isset($_POST['delete']))
        {
        //delete
               $p_fname =$_POST['p_fname'];
               $p_lname =$_POST['p_lname'];
               $p_email=$_POST['p_email'];
               $p_bloodgroup=$_POST['p_bloodgroup'];
               $p_dob=$_POST['p_dob'];
               $p_phone=$_POST['p_phone'];
                      $query = "DELETE From patients where `p_fname`='$p_fname' OR `p_lname`='$p_lname' OR `p_email`='$p_email' OR 
                      `p_phone`='$p_phone' OR `p_bloodgroup`='$p_bloodgroup' OR `p_dob`='$p_dob'";
                if ($conn->query($query)==TRUE){
                    echo "Record deleted successfully";
                        }else{
                            echo "Error". $conn->error;
                }
    }
    if(isset($_POST['show_crud']))
        {
        //show
               $p_fname =$_POST['p_fname'];
               $p_lname =$_POST['p_lname'];
               $p_email=$_POST['p_email'];
               $p_bloodgroup=$_POST['p_bloodgroup'];
               $p_department=$_POST['p_dob'];
               $p_phone=$_POST['p_phone'];
                      $query = "SELECT * From patients";
                if ($conn->query($query)==false){
                            echo "Error". $conn->error;
                }
    }
?>