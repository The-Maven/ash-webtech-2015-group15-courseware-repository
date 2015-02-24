<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Description</title>

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
    <form action="description_form.php" method="post">
        <table>
            <tr><td>User name:</td><td><input type='text' name='name'></td></tr>
            <tr><td>Topic: </td><td><input type="text" name="topic"></td></tr>
            <tr><td>Objective: </td><td><input type="text" name="objective"></td></tr>
            <tr><td>Time: </td><td><input type="text" name="time"></td></tr>
            <tr><td>References: </td><td><input type="text" name="references"></td></tr>
            <tr><td></td><td>Assessment: <input type="text" name="assessment"></td></tr>
        </table>
    </form>
</body>
</html>
