<table>
   <caption>Tableau des inscrits</caption>

   <thead> <!-- En-tête du tableau -->
       <tr>
           <th>Id</th>
           <th>Nom</th>
           <th>Email</th>
           <th>Date d'inscription</th>
           <th>Date de modification</th>
           <th>Update</th>
           <th>Delete</th>
       </tr>
   </thead>

   <tbody> <!-- Corps du tableau -->

<?php
   $requeteSQL =
   
// On récupère tout le contenu de la table Newsletter :
<<<CODESQL
SELECT * FROM Newsletter
ORDER BY dateInscription DESC
CODESQL;

        // ON FAIT UNE LECTURE, 
        // LA FONCTION envoyerRequeteSQL VA ME RENVOYER UN TABLEAU DE RESULTATS
        $tabResultat = envoyerRequeteSQL($requeteSQL, []);
        while ($donnees = $tabResultat->fetch())
        {
            extract($donnees);
            // TIMESTAMP => DATE AU FORMAT VOULU
            $timestamp = strtotime($dateInscription);
            $dateFR    = date("d M Y", $timestamp);
            echo
<<<CODEHTML
       <tr>
           <td>$idNewsletter</td>
           <td>$nom</td>
           <td>$email</td>
           <td>$dateInscription</td>
           <td>$dateModification</td>
           <td><a class="vert" href="?section=update&idNewsletter=$idNewsletter"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
            <td><a class="supp" href="?codebarre=newsletter-delete&idNewsletter=$idNewsletter&nom=$nom"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
       </tr>
CODEHTML;

        };
?>
       
   </tbody>
</table>