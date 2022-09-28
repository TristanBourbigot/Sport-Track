<?php include __ROOT__."/views/header.html"; 
      
echo "Nom : ".$data['nom']."<br>";
echo "Prenom : ".$data['prenom']."<br>";
echo "Date de naissance : ".$data['date de Naissance']."<br>";
echo "Sexe : ".$data['sexe']."<br>";
echo "Taille : ".$data['taille']."<br>";
echo "Poids : ".$data['poids']."<br>";
echo "Email : ".$data['email']."<br>";
echo "Mot de passe : ".$data['mot de passe']."<br><br>";
echo $data['insert'];

include __ROOT__."/views/footer.html"; 
?>