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
            include("nusoap.php");
            $client = new SoapClient("http://localhost:53088/WebService.asmx?WSDL");
            
          
            $nombre = $_POST['nombre'];
            $dni = $_POST['dni'];
            $array = array('nombre'=>$nombre, 'dni'=>$dni);
            //$array = array('nombre'=>$nombre, 'dni'=>$dni);

            $result = $client->__soapCall('CargarAlumno', $array[]);

            echo $result;
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
