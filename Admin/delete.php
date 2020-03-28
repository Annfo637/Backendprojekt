<?php

//Ta bort en rad från databasen med hjälp av inläggets id

require_once 'db.php';

if(isset($_GET['id'])){

  $id = htmlspecialchars($_GET['id']); 

  $sql = "DELETE FROM backendprojekt_posts WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}

//pop-up med bekräfta/avbryt-knappar? Nu kommer man direkt tillbaka till show-posts

header('Location:show-posts.php');