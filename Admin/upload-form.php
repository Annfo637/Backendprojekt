<?php
require_once 'header.php';
require_once 'upload-image.php';

//Kontrollera om uppladdning lyckats
if (!empty($success)) {
    echo $success;
}
//Kontrollera eventuella felmeddelanden
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
        <input type="submit" value="Ladda upp" name="submit">
    </fieldset>
</form>
<br>
<?php 
    if (!empty($imgArray)) {
        echo '<ul>
                <li>' . implode('</li><li>', $imgArray) . '</li>
            </ul';
}
?>
<br>
<br>
<button>
  <a href="create.php">Tillbaka till skapa inlägg</a>
</button>

<?php
require_once 'footer.php';