<?php
$conn = mysqli_connect('localhost', 'root', '', 'crudimg');

if (isset($_POST['submit'])) {
    if ($_POST['submit'] == 'add') {
        add();
    } elseif ($_POST['submit'] == 'edit') {
        edit();
    } else {
        delete();
    }
}

function add() {
    global $conn;

    $name = $_POST['name'];
    $filename = $_FILES['file']['name'];
    $tmpName = $_FILES['file']['tmp_name'];

    $newfilename = uniqid() . "-" . $filename;

    // Tạo thư mục 'upload' nếu chưa tồn tại
    if (!file_exists('upload')) {
        mkdir('upload', 0777, true);
    }

    move_uploaded_file($tmpName, 'upload/' . $newfilename);
    $query = "INSERT INTO users (name, image) VALUES ('$name', '$newfilename')";
    mysqli_query($conn, $query);

    echo "<script>
            alert('Thêm người dùng thành công !!!');
            document.location.href = 'index.php';
          </script>";
}
// function add() {
//     global $conn;

//     $name = $_POST['name'];
//     $filename = $_FILES['file']['name'];
//     $tmpName = $_FILES['file']['tmp_name'];

//     $newfilename = uniqid() . "-" . $filename;

//     move_uploaded_file($tmpName, 'upload/' . $newfilename);
//     $query = "INSERT INTO users VALUES ('', '$name', '$newfilename')";
//     mysqli_query($conn, $query);

//     echo "<script>
//             alert('User add successfully !!!');
//             document.location.href = 'index.php';
//         </script>;";
// }
function edit() {
    global $conn;

    $id = $_GET['id'];
    $name = $_POST['name'];

    echo $id . ' - ' .$name;
    if ($_FILES["file"]["error"] != 4) {
        
        $filename = $_FILES['file']['name'];
        $tmpName = $_FILES['file']['tmp_name'];
    
        $newfilename = uniqid() . "-" . $filename;
    
        move_uploaded_file($tmpName, 'upload/' . $newfilename);
        $query = "UPDATE users SET image = '$newfilename' WHERE id = $id";
        mysqli_query($conn, $query);
    }

    $query = "UPDATE users SET name = '$name' WHERE id = '$id'";
    mysqli_query($conn, $query);
    echo "<script>
            alert('User edit successfully !!!');
            document.location.href = 'index.php';
        </script>;";
}
function delete() {
    global $conn;

    $id = $_POST["submit"];

    $query = "DELETE FROM users WHERE id = '$id'";
    mysqli_query($conn, $query);

    echo "<script>
            alert('User delete successfully !!!');
            document.location.href = 'index.php';
        </script>;";
}

