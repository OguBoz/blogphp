<?php include './includes/header.php'; ?>
<?php 
    // Create DB Object
    $db = new Database;

    if(isset($_POST['submit'])) {
        // Get id of post
        $name = mysqli_real_escape_string($db->link, $_POST['name']);

         // Validate data
         if($name == '') {
             $error = 'Fill out all the fields please!';
         } else {
             // Query
             $query = "INSERT INTO categories(name) VALUES('$name')";
     
             // Run query
             $insert_res = $db->insert($query);
         }
    }
?>

<form method="post" action="add_category.php" role="form">
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" class="form-control" placeholder="Enter category name..." name="name">
  </div>
  <input type="submit" value="Create" class="btn btn-primary" name="submit">
</form>
<br>
<?php include './includes/footer.php'; ?>
