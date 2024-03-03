<?php 
session_start();

?>

<?php
include 'database.php';
global $db;

$id = "";
$nom = "";
$datedecreation = "";
$effectif = "";
$apropos = "";
$adresse = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id"])) {
        // méthode GET sans ID
        header("location: admin/admin.php");
        exit;
    }

    // Obtenir l'ID à partir des paramètres de l'URL
    $id = $_GET["id"];
    

    // Lire la ligne sélectionnée de la base de données
    $q = $db->query("SELECT * FROM sdg WHERE idSdg=$id");
    // Récupérer la requête
    $sdg = $q->fetch();

    if (!$sdg) {
        header("location: admin/admin.php");
        exit;
    }

    $nom = $sdg["nomSdg"];
    $datedecreation = $sdg["datecSdg"];
    $effectif = $sdg["effectif"];
    $apropos = $sdg["infoSdg"];
    $adresse = $sdg["adrSdg"];
}   else {
    // méthode POST

    $id = $_GET["id"];
    $nom = $_POST["nom"];
    $datedecreation = $_POST["datedecreation"];
    $effectif = $_POST["effectif"];
    $apropos = $_POST["apropos"];
    $adresse = $_POST["adresse"];

    if (empty($id) || empty($nom) || empty($datedecreation) || empty($effectif) || empty($apropos) || empty($adresse)) {
        $errorMessage = "Tous les champs doivent être remplis";
    } else {
      
        // Mise à jour des données dans la base de données
        $a =  "UPDATE sdg SET nomSdg='$nom', datecSdg='$datedecreation',
        effectif='$effectif', infoSdg='$apropos', adrSdg='$adresse' WHERE idSdg=$id";


        $sdg = $db->query($a);

        // Vérifiez si la mise à jour a été effectuée avec succès
        if ($sdg) {
            $successMessage = "L'entreprise a été mise à jour avec succès";
            header("location: /admin/admin.php");
            exit;
        } else {
            $errorMessage = "Erreur lors de la mise à jour de l'entreprise : " ;
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
        <h2>Modifier les informations de l'entreprises :</h2>




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
                <label class="col-sm-3 col-form-label"> Nom de l'entreprise :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nom" value="<?php echo $nom?>">

                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Date de creation :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="datedecreation" value="<?php echo $datedecreation?>">

                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Effectif :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="effectif" value="<?php echo $effectif?>">

                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> A propos de l'entreprise :</label>
                <div class="col-sm-6">
                    <input type="text"  class="form-control" name="apropos" value="<?php echo $apropos?>">

                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Adresse de l'entreprise :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="adresse" value="<?php echo $adresse?>">

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
                    
                    <a class="btn btn-outline-primary" href="admin.php" role="button"> Annuler</a>
                </div>

            </div>

        </form>

    </div>
    
</body>
</html>