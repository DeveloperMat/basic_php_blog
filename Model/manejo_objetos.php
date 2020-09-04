<?php 

include_once('objeto_blog.php');

class Manejo_Objetos {

    private $conexion;

    public function __construct($conexion){
        
        $this->setConexion($conexion);


    }

    public function setConexion(PDO $conexion){
        
        $this->conexion=$conexion;

    }

    public function getContenidoPorFecha(){

        $matriz = array();
        $contador = 0;
         
        $resultado =$this->conexion->query("SELECT * FROM contenido ORDER BY fecha");

        while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){

            $blog = new Objeto_Blog();
            
            $blog->setId($registro['id']);
            $blog->setTitulo($registro['titulo']);
            $blog->setFecha($registro['fecha']);
            $blog->setComentario($registro['comentario']);
            $blog->setImagen($registro['imagen']);

            //Guardar lo que hay en blog en la matríz en la pocisión 0;
            $matriz[$contador] = $blog;

            $contador++;
        }
        return $matriz;

    }

    public function insertaContenido(Objeto_Blog $blog){

        $sql = "INSERT INTO contenido (titulo,fecha,comentario,imagen) VALUES ('" . $blog->getTitulo() . "','" . $blog->getFecha() . "', '" . $blog->getComentario() . "', '" . $blog->getImagen() . "')";

        $this->conexion->exec($sql);

    }






















}