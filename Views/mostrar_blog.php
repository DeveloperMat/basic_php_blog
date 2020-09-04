<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include_once("../Model/manejo_objetos.php");
    include_once("../Model/objeto_blog.php");

    try {

        $conexion = new PDO('mysql:host=localhost;dbname=bd_blog', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $manejo_objetos = new Manejo_Objetos($conexion);

        $tabla_blog = $manejo_objetos->getContenidoPorFecha();

        if(empty($tabla_blog)){
            echo "No hay enradas de blog aún";
        }else {
            foreach($tabla_blog as $valor){

                echo "<h3>" . $valor->getTitulo() . "</h3>";
                echo "<h4>" . $valor->getFecha() . "</h4>";

                echo "<div style='width:400px'>";
                echo $valor->getComentario() . "</div>";
                
                if($valor->getImagen()!= ""){
                    echo "<img src='../imagenes/";
                    echo $valor->getImagen() . "' width='300px' height='200px'/>";
                }
                echo "<hr>";

            }
        }
       

    } catch (Exception $exc) {


        die('Error' . $exc->getMessage());
    }
    ?>
    <br>

    <a href="formulario.php">Volver a la pagina de inserción</a>

</body>

</html>