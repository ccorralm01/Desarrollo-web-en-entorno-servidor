<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fabricantes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <?php
        require_once "config.php";
        require_once "libreriaBD.php";
        require_once "modal.php";

        $modal=false;

        if(isset($_REQUEST["insertar"]) && isset($_REQUEST["empresa"]) && strlen($empresa=trim($_REQUEST["empresa"])))
        {
            $consulta="SELECT EMPRESA FROM FABRICANTE WHERE UPPER(EMPRESA)=UPPER('".$_REQUEST["empresa"]."')";
            $resultset=realizarConsulta($consulta, "config.php");
            if(!$resultset->num_rows){
                //No existe inserto la nueva empresa
                $consulta="INSERT INTO FABRICANTE (EMPRESA) VALUES ('".$_REQUEST["empresa"]."')";
                if(realizarConsulta($consulta,"config.php")){
                    $modal=true;
                    $idModal="modalInsert";
                    $tituloModal="INSERTAR";
                    $textoModal="Registro insertado.";
                }
            }
            else{
                //Si existe esta duplicado
                $modal=true;
                $idModal="modalInsert";
                $tituloModal="INSERTAR";
                $textoModal="Registro duplicado.";
            }
        }


        if(isset($_REQUEST["borrar"]) && isset($_REQUEST["id"]) && strlen(trim($_REQUEST["id"])))
        {
            $consulta="SELECT ID FROM FABRICANTE WHERE ID=".$_REQUEST["ID"];
            $resultset=realizarConsulta($consulta, "config.php");
            if($resultset->num_rows){
                //Si existe borro la empresa
                $consulta="INSERT INTO FABRICANTE WHERE ID=".$_REQUEST["ID"];
                if(realizarConsulta($consulta,"config.php")){
                    $consulta="ALTER TABLE FABRICANTE AUTO_INCREMENT = 1";
                    realizarConsulta($consulta, "config.php");
                    $modal=true;
                    $idModal="modalBorrar";
                    $tituloModal="BORRAR";
                    $textoModal="Registro borrado.";
                }
            }
            else{
                //Si existe esta duplicado
                $modal=true;
                $idModal="modalBorrar";
                $tituloModal="BORRAR";
                $textoModal="ERROR: ID no valido.";
            }
        }

    ?>
</head>
<body>
    <div class="container">

        <form class="" action="" method="get">
            <div class="row">
                <div class="col col-1">
                    <label for="empresa">Empresa:</label>
                </div>
                <div class="col col-3">
                    <input type="text" name="empresa" id="empresa" class="form-control" placeholder="Nueva empresa" aria-describedby="helpId" />
                </div>
                <div class="col">
                    <button type="submit" name="insertar" class="btn btn-primary">Insertar</button>
                </div>
            </div>
        </form>
        <br /><br />

        <form class="" action="" method="get">
            <div class="row">
                <div class="col col-1">
                    <label for="id">ID:</label>
                </div>
                <div class="col col-3">
                    <select name="id" id="id" class="form-control" required="required">
                        <option value="" selected="selected" disabled="disabled">--Escoge el ID a borrar--</option>
                            <?php
                                $consulta = 'SELECT ID FROM FABRICANTE';
                                $resultset=realizarConsulta($consulta, "config.php");
                                while($fila=$resultset->fetch_assoc()){
                                    echo "<option value='".$fila["ID"]."'>".$fila["ID"]."</option>";
                                }
                            ?>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" name="borrar" class="btn btn-primary">Borrar</button>
                </div>
            </div>
        </form>
        <br /><br />




        <?php
            if($modal){
                generarModal($idModal,$tituloModal,$textoModal);
                pintarModal($idModal);
            }
            $consulta="SELECT * FROM FABRICANTE";
            if($resultset=realizarConsulta($consulta, "config.php")){
                echo str_replace("<table", "<table class='table table-striped'",pintarResulset($resultset));
            }     
        ?>
    </div>
</body>
</html>