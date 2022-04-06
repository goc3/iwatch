<?php

$mysqli = mysqli_connect('localhost', 'root', '', 'movies');

$columns = array('Title','Genre','Year', 'Director', 'Duration (minutes)', 'Movie watched');
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

if ($result = $mysqli->query('SELECT * FROM movies ORDER BY ' .  $column . ' ' . $sort_order)) {
}

$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
$add_class = ' class="highlight"';
?>