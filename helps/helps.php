<?php

//validar y limpiar un campo (tipo Post)
function validar_campo($campo){
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);

    return $campo;
}