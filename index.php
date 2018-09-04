<?php
include 'vigenere.php';
$mensaje="";
$clave="";
if(isset($_POST['mensaje']))
{
  $mensaje = $_POST['mensaje'];
}

if(isset($_POST['semilla'])) $clave = $_POST['semilla'];
if(isset($_POST['tarea'])) $tarea = $_POST['tarea'];
$resultado    = "";
if($_POST && $mensaje != "" && $clave != ""){
  if($_POST['tarea'] == "Cifrar"){ $cipher    = new Vigenere($mensaje, $clave); $resultado = $cipher->cifrar();
  }
  if($_POST['tarea'] == "Descifrar"){
    $cipher    = new Vigenere($mensaje, $clave);
    $resultado = $cipher->descifrar();
  }
}
?>


<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Tammudu|Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="index.css">
  <title>Tarea SED</title>
</head>
<body style="background-color:powderblue;">
  <center>

    <header>
      <h1 class="baloo">Vigenere</h1>
    </header>


    <div class="container">
      <form method="post">
        <div class="form-group">
          <label for="Llave">
            <strong>Mensaje</strong>
          </label>
          <textarea name="mensaje" style="width:300px;border:1px solid #222" class="form-control"><?=$mensaje?></textarea>
        </div>

        <div class="form-group">
          <label for="Llave">
            <strong>Llave</strong>
          </label>
          <input type="text" name="semilla" style="width:150px;border:1px solid #555" value="<?=$clave?>"  class="form-control"/>
        </div>
        <div class="form-group">
          <input type="submit" name="tarea" value="Cifrar" class="btn btn-primary"/>
        </div>
        <div class="form-group">
          <input type="submit" name="tarea" value="Descifrar" class="btn btn-success"/>
        </div>
      </form>
    </div>

    <div class="container roboto">
      <p>
        <?php
        if($resultado != ""){
          echo "Texto Cifrado:\n";
          echo "
          <div class='mensaje'>" . $resultado . "</div>

          ";
        }
        ?>
      </p>
    </div>


    <h1>Bryan Salvador Marroquín Aldana</h1>
    <h1>Carlos Roberto Magaña</h1>

  </center>
</body>
</html>
