<?php

    require("connexion_db.php");

    $code_typregl = "";
    $lib_typregl = "";
    $ok = "";


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $code_typregl = trim($_POST['code_typregl']);
        $lib_typregl = trim($_POST['lib_typregl']);

        $sql = "INSERT INTO type_reglement(CODETYPEREG,LIBELLETYPEREG) values('$code_typregl','$lib_typregl')"; 

        $result = mysqli_query($conn, $sql);

        $ok = "Enregistrement réussi !!";

    }

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Type reglement</title>
    <link rel="shortcut icon" href="image/images.jpeg" type="image/x-icon"/>
    <link rel="stylesheet" href="style/adm_typreglement.css">
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
                    <h2>Ajout type reglement</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <span class="sucess"><?php echo $ok; ?></span>
                        <div class="inputbox">
                            <input type="text" placeholder="Code du type reglement" name="code_typregl" required>
                        </div>
                        <div class="inputbox">
                            <input type="text" placeholder="Libelle du type reglement" name="lib_typregl" required>
                        </div>
                        <div class="inputbox">
                            <input type="submit" value="Ajouter type de reglement">
                        </div>
                        <div class="inputbox">
                            <a href="type_reglement.php">
                                <input type="button" value="Liste type_reglement">
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