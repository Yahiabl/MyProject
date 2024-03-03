<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <?php

        include 'database.php' ;
        global $db;
        // ecrire et exécuter la rqt
        $q = $db-> query("SELECT * FROM  sdg");
          
        
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <span class="navbar-brand mb-0 h1">Espace adminstrateur</span>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <button type="button" class="btn btn-primary mr-2" id="userButton">USER : <?php echo $_SESSION ['user'];?></button>
            </li>
            <li class="nav-item">
            <a href="../deconnexion.php">
            <button type="button" class="btn btn-danger" id="logoutButton">Déconnexion</button>
            </a>
            </li>
        </ul>
        </div>
    </div>
    </nav>


    <div class="container my-5">
        <h2>Liste des entreprises</h2>
        <a class="btn btn-primary" href="ajoutersdg.php" role="button">Ajouter une nouvelle entreprise</a>
        <a class="btn btn-primary" href="adminscpi.php" role="button">Afficher la listes des SCPI</a>
        <br>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nom Society</th>
                <th>Date de creation</th>
                <th>Effectif</th>
                <th>Info</th>
                <th>Adresse</th>
            </thead>
            <br>
            <tbody>
             <?php
              while($sdg = $q -> fetch()){
                echo"
                <tr>
                    <td> $sdg[idSdg]</td>
                    <td> $sdg[nomSdg]</td>
                    <td> $sdg[datecSdg]</td>
                    <td> $sdg[effectif]</td>
                    <td> $sdg[infoSdg]</td>
                    <td> $sdg[adrSdg]</td>
                    <td>
                    <a class=' btn btn-primary btn-sm' href='modifiersdg.php?id=$sdg[idSdg]'> modifier </a>
                    <br>
                    <a class=' btn btn-danger btn-sm' href='/admin/suprimer.php?id=$sdg[idSdg]'> supprimer </a>
                    </td>
                </tr>";
              }
                ?>


            </tbody>

        </table>



    </div>
    
    
</body>
</html>