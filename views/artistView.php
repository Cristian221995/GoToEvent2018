<!DOCTYPE html>

<html>
  <head>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="../css/login.css">
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading">Artist Form</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Agregar Artista</h2>
   <p>Please enter the Artist name</p>
   </div>
    <form id="Login" action="../Artist/store" method="POST">

        <div class="form-group">

            <input type="name" name="name" class="form-control" id="inputEmail" placeholder="Artist name">

        </div>

        <div class="form-group">

        </div>
        <div class="forgot">
</div>
        <button type="submit" class="button">Agregar</button>

    </form>
    </div>
<p class="botto-text"> Designed by fontua.</p>
</div></div></div>

</body>
</html>
