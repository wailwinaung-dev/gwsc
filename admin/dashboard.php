<?php
include("../helpers/AUTH.php");
Auth::check();
var_dump($_SESSION['user']['is_admin']);
?>

<h1>This is dashboard.</h1>
<a href="../actions/logout.php"
class="text-danger">Logout</a>