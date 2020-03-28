<?php

//Startsida för adminfunktionen
//Formulär för att skapa innehåll till bloggsidan

  require_once 'db.php';
  require_once 'header.php';

  if($_SERVER['REQUEST_METHOD'] === 'POST') :
    //print_r($_POST);
    $sql = "INSERT INTO backendprojekt_posts(subject, message)
            VALUES (:subject, :message)";

    $stmt =  $db->prepare($sql);

    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':message', $message);

    $stmt->execute();

  endif;

  require_once 'header.php';
?>

<h1>Här kan du skapa dina inlägg</h1>

<form action="#" method="POST">
<label for="subject">Ämne</label>
<br>
  <input 
    type="text" 
    id="subject"s
    name="subject">
<br>

<label for="message">Skriv ditt inlägg här</label>
<br>
  <textarea 
    name="message" 
    id="message" 
    cols="100" 
    rows="30"
    maxlength="1000">
    </textarea>
<br>

<!-- separat textarea för kartor, videos
<label for="iframe">Lägg till (länk till?) en karta eller video</label>
<br>
<textarea 
    name="iframe" 
    id="iframe" 
    cols="100" ?
    rows="30" ?
    maxlength="1000"> ?
    </textarea>
<br>
-->

<!--ladda upp bilder här-->

  <input 
    type="submit"
    value="Publicera">
  
</form>
<br>

<button>
  <a href="../index.php">Visa min blogg</a>
</button>
<button>
  <a href="adminstart.php">Tillbaka</a>
</button>

<?php
  //header('Location:show-posts.php');
  require_once 'footer.php'
?>