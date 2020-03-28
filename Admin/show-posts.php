<?php

/* 
Visar tabell över blogginlägg med länkar för att 
redigera respektive ta bort inlägg (ruta för att avpublicera/publicera
enstaka tillägg ska också läggas till) 
*/

require_once 'db.php';
require_once 'header.php';


$sql = "SELECT * FROM backendprojekt_posts";

$stmt = $db->prepare($sql);
$stmt->execute();

echo "<table class='table'>";
echo "<tr>
        <th>Inläggs-id</th>
        <th>Ämne</th>
        <th>Datum</th>
        <th>Redigera/Ta bort</th>
      </tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): 
  
  $id      = htmlspecialchars( $row['id'] ); 
  $subject = htmlspecialchars( $row['subject'] );
  $date    = htmlspecialchars( $row['date'] );

echo "<tr> 
        <td>$id</td>
        <td>$subject</td>
        <td>$date</td>
        <td><a href='update.php?id=$id' 
        class='btn btn-outline-info'>
        Redigera
      </a>
      <a href='delete.php?id=$id' 
        class='btn btn-outline-danger'>
        Ta bort
      </a></td>
      </tr>"; 

endwhile;

echo '</table>';

require_once 'footer.php';