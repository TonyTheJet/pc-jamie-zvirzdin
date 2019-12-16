<?php
session_start();
require_once('config.inc');
require_once ('app.php');

// headers sent
require_once('view/templates/header.phtml');
require_once('main.php');
require_once('view/templates/footer.phtml');
// end headers sent