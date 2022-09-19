<?php

    require("connexion_db.php");

    $erreur = "";
    $username = "";
    $mdp = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = trim($_POST["username"]);
        $mdp = trim($_POST['mdp']);
        
        $query = mysqli_query($conn, "SELECT * FROM utilisateur WHERE nom_utilisateur = '$username' AND mot_de_passe = '$mdp' ");
        
        if(mysqli_num_rows($query) > 0){
            header("location: admin.php");
        } else{    
            $erreur = "Nom d'utilisateur ou mot de passe incorrect";
        }
        
    }
    
    mysqli_close($conn);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="shortcut icon" href="image/images.jpeg" type="image/x-icon"/>
    <link rel="stylesheet" href="style/connexion.css">


</head>
<body>
    <nav class="sidebar close">
       <header>
           <div class="image-text">
                <div class="text header-text">
                    <span class="name"> APPLICATION </span>
                    <span class="profession"> GESTION DE PANNEAU </span>
                </div>
           </div>

           <i class='bx bx-chevron-right toggle'></i>
       </header>

       <div class="menu-bar">
           <div class="menu">
               <ul class="menu-links">
                   <li class="nav-link">
                       <a href="../accueil.php">
                        <i class='bx bx-home icon '><img src="image/page-daccueil.png" alt=""></i>
                        <span class="text nav-text"> Accueil </span>
                       </a>
                   </li>

           <div class="bottom-content">
            <li class="">
                <a href="inscription.php">
                 <i class='bx bx-log-out icon '><img src="image/add-user.png" alt=""></i>
                 <span class="text nav-text"> S'enregistrer </span>
                </a>
            </li>
           </div>
       </div>
    </nav>

    <section>
        <div class="box">
            <div class="container">
                <div class="form">
                    <h2>Connexion</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <span class="erreur"><?php echo $erreur; ?></span>
                    <div class="inputbox">
                        <input type="text" placeholder="Nom d'utilisateur" name="username" required>
                    </div>
                    <div class="inputbox">
                        <input type="password" placeholder="Mot de passe" name="mdp" required>
                    </div>
                    <div class="inputbox">
                        <a href="#">
                            <input type="submit" value="Se connecter">
                        </a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
    <script src="script/script.js" ></script>
</body>
</html>