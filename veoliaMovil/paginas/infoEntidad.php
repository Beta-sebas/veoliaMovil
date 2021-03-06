<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Información Entidades</title>
    <link rel="stylesheet" href="../css/infoEntidad.css" />
    <link rel="stylesheet" href="../css/navegacion.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Mulish&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!--<link rel="shortcut icon" type="image/x-icon" href="imagenes\favicon.ico">-->
    <!-- <link rel="shortcut icon" href="http://www.wikipedia.org/favicon.ico" /> -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
    />
  </head>
  <body>
    <!-- -------------    Menu Navegación para todas las páginas -----------   -->
    <div class="menu_lateral" id="menu_lateral">
      <div class="contenedorBotonCerrar">
        <p class="botonCerrar"><i class="fa fa-close" id="botonCerrar"></i></p>
      </div>
      <div class="contenedorInformacionUsuario">
        <p class="tituloMenu">Menú de Opciones</p>
        <p class="tituloUsuario" id="tituloUsuario"></p>
        <i class="fa fa-user-circle-o"></i>
      </div>
      <div class="menuOpciones">
                <ul>
                    <li> <a href="home.html"> <div class="Icono home"><i class="fa fa-home"></i></div> <div class="Texto">Inicio</div> </a> </li>
                    <li> <a href="consultarTablas.html"> <div class="Icono"><i class="fa fa-window-restore"></i></div> <div class="Texto">Consultar Tablas de Datos</div> </a> </li>
                    <li id="ocultar"> <a href="EntidadesAso.html"> <div class="Icono"><i class="fa fa-vcard"></i></div> <div class="Texto">Información de Entidades</div></a> </li>
                    <li> <a  id="cerrar"> <div class="Icono"><i class="fa fa-power-off"></i></div> <div class="Texto">Cerrar Sesión</div></a> </li>
                </ul>
            </div>
    </div>

    <div class="barraSuperior">
      <div class="btn_menu" id="botonAbrir">
        <i class="fa fa-bars"></i>
      </div>
      <div class="contenedorLogo">
        <img class="logo" src="../assets/veolialogo1.png" alt="Imagen veolia" />
      </div>
    </div>
    <!-- -------------------   FIN menu navegacion------------------------------ -->



    <div class="contenedorPrincipal">
      <div class="tituloPagina">
        <h2 class="titulo1">Datos de:</h2>
        <h2 class="titulo2"><?php echo $_GET['nombreEmpresa'] ?></h2>
      </div>

      <?php

      //Conexión
      include ("../php/conexion.php");
      $mysqli = new mysqli($host, $user, $pw, $db);
      $nombre = $_GET['nombreEmpresa'];
      $nombre=strval($nombre) ;
      
      //Sentencia
      $sql = "SELECT DIRECCION, TELEFONO, MUNICIPIO, DEPARTAMENTO, NIT FROM empresas WHERE NOMBRE ='$nombre' ";


      

      //Comunicación con la BD
      $result1 = $mysqli->query($sql);
      
      
      $numero_filas = $result1->num_rows;
    
      $filaActual = $result1->fetch_array(MYSQLI_NUM);
      ?>

      

      <div class="contenedorInformacion">
        <div class="contenedorDato">
          <h3 class="tituloDato">Nombre:</h3>
          <h3 class="dato"> <?php echo $_GET['nombreEmpresa']?> </h3>
        </div>
        <div class="contenedorDato">
            <h3 class="tituloDato">Dirección:</h3>
            <h3 class="dato"><?php echo $filaActual[0]?> </h3>
        </div>
        <div class="contenedorDato">
            <h3 class="tituloDato">Telefono:</h3>
            <h3 class="dato"><?php echo $filaActual[1]?> </h3>
        </div>
        <div class="contenedorDato">
            <h3 class="tituloDato">Departamento:</h3>
            <h3 class="dato"><?php echo $filaActual[3]?> </h3>
        </div>
        <div class="contenedorDato">
            <h3 class="tituloDato">Municipio:</h3>
            <h3 class="dato"><?php echo $filaActual[2]?></h3>
        </div>
        <div class="contenedorDato">
            <h3 class="tituloDato">NIT:</h3>
            <h3 class="dato"><?php echo $filaActual[4]?></h3>
        </div>          

        <div class="contenedorIconoEntidad">
            <i class="fa fa-building"></i>
        </div>
        
      </div>
      
    </div>
  </body>
  <script src="../js/navegacion.js" charset="utf-8"></script>
  <script src="../js/verificarRol.js" charset="utf-8"></script>
  <script src="../js/cerrarSesion.js" charset="utf-8"></script>
</html>
