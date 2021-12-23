<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        main: '#6E6E6E',
                        green: '#425958',
                        light: '#C4C4C4',
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <title>Students List</title>
</head>

<body>
    <div class="w-full justify-center text-center pt-32 text-main">
    <h1 class="text-4xl">Edit Student</h1>

    </div>
    <div class="container">
        <?php if(isset($_GET['status'])): ?>
        <p>
            <?php
                    if($_GET['status'] == 'success') {
                        echo "<div class=\"alert alert-success mt-4\" role=\"alert\">";
                        echo "Success adding a new student!";
                        echo "</div>";
                    } else {
                        echo "<div class=\"alert alert-danger mt-4\" role=\"alert\">";
                        echo "Failed adding a new student. Please try again";
                        echo "</div>";
                    }
                ?>
        </p>
        <?php endif; ?>
    </div>

    <div class="container mt-4">
        <table class="table table-borderless ">
            <thead>
                <tr class="bg-light py-3 text-main">
                    <td >No</td>
                    <td >Photo</td>
                    <td >Name</td>
                    <td >NID</td>
                    <td >Gender</td>
                    <td >Date of Birth</td>
                    <td>Religion</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM students";
                    $query = mysqli_query($db, $sql);
                    $no = 1;

                    while($students = mysqli_fetch_array($query)) {
                        echo "<tr>";

                        echo "<td>".$no."</td>";
                        echo "<td><img src='images/".$students['photo']."' width='100' height='100'></td>";
                        echo "<td>".$students['name']."</td>";
                        echo "<td>".$students['nid']."</td>";
                        echo "<td>".$students['gender']."</td>";
                        echo "<td>".$students['dateofbirth']."</td>";
                        echo "<td>".$students['religion']."</td>";

                        echo "<td>";
                        echo "<a href='form_edit.php?id=".$students['id']."'><i class=\"fa-solid fa-pen-to-square text-info\"></i></a> ";
                        echo "<a href='delete.php?id=".$students['id']."' data-bs-toggle=\"modal\" data-bs-target=\"#deleteModal\"><i class=\"fa-solid fa-trash text-danger\"></i></a>";
                        echo "</td>";

                        echo "</tr>";

                        echo "
                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"deleteModal\" tabindex=\"-1\" aria-labelledby=\"deleteModalLabel\" aria-hidden=\"true\">
                            <div class=\"modal-dialog\">
                                <div class=\"modal-content\">
                                <div class=\"modal-header\">
                                    <h5 class=\"modal-title\" id=\"deleteModalLabel\">Delete Data</h5>
                                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                                </div>
                                <div class=\"modal-body\">
                                    Are you sure you want to delete this student?
                                </div>
                                <div class=\"modal-footer\">
                                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                                    <a href='delete.php?id=".$students['id']."'><button type=\"button\" class=\"btn btn-danger\">Delete</button></a>
                                </div>
                                </div>
                            </div>
                        </div>
                        ";
                        $no = $no + 1;
                    }
                ?>
            </tbody>
        </table>
        <div class="w-full text-center">
        <p>Total students: <?php echo mysqli_num_rows($query) ?></p>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>