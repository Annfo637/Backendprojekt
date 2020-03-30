<?php
//1. Visa formulär med det specifika inlägget som ska uppdateras
//2. Uppdatera databasen med det uppdaterade inlägget

  require_once 'header.php';
  
  require_once 'db.php';

//med hjälp av id - hämta inlägget

  if(isset($_GET['id'])){
    $id = htmlspecialchars($_GET['id']);
    $sql = "SELECT * FROM backendprojekt_posts Where id = :id";
    $stmt = $db->prepare($sql);
    $stmt ->bindParam(':id', $id);
    $stmt -> execute();
  
    if($stmt->rowCount() > 0){ 
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $subject = $row['subject'];
      $message = $row['message'];
      $publish = $row['publish'];
 
    } else {
      header('Location:show-posts.php');
      exit;
    }
    
  }else {
    header('Location:show-posts.php');
    exit;
  }

//uppdatera databasen med de nya från formuläret

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
  $subject = ($_POST['subject']);
  $message = ($_POST['message']);
  $publish = ($_POST['publish']);
 
  

  $sql = "UPDATE backendprojekt_posts
          SET subject = :subject, message= :message, publish= :publish
          WHERE id = :id";

  $stmt = $db->prepare($sql);
  $stmt->bindParam(':subject', $subject);
  $stmt->bindParam(':message', $message);
  $stmt->bindParam(':publish', $publish);
  $stmt->bindParam(':id', $id);

  $stmt->execute();
  header('Location:show-posts.php');
  exit;
}
?>


<h2>Här uppdaterar du ditt inlägg</h2>

<form action="#" method="POST">
<label for="subject">Ämne</label>
<br>
  <input 
    type="text" 
    id="subject"
    name="subject"
    value="<?php echo $subject ?>">
<br>

<label for="message">Uppdatera ditt inlägg här</label>
<br>
  <textarea 
    name="message" 
    id="message" 
    cols="100" 
    rows="30"
    maxlength="1000">
    <?php echo $message?>
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
 
<br>
<p>Detta inlägg har status: <?php echo $publish ?>.</p>

<h3>Välj om du vill publicera eller avpublicera detta inlägg</h3>
    <input 
        type='radio' 
        id='publicerad' 
        name='publish' 
        value='publicerad'
        required="required">
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
    value="Uppdatera">
<br>
<br>
</form>
<button>
  <a href="show-posts.php">Redigera/radera mina inlägg</a>
</button>
<button>
  <a href="index.php">Adminpanelen</a>
</button>
<button>
  <a href="../index.php">Visa min blogg</a>
</button>

<?php
require_once 'footer.php';
?>