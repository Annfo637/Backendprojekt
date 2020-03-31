<?php
require_once 'header.php';
require_once 'upload-image.php';

//Kontrollera om uppladdning lyckats
if (!empty($success)) {
    echo $success;
    $img = $file_name;
    //har bilden laddats upp till databas ska nytt formulär visas
    //där man lägger till bilden i sitt inlägg
    $addform =
    "<form action='create.php' method='get'>
        <input type='text' name='image-add' value='$img'>
        <input type='submit' name='submit-img' value='Lägg till bilden i ditt inlägg'>
    </form>
    <br>
    <br>";
}
//Kontrollera eventuella felmeddelanden, använder vi denna???
if (!empty($errors)) {
    echo '<ul>
            <li>' . implode('</li><li>', $errors) . '</li>
        </ul';
}
?>
<form action="upload-form.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Välj bild att ladda upp:</legend>
        <input type="file" name="image" id="image">
        <input type="submit" name="submit" value="Ladda upp">
    </fieldset>
</form>
<br>
<?php 
//rita ut formulär för att lägga till bild till inlägg under
//formulär där man väljer bild
if (!empty($addform)) {
    echo $addform;
}
?>

<button>
  <a href="create.php">Avbryt, tillbaka till skapa inlägg</a>
</button>

<?php
require_once 'footer.php';