<?php

    session_start();

    if(isset($_SESSION['idUser'])){

        include __ROOT__."/views/headerConnect.html";

    }else{

        include __ROOT__."/views/header.html"; 

    }

?>

<form action="/upload" method="post">

    <label for="activites">Fichier activités:</label><br>

    <input type="file" id="activites" name="activites" accept=".json"><br><br>

    <input type="submit" value="valider">

</form>

<?php include __ROOT__."/views/footer.html"; ?>