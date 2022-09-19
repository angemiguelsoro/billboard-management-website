<?php
    require("connexion_db.php");

    if(isset($_GET['delete'])) {
        $sql4 = "SET FOREIGN_KEY_CHECKS=0";
        $sql = "DELETE FROM panneau WHERE NUMPAN='".$_GET["delete"]."'";
        $sql1 = "DELETE FROM appartenir WHERE NUMPAN='".$_GET["delete"]."'";
        $sql5 = "SET FOREIGN_KEY_CHECKS=1"; 

        mysqli_query($conn,$sql4);
        mysqli_query($conn,$sql1);
        mysqli_query($conn,$sql);
        mysqli_query($conn,$sql5);

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des panneaux</title>
    <link rel="shortcut icon" href="image/images.jpeg" type="image/x-icon"/>
    <link rel="stylesheet" href="style/panneau.css">
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
            <table class="tableau">
                <thead>
                    <tr>
                        <th>Numéro du panneau</th>
                        <th>Code de la commune</th>
                        <th>Format du pannneau</th>
                        <th>Type du panneau</th>
                        <th>Site du panneau</th>
                        <th>Image du panneau</th>
                        <th>Etat du panneau</th>
                        <th>Prix unitaire du panneau</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $query = mysqli_query($conn,"select *from panneau");

                        while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
                            echo '<tr><td>' .$row["NUMPAN"]. '</td>';
                            echo '<td>' .$row["CODECOM"]. '</td>';
                            echo '<td>' .$row["FORMATPAN"]. '</td>';
                            echo '<td>' .$row["TYPEPAN"]. '</td>';
                            echo '<td>' .$row["SITEPAN"]. '</td>';
                            echo '<td class="photo"><img src="picture/' .$row["IMAGEPAN"]. '"/></td>';
                            echo '<td>' .$row["ETATPAN"]. '</td>';
                            echo '<td>' .$row["PRIXUNITAIREPAN"]. '</td>';
                            echo '<td><a href="update_panneau.php?update='.$row["NUMPAN"].'" class="btn"><img src="image/bouton-modifier.png"></a></td>';
                            echo '<td><a href="?delete='.$row["NUMPAN"].'" class="btn"><img src="image/supprimer.png"></a></td>';
                            '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
        </div>
    </section>
    <script src="script/script.js" ></script>
</body>
</html>