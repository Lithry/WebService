<html>
    <head>
        <title>RespuestaAgregarAlumno</title>
        <style>
            div label{
                display: block;
                width: 25%;
                }
        </style>
    </head>
    
    <body>
    </br>
    </br>
    </br>
        <div align="center" style="border:1px solid red">
            <?php
            
            $nombre = $_POST['nombre'];
            $dni = $_POST['dni'];
            print_r($_FILES['photo']);
            $file_name = $_FILES['photo']['name'];
            $file_type = $_FILES['photo']['type'];
            $file_size = $_FILES['photo']['size'];
            $file_tmp = $_FILES['photo']['tmp_name'];
            $file_store = "Upload/" . $file_name;
            


            if ($file_size > 0){
                move_uploaded_file($file_tmp, $file_store);
                echo "Image Loaded </br>";
                $photo = base64_encode(file_get_contents($file_store));
            } else{
                echo "Image not set" . "</br>";
                $photo = "";
            }
            
            

            echo $nombre . "</br>";
            echo $dni . "</br>";
            
            /*if ($_FILES["photo"]["error"] > 0)
            {
                echo "Error: " . $_FILES["photo"]["error"] . "<br />";
            }
            else
            {
                echo "Upload: " . $_FILES["photo"]["name"] . "<br />";
                echo "Type: " . $_FILES["photo"]["type"] . "<br />";
                echo "Size: " . ($_FILES["photo"]["size"] / 1024) . " Kb<br />";
                echo "Stored in: " . $_FILES["photo"]["tmp_name"] . "</br>";
                echo '<img src="images/gallery/' . $_FILES["photo"]["tmp_name"] . '.jpg">';
            }*/
            
            

            ?>
        </div>
        </br>
        <form action="AgregarAlumno.php" method="post">
            <div align="center">
                <input type="submit" value="Agregar Otro Alumno">
            </div>
        </form>
        <form action="Inicio.php" method="post">
            <div align="center">
                <input type="submit" value="Inicio">
            </div>
        </form>
    </body>
</html>
