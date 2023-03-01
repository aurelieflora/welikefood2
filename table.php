
<?php
include "connexionformu.php";
// sql to create table
$sql = "CREATE TABLE formul (
    id_formulaire INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) ,
    categorie VARCHAR(50) ,
    fichier VARCHAR(100) ,
    messages VARCHAR(500) ,
    commentaire VARCHAR(500) ,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,    
    like_count int(11) NOT NULL  
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table formulaire created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>