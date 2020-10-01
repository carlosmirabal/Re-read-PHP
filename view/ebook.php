<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Website Layout</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Estilos enlazados-->
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script src="../javascript/code.js"></script>
</head>
<body>

<div class="logo">Re-Read</div>
<div class="header">
  <h1>Re-Read</h1>
  <p>En Re-Read podrás encontrar libros de segunda mano en perfecto estado. También vender los tuyos. Porque siempre hay libros leídos y libros por leer. Por eso Re-compramos y Re-vendemos para que nunca te quedes sin ninguno de los dos.</p>
</div>


<div class="row">
  <div class="column left">
    <div class="topnav">
        <a href="../index.php">Re-Read</a>
        <a href="libros.php">Libros</a>
        <a href="ebook.php">eBooks</a>
    </div>

      <h3>Toda la actualidad en eBook</h3>
      
    <div class="form">
      <form action="ebook.php" method="POST">
        <label for="fautor">Autor</label>
        <input type="text" id="fautor" name="fautor" placeholder="Introduce el autor...">
      
        <input type="submit" value="Buscar">
      </form>
    </div>

    <?php 
      if(isset($_POST['fautor'])){
        // filtrará los ebooks que se mostraran en la página
        
      }else {
        // mostrará todos los ebooks de la base de datos
        // 
      }
    ?>

    <?php 
      // 1. Conexión con la base de datos
      include '../services/connection.php';

      // 2. Selección y muestra de datos de la base de datos
      $result1=mysqli_query($conn,"SELECT Books.Description, Books.img, Books.Title From Books");

      if (!empty($result1) && mysqli_num_rows($result1) > 0) {
        // datos de salida de cada fila (fila=row)
        $i=0;
        while ($row = mysqli_fetch_array($result1)) {
          $i=$i+1;
          echo "<div class='ebook'>";
          // Añadimos la imagen a la paginacon la etiqueta img de HTML
          echo "<img src=../img/".$row['img']." alt='".$row['Title']."'>";
          // Añadimos el titulo a la pagina cpn la etiqueta h2 de HTML
          echo "<div class='desc'>".$row['Description']."</div>";
          echo "</div>";
          if ($i % 3 == 0) {
            echo "<div style='clear:both;'></div>";
          }
        }
      }else {
        echo "0 resultados";
      }
    ?>
    <!-- eBooks con descripción  -->
    <!-- <div class="ebook">
     <a href="https://www.casadellibro.com/ebook-y-julia-reto-a-los-dioses-ebook/9788408226086/11303986"> <img src="../img/libro1.jpg" alt="ebook 1"></a>
      <div>Y JULIA RETÓ A LOS DIOSES</div>
    </div> -->


    <!-- <div class="ebook">
      <a href="https://www.casadellibro.com/ebook-las-campanas-de-santiago-ebook/9788401023217/11655287"><img src="../img/libro2.jpg" alt="ebook 2"></a>
      <div>LAS CAMPANAS DE SANTIAGO</div>
    </div>

    <div class="ebook">
      <a href="https://www.casadellibro.com/ebook-memorias-de-idhun-saga-ebook/9788467569889/2284747"><img src="../img/libro3.jpg" alt="ebook 3"></a>
      <div>MEMORIAS DE IDHÚN. SAGA</div>
    </div>
   -->
    <!-- <div class="ebook">
      <a href="https://www.casadellibro.com/ebook-adivina-quien-llama-a-la-puerta-ebook/9788416508082/2666077"><img src="../img/libro4.jpg" alt="ebook 4"></a>
      <div>ADIVINA QUIEN LLAMA A LA PUERTA</div>
    </div> -->
  </div>

  <div class="column right">
    <!-- <h2>Top ventas</h2>
    <p>Cien años de soledad</p>
    <p>Crónica de una muerte anunciada</p>
    <p>El otoño del patriarca</p>
    <p>El general en su laberinto</p> -->
    <?php 
      include '../services/connection.php';
      $result=mysqli_query($conn,"SELECT Books.Description, Books.img, Books.Title From Books WHERE Top='1'");

      if (!empty($result) && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
          echo "<p>".$row['Title']."</p>";
        }
      }else {
        echo "0 resultados";
      }
    ?>
  </div>
</div>
  
</body>
</html>