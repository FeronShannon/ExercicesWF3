<section>
    <h3>Section CREATE</h3>
    <form method="post" action="">
        <input type="email" name="email" required placeholder="Votre email"/>
        <input type="text" name="nom" required placeholder="Votre nom"/>
        
        <button type="submit"/>S'inscrire</button>
        <!-- ON VA AVOIR BESOIN DE DISTINGUER LES FORMULAIRES ENTRE EUX (CRUD) -->
        <input type="hidden" name="codebarre" value="newsletter-create"/>
        <div class="response">

<?php
// Traiter le formulaire de CREATE :
if(isset($_REQUEST["codebarre"]) && ($_REQUEST["codebarre"] == "newsletter-create"))
{
    require_once("private/controller/traitement-form-newsletter-create.php");
}
?>
        </div>
    </form>
    
</section>