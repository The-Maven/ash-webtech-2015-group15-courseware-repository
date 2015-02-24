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
    </style>
</head>
<body>
    <h1 align='center'>Login</h1>
    <form action='login_form.php' method='post'>
        <table cellspacing='5' align='center'>
            <tr><td>User name:</td><td><input type='text' name='name'></td></tr>
            <tr><td>Password:</td><td><input type='password' name='pwd'></td></tr>
            <tr align='center'><td></td><td><input type='submit' name='submit' value='Login'/></td></tr>
        </table>
    </form>

<?php
//    include_once('professor.php');
//    $obj = new login();
    session_start();

    if(isset($_POST['name']) && isset($_POST['pwd'])){
        include("professor.php");
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