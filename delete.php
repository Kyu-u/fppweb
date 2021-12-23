<?php

    include("config.php");

    if( isset($_GET['id']) ) {
        $id = $_GET['id'];

        $sql2 = "SELECT photo FROM students WHERE id=$id";
        $query2 = mysqli_query($db, $sql2);

        while($students = mysqli_fetch_array($query2)) {
            if (is_file("images/".$students['photo'])) {
                unlink("images/".$students['photo']);
            }
        }

        $sql = "DELETE FROM students WHERE id=$id";
        $query = mysqli_query($db, $sql);

        if( $query ){
            header('Location: view_students.php');
        } else {
            die("Gagal menghapus...");
        }

    } else {
        die("Access denied...");
    }

?>