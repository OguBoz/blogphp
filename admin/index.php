<?php include './includes/header.php'; ?>
<?php
    // Create db object
    $db = new Database;

    // Create query
    $query = "SELECT posts.*, categories.name FROM posts
              INNER JOIN categories ON posts.category = categories.id
              ORDER BY posts.id DESC";

    // Run query
    $posts = $db->select($query);

    // Query
    $query = "SELECT * FROM categories
                ORDER BY id DESC";

    // Run query
    $categories= $db->select($query);

    if($posts) :
?>
<table class="table table-stripped">
    <tr>
        <th>Post ID#</th>
        <th>Post Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Date</th>
    </tr>
        <?php while($row = $posts->fetch_assoc()) : ?>
    <tr>
        <td><a href="edit_post.php?id=<?php echo $row['id'];?>"><?php echo $row['id'];?></a></td>
        <td><?php echo $row['title'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['author'];?></td>
        <td><?php echo formatDate($row['date']);?></td>
    </tr>
        <?php endwhile;?>
        <?php else : ?>
            <p>No posts</p>
        <?php endif;?>
</table>

<?php if($categories) : ?>

<table class="table table-stripped">
    <tr>
        <th>Category ID#</th>
        <th>Category Name</th>
    </tr>
    <?php while($row = $categories->fetch_assoc()) : ?>
    <tr>
        <td><a href="edit_category.php?id=<?php echo $row['id'];?>"><?php echo $row['id'];?></a></td>
        <td><?php echo $row['name']?></td>
    </tr>
    <?php endwhile;?>
</table>
<?php else : ?>
    <p>No category yet</p>
<?php endif;?>

<?php include './includes/footer.php'; ?>