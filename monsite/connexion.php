<?php
session_start();
include 'database.php';
global $db;

$errorMessage="";
$errorMessageuser="";

if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        $errorMessage =  "Veuillez compléter tous les champs.";
    } else {
        $username = htmlspecialchars($_POST['username']);
        $password = sha1($_POST['password']);

        $recupUser= $db-> prepare("SELECT * FROM admin WHERE userAdmin=? and password=?");
        $recupUser->execute(array($username,$password));

        if($recupUser->rowCount()>0){
            $_SESSION['user']=$username;
            $_SESSION['password']=$password;
            header('location:./admin/admin.php');
            
            

        }else{
            $errorMessageuser = "Votre mot de passe ou nom d'utilisateur est incorecte. ";
        }
        
        
        
    }
}

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aceuil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <title>connexion</title>
</head>
<body>
    <header>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                
                <i class="fas fa-bars"></i>
            </label>
            
            <label class="logo">SDG</label>
            <ul>
                <li><a href="aceuil.php" class="">aceuil</a></li>
                <li><a href="scpi.php" class="">liste des SCPI</a></li>
                <li><a href="" class="active">Espace administrateur</a></li>
            </ul>
        </nav>
   </header>

   


    <section class="cnx">

       




        <div class="container-cnx">
            <form method="POST"  class="login-form">
                <h1>connexion</h1>
                <div class="input-field">
                    <label for="username">Utilisateur</label>
                    <input type="text" id="username" name="username" >
                </div>
                <div class="input-field">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" >
                </div>
                <button type="submit" name="submit">Se connecter</button>
                <p class="admin-s"> Espace administrateur.</p>
            </form>
        <?php
            if(!empty($errorMessage)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
               <strong>$errorMessage</strong>
               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>

               
            </div>
            
            
            ";
            }

            if(!empty($errorMessageuser)){
                echo"
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                   <strong>$errorMessageuser</strong>
                   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    
                   
                </div>
                
                
                ";
                }


        ?>
        </div>
    </section>

   

    
</body>