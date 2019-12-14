<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Formation and co</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
        <div id='header_commentaire'>
            <h3>Commentaires</h3>
            <form action='traitement_commentaire_acteur1.php' method='POST' id='nouveau_commentaire'>
                <p class='nouveau_message'><input type='submit' value='Nouveau commentaire'/></p>
            </form>
            
            <form action='avis.php' method='POST' id='avis'>
            <p>5</p>
            <p><input class='avis_favorable' type='submit' value='+1'/></p>
            <p>2</p>
            <p><input class='avis_defavorable' type='submit' value='-1'/></p>
            </form>
        </div>

        <div id='commentaires'>
            <div class='commentaire_n'>
                <p>Prenom</p>
                <p>Date</p>
                <p>Texte</p>
            </div>
            <div class='commentaire_n-1'>
                <p>Prenom</p>
                <p>Date</p>
                <p>Texte</p>
            </div>
            <div class='commentaire_n-2'>
                <p>Prenom</p>
                <p>Date</p>
                <p>Texte</p>
            </div>
        </div>    
</body>
</html>