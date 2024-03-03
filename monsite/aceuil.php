<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aceuil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="aceuil.js" defer ></script>

    

    
    
    <title>Society de gestion</title>
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
                <li><a href="" class="active">aceuil</a></li>
                <li><a href="scpi.php" class="">liste des SCPI</a></li>
                <li><a href="connexion.php" class="">Espace administrateur</a></li>
            </ul>
        </nav>
   </header>

    <!-- connecté la base de donnes-->

    <?php

        include 'database.php' ;
        global $db;
        // ecrire et exécuter la rqt
        $q = $db-> query("SELECT * FROM  sdg");
        //recuperer la rqt  
        $sdg = $q->fetchAll();
    ?>

 

    <section>

       
        <div class="card-container">
            <?php foreach($sdg as $sdg):?>


                <div class="card">
                    <img src="./img/entreprise.png" alt="">
                    <div class="card-content">
                        <h3><?php echo $sdg['nomSdg'];?></h3>
                        <p>Date de creation : <?php echo $sdg['datecSdg'];?> </p>
                        <p>Effectif : <?php echo $sdg['effectif'];?> </p>
                        <p>Adresse : <?php echo $sdg['adrSdg'];?></p>
                        <p>A propos : <?php echo $sdg['infoSdg'];?></p>
                        <button class="btn" id="">SCPI Associé</button>

                        


                    </div>

                
                </div>
                
               


            <?php endforeach; ?> 
            

        </div>

        
        
        

    </section>
    <section>

     <div class="modal_container" id="modal_container">
            <div class="modal" id="">

                <h3>Liste SCPI Associe A l'entreprise:</h3>
                <ul >
                <li>Première SCPI</li>
                <li>Deuxième scpi</li>
                <li>Troisième scpi</li>
                </ul>
                <button class="close" id="">  RETOUR    </button>


            </div>
       </div>
   </section>   

    
    
     
    
   
    
    

   

 


 
    
</body>
</html>