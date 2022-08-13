<?php
include("include.php");
//include("connection.php");
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
<button type="submit" name="submit" class="cancel" value="cancel" onclick="location.href='admin_dashboard.php'"></button>
<br>
<h4 style="margin:0px auto; color:black" >Database</h4>
    <table   cellpadding="1" cellspacing="1">
       <tr> <thead><td>availibility ID</td><td>availibility time</td><td>availibility day</td><td>Doctor's ID</td>
    </thead></tr> 
    <tr>
           
<?php
$sql= "select ab_id,ab_time,ab_day,d_id from d_availibility";
$sql= mysqli_query($conn, $sql);
//if ($result->num_rows>0){
while ($rows=$result->fetch_assoc())
{
?>
            <td><?php echo $rows['ab_id'] ?></td>
            <td><?php echo $rows['ab_time'] ?></td>
            <td><?php echo $rows['ab_day'] ?></td>
            <td><?php echo $rows['d_id'] ?></td>
        </tr>
        <div style="color: black;">
        <?php
        } 
        ?></div>
    </table>
</body>
</html>
