<?php

function uploadImage($uploadedfile, $filename){
    $uploaddir = "/home/helison/projetos/ado-imageupload/uploads/";
    $finalName = $filename . date('d-m-Y-H-i-s');

    if(move_uploaded_file($uploadedfile['tmp_name'], $uploaddir . $finalName)){
        $msg = $finalName . " carregado com sucesso!";
    }else{
        $msg = "Erro no upload.";
    }

    return $msg;
}

?>