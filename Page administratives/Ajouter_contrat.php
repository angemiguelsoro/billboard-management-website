<?php

    require("connexion_db.php");

    $numcont = "";
    $ok = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $numcont = trim($_POST['numcont']);
        $numpan = trim($_POST['numpan']);
        $Date = date("Y-m-d");
        $facture = trim($_POST['facture']);
        $client = trim($_POST['client']);

        $sql = "INSERT INTO contrat(NUMCONT,NUMFACT,NUMCLI,DATESIGNATURECONT) values('$numcont','$facture','$client','$Date')";
        $sql1 = "INSERT INTO appartenir(NUMCONT,NUMPAN) values('$numcont','$numpan')";
        
        $result = mysqli_query($conn, $sql);
        $result1 = mysqli_query($conn, $sql1);

        $ok = "Enregistrement réussi !!";

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de contrats</title>
    <link rel="shortcut icon" href="image/images.jpeg" type="image/x-icon"/>
    <link rel="stylesheet" href="style/adm_contrat.css">
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
                    <h2>Ajout de contrats</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <span class="sucess"><?php echo $ok; ?></span>
                        <div class="inputbox">
                            <input type="text" placeholder="Numéro du contrat" name="numcont" required>
                        </div>

                        <div class="selectbox">
                            Code de la facture:
                            <?php
                                $sql2 = "SELECT NUMFACT FROM facture" ;
                                $result2 = mysqli_query($conn, $sql2) or die("ERROR");

                                echo "<select class='select' name='facture'>";

                                while($row = mysqli_fetch_array($result2)) {
                                    echo '<option value="'.$row['NUMFACT'].'">'.$row['NUMFACT'].'</option>';
                                }

                                echo "</select><br/>";
                            ?>
                        </div>

                        <div class="selectbox">
                            Code du client:
                            <?php
                                $sql3 = "SELECT NUMCLI FROM client" ;
                                $result3 = mysqli_query($conn, $sql3) or die("ERROR");

                                echo "<select class='select' name='client'>";

                                while($row = mysqli_fetch_array($result3)) {
                                    echo '<option value="'.$row['NUMCLI'].'">'.$row['NUMCLI'].'</option>';
                                }

                                echo "</select><br/>";
                            ?>
                        </div>

                        <div class="selectbox">
                            Numéro du panneau:
                            <?php
                                $sql4 = "SELECT NUMPAN FROM panneau" ;
                                $result4 = mysqli_query($conn, $sql4) or die("ERROR");

                                echo "<select class='select' name='numpan'>";

                                while($row = mysqli_fetch_array($result4)) {
                                    echo '<option value="'.$row['NUMPAN'].'">'.$row['NUMPAN'].'</option>';
                                }

                                echo "</select><br/>";
                                mysqli_close($conn);
                            ?>
                        </div>

                        <div class="inputbox">
                            <input type="submit" value="Ajouter contrat">
                        </div>

                        <div class="inputbox">
                            <a href="contrat.php">
                                <input type="button" value="Liste des contrats">
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