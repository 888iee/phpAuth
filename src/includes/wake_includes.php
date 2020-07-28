<!-- insert wol script call -->
<?php
if(isset($_SESSION['userId'])){
    system("python wol.py 192.168.178.255 00:19:99:DC:DA:46");
    header("Location:../index.php");
}
