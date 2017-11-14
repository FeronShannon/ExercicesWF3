<?php
// Je charge le code commun à toutes les pages :
require_once('private/setUp.php');
// View
require_once('private/view/admin-header.php');
if (isset($_REQUEST["section"]) && ($_REQUEST["section"] == "update"))
{
    require_once("private/view/admin-section-update.php");
}
else
{
    require_once('private/view/admin-section-create.php');
}
require_once('private/view/admin-section-read.php');
require_once('private/view/admin-footer.php');

?>
