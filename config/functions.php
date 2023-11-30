<?php

function getFolderProyect()
{
    if (strpos(__DIR__, "/") !== false) {
        $folder = str_replace('/otp/lampp/htdocs/', '', __DIR__);
    } else {
        $folder = str_replace('C:\\xampp\\htdocs\\', '/', __DIR__);
        $folder = str_replace('\\', '/', $folder); // Convert backslashes to forward slashes
    }

    $folder = str_replace('/config', '', $folder); // Remove the /config part
    return $folder;
}

function saveImage($file){
    $imageName = str_replace(' ', '', $file['imagen']['name']);
    $imgTmp= $file['imagen']['tmp_name'];
    
    move_uploaded_file($imgTmp, $_SERVER['DOCUMENT_ROOT'].getFolderProyect().'/images/'.$imageName);
    return  $imageName;


}


?>