<?php

    require("connexion_db.php");

    $code = $_GET["update"];

    $sql = "SELECT *FROM panneau WHERE NUMPAN='$code'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if(isset($_POST) & !empty($_POST)) {

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

        $sql3 = "SET FOREIGN_KEY_CHECKS=0";

        $sql1 = "UPDATE panneau SET NUMPAN='$numpan', CODECOM='$commune', FORMATPAN='$formatpan', TYPEPAN='$typepan', SITEPAN='$sitepan', IMAGEPAN='$imagepan', ETATPAN='$etatpan',PRIXUNITAIREPAN='$prixpan' WHERE NUMPAN='$code'";
        
        $sql4 = "SET FOREIGN_KEY_CHECKS=1";

        $result3 = mysqli_query($conn, $sql3);
        $result1 = mysqli_query($conn, $sql1);
        $result4 = mysqli_query($conn, $sql4);

        if($result1) {
            header("location: panneau.php");
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification panneau</title>
    <link rel="shortcut icon" href="image/images.jpeg" type="image/x-icon"/>
    <link rel="stylesheet" href="style/update_panneau.css">
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
                    <h2>Modification panneau</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="inputbox">
                            <input type="text" placeholder="Numéro du panneau" name="numpan" value="<?php echo $row["NUMPAN"]?>" required>
                        </div>

                        <div class="inputbox">
                            <input type="text" placeholder="Format du panneau" name="formatpan" value="<?php echo $row["FORMATPAN"]?>" required>
                        </div>

                        <div class="inputbox">
                            <input type="text" placeholder="Type du panneau" name="typepan" value="<?php echo $row["TYPEPAN"]?>" required>
                        </div>

                        <div class="inputbox">
                            <input type="text" placeholder="Site du panneau" name="sitepan" value="<?php echo $row["SITEPAN"]?>" required>
                        </div>

                        <div class="inputbox">
                            <input type="text" placeholder="Etat du panneau" name="etatpan" value="<?php echo $row["ETATPAN"]?>" required>
                        </div>

                        <div class="inputbox">
                            <input type="text" placeholder="Prix unitaire" name="prixpan" value="<?php echo $row["PRIXUNITAIREPAN"]?>" required>
                        </div>

                        <div class="img">
                            <input type="file" name="imagepan" required>
                        </div>

                        <div class="selectbox">
                            Code de la commune:
                            <?php
                                $sql2 = "SELECT CODECOM FROM commune" ;
                                $result2 = mysqli_query($conn, $sql2) or die("ERROR");

                                echo "<select class='select' name='commune'>";

                                while($row2 = mysqli_fetch_array($result2)) {
                                    echo '<option value="'.$row2['CODECOM'].'">'.$row2['CODECOM'].'</option>';
                                }

                                echo "</select><br/>";
                            ?>
                        </div>

                        <div class="inputbox">
                            <input type="hidden" name="numpan_origine" value="<?php echo '.$_GET["update"].'?>">
                        </div>

                        <div class="inputbox">
                            <input type="submit" value="Mettre à jour le panneau">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="script/script.js" ></script>
</body>
</html>