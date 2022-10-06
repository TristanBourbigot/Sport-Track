<?php 
session_start();
if(isset($_SESSION['idUser'])){
    include __ROOT__."/views/headerConnect.html"; 
}else{
    include __ROOT__."/views/header.html"; 
}
include __ROOT__."/views/main.html";
include __ROOT__."/views/footer.html"; 
?>
