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
            
            $file_size = $_FILES['photo']['size'];
            if ($file_size !== 0){
                $file_name = $_FILES['photo']['name'];
                $file_type = $_FILES['photo']['type'];
                $file_tmp = $_FILES['photo']['tmp_name'];
                $photo = base64_encode(file_get_contents($file_tmp));
            } else{
                $photo = "";
            }

            echo $nombre . "</br>";
            echo $dni . "</br>";
            echo "<img src=\"data:image/$file_type;base64,$photo\"/></br>";
            echo $photo;

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
