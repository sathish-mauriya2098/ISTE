<?php
define('DB_NAME','form');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_HOST','localhost');
$link=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
if(!$link)
{
    die('Could not connect:'.mysql_error());
}
$db_selected=mysql_select_db(DB_NAME,$link);
if(!$db_selected)
{
    die('Can not use'.DB_NAME.':'.mysql_error());
}
//echo"connected successfully";
$headers = "From:isteksrct@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$name=$_POST['name'];
$gender=$_POST['sex'];
$email=$_POST['mail'];
$mobile=$_POST['mbn'];
$colleg=$_POST['college'];
$depart=$_POST['branch'];
$year=$_POST['year'];
$city=$_POST['city'];
$events=implode(",",$_POST['e']);
$workshops=implode(",",$_POST['w']);
$msg="<table width='100%'  border='5px solid'>
<tr bgcolor='green'>
    <th>NAME</th>
     <th>GENDER</th>
     <th>MAIL ID</th>
     <th>MOBILE</th>
     <th>COLLEGE</th>
     <th>DEPARTMENT</th>
     <th>YEAR</th>
     <th>CITY</th>
        <th>EVENTS</th>
     <th>WORKSHOP</th>
    </tr>
    <tr>
    <td>$name</td>
     <td>$gender</td>
      <td>$email</td>
       <td>$mobile</td>
       <td>$colleg</td>
       <td>$depart</td>
       <td>$year</td>
       <td>$city</td>
       <td>$events</td>
       <td>$workshops</td>
    </td>
    </table>";
    $msg1="<html><head>
<style>
        body{
           background-color: dimgray;
        }
      
        .log{
           text-align: justify;
           width: 550px;
            height:auto;
            font-size: 23px;
            background-color: #E6E6FA;
            border:2px solid;
            border-radius: 4px;
            margin: 0 auto;
            margin-top: 50px;
            padding: 15px 30px;
            box-shadow: 3px 3px 8px 8px ;
           }
     
       h4{
           font-family: Times New Roman;
        }
        h3{
            font-family: sans-serif;
        }
         h1{
            font-size: 35px;
            font-family:Castellar;
             text-align: center;
             color:indigo;
        }
        p{
            color: red;
            text-decoration: underline;
            font-family: serif;
        }
       
        p2{
            color: brown;
            font-weight: bold;
        }
       
    </style>
    
</head>
    <body> 
      
         
       <center>
           
              <center> <div class='log'>
    <h1>TECHNO BRIGADE'18</h1>
                  <h3>Thank You for registration...</h3>
                  <h4>We are heartly Welcome you for TECHNO BRIGADE'18.</h4>
                  <p>CONTACT US:</p>
                  <b>Email Id:</b>isteksrct@gmail.com<br>
                  <b>Mobile:</b>9150813634<br>
                  <p>Address:</p><h5>K.S.Rangasamy College of Technology,Tiruchengode,<br>
                  <center>Namakkal-637 215.</center></h5>
               <b>VENUE:</b>IT Park,KSRCT.
                  </div></center>
    </body>
</html>";
$sql="INSERT INTO registeriste(NAME, GENDER,EMAILID,MOBILE,COLLEGE,DEPARTMENT,YEAR,CITY,EVENTS,WORKSHOP) VALUES('$name','$gender','$email','$mobile','$colleg','$depart','$year','$city','$events','$workshops')";
if (mysql_query($sql)) {
	 echo'<html><body bgcolor="green"><br><br><br><br><br><br><br><br><center><h1>Registered Successfully.<br>Confirmation Mail will be sent to your registered mail id.</h1></center></body></html>';
    mail("isteksrct@gmail.com","TECHNO BRIGADE'18",$msg,$headers);
	  mail($email,"TECHNO BRIGADE '18",$msg1,$headers);
}
        else
        {
            echo mysql_error();
        }
mysql_close();
?>
