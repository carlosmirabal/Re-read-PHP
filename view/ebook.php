<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Website Layout</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Estilos enlazados-->
<link rel="stylesheet" href="../css/style.css" type="text/css">
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
    <?php 
      // 1. Conexión con la base de datos
      include '../services/connection.php';

      // 2. Selección y muestra de datos de la base de datos
      $result=mysqli_query($conn,"SELECT Books.Description, Books.img, Books.Title From Books");

      if (!empty($result) && mysqli_num_rows($result) > 0) {
        // datos de salida de cada fila (fila=row)
        while ($row = mysqli_fetch_array($result)) {
          echo "<div class='ebook'>";
          // Añadimos la imagen a la paginacon la etiqueta img de HTML
          echo "<img src=../img/".$row['img']." alt='".$row['Title']."'>";
          // Añadimos el titulo a la pagina cpn la etiqueta h2 de HTML
          // echo "<div class='desc'".$row['Title']."</div>;
          echo "</div>"; 
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
    <h2>Top ventas</h2>
    <p>Cien años de soledad</p>
    <p>Crónica de una muerte anunciada</p>
    <p>El otoño del patriarca</p>
    <p>El general en su laberinto</p>
  </div>
</div>
  
</body>
</html>