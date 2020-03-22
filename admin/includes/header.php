<?php include '../config/config.php'; ?>
<?php include '../classes/Database.php'; ?>
<?php include '../helpers/format_helper.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/custom.css" rel="stylesheet">
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Dashboard</a>
          <a class="blog-nav-item" href="add_post.php">Add Post</a>
          <a class="blog-nav-item" href="add_category.php">Add Category</a>
          <a class="blog-nav-item pull-right" href="http://localhost/bloglovers">Visit Site</a>

        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
		<div class="logo"><img src="../images/logo.png" /></div>
        <h1 class="blog-title">PHP Lovers Blog</h1>
        <p class="lead blog-description">PHP News, tutorials, videos & more</p>
      </div>

      <div class="row">

        <div class="col-sm-12 blog-main">
            <?php if(isset($_GET['msg'])) {
                echo "<div class='alert alert-success'>" . htmlentities($_GET['msg']) . "</div>";
            }  ?>