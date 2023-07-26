<dialog id="dialog_login">
    <h1>Se connecter</h1>
    <form method="POST">
        <div>
            <input type="text" name="utilisateur_login" placeholder="Utilisateur">
            <input type="password" name="mot_de_passe_login" placeholder="Mot de passe">
            <button type="submit" name="connexionSubmit">Connexion</button>
            <button id="close" class="annuler" aria-label="close" formnovalidate
                onclick="document.getElementById('dialog_login').close();">Annuler</button>
        </div>
    </form>
</dialog>