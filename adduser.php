<?php require 'function.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        Name :  <input type="text" name="name" required> <br> <br>
        Image : <input type="file" name="file" required> <br> <br>
        <button type="submit" name="submit" value="add">Add</button>
    </form>
    <a href="index.php" style="margin-top: 22px; display: block;">Index Layout</a>
</body>
</html>


