<?php include ("../include/header.php"); ?>

<?php
session_start();
session_destroy();
//echo SITE_URL; die;
//header("location:http://localhost/Test/");

$url = SITE_URL;
die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

?>