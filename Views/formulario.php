<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <h2>Nueva entrada</h2>

    <form action="../Controller/transacciones.php" method="POST" enctype="multipart/form-data" name="form">
    <div class="item_group">
    <input type="text" name="titulo" id="campo_titulo" placeholder="Titulo">
    </div>

    <div class="item_group">
    <textarea name="area_comentario" id="" cols="30" rows="10" placeholder="Texto"></textarea>
    </div>
    <input type="hidden" name="MAX_TAM" value="2097152">
    <p>Seleccione una imagen con tamaño inferior a 2mb</p>
    <div class="item_group">
    <input type="file" value="imagen" name="imagen" id="imagen">
    </div>
    <input type="submit" value="Enviar" name="btn_enviar">
    </form>
    <a href="mostrar_blog.php">Pagina de visualización del blog</a>
</body>
</html>