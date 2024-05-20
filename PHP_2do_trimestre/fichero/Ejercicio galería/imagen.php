<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagen</title>
    <style>
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            width: 100vw;
        }
        .formulario{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 30%;
            height: 30%;
            border: 5px solid black;
            border-radius: 20px;
        }

        .subida{
            margin-bottom: 20px;
        }

        .verde{
            background-color: greenyellow;
        }

        .rojo{
            background-color: red;
        }
    </style>
</head>
<body>
    <form method="post" class="formulario" enctype="multipart/form-data">
        <input type="file" name="imagen" class="subida"/>
        <input type="submit" name="enviar" value="Enviar imagen" class="enviar"/>
        <br>
        <?php
            $path = "img/". basename($_FILES['imagen']['name']); 
 
            if(move_uploaded_file($_FILES['imagen']['tmp_name'], $path)) {
                echo "El archivo ".  basename( $_FILES['imagen']['name']). " ha sido subido";
            } else{
                echo "El archivo no se ha subido correctamente";

            }
            // if(isset($_REQUEST["enviar"])){
            //     if(isset($_FILES["imagen"]['name']) && $_FILES["imagen"]['name'] != ""){
            //         echo "<div class='verde'>Se ha subido una imagen</div>";
            //         $nombre_imagen = $_FILES["imagen"]['name'];
            //         echo $nombre_imagen;
            //         // Leemos el fichero para comprobar si existe
            //         $fichero=fopen("nombres_img.txt", "r");
            //         while ($linea = fgets($fichero)){
            //             echo " Linea: ".$linea."<br>";
            //             echo " Nombre: ".$nombre_imagen."<br>";
            //             if($linea==$nombre_imagen){
            //                 echo "igual <br>";
            //             }
            //             else{
            //                 echo "No igual <br>";
            //             }
            //         }
            //         echo $linea;
            //         fclose($fichero);
            //     }
            //     else{
            //         echo "<div class='rojo'>No se ha subido ningún archivo</div>";
            //     }
            // }
        ?>
    </form>
</body>
</html>