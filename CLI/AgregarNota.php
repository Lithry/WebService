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
    <form action="ResAgregarNota.php" method="post">
        <fieldset>
            <div align="center">
                <label>DNI</label>
                <input type="number" name="dni">
            </div>
            <div align="center">
                <label>Nota</label>
                <input type="number" name="nota">
            </div>
            <div align="center">
                <label>Materia</label>
                <select name="materia">
                        <option value="Programacion">Programacion</option>
                        <option value="Algebra">Algebra</option>
                        <option value="Fisica">Fisica</option>
                </select>
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