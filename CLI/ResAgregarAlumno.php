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
            
            $client = new nusoap_client("http://localhost:64579/WebService.asmx?WSDL", "WSDL");
            
            $error  = $client->getError();
            if ($error) {
                echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
            }
          
            $nombre = $_POST['nombre'];
            $dni = $_POST['dni'];
            $array = array('nombre'=>$nombre, 'dni'=>$dni);
            
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
                    echo "<h2>Main</h2><pre>" . $result['CargarAlumnoResult'] . "</pre>";
                    //echo $result['CargarAlumnoResult'];
                    //print_r($result);
                }
            }
            
            /*
            require 'nusoap.php';
            $client = new nusoap_client('http://localhost:64515/WebService.asmx?WSDL', 'WSDL');
            
            
            $error = $client->getError();
            if ($error) {
                die("client construction error: {$error}\n");
            }
            
            $nombre = $_POST['nombre'];
            $dni = $_POST['dni'];
            $param = array('nombre'=>$nombre, 'dni'=>$dni);
            $answer = $client->call('CargarAlumno', array('parameters' => $param), '', '', false, true);
            
            $error = $client->getError();
            if ($error) {
                print_r($client->response);
                print_r($client->getDebug());
                die();
             }
             */
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
