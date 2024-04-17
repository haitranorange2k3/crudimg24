<?php
require_once 'function.php';
$id = $_GET['id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $id"));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        Name : <input type="text" name="name" value="<?= $user['name'];?>"> <br> <br>
        Image : <input type="file" name="file" value="<?= $user['image'];?>"> <br> <br>
        <button type="submit" name="submit" value="edit">Edit</button>
    </form>
    <a href="index.php" style="margin-top: 22px; display: block;">Index Layout</a>
</body>

</html>