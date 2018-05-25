<?php require('../includes/head.inc.php');?>
<body>

<?php require('../includes/navBar.php');?>
    
<?php
require_once('routes.php');
Route::call($controller, $action);
?>

</body>
</html>