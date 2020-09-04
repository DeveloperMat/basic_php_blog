<?php

include_once('../Model/objeto_blog.php');
include_once('../Model/manejo_objetos.php');

  try {

    $conexion = new PDO('mysql:host=localhost;dbname=bd_blog','root','');
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


if ($_FILES['imagen']['error']) {
    switch ($_FILES['imagen']['error']) {
        case 1: //Error exceso de tamaño de archivo en php.ini
            echo 'El tamaño del archivo excede lo permitido por el sevidor';
            break;
        case 2: //Error tamaño archivo marcado desde formulario
            echo "El tamaño del archivo excede 2MB";
            break;
        case 3: //Corrupción de archivo
            echo "El envio de archivo se interrumpió";
            break;
        case 4: //No se ha subido ningún archivo
            echo "No se ha enviado ningún archivo";
            break;
    }
} else {

    echo "Entrada subida correctamente <br>";
    if (isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error']) == UPLOAD_ERR_OK) {

        $destino_de_ruta = "../imagenes/";
        //Mover el archivo del directorio temporal a imagenes
        move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_de_ruta . $_FILES['imagen']['name']);

        echo "El archivo" . $_FILES['imagen']['name'] . " se ha copiado en el directorio de imágenes";

    } else {
        echo "el archivo no se ha podido copiar al directorio de imágenes";
    }
}

    $manejo_objeto = new Manejo_Objetos($conexion);

    $blog = new Objeto_Blog();

    $blog->setTitulo(htmlentities(addslashes(($_POST["titulo"])),ENT_QUOTES));
    
    $blog->setFecha(date("Y-m-d H:i:s"));
    
    $blog->setComentario(htmlentities(addslashes(($_POST["area_comentario"])),ENT_QUOTES));
    
    $blog->setImagen($_FILES['imagen']['name']);

    $manejo_objeto->insertaContenido($blog);

    echo '<br> Entrada de blog agregada con éxito <br>';




}catch (Exception $exc){

    echo "<br>Error en la linea " .  $exc->getMessage();

}
