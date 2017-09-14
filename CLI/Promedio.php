<html>
<head>
<title>AgregarNota</title>
<style>
    div label{
        display: block;
        width: 25%;
        }

    input{
        border: solid 1px black;
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

            $array = array();

            $result = $client->call('CerrarNotas', $array);

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
                    //print_r($result);
                    //print "Deserialized: ".var_export($result['CerrarNotasResult'],true)."\n";
                    var_dump($result['CerrarNotasResult']);
                    //$deserializedUsers = json_decode($serializedUsers);
                }
            }
            ?>
        </div>
    </br>
    <div align="center">
        <form action="Inicio.php" method="post">
            <input type="submit" value="Inicio">
        </form>
    </div>
</body>
</html>