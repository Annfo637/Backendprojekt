<?php

require_once 'db.php';
    $stmt = $db->prepare("SELECT * FROM backendprojekt_posts ORDER BY date DESC");
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
        $id    = htmlspecialchars($row['id']);
        $subject = htmlspecialchars($row['subject']);
        $message = htmlspecialchars($row['message']);
        $date = htmlspecialchars($row['date']);
        $publish = htmlspecialchars($row['publish']);
        $iframe = $row['iframe'];
        $image = htmlspecialchars($row['image']);
        
      if($publish === 'publicerad'){
        echo 
        "<div>
                <h2>$subject</h2>
            <br>
            <div>
                <p>";
                echo str_replace(PHP_EOL, "</p><p>", $message);
                echo "</p>
            </div>
            <br>
                <div>$image</div>
            <br>
                <div>$iframe</div>
            <br>
                 <p>$date</p>
            <hr>
        </div>";
      }

    endwhile;
?>


   