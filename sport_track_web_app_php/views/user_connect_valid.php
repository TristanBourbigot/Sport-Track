<?php
if(isset($_SESSION['idUser'])){
    include __ROOT__."/views/headerConnect.html";
}else{
    include __ROOT__."/views/header.html";
}

echo $data['error'];


include __ROOT__."/views/footer.html";
?>
