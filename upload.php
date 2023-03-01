<?php
include('connexionformu.php');

if (isset($_POST["envoyer"])) {
    
    $titre = addslashes($_POST["titre"]);
    $categorie = addslashes($_POST["categorie"]);
    // $titre=$_POST["fichier"];
    $messages = addslashes($_POST["messages"]);
    $target_dir = "reserve_image/";
    $target_file = $target_dir . basename($_FILES["fichier"]["name"]);
    @$uploadOk = 1;

    // renomer l'image
    $temp = explode(".", $_FILES["fichier"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $finaldestination = $target_dir . $newfilename;

    if (@$uploadOk == 0) {
        echo "image non enregistré";
    } else {
        if (move_uploaded_file($_FILES["fichier"]["tmp_name"], "" . $finaldestination)) {
            
            $sql = ("INSERT INTO  `formulaires`(titre, categorie, fichier, messages) 
          VALUES('$titre', '$categorie', '$finaldestination', '$messages')");
            if (mysqli_query($conn, $sql)) {
                header('location:index.php');
            } else {
                echo "error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }


}
