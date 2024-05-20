<?php
function generarModal($id,$titulo,$contenido){
   echo "<div class='modal fade' id='$id' tabindex='-1' role='dialog' aria-labelledby='mimodal' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'>$titulo</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    $contenido
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Aceptar</button>
                </div>
                </div>
            </div>
        </div>";
}

function pintarModal($id){
    echo '<script>$("#'.$id.'").modal();</script>';
}
?>