
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event</title>
</head>
<body>
    <p>Nombre del evento: <?php echo $_SESSION['eventData']['name'] ?></p>
    <p>Categoria: <?php echo $_SESSION['eventData']['category'] ?></p>
    <p>Lugar a realizarse: <?php echo $_SESSION['eventData']['eventPlace'] ?></p>
    <p>Inicio de evento: <?php echo $_SESSION['eventData']['eventDateStart'] ?></p>
    <p>Final de evento: <?php echo $_SESSION['eventData']['eventDateFinish'] ?></p>
    <?php var_dump($_POST); ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
