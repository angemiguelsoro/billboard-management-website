<?php

    require("connexion_db.php");

    $numcli = "";
    $raisonsocialecli = "";
    $telcli = "";
    $adressepostalecli = "";
    $emailcli = "";
    $ok = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $numcli = trim($_POST['numcli']);
        $raisonsocialecli = trim($_POST['raisonsocialecli']);
        $telcli = trim($_POST['telcli']);
        $adressepostalecli = trim($_POST['adressepostalecli']);
        $emailcli = trim($_POST['emailcli']);
        $commune = trim($_POST['commune']);

        $sql = "INSERT INTO client(NUMCLI,CODECOM,RAISONSOCIALECLI,TELCLI,ADRESSEPOSTALECLI,EMAILCLI) values('$numcli','$commune','$raisonsocialecli','$telcli','$adressepostalecli','$emailcli')";
        
        $result = mysqli_query($conn, $sql);

        $ok = "Enregistrement réussi !!";

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de client</title>
    <link rel="shortcut icon" href="image/images.jpeg" type="image/x-icon"/>
    <link rel="stylesheet" href="style/adm_client.css">
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
                    <h2>Ajout de client</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <span class="sucess"><?php echo $ok; ?></span>
                        <div class="inputbox">
                            <input type="text" placeholder="Numéro du client" name="numcli" required>
                        </div>

                        <div class="inputbox">
                            <input type="text" placeholder="Raison sociale du client" name="raisonsocialecli" required>
                        </div>

                        <div class="inputbox">
                            <input type="text" placeholder="Telephone du client" name="telcli" required>
                        </div>

                        <div class="inputbox">
                            <input type="text" placeholder="Adresse postale du client" name="adressepostalecli" required>
                        </div>

                        <div class="inputbox">
                            <input type="email" placeholder="Email du client" name="emailcli" required>
                        </div>

                        <div class="selectbox">
                            Code de la commune:
                            <?php
                                $sql2 = "SELECT CODECOM FROM commune" ;
                                $result2 = mysqli_query($conn, $sql2) or die("ERROR");

                                echo "<select class='select' name='commune'>";

                                while($row = mysqli_fetch_array($result2)) {
                                    echo '<option value="'.$row['CODECOM'].'">'.$row['CODECOM'].'</option>';
                                }

                                echo "</select><br/>";

                                mysqli_close($conn);
                            ?>
                        </div>

                        <div class="inputbox">
                            <input type="submit" value="Ajouter client">
                        </div>

                        <div class="inputbox">
                            <a href="client.php">
                                <input type="button" value="Liste des clients">
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