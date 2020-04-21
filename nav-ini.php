<?php
session_start();

$post_usuario = $_SESSION['username'];

if ($_POST) {
  $post_usuario = $_POST['usuario'];
  $post_pass = $_POST['password'];
  $id_usuario = validateUser($post_usuario, $post_pass);
  if ($id_usuario <> 0) {
    $_SESSION['username'] = $post_usuario;
    header("Location:step1.php");
  } else {
    $label = "Usuario o contraseñas incorrectos";
  }
}

?>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css" />

<center>
  <div class="align-items-center bg-dark">
    <h1 style="color:lightgray;padding:13px;">
      ¡Bienvenido a e-Ticketado!
    </h1>
    <b style="color:white;">Nunca fue tan fácil comprar boletos...</b>
  </div>
</center>
<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
  <?php if ($_SESSION['username']) { ?>
    <b style="color:white;"> <?php echo "Hola, " . $_SESSION['username']; ?> </b>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav">
        <li class=" nav-item">
          <a class="nav-link" href="step1.php">Inicio</a>
        </li>
        <li class=" nav-item">
          <a class="nav-link" href="logout.php">Cerrar sesión</a>
        </li>
        <li class=" nav-item">
          <a class="nav-link" href="tickets.php">Mis tickets</a>
        </li>
      </ul>
    </nav>
  <?php } else { ?>
    <div id=" navb" class="navbar-collapse collapse hide">
      <ul class="navbar-nav">
        <li class=" nav-item">
          <a class="nav-link" href="step1.php">Inicio</a>
        </li>
      </ul>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-sign-in-alt"></span> Iniciar sesión</a>
          </a>
          <div class="dropdown-menu" style="padding: 15px; padding-bottom: 10px;">
            <a class="nav-link" href="#"><span class="fas fa-sign-in-alt"></span> Iniciar sesión</a>
            <form class="form-horizontal" method="post" action="" accept-charset="UTF-8">
              <input class="form-control login" type="text" name="usuario" id="usuario" placeholder="Usuario.."><br>
              <input class="form-control login" type="password" name="password" id="password" placeholder="Contraseña.."><br>
              <input class="btn btn-primary" type="submit" name="submit" value="Iniciar Sesión">
            </form>
          </div>
        </li>
      </ul>
    </div>
  <?php } ?>
</nav>