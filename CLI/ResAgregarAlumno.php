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
            require_once "nusoap.php";
            
            $client = new nusoap_client("http://localhost:63678/WebService.asmx?WSDL", "WSDL");
            
            $error  = $client->getError();
            if ($error) {
                echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
            }
          
            $nombre = $_POST['nombre'];
            $dni = $_POST['dni'];
            
            $file_size = $_FILES['photo']['size'];
            if ($file_size !== 0){
                $file_name = $_FILES['photo']['name'];
                $file_type = $_FILES['photo']['type'];
                $file_tmp = $_FILES['photo']['tmp_name'];
                $photo = base64_encode(file_get_contents($file_tmp));
            } else{
                $defaultImageBase64="DefaultImage/ImageBase64.txt";
                $photo = file_get_contents($defaultImageBase64);
                $file_type = "image/png";
            }
         
            $array = array('nombre'=>$nombre, 'dni'=>$dni, 'photo'=>$photo, 'photoFileType'=>$file_type);
            
            $result = $client->call('CargarAlumno', $array);

            if ($client->fault) {
                echo "<h2>Client Fault</h2><pre>";
                print_r($result);
                echo "</pre>";
            } else {
                $error = $client->getError();
                if ($error) {
                    echo "<h2>Error</h2><pre>" . $error . "</pre>";
                } else {
                    echo "<h2>Main</h2><pre>" . $result['CargarAlumnoResult'];
                }
            }
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
