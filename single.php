<?php include("includes/header.php");

  if(isset($_GET['postagem'])) {
    $id = mysqli_real_escape_string($db , $_GET['postagem']);
    $query = "SELECT * FROM postagens WHERE id='$id'";
  }

  $postagens = $db->query($query);

?>

      <br>

        <?php if($postagens->num_rows > 0) {
          while ($row = $postagens->fetch_assoc()) {
        ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['titulo']; ?></h2>
            <p class="blog-post-meta"><?php echo $row['data']; ?> by <a href="#"><?php echo $row['autor']; ?></a></p>

            <?php echo $row['corpo']; ?>

          </div><!-- /.blog-post -->
        <?php } } ?>

          <blockquote>2 Comentários</blockquote>

          <div class="comment-area">

			<form>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nome</label>
			    <input type="text" name="nome" class="form-control" id="exampleInputEmail1" placeholder="Nome">
			  </div>			
			  <div class="form-group">
			    <label for="exampleInputEmail1">Website</label>
			    <input type="text" name="website" class="form-control" id="exampleInputEmail1" placeholder="Website (Opcional)">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Comentário</label>
			    <textarea cols="60" rows="10" name="comentario" class="form-control"></textarea>
			  </div>
			  <button type="submit" name="post_comentario" class="btn btn-primary">Confirmar</button>
			</form>


			<br>
			<br>
			<hr>

			<div class="comment">
				<div class="comment-head">
					<a href="#">Alexandre Estevão</a>
					<img width="50" height="50" src="img/noimg.jpg" />
				</div>
				Este é um comentário de Alexandre Estevão.
			</div>     

			<div class="comment">
				<div class="comment-head">
					<a href="#">Marcia Estevão</a> <button class="btn btn-info btn-xs">Admin</button>
					<img width="50" height="50" src="img/noimg.jpg" />
				</div>
				Este é um comentário de Alexandre Estevão.
			</div> 			

          </div>

        </div><!-- /.blog-main -->

<?php include("includes/sidebar.php");?>
<?php include("includes/footer.php");?>          