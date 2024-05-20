<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 10</title>     
</head>
<body>
    <div>
        <form action="datos.php" method="post">
            <fieldset>
                <legend>Cree su usuario: </legend>
                <table class='table'>
                    <tr>
                        <td>
                            Nombre y apellidos:

                        </td>
                        <td>
                            <input type="text" name="nombre" id="nombre" maxlength="30" required="required">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Teléfono:

                        </td>
                        <td>
                            <input type="tel" name="telefono" id="telefono">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Fecha de nacimiento:
                        </td>
                        <td>
                            <input type="date" name="fecha" id="fecha" required="required">

                        </td>
                    </tr>
                    <tr>

                        <td>
                            Correo:

                        </td>
                        <td>
                            <input type="email" name="email" id="email">
                        </td>
                    </tr>
                    <tr>

                        <td>
                            Contraseña:

                        </td>
                        <td>
                            <input type="password" name="contrasenia" id="contrasenia" required="required">
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Enviar">
                <input type="reset" value="Borrar">

            </fieldset>

        </form>
    </div>

</body>

</html>