<html>
    <head>
    <title>AgregarAlumno</title>  
    <style>
        div label{
            display: block;
            width: 25%;
            }

        input{
            border: solid 2px black;
            }
    </style> 
    </head>
    <body>
        <form action="ResAgregarAlumno.php" method="post">
            <fieldset>
                <legend align="center">Agregar Alumno</legend>
                <div align="center">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                </div>
                <div align="center">
                    <label for="dni">DNI</label>
                    <input type="text" name="dni" id="dni">
                </div>
                </br>
                <div align="center">
                    <input type="submit" value="Agregar">
                </div>
            </fieldset>
        </form>
        <div align="center">
            <form action="Inicio.php" method="post">
                <input type="submit" value="Inicio">
            </form>
        </div>
    </body>
</html>