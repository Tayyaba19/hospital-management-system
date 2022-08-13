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
        <div><h4 style="color:black">Scheduale Doctors:</h4></div>
        <label for="first Name" style="color:black">Enter Doctor's id:</label>
        <input type="text" name="d_id" required>
        <br><br>
        <label for="Available day" style="color:black">Enter Doctor's Availbility day:</label>
        <input type="text" name="ab_day" required>
        <br><br>
        <label for="ab_time" style="color:black">Enter Doctor's Availbility time:</label>
        <input type="text" name="ab_time">
        <br><br>

        <div class="clearfix" class="inner">
        <button type="submit" name="insert" class="insert" value="insert" >Insert</button>
        <button type="submit" name="update" class="update" value="update" >Update</button>
        <button type="submit" name="delete" class="delete" value="delete" >Delete</button>
         </div>
</form> 
<button type="submit" name="Show_crud" class="Show_crud" value="Show_crud" >Show_Crud</button>
<button type="submit" name="submit" class="cancel" value="cancel" onclick="location.href='admin_dashboard.php'"></button>
<br>
<h4 style="margin:0px auto; color:black" >Database</h4>
    <table   cellpadding="1" cellspacing="1">
       <tr> <thead><td>availibility ID</td><td>availibility time</td><td>availibility day</td><td>Doctor's ID</td>
    </thead></tr> 
    <tr>
           
<?php
$sql= "select * from d_availibility";
$result= mysqli_query($conn, $sql);
$c=0;
//if ($result->num_rows>0){
while ($rows=$result->fetch_assoc())
{
    $c = $c + 1;
?>

            <td><?php echo $rows['ab_id'] ?></td>
            <td><?php echo $rows['ab_time'] ?></td>
            <td><?php echo $rows['ab_day'] ?></td>
            <td><?php echo $rows['d_id'] ?></td>
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

       $d_id =$_POST['d_id'];
       $ab_time =$_POST['ab_time'];
       $ab_day=$_POST['ab_day'];

$sql= "INSERT INTO `d_availibility`( `d_id`, `ab_time`, `ab_day`) VALUES ('$d_id','$ab_time','$ab_day')";
if(mysqli_query($conn, $sql)){
           echo "record inserted successfully!";
       }else {
           echo "Error inserting records!".mysqli_connect_error();
       }
    }
if(isset($_POST['update']))
    {
    //updation
    $d_id =$_POST['d_id'];
    $ab_time =$_POST['ab_time'];
    $ab_day=$_POST['ab_day'];
           $sql= "select `ab_id` from d_availibility where `ab_time` = '$ab_time' AND `ab_day` = '$ab_day' AND `d_id` = '$d_id'";
                  $result= mysqli_query($conn, $sql);
                  $rows=$result->fetch_assoc();
                  $id = $rows['ab_id'];
              echo "$id";
                  $query = "UPDATE `d_availibility` SET `d_id`='$d_id',`ab_day`='$ab_day',`ab_time`='$ab_time' WHERE `ab_id`='$id'";
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
        $ab_id =$_POST['d_id'];
        $ab_time =$_POST['ab_time'];
        $ab_day=$_POST['ab_day'];
                      $query = "DELETE From d_availibility where `d_id`='$d_id' OR `ab_time`='$ab_time' OR `ab_day`='$ab_day' ";
                if ($conn->query($query)==TRUE){
                    echo "Record deleted successfully";
                        }else{
                            echo "Error". $conn->error;
                }
    }
    if(isset($_POST['show_crud']))
        {
        //delete
        $ab_id =$_POST['d_id'];
        $ab_time =$_POST['ab_time'];
        $ab_day=$_POST['ab_day'];
                      $query = "SELECT * From d_availibility";
                if ($conn->query($query)==false){
                            echo "Error". $conn->error;
                }
    }
?>