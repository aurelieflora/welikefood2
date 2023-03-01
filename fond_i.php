<?php include('final.php'); ?>

<?php
include('connexionformu.php');
$id = (int) $_GET['id'];
$sql = "SELECT * FROM formulaire WHERE id_formulaire='$id'";
$result = mysqli_query($conn, $sql);
// conn(voir si je suis connecté a la base de donnée)
if (mysqli_num_rows($result) > 0) {

  // affiche les données de chaque ligne
  while ($row = mysqli_fetch_assoc($result)) {
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>

      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    <style>
      div.tout {
        position: relative;
      }

      div.image {
        margin-top: 40px;
        margin-left: 60px;
      }

      div.gallery {
        margin-left: 400px;
        border-style: solid;
        border-color: #008518;
        width: 500px;
        height: 400px;
        border-radius: 80px;
        margin-top: 20px;
      }

      div.categorie {
        top: 50px;
        left: 600px;
        color: #008518;
        font-size: 30px;
        /* width: 50px;*/
        height: 80px;
        position: relative;
      }

      div.survol {
        margin-left: 5px;
        margin-bottom: -10px;
        transition: .5s ease;
        opacity: 3;
        color: white;
        vertical-align: text-bottom;
        font-size: 11px;
        text-align: left;
        margin-top: -35px;

      }


      div.nom {
        margin-left: 950px;
        margin-top: -400px;
        padding: 15px;
        font-size: 20px;
        color: #3551EC;
      }

      div.sms {
        margin-left: 950px;
        margin-top: 50px;
        padding: 15px;
        font-size: 15px;
        color: #000000;
        font-size: 20px;
      }

      div.date {
        margin-left: 950px;
        margin-top: 90px;
        padding: 15px;
        font-size: 15px;
        color: #596CE5;
        font-size: 20px;
      }

      .fa-fa-thumbs-o-up {
        width: 60px;
        height: 80 px;
      }

      div.commentaire {
        border-style: solid;
        width: 500px;
        height: 100px;
        border-radius: 30px;
        border-color: darkorchid;
        position: relative;
        float: left;
        margin-top: 200px;
        left: 450px;
      }
    </style>
    </head>

    <body>


      <div class="tout">
        <div class="categorie"><?php echo $row['categorie']; ?></div>

        <div class="gallery">
          <div class="image">
            <a target="_blank" href="" class="amage">
              <img src="<?= $row['fichier']; ?>" alt="" width="400" height="300">
          </div></a>
          <div>

            
            
            <div class="col-sm-2">
              <a href="javascript:void(0)" class="btn btn-info btn-lg">
                <span class=" glyphicon glyphicon-thumb-up" onclick="like_update('<?php echo $row['id_formulaire'] ?>')">
                  <iconify-icon icon="fa-regular:thumbs-up" style="color: blue;margin-left:150px;margin-top:40px;position: relative;"width="36" height="36"></iconify-icon>
                  <div class="toggle" style='border:1px solid #4169E1; width: 40px;height: 40px;border-radius:50%;background-color:#4169E1;margin-top:-40px; margin-left:90px;position: relative;'>
                    (<span id_formulaire="like_loop_<?php echo $row['id_formulaire'] ?>"><?php echo $row['like_count'] ?></span>)
                </span>
              </a>
            
            </div>
            

            <div class= "col-sm-2">
         <a href= "javascript:void(0)" class= "btn btn-info btn-lg">
            <span class=" glyphicon glyphicon-thumb-down" onclick="dislike_update('<?php echo $row['id_formulaire']?>')">
            <iconify-icon icon="fa-regular:thumbs-down" style="color: red;margin-left:290px;margin-top:-30px;position: relative;transform:rotate(-1deg);" width="36" height="36" ></iconify-icon> 
            <div class="toggle" style='border:1px solid red; width: 40px;height: 40px;border-radius:50%;background-color:red;margin-left:350px;margin-top:-50px;position: relative; '> 
            (<span id_formulaire="dislike_loop_<?php echo $row['id_formulaire']?>"><?php echo $row['dislike_count'] ?></span> )</span>
         </a>
         </div>

            
          </div>
        </div>


        <!-- nomimage et autres -->
        <div class="nom"><?php echo $row['titre']; ?></div>
        <div class="sms"><?php echo $row['message']; ?></div>
        <div class="date"><?php echo "Publié le" . '' . '' . '' .  $row['date']; ?></div>

        <!-- commentaire -->
        <div class="commentaire"> </div>

      </div>

  <?php
  }
}

mysqli_close($conn);
  ?>

<script>
        function like_update(id_formulaire) {
            jQuery.ajax({
                url: 'ajax_like.php',
                type: 'post',
                data: 'type=like&id_formulaire=' + id_formulaire,
                success: function(result) {
                    var current_count = jQuery('#like_loop_' + id_formulaire).html();
                    current_count++;
                    jQuery('#like_loop_' + id_formulaire).html(current_count);
                }
            });
        }

        function dislike_update(id_formulaire) {
            jQuery.ajax({
                url: 'ajax_like.php',
                type: 'post',
                data: 'type=dislike&id_formulaire=' + id_formulaire,
                success: function(result) {
                    var current_count = jQuery('#dislike_loop_' + id_formulaire).html();
                    current_count++;
                    jQuery('#dislike_loop_' + id_formulaire).html(current_count);
                }
            });
        }
    </script>

[
    </body>

    </html>