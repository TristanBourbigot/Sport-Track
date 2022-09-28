<?php include __ROOT__."/views/header.html"; ?>

<form action="/connect" method="post">
  <label>Email :</label><br>
  <input type="text" name="email" required><br>
  <label>Mot de passe</label> :<br>
  <input type="password" name="mdp" required><br><br>
  <input type="submit" value="se connecté"><br>
</form>
            
<?php include __ROOT__."/views/footer.html"; ?>
