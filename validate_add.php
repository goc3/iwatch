<?php

    $title = $_POST['title'];
    $description = $_POST['description'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $director = $_POST['director'];
    $duration = $_POST['duration'];
    $w_status = $_POST['w_status'];

    if (!$title) {
        $errors[] = 'Movie title is required.';
    }
    if (!$genre) {
        $errors[] = 'Movie genre is required.';
    }
    if (!$w_status) {
        $errors[] = 'Watch status is required.';
    }
    if (empty($errors)) {
    }