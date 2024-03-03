<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aceuil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    

    
    
    <title>SCPI</title>
</head>
<body>
    

    <!-- nav bar-->
    <header>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                
                <i class="fas fa-bars"></i>
            </label>
            
            <label class="logo">SDG</label>
            <ul>
                <li><a href="aceuil.php" class="">aceuil</a></li>
                <li><a href="" class="active">liste des SCPI</a></li>
                <li><a href="connexion.php" class="">Espace administrateur</a></li>
            </ul>
        </nav>
   </header>

    <!-- connecté la base de donnes-->

    <?php

        include 'database.php' ;
        global $db;
        // ecrire et exécuter la rqt
        $s = $db-> query("SELECT * FROM  scpi");
        //recuperer la rqt  
        $scpi = $s->fetchAll();
    ?>

 

    <section>

       
        <div class="card-container">
            <?php foreach($scpi as $scpi):?>


                <div class="card">
                    <img src="./img/scpi-img.jpg" alt="">
                    <div class="card-content">
                        <h3><?php echo $scpi['nomScpi'];?></h3>
                        <p>Date de creation : <?php echo $scpi['datecScpi'];?> </p>
                        <a href="" class="btn">Prix de la part : <?php echo $scpi['prixpartScpi'];?> €</a>


                    </div>

                
                </div>
            <?php endforeach; ?> 
            

        </div>
        

    </section>

 


 
    
</body>
</html>