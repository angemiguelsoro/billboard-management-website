<?php

    require("connexion_db.php");

    $code = $_GET["update"];

    $sql = "SELECT *FROM reglement WHERE NUMREGL='$code'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if(isset($_POST) & !empty($_POST)) {

        $num_reg = trim($_POST['num_reg']);
        $montant = trim($_POST['montant']);
        $facture = trim($_POST['facture']);
        $typeregl = trim($_POST['typeregl']);
        $Date = date("Y-m-d");

        $sql4 = "UPDATE reglement SET NUMREGL='$num_reg', DATEREGL='$Date', MONTANTREGL='$montant', NUMFACT='$facture', CODETYPEREG='$typeregl' WHERE NUMREGL='$code'";
        
        $result4 = mysqli_query($conn, $sql4);

        if($result4) {
            header("location: reglement.php");
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification reglement</title>
    <link rel="shortcut icon" href="image/images.jpeg" type="image/x-icon"/>
    <link rel="stylesheet" href="style/update_reglement.css">
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
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <div class="container">
                <div class="form">
                    <h2>Modification reglement</h2>
                    <form action="" method="post">
                        <div class="inputbox">
                            <input type="text" placeholder="Numéro du reglement" name="num_reg" value="<?php echo $row["NUMREGL"]?>" required>
                        </div>

                        <div class="inputbox">
                            <input type="text" placeholder="Montant" name="montant" value="<?php echo $row["MONTANTREGL"]?>" required>
                        </div>

                        <div class="selectbox">
                            Numéro de facture:
                            <?php
                                $sql2 = "SELECT NUMFACT FROM facture" ;
                                $result2 = mysqli_query($conn, $sql2) or die("ERROR");

                                echo "<select class='select' name='facture'>";

                                while($row2 = mysqli_fetch_array($result2)) {
                                    echo '<option value="'.$row2['NUMFACT'].'">'.$row2['NUMFACT'].'</option>';
                                }

                                echo "</select><br/>";
                            ?>
                        </div>

                        <div class="selectbox">
                            Code Type de Reglement:
                            <?php
                                $sql3 = "SELECT CODETYPEREG FROM type_reglement" ;
                                $result3 = mysqli_query($conn, $sql3) or die("ERROR");

                                echo "<select class='select' name='typeregl'>";                               
                                
                                while($row3 = mysqli_fetch_array($result3)) {
                                    echo '<option value="'.$row3['CODETYPEREG'].'">'.$row3['CODETYPEREG'].'</option>';
                                }
                                
                                echo "</select><br/>";
                            ?>
                        </div>

                        <div class="inputbox">
                            <input type="hidden" name="code_regl_origine" value="<?php echo '.$_GET["update"].'?>">
                        </div>

                        <div class="inputbox">
                            <input type="submit" value="Mettre à jour le reglement">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="script/script.js" ></script>
</body>
</html>