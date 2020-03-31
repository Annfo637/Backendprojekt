<?php
$imgArray = array(); //testat att deklarera bildarrayen längst ut
if (isset($_POST['submit'])) {
    $max_file_size = 1048576;
    $file_types = array('gif', 'jpg', 'jpeg', 'png');
   //mapp där bilder ska sparas
    $target_dir = realpath(dirname(__FILE__)) . '/images/';
    $errors = array();
    //$imgArray = array(); //Tömmer denna arrayen för varje POST?
    
    //bildinformation
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_uniq = uniqid();
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $file = $target_dir . $file_uniq . '.' . $file_ext;
    //$file = $target_dir . $file_name;

    //Kontrollera att fil har laddats upp
    if (!is_uploaded_file($file_tmp)) {
        $errors [] = 'Ingen fil har valts.';
    }
    //Kontrollerar om filen inte är en bild
    if (!getimagesize($file_tmp)) {
        $errors [] = 'Filen är inte en bild.';
    }
    //Kontrollerar att filen inte är för stor
    if ($file_size > $max_file_size) {
        $errors [] = 'Filen får vara max 1 MB stor.';
    }
    //Kontrollerar godkänd filtyp
    if (!in_array($file_ext, $file_types)) {
        $errors [] = 'Filen måste vara av typen JPG, JPEG, PNG eller GIF.';
    }
    //Kontrollerar om filen redan existerar
    if (file_exists($file)) {
        $errors [] = 'Filen existerar redan.';
    }
    //Kontrollerar om fel uppstått 
    if (count($errors) == 0){
        //Kontrollera om filen sparats i angiven mapp
        if (move_uploaded_file($file_tmp, $file)) {
            $success = 'Filen har laddats upp.';
            $imgArray [] .= $file_name;
            //echo $file_name;
            print_r($imgArray);
        }
        else {
            $errors [] = 'Ett fel inträffade vid uppladdning av bilden.';
        }
    }
}
//$imgArray = array();
//$imgArray [] = $image;
//print_r($imgArray);
?>