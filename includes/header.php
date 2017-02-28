<?php

	include("includes/config.php");
	include("includes/db.php");

  $query = "SELECT * FROM categorias";
  $categorias = $db->query($query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BlogCMS</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">

  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <?php if(isset($_GET['categoria'])) { ?>
          <a class="blog-nav-item" href="index.php">Home</a>
          <?php }else { ?>
          <a class="blog-nav-item active" href="index.php">Home</a>
          <?php } ?>

          <?php 
          if($categorias->num_rows > 0) {
            while ($row = $categorias->fetch_assoc()) {
              if(isset($_GET['categoria']) && $row['id'] == $_GET['categoria']) { ?>
          <a class="blog-nav-item active" href="index.php?categoria=<?php echo $row['id']; ?>"><?php echo $row['texto']?></a>

          <?php }else echo "<a class='blog-nav-item' href='index.php?categoria=$row[id]'>$row[texto]</a>";

            } 
          } ?>
        </nav>
      </div>
    </div>

    <div class="container">



      <div class="row">

        <div class="col-sm-8 blog-main">