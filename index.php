<?php require_once 'function.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border=1 cellpadding=10 cellspacing=0>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th colspan="3">Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
            $users = mysqli_query($conn, "SELECT * FROM users");
            $i = 1;

            foreach ($users as $user) {
        ?>
            <tbody>
                <tr>
                    <td><?= $i++;?></td>
                    <td><?= $user['name'];?></td>
                    <td colspan="3"><img src="upload/<?= $user['image']; ?>" width=80></td>
                    <td>
                        <a href="edituser.php?id=<?=$user['id'];?>">Edit</a>
                        <form action="" method="post">
                            <button type="submit" name="submit" value="<?=$user['id'];?>">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>

        <?php
            }
        ?>

    </table>

    <a href="adduser.php" style="margin-top: 22px; display: block;">Add User Pages</a>
</body>
</html>