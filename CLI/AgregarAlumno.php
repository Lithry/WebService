<html>
    <head>
    <title>AgregarAlumno</title>
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
        <form action="ResAgregarAlumno.php" method="post">
            <fieldset>
                <div align="center">
                    <label>Nombre</label>
                    <input type="text" name="nombre">
                </div>
                <div align="center">
                    <label>DNI</label>
                    <input type="text" name="dni">
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