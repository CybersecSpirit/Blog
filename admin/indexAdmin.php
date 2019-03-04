
<?php
require('controller/backend.php');

try {
  if (isset($_GET['action'])) {
    
} else if (isset($_SESSION['name']))
{
  listPostsAdmin();
} else {
  header('Location:login.html');
}
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>
