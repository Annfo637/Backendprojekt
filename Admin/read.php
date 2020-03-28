<?php

require_once 'db.php';
    $stmt = $db->prepare("SELECT * FROM backendprojekt_posts ORDER BY date DESC");
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
        $id    = htmlspecialchars($row['id']);
        $subject = htmlspecialchars($row['subject']);
        $message = htmlspecialchars($row['message']);
        $date = htmlspecialchars($row['date']);
    echo 
    "<div>
        <h2>$subject</h2>
        <br>
        <div>
            <p>";
            //infogar endast <br> och inte ny p-tagg...
             echo nl2br($message);
            echo "</p>
        </div>
        <br>
        <p>$date</p>
        <hr>
    </div>";

    endwhile;
