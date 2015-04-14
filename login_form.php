<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login</title>

    <style type="text/css">
        input{
            border:1px solid olive;
            border-radius:5px;
        }
        h1{
            color:darkgreen;
            font-size:22px;
            text-align:center;
        }
        body{
            background-color: indianred;
        }
        footer{
            position: absolute;
            bottom: 50%;
            width: 50%;
            height: 100%;
            background-color: #d0e4fe;
        }
    </style>
</head>
<body>
    <h1 align='center'>Courseware</h1>
    <h2 align='center'>Please enter your login details</h2>


    <form action='index.php' method='post'>
        <table cellspacing='5' align='center'>
            <tr><td>User name:</td><td><input type='text' name='name'></td></tr>
            <tr><td>Password:</td><td><input type='password' name='pwd'></td></tr>
            <tr align='center'><td></td><td><input type='submit' name='submit' value='Login'/></td></tr>
        </table>
    </form>

<?php
   // include_once('professor.php');
//    $obj = new login();
    session_start();

    if(isset($_POST['name']) && isset($_POST['pwd'])){
        include_once "professor.php";
        $obj = new professor();
        $n = $_REQUEST['name'];
        $p = $_REQUEST['pwd'];
        if(!empty($n) && !empty($p)){
            echo "test 1";
            $obj->login($n, $p);
            echo "test 2";
        }
        else{
            echo "Invalid username or password";
        }
    }
?>

</body>
</html>