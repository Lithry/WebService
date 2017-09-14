<html>
    <head>
        <title>RespuestaAgregarNota</title>
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
            
            $client = new nusoap_client("http://localhost:51189/WebService.asmx?WSDL", "WSDL");
            
            $error  = $client->getError();
            if ($error) {
                echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
            }
          
            $dni = $_POST['dni'];
            echo $dni . " ";
            $nota = $_POST['nota'];
            echo $nota . " ";
            $materia = $_POST['materia'];
            echo $materia;
            $param = array('dni'=>$dni, 'nota'=>$nota, 'materia'=>$materia);
            
            $result = $client->call('CargarExamen', $param);

            if ($client->fault) {
                echo "<h2>Client Fault</h2><pre>";
                print_r($result);
                print_r($client->getDebug());
                echo "</pre>";
            } else {
                $error = $client->getError();
                if ($error) {
                    echo "<h2>Error</h2><pre>" . $error . "</pre>";
                } else {
                    echo "<h2>Main</h2><pre>" . $result['CargarExamenResult'] . "</pre>";
                }
            }
            ?>
        </div>
        </br>
        <form action="AgregarNota.php" method="post">
            <div align="center">
                <input type="submit" value="Agregar Otra Nota">
            </div>
        </form>
        <form action="Inicio.php" method="post">
            <div align="center">
                <input type="submit" value="Inicio">
            </div>
        </form>
    </body>
</html>