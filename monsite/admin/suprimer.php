<?php 

include 'database.php';
global $db;

if(isset($_GET["id"])){

        $id=$_GET["id"] ;

        $q = " DELETE FROM sdg WHERE idSdg=$id";

        $db -> query($q);

        header("location: /admin/admin.php");
        exit;


} 


if(isset($_GET["idscpi"])){

        $id=$_GET["idscpi"] ;
        
        $sup = " DELETE FROM scpi WHERE idScpi=$id";
        
        $db -> query($sup);

        header("location: /admin/adminscpi.php");
        exit;
        
        
        

}

?>






