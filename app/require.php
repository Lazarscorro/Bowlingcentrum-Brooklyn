<?php
// Require libraries from folder libraries
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'config/config.php';
require_once 'libraries/Database.php';
require_once 'views/includes/link.php';

// Require navbar
require_once 'views/includes/navbar.php';

// Maak een instantie van de Core class
$init = new Core();
// Require link
require_once 'views/includes/link.php';

require_once 'views/includes/footer.php';

