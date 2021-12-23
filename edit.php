<?php

    include("config.php");

    if(isset($_POST['save'])) {

        $id = $_POST['id'];
        $name = $_POST['name'];
        $nid = $_POST['nid'];
        $gender = $_POST['gender'];
        $dateofbirth = $_POST['dateofbirth'];
        $religion = $_POST['religion'];
        $photo = $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];

        if (empty($photo)) {
            $sql1 = "UPDATE students SET name='$name', nid='$nid', gender='$gender', dateofbirth='$dateofbirth', religion='$religion' WHERE id=$id";
            $query1 = mysqli_query($db, $sql1);

            if( $query1 ) {
                header('Location: view_students.php');
            } else {
                die("Failed updating data...");
            }
        } else {
            $newphoto = date('d-m-Y_H-i-s').$photo;
            $path = "images/".$newphoto;
            if (move_uploaded_file($tmp, $path)) {
                $sql2 = "SELECT photo FROM students WHERE id=$id";
                $query2 = mysqli_query($db, $sql2);

                while($students = mysqli_fetch_array($query2)) {
                    if (is_file("images/".$students['photo'])) {
                        unlink("images/".$students['photo']);
                    }
                }

                $sql3 = "UPDATE students SET name='$name', nid='$nid', gender='$gender', dateofbirth='$dateofbirth', religion='$religion', photo='$newphoto' WHERE id=$id";
                $query3 = mysqli_query($db, $sql3);

                if( $query3 ) {
                    header('Location: view_students.php');
                } else {
                    die("Failed updating data...");
                }
            }
        }

    } else {
        die("Access denied...");
    }

?>