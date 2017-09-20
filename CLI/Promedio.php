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
            class JSONObject {
                public function __construct($json = false) {
                    if ($json) $this->set(json_decode($json, true));
                }
            
                public function set($data) {
                    foreach ($data AS $key => $value) {
                        if (is_array($value)) {
                            $sub = new JSONObject;
                            $sub->set($value);
                            $value = $sub;
                        }
                        $this->{$key} = $value;
                    }
                }
            }

            require_once "nusoap.php";

            $client = new nusoap_client("http://localhost:64579/WebService.asmx?WSDL", "WSDL");

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
                    //var_dump($result['CerrarNotasResult']);
                    //print_r(json_decode($result['CerrarNotasResult']));
                    $class = new JSONObject($result['CerrarNotasResult']);

                    foreach($class as $alumno) {
                        //print_r(json_decode($result['CerrarNotasResult']));
                        echo "Alumno: " . $alumno -> {'Alumno'} . '</br>';
                        echo "DNI: " . $alumno -> {'Dni'} . '</br>';
                        foreach($alumno -> {'Materias'} as $materia){
                            echo $materia -> {'Nombre'} . ": ";
                            if ($materia -> {'Aprobado'}){
                                echo "Aprobado" . '</br>';
                            }
                            else
                                echo "Reprobado" . '</br>';
                        }
                        echo '</br></br>';
                    }
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