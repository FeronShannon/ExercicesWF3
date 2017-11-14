<section>
    <h3>Section READ</h3>
<div class="response">
<?php
// ON EFFACE LA LIGNE
// ET ENSUITE ON AFFICHERA LA TABLE MISE À JOUR
if (isset($_REQUEST["codebarre"]) 
        && ($_REQUEST["codebarre"] == "newsletter-delete"))
{
    require_once("private/controller/traitement-form-newsletter-delete.php");
}
?>    
</div>
<?php
// READ :
require_once("private/controller/traitement-form-newsletter-read.php");

?>

</section>