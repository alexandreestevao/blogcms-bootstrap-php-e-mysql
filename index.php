<?php include("includes/header.php");

  if(isset($_GET['categoria'])) {
    $categoria = mysqli_real_escape_string($db , $_GET['categoria']);
    $query = "SELECT * FROM postagens WHERE categoria='$categoria'";
  }else {
    $query = "SELECT * FROM postagens";
  }

  $postagens = $db->query($query);

?>

      <div class="blog-header">
        <h1 class="blog-title">BlogCMS</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
      </div>        
        <?php if($postagens->num_rows > 0) {
          while ($row = $postagens->fetch_assoc()) {
        ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><a href="single.php?postagem=<?php echo $row['id'] ?>"><?php echo $row['titulo']; ?></a></h2>
            <p class="blog-post-meta"><?php echo $row['data']; ?> by <a href="#"><?php echo $row['autor']; ?></a></p>

            <?php 
              $corpo = $row['corpo']; 
              echo substr($corpo, 0 , 400) . "...";
            ?>

            <a href="<?php echo $row['id'] ?>" class="btn btn-primary">Leia Mais</a>
          </div><!-- /.blog-post -->
        <?php } } ?>
        </div><!-- /.blog-main -->

<?php include("includes/sidebar.php");?>
<?php include("includes/footer.php");?>