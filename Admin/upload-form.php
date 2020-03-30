<?php
require_once 'header.php';
require_once 'upload-image.php';

//Kontrollera om uppladdning lyckats
if (!empty($success)) {
    echo $success;
}
//Kontrollera eventuella felmeddelanden
if (count($errors) > 0) {
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
<?php
require_once 'footer.php';