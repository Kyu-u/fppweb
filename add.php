<?php

    include("config.php");

    if (isset($_POST['daftar'])) {

        $name = $_POST['name'];
        $nid = $_POST['nid'];
        $gender = $_POST['gender'];
        $dateofbirth = $_POST['dateofbirth'];
        $religion = $_POST['religion'];
        $photo = $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];

        $newphoto = date('d-m-Y_H-i-s').$photo;

        $path = "images/".$newphoto;

        if (move_uploaded_file($tmp, $path)) {
            $sql = "INSERT INTO students (name, nid, gender, dateofbirth, religion, photo) VALUE ('$name', '$nid', '$gender', '$dateofbirth', '$religion', '$newphoto')";
            $query = mysqli_query($db, $sql);

            if ( $query ) {
                header('Location: view_students.php?status=success');
            } else {
                header('Location: view_students.php?status=fail');
            }
        }

    } else {
        die("Access denied...");
    }

?>