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






    <!-- connecté la base de donnes-->

    <?php

        include 'database.php' ;
        global $db;
        // ecrire et exécuter la rqt
        $s = $db-> query("SELECT * FROM  scpi");
        
    ?>
    


    <div class="container my-5">
        <h2>Liste des SCPI</h2>
        <a class="btn btn-primary" href="ajouterscpi.php" role="button">Ajouter une nouvelle SCPI</a>
        <a class="btn btn-primary" href="admin.php" role="button">Afficher la listes des entreprises</a>
        <br>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nom SCPI</th>
                <th>Date de creation</th>
                <th>Prix de la part</PRe></th>
                
            </thead>
            <br>
            <tbody>


             <?php while($scpi = $s->fetch()){
                echo"
                <tr>
                    <td> $scpi[idScpi]</td>
                    <td> $scpi[nomScpi]</td>
                    <td> $scpi[datecScpi]</td>
                    <td> $scpi[prixpartScpi] €</td>
                    
                    <td>
                    <a class=' btn btn-primary btn-sm' href='modifierscpi.php?idscpi=$scpi[idScpi]'> modifier </a>
                    <br>
                    <a class=' btn btn-danger btn-sm' href='suprimer.php?idscpi=$scpi[idScpi]'> supprimer </a>
                    </td>
                </tr>";} 
                ?>
                


            </tbody>

        </table>



    </div>
    
</body>
</html>