<?php

    require("connexion_db.php");

    $numpan = "";
    $formatpan = "";
    $typepan = "";
    $sitepan = "";
    $etatpan = "";
    $prixpan = "";
    $imagepan = "";
    $ok = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $numpan = trim($_POST['numpan']);
        $formatpan = trim($_POST['formatpan']);
        $typepan = trim($_POST['typepan']);
        $sitepan = trim($_POST['sitepan']);
        $etatpan = trim($_POST['etatpan']);
        $prixpan = trim($_POST['prixpan']);
        $commune = trim($_POST['commune']);

        $imagepan = $_FILES['imagepan']['name'];
        $upload = "picture/".$imagepan;

        move_uploaded_file($_FILES['imagepan']['tmp_name'],$upload);

        $sql = "INSERT INTO panneau(NUMPAN,CODECOM,FORMATPAN,TYPEPAN,SITEPAN,IMAGEPAN,ETATPAN,PRIXUNITAIREPAN) values('$numpan','$commune','$formatpan','$typepan','$sitepan','$imagepan','$etatpan','$prixpan')";
        
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
    <title>Ajout de panneaux</title>
    <link rel="shortcut icon" href="image/images.jpeg" type="image/x-icon"/>
    <link rel="stylesheet" href="style/adm_panneau.css">
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
                    <h2>Ajout de panneaux</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <span class="sucess"><?php echo $ok; ?></span>
                        <div class="inputbox">
                            <input type="text" placeholder="Numéro du panneau" name="numpan" required>
                        </div>

                        <div class="inputbox">
                            <input type="text" placeholder="Format du panneau" name="formatpan" required>
                        </div>

                        <div class="inputbox">
                            <input type="text" placeholder="Type du panneau" name="typepan" required>
                        </div>

                        <div class="inputbox">
                            <input type="text" placeholder="Site du panneau" name="sitepan" required>
                        </div>

                        <div class="inputbox">
                            <input type="text" placeholder="Etat du panneau" name="etatpan" required>
                        </div>

                        <div class="inputbox">
                            <input type="text" placeholder="Prix unitaire" name="prixpan" required>
                        </div>

                        <div class="img">
                            <input type="file" name="imagepan" required>
                        </div>

                        <div class="selectbox">
                            Code de la commune:
                            <?php
                                $sql2 = "SELECT CODECOM FROM commune" ;
                                $result2 = mysqli_query($conn, $sql2) or die("ERROR");

                                echo "<select name='commune'>";

                                while($row = mysqli_fetch_array($result2)) {
                                    echo '<option value="'.$row['CODECOM'].'">'.$row['CODECOM'].'</option>';
                                }

                                echo "</select><br/>";

                                mysqli_close($conn);
                            ?>
                        </div>

                        <div class="inputbox">
                            <input type="submit" value="Ajouter panneau">
                        </div>

                        <div class="inputbox">
                            <a href="panneau.php">
                                <input type="button" value="Liste des panneaux">
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