<?php

    if(isset($_SESSION['idUser'])){

        include __ROOT__."/views/headerConnect.html";

    }else{

        include __ROOT__."/views/header.html"; 

    }

?>

<form style="margin-left: 150px;" action="/listActivities" method="post">

    <label for="activites">Fichier activites:</label><br>

    <input type="file" id="activites" name="activites" accept=".json"><br><br>

    <input type="submit" value="valider" >

</form>

<?php include __ROOT__."/views/footer.html"; ?>