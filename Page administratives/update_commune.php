<?php

    require("connexion_db.php");

    $code = $_GET["update"];

    $sql = "SELECT *FROM commune WHERE CODECOM='$code'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if(isset($_POST) & !empty($_POST)) {

        $code_com = trim($_POST['code_com']);
        $lib_com = trim($_POST['lib_com']);

        $sql3 = "SET FOREIGN_KEY_CHECKS=0";

        $sql2 = "UPDATE commune SET CODECOM='$code_com', LIBELLECOM='$lib_com' WHERE CODECOM='$code'";
        
        $sql4 = "SET FOREIGN_KEY_CHECKS=1";
        
        $result3 = mysqli_query($conn, $sql3);
        $result2 = mysqli_query($conn, $sql2);
        $result4 = mysqli_query($conn, $sql4);
        
        if($result2) {
            header("location: commune.php");
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
    <title>Modification commune</title>
    <link rel="shortcut icon" href="image/images.jpeg" type="image/x-icon"/>
    <link rel="stylesheet" href="style/update_commune.css">


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
                   <li class="nav-link">
                    <a href="Ajouter_client.php">
                     <i class='bx bx-bar-chart-alt-2 icon '><img src="image/client.png" alt=""></i>
                     <span class="text nav-text"> Client </span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="Ajouter_commune.php">
                     <i class='bx bx-bell icon '><img src="image/carte.png" alt=""></i>
                     <span class="text nav-text"> Commune </span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="Ajouter_contrat.php">
                     <i class='bx bx-bar-chart-alt icon '><img src="image/contrat.png" alt=""></i>
                     <span class="text nav-text"> Contrat </span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="Ajouter_facture.php">
                     <i class='bx bx-heart icon '><img src="image/facture-dachat.png" alt=""></i>
                     <span class="text nav-text"> Facture </span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="Ajouter_panneau.php">
                     <i class='bx bx-wallet icon '><img src="image/campagne-publicitaire.png" alt=""></i>
                     <span class="text nav-text"> Panneau </span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="Ajouter_reglement.php">
                     <i class='bx bx-wallet icon '><img src="image/regle.png" alt=""></i>
                     <span class="text nav-text"> Reglement </span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="Ajouter_Type_reglement.php">
                     <i class='bx bx-wallet icon '><img src="image/money.png" alt=""></i>
                     <span class="text nav-text"> Type reglement </span>
                    </a>
                </li>
               </ul>
           </div>

           <div class="bottom-content">
            <li class="">
                <a href="../accueil.php">
                 <i class='bx bx-log-out icon '><img src="image/logout.png" alt=""></i>
                 <span class="text nav-text"> Se déconnecter </span>
                </a>
            </li>
           </div>
       </div>
    </nav>
    
    <section>
        <div class="box">
            <div class="container">
                <div class="form">
                    <h2>Modification commune</h2>
                    <form action="" method="post">
                        <div class="inputbox">
                            <input type="text" placeholder="Identifiant de la commune" name="code_com" value="<?php echo $row["CODECOM"]?>" required>
                        </div>
                        <div class="inputbox">
                            <input type="text" placeholder="Nom de la commune" name="lib_com" value="<?php echo $row["LIBELLECOM"]?>" required>
                        </div>
                        <div class="inputbox">
                            <input type="hidden" name="code_com_origine" value="<?php echo '.$_GET["update"].'?>">
                        </div>
                        <div class="inputbox">
                            <input type="submit" value="Mettre à jour la commune">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="script/script.js" ></script>
</body>
</html>