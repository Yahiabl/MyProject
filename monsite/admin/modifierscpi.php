<?php 
session_start();

?>

<?php
include 'database.php';
global $db;

  $nom = "";
  $datedecreation = "";
  $prixpart = "";
        

 $errorMessage="";
 $succesMessage="";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["idscpi"])) {
        // méthode GET sans ID
        header("location: admin/adminscpi.php");
        exit;
    }

    // Obtenir l'ID à partir des paramètres de l'URL
    $id = $_GET["idscpi"];
    

    // Lire la ligne sélectionnée de la base de données
    $q = $db->query("SELECT * FROM scpi WHERE idScpi=$id");
    // Récupérer la requête
    $scpi = $q->fetch();

    if (!$scpi) {
        header("location: admin/admin.php");
        exit;
    }

    $nom = $scpi["nomScpi"];
    $datedecreation = $scpi["datecScpi"];
    $prixpart = $scpi["prixpartScpi"];
    
}   else {
    // méthode POST

    $id = $_GET["idscpi"];
    $nom = $_POST["nom"];
    $datedecreation = $_POST["datedecreation"];
    $prixpart =$_POST ["prixpart"];

    if (empty($id) || empty($nom) || empty($datedecreation) || empty($prixpart) ) {
        $errorMessage = "Tous les champs doivent être remplis";
    } else {
      
        // Mise à jour des données dans la base de données
        $a =  "UPDATE scpi SET nomScpi='$nom', datecScpi='$datedecreation', prixpartScpi='$prixpart' WHERE idScpi=$id";


        $scpi = $db->query($a);

        // Vérifiez si la mise à jour a été effectuée avec succès
        if ($scpi) {
            $successMessage = "La SCPI a été mise à jour avec succès";
            header("location: /admin/adminscpi.php");
            exit;
        } else {
            $errorMessage = "Erreur lors de la mise à jour  " ;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modfier</title>
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
    



    <div class=" container my-5">
        <h2>Modifier les informations des SCPI :</h2>




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
            <input type="hidden" name="id" <?php echo $id?>>
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
                    <button type="submit" class="btn btn-primary"> Modifier</button>
                </div>
                <div class="col-sm-3 d-grid">
                    
                    <a class="btn btn-outline-primary" href="adminscpi.php" role="button"> Annuler</a>
                </div>

            </div>

        </form>

    </div>
    
</body>
</html>