<?php
include("../helpers/AUTH.php");
$auth = Auth::check();
var_dump($auth);
?>

<h1>This is dashboard.</h1>
<a href="../actions/admin/auth/Logout.php"
class="text-danger">Logout</a>