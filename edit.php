<?php
require "dbconnect.php";
$id_Match = $_GET['id'];
$name1 = $_POST['Name1'];
$name2 = $_POST['Name2'];
$goals1 = $_POST['Goals1'];
$goals2 = $_POST['Goals2'];
print_r($_POST);
//$id_Game = $conn->query('SELECT id FROM `Game` WHERE `id` = \'' . $id_Match . '\'')->fetch();
$id_Team1 = $conn->query('SELECT `id` FROM `Team` WHERE `Name` = \'' . $name1 . '\'');
$id1 = $id_Team1->fetch(PDO::FETCH_ASSOC);
$it1 = $id1['id'];
$id_Team2 = $conn->query('SELECT id FROM `Team` WHERE `Name` = \'' . $name2 . '\'');
$id2 = $id_Team2->fetch(PDO::FETCH_ASSOC);
$it2 = $id2['id']; 
$sql = ("UPDATE Game
SET id_team1 = $it1,
id_team2 = $it2,
Goals1 = $goals1,
Goals2 = $goals2
WHERE
    Game.id = $id_Match");
print_r($sql);
$conn->query($sql);
header('Location: ../index.php');