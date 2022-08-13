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
        <div><h4 style="color:black">Doctor's database</h4></div>
        <label for="first Name" style="color:black">Enter Doctor's first Name:</label>
        <input type="text" name="d_fname" required>
        <br><br>
        <label for="Last Name" style="color:black">Enter Doctor's Last Name:</label>
        <input type="text" name="d_lname" required>
        <br><br>
        <label for="email" style="color:black">Enter Doctor's Email ID:</label>
        <input type="email" name="d_email">
        <br><br>
        <label for="phone" style="color:black">Enter Doctor's Phone no:</label>
        <input type="text" name="d_phone">
        <br><br>
        <label for="speciality" style="color:black">Enter Doctor's Speciality:</label>
        <input type="text" name="d_speciality">
        <br><br>
        <label for="department" style="color:black">Enter Doctor's department:</label>
        <input type="text" name="d_department">
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
       <tr> <thead><td>ID</td><td>First Name</td><td>Last Name</td><td>email id</td><td>Speciality</td>
       <td>department id</td><td>Phone num</td></thead></tr> 
    <tr>
           
<?php
$sql= "select * from doctors";
$result= mysqli_query($conn, $sql);
$c=0;
//if ($result->num_rows>0){
while ($rows=$result->fetch_assoc())
{
    $c = $c + 1;
?>
            <td><?php echo $rows['d_id'] ?></td>
            <td><?php echo $rows['d_fname'] ?></td>
            <td><?php echo $rows['d_lname'] ?></td>
            <td><?php echo $rows['d_email'] ?></td>
            <td><?php echo $rows['d_speciality'] ?></td>
            <td><?php echo $rows['d_department'] ?></td>
            <td><?php echo $rows['d_phone'] ?></td>
        </tr>
        <div style="color: black;">
        <?php
        } 
        echo "Total no of doctors in hospital: $c";
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

       $d_fname =$_POST['d_fname'];
       $d_lname =$_POST['d_lname'];
       $d_email=$_POST['d_email'];
       $d_speciality=$_POST['d_speciality'];
       $d_department=$_POST['d_department'];
       $d_phone=$_POST['d_phone'];

$sql= "INSERT INTO `doctors`( `d_fname`, `d_lname`, `d_email`, `d_phone`, `d_speciality`, `d_department`) VALUES
 ('$d_fname','$d_lname','$d_email','$d_phone','$d_speciality','$d_department')";
if(mysqli_query($conn, $sql)){
           echo "record inserted successfully!";
       }else {
           echo "Error inserting records!".mysqli_connect_error();
       }
    }
if(isset($_POST['update']))
    {
    //updation
    
           $d_fname =$_POST['d_fname'];
           $d_lname =$_POST['d_lname'];
           $d_email=$_POST['d_email'];
           $d_speciality=$_POST['d_speciality'];
           $d_department=$_POST['d_department'];
           $d_phone=$_POST['d_phone'];
           $sql= "select `d_id` from doctors where `d_email` = '$d_email'";
                  $result= mysqli_query($conn, $sql);
                  $rows=$result->fetch_assoc();
                  $id = $rows['d_id'];
              echo "$id";
                  $query = "UPDATE `doctors` SET `d_fname`='$d_fname',`d_lname`='$d_lname',`d_email`='$d_email',
                  `d_phone`='$d_phone',`d_speciality`='$d_speciality',`d_department`='$d_department' WHERE `d_id`='$id'";
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
               $d_fname =$_POST['d_fname'];
               $d_lname =$_POST['d_lname'];
               $d_email=$_POST['d_email'];
               $d_speciality=$_POST['d_speciality'];
               $d_department=$_POST['d_department'];
               $d_phone=$_POST['d_phone'];
                      $query = "DELETE From doctors where `d_fname`='$d_fname' OR `d_lname`='$d_lname' OR `d_email`='$d_email' OR 
                      `d_phone`='$d_phone' OR `d_speciality`='$d_speciality' OR `d_department`='$d_department'";
                if ($conn->query($query)==TRUE){
                    echo "Record deleted successfully";
                        }else{
                            echo "Error". $conn->error;
                }
    }
    if(isset($_POST['show_crud']))
        {
        //delete
               $d_fname =$_POST['d_fname'];
               $d_lname =$_POST['d_lname'];
               $d_email=$_POST['d_email'];
               $d_speciality=$_POST['d_speciality'];
               $d_department=$_POST['d_department'];
               $d_phone=$_POST['d_phone'];
                      $query = "SELECT * From doctors";
                if ($conn->query($query)==false){
                            echo "Error". $conn->error;
                }
    }
?>