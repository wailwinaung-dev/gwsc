<?php
    include("./helpers/AUTH.php");

    $auth = Auth::check();
?>

<h1>This is HomePage.</h1>
<a href="actions/logout.php"
class="text-danger">Logout</a>