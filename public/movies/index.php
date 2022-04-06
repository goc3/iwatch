<?php
/** @var $pdo \PDO */
require_once "../../database.php";


$search = $_GET['search'] ?? '';
if ($search) {
    $statement = $pdo->prepare('SELECT * FROM movies WHERE title LIKE :title ORDER BY title DESC');
    $statement->bindValue(':title', "%$search%");
} 

elseif ($search) {
    $statement = $pdo->prepare('SELECT * FROM movies WHERE genre LIKE :genre ORDER BY genre DESC');
    $statement->bindValue(':genre', "%$search%");
}

else {
    $statement = $pdo->prepare('SELECT * FROM movies ORDER BY title DESC');
}

$statement->execute();
$movies = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body> 

<?php include_once "../../views/header.php" ?>
<div class="header">
    <h1><a href='index.php' class="text-reset"><img src="/../public/reel.png"/></a>iWatch - your personal movie list</h1>
    <h4>Welcome back, Goc3</h4>
</div>
<p>
    <a href="add.php" class="btn btn-success">Add movie</a>
</p>

<form>
    <div class="input-group mb-3" style="width: 450px">
    <input type="text" class="form-control" 
            placeholder="Search your movies" 
            name="search" value="<?php echo $search ?>">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
</div>

</form>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Genre</th>
      <th scope="col">Year</th>
      <th scope="col">Director</th>
      <th scope="col">Duration (minutes)</th>
      <th scope="col">Movie watched</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($movies as $i => $movie): ?>
            <tr>
        <th scope="row"><?php echo $i + 1 ?></th>
        <td><?php echo $movie['title'] ?></td>
        <td><?php echo $movie['genre'] ?></td>
        <td><?php echo $movie['year'] ?></td>
        <td><?php echo $movie['director'] ?></td>
        <td><?php echo $movie['duration'] ?></td>
        <td><?php echo $movie['w_status'] ?></td>
        <td>
            <a href="edit.php?id=<?php echo $movie['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a href>
            <form style="display: inline-block" method="post" action="delete.php"> 
                <input type="hidden" name="id" value="<?php echo $movie['id'] ?>">
                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php include_once "../../views/footer.php" ?>
</body>
</html>
