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
            
            $client = new nusoap_client("http://localhost:64515/WebService.asmx?WSDL", "WSDL");
            
            $error  = $client->getError();
            if ($error) {
                echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
            }
          
            $dni = $_POST['dni'];
            $nota = $_POST['nota'];
            $materia = $_POST['materia'];
            $array = array('dni'=>$dni, 'nota'=>$nota, 'materia'=>$materia);
            
            $result = $client->call('CargarExamen', $array);

            if ($client->fault) {
                echo "<h2>Client Fault</h2><pre>";
                print_r($result);
                echo "</pre>";
            } else {
                $error = $client->getError();
                if ($error) {
                    echo "<h2>Error</h2><pre>" . $error . "</pre>";
                } else {
                    echo "<h2>Main</h2>";
                    print_r($result['Exp']);
                    print_r($result);
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