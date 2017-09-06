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
            //include("nusoap.php");
            //include 'nusoap.php';
            //$client = new SoapClient("http://localhost:64515/WebService.asmx?WSDL");
            $client = new nusoap_client("http://localhost:64515/WebService.asmx?WSDL");
            
            $error  = $client->getError();
            if ($error) {
                echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
            }
          
            $nombre = $_POST['nombre'];
            $dni = $_POST['dni'];
            $array = array('nombre'=>$nombre, 'dni'=>$dni);
            //$array = array('nombre'=>$nombre, 'dni'=>$dni);
            
            $result = $client->call("CargarAlumno", $array);
            //$result = $client->__soapCall('CargarAlumno', $array[]);

            //echo $result['Exp'];

            if ($client->fault) {
                echo "<h2>Fault</h2><pre>";
                print_r($result);
                echo "</pre>";
            } else {
                $error = $client->getError();
                if ($error) {
                    echo "<h2>Error</h2><pre>" . $error . "</pre>";
                } else {
                    echo "<h2>Main</h2>";
                    echo $result;
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
