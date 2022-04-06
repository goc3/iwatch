<?php

/** @var $pdo \PDO */
require_once "../../database.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location index.php");
    exit;
}

$statement = $pdo->prepare('SELECT * FROM movies WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$movie = $statement->fetch(PDO::FETCH_ASSOC);

$errors = [];

$title = $movie['title'];
$description = $movie['description'];
$genre = $movie['genre'];
$year = $movie['year'];
$director = $movie['director'];
$duration = $movie['duration'];
$w_status = $movie['w_status'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    require_once "../../validate_add.php";
    
    if (empty($errors)) {
    
    $statement = $pdo->prepare("UPDATE movies SET title = :title, description = :description, genre = :genre, year = :year, 
                                    director = :director, duration = :duration, w_status = :w_status WHERE id = :id");
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':genre', $genre);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':director', $director);
    $statement->bindValue(':duration', $duration);
    $statement->bindValue(':w_status', $w_status);
    $statement->bindValue(':id', $id);
    $statement->execute();
    header('Location: index.php');
    }
}

?>

<?php include_once "../../views/header.php" ?>

<p>
    <a href="index.php" class="btn btn-secondary">Go back to overview</a>
</p>

    <h1>Update movie <b><?php echo $movie['title']?></b></h1>
<?php include_once "../../views/movies/form.php"?> 
  </body>
</html>