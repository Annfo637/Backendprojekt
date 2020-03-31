<?php

//Startsida för adminfunktionen
//Formulär för att skapa innehåll till bloggsidan

  require_once 'db.php';
  require_once 'header.php';

  if($_SERVER['REQUEST_METHOD'] === 'POST') :
    //print_r($_POST);
    $sql = "INSERT INTO backendprojekt_posts(subject, message, publish, iframe, image)
            VALUES (:subject, :message, :publish, :iframe, :image)";

    $stmt =  $db->prepare($sql);

    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    $publish = htmlspecialchars($_POST['publish']);
    $iframe = ($_POST['iframe']);
    $image = htmlspecialchars($_POST['image']);
   

    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':publish', $publish);
    $stmt->bindParam(':iframe',  $iframe);
    $stmt->bindParam(':image', $image);
  
   
    $stmt->execute();
    header('Location:index.php');
  endif;

  require_once 'header.php';
?>

<h1>Här kan du skapa dina inlägg</h1>

<form action="#" method="POST">
<label for="subject">Ämne</label>
<br>
  <input 
    type="text" 
    id="subject"
    name="subject">
<br>

<label for="message">Skriv ditt inlägg här</label>
<br>
  <textarea 
    name="message" 
    id="message" 
    cols="100" 
    rows="30"
    maxlength="5000">
    </textarea>
<br>
<label for="iframe">Videoklipp/kartor här</label>
<br>
<textarea 
    name="iframe" 
    id="iframe"
    cols="100" 
    rows="5"
    >
    </textarea>

<br>
<br>
<button>
  <a href="upload-form.php">Ladda upp bilder här</a>
</button>
<br>
  <ul></ul>

  
  <br>
  <br>
<h3>Välj om du vill publicera eller avpublicera detta inlägg</h3>
<input 
          type='radio' 
          id='publicerad' 
          name='publish' 
          value='publicerad'
          required="required"
          checked>
          <label for='publicerad'>Publicera</label><br>
        <input 
          type='radio' 
          id='avpublicerad' 
          name='publish' 
          value='avpublicerad'
          required="required">
          <label for='avpublicerad'>Avpublicera</label><br>

<br>
  <input 
    class="btn btn-outline-success"
    type="submit"
    value="Spara">
  
</form>
<br>

<button>
  <a href="index.php">Adminpanelen</a>
</button>

<?php

  require_once 'footer.php'
?>