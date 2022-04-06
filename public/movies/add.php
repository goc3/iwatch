<?php
/** @var $pdo \PDO */
require_once "../../database.php";

$errors = [];

$title = '';
$description = '';
$genre = '';
$year = '';
$director = '';
$duration = '';
$w_status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once "../../validate_add.php";

    if (empty($errors)) {            
    $statement = $pdo->prepare("INSERT INTO movies (title, description, genre, year, director, duration, w_status) 
                    VALUES (:title, :description, :genre, :year, :director, :duration, :w_status)");
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':genre', $genre);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':director', $director);
    $statement->bindValue(':duration', $duration);
    $statement->bindValue(':w_status', $w_status);
    $statement->execute();
    header('Location: index.php');
    }
}

?>
<?php include_once "../../views/header.php" ?>

<p>
    <a href="index.php" class="btn btn-secondary">Go back to overview</a>
</p>

<h1>Add a new movie</h1>
<?php include_once "../../views/movies/form.php"?> 

</body>
</html>