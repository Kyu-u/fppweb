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
    <title>Add Students</title>
    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <script>
        function previewImage() {
            document.getElementById("image-preview").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
            };
        };
    </script>
</head>

<body>
    <form action="add.php" method="POST" enctype="multipart/form-data">
        <fieldset class="flex flex-col items-center w-full justify-center h-screen">
            <h1 class="text-center text-4xl text-main pb-10">Add Student</h1>

            <div class="flex flex-row items-center justify-center w-full gap-x-10">
                <div class="">
                    <div
                        class="h-60 pl-2 w-48 text-center text-white border-2 border-gray-400 bg-main rounded-md grid place-items-center">
                        <img id="image-preview" alt="Upload Image" class="w-48 pl-2">
                    </div>
                    <input class="pt-3" id="image-source" type="file" name="photo" onchange="previewImage();"
                        placeholder="Photo" class="form-control" required />
                </div>
                <div class="grid grid-cols-2">
                    <label for="name" class="form-label text-end pr-10">Name: </label>
                    <div class="flex flex-row gap-x-5 mb-3">
                        <input type="text" name="name" placeholder="Full name" class="form-control" required />
                    </div>
                    <label for="nid" class="form-label text-end pr-10">NID: </label>
                    <div class="flex flex-row gap-x-5 mb-3">
                        <input name="nid" class="form-control" placeholder="NID" required></input>
                    </div>
                    <label for="gender" class="form-label text-end pr-10">Gender: </label>

                    <div class="flex flex-row gap-x-5 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                    </div>
                    <label for="dateofbirth" class="form-label text-end pr-10">Date of Birth: </label>
                    <div class="flex flex-row gap-x-5 mb-3">
                        <input type="date" name="dateofbirth" class="form-control" required />
                    </div>
                    <label for="religion" class="form-label text-end pr-10">Religion: </label>
                    <select name="religion" class="form-select" aria-label="Default select example" required>
                        <option selected>Choose religion</option>
                        <option value="Muslim">Muslim</option>
                        <option value="Christian">Christian</option>
                        <option value="Catholic">Catholic</option>
                        <option value="Hinduism">Hinduism</option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Confucianism">Confucianism</option>
                    </select>


                </div>
            </div>



            <div class="w-full pt-20 flex justify-center items-center col-span-2">
                <button class="bg-green rounded-lg px-6 py-1 text-white" type="submit" name="daftar">Add</button>

            </div>
        </fieldset>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">

    </script>

</body>

</html>