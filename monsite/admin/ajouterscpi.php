<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter SCPI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

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

   <?php
        $nom = "";
        $datedecreation = "";
        $prixpart = "";
        

        $errorMessage="";
        $succesMessage="";


        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            //intialiser les variables par les donnes du formulaire

         $nom = $_POST["nom"];
         $datedecreation = $_POST["datedecreation"];
         $prixpart =$_POST ["prixpart"];
         
          // verfication si il n ya pas de champ vide
          do{
            if(empty($nom) || empty($datedecreation) ||empty($prixpart) ){
                $errorMessage = "les champs ne sont pas tous remplis";
                break;
            }
            //inserer une nouvelle entreprise a la base de données
    
            include 'database.php' ;
            global $db;
            // ecrire et exécuter la rqt
            $s = $db-> query ("INSERT INTO scpi ( nomScpi,datecScpi,prixpartScpi)".
            "VALUES('$nom','$datedecreation','$prixpart')");
    
           
    
    
            $nom = "";
            $datedecreation = "";
            $prixpart = "";
            
            $succesMessage="une nouvelle SCPI a été ajouter";
    
            header("location: /admin/adminscpi.php");
            exit;
    
    
    
          }while(false);
    
    
    
    
        }

    ?>



    <div class=" container my-5">
        <h2>Nouvelle SCPI</h2>

        <?php
            if(!empty($errorMessage)){
                echo"
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>

                
                </div>
                
                
                
                ";
            } 
        ?>





        <br>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Nom SCPI :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nom" value="<?php echo $nom?>">

                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Date de creation :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="aaaa-mm-jj" name="datedecreation" value="<?php echo $datedecreation?>">

                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Prix de la part :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="prixpart" value="<?php echo $prixpart?>">

                </div>

            </div>
             
            <?php
                if(!empty($succesMessage)){

                    echo"
                    <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$succesMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>

                    
                    </div>

                    </div>
                        
                    </div>  ";
                }


             ?>


          
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary"> Ajouter</button>
                </div>
                <div class="col-sm-3 d-grid">
                    
                    <a class="btn btn-outline-primary" href="adminscpi.php" role="button"> Annuler</a>
                </div>

            </div>

        </form>

    </div>
    
</body>
</html>