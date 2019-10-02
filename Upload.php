<?php

function uploadImage($uploadedfile, $filename){

    include "config.php";
    
    $finalName = $filename . date('d-m-Y-H-i-s');
    if(!file_exists($uploaddir)){
        mkdir($uploaddir);
    }
    if(move_uploaded_file($uploadedfile['tmp_name'], $uploaddir . $finalName)){
        $msg = $finalName . " carregado com sucesso!";
    }else{
        $msg = "Erro no upload.";
    }

    return $msg;
}

?>