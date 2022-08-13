
<?php
include("include.php");
include("connection.php");
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>COVID REGISTRATION</title>
    <style>
    input[type=text], input[type=password], input[type=date], input[type=password],input[type=number], input[type=gender] {   
       
        width: 50%;   
        height: 40px;
        margin: 8px 0;  
        /* padding: 12px 20px;    */
        display: inline-block;   
        border: 2px solid rgb(105, 107, 105);   
        /* box-sizing: border-box;    */
    } 
    button {   
           background-color: rgb(8, 8, 8);   
           width: 100%;  
            color: rgb(236, 236, 234);   
            padding: 15px;   
            margin: 10px 0px;   
            border: none;   
            cursor: pointer;   
             } 
</style>  
</head>

<body>
    <div class="bod">
        <h1>COVID 19 VACCINE </h1>
        <hr style=" border: 1px solid;color:  black;">
        <h5 style="color: darkslategray;">ALL FIELDS ARE MANDATORY</h5>
    </div>
    <div class="boxed">
        <form action="" method="POST">
            <div class="fm">
                <div>
                    <label for="nfame">YOUR NAME*</label>
                    <br>
                    <input type="text" name="c_name" id="fname">
                </div>
                <br>
                <div>
                    <label for="lname">CNIC*</label>
                    <br>
                    <input type="number" name="c_cnic" id="lname">
                </div>
                <br>
                <div>
                    <label for="db">DATE OF BIRTH*</label>
                    <br>
                    <input type="date" name="c_dob" id="db">
                </div>
                <br>
                <div>
                    <label for="nfame">PHONE NUMBER* :</label> :</label> <br>
                    <input type="number" name="c_phone" id="fnUM">
                </div>
                <br>
                <div>
                    <label for="nfame">BLOOD TYPE :</label> <br>
                    <input type="text" name="c_blood" id="ftype">
                </div>
                <br>
                <div>
                    <label for="gander">GENDER*</label>
                  <br>  MALE<input type="radio" name="gander" id="gander"> FEMALE<input type="radio" name="gander"
                        id="gander">
                </div>
                <br>
                <div>
                    <label for="eligible">Have you ever been vaccinated for COVID-19 in the last 90 days?* <br> </label>
                   <br>    YES  <input type="radio" name="gander" id="gander"> NO<input type="radio" name="gander">
                </div>
                <br>
                <div>
                    <label for="eligible">Do you have cancer and are on active chemotherapy or immunosuppressants?* <br> </label>
                   <br>    YES <input type="radio" name="gander" id="gander"> NO <input type="radio" name="gander">
                </div>
                <br>
                <div>
                    <label for="eligible">Have you received any other vaccine in the last 10-14 days? * <br> </label>
                   <br>    YES <input type="radio" name="gander" id="gander"> NO <input type="radio" name="gander">
                </div>
                <br>
                <button type="submit" name="submit" class="submit" value="submit" >submit</button>  
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
if(isset($_POST['submit']))
{
//insertion

       $c_name =$_POST['c_name'];
       $c_cnic =$_POST['c_cnic'];
       $c_dob=$_POST['c_dob'];
       $c_phone=$_POST['c_phone'];
       $c_blood=$_POST['c_blood'];

$sql= "INSERT INTO `covid`(`c_name`, `c_cnic`, `c_dob`, `c_phone`, `c_blood`,) 
VALUES ('c_name','c_cnic','c_dob','c_phone','c_blood')";
if(mysqli_query($conn, $sql)){
           echo "record inserted successfully!";
       }else {
           echo "Error inserting records!".mysqli_connect_error();
       }
    }
?>
</body>
</html>