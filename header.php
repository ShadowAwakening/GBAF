<header>
    <!--    Header avec le logo et l'identifiant-->
    <div class="logoGbaf">
        <p><img src="logos/logoGbaf.jpg" alt="logo GBAF" /></p>
    </div>
    <div class="logo_nom_prenom">
        <div class="npdu">
            <div class="nom_prenom">
                <p><img src="logos/man-user.png" alt="logo GBAF" /></p>
                <p><?php echo $_SESSION['prenom'] ?></p>
                <p><?php echo $_SESSION['nom'] ?></p>
            </div>
            <div class="deco_update">
                <p class="update"><a href="update.php">Paramètres du compte</a></p>
                <p class='home'><a href="page_accueil.php">Accueil</a></p>
                <p class="deco"><a href='deconnexion.php'><img src="logos/boutondeco.png" alt="boutondeconnexion" /></a>
                </p>
            </div>
        </div> 
    </div>
</header>