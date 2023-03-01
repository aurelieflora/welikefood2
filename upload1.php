<?php
include('connect.php');

if (isset($_POST["enregistrer"])) {
    
    $nom = addslashes($_POST["nom"]);
    $prenoms = addslashes($_POST["Prenoms"]);
    $email = addslashes($_POST["email"]);
    $motDepasse = addslashes($_POST["motDepasse"]);
    $pays = addslashes($_POST["pays"]);
    $contact = addslashes($_POST["contact"]);
    $roles = addslashes($_POST["roles"]);



    
            
            $sql = ("INSERT INTO  `users`(nom, prenoms, email, motDepasse, pays, contact, roles) 
          VALUES('$nom', '$prenoms', '$email', '$motDepasse', '$pays', '$contact', '$roles')");
            if (mysqli_query($conn, $sql)) {
                header('location:compte.php');
            } else {
                echo "error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        
    }

 