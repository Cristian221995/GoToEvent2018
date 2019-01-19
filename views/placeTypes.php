<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?=FRONT_ROOT?>Event/store" method="post">
    <?php foreach ($_SESSION["eventData"]["placeTypes"] as $key => $value) { ?>
        <label for="">Nombre: <?=$value?></label><br>
        <label for="">Precio de entrada: </label>
            <input type="text" name="price[]"><br>
        <label for="">Cantidad a vender: </label>
            <input type="text" name="quantity[]"><br><br>
    
     <?php } ?>
    <button type="submit">Crear Evento</button> 
    </form>
</body>
</html>