<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page protégée par mot de passe</title>
    </head>
    <body>
        <p>Veuillez entrer le mot de passe pour acceder au dossier d'administration:</p>
        <form action="view/frontend/administration.php" method="post">
            <p>
            <input type="password" name="password" />
            <input type="submit" value="Valider" />
            </p>
        </form>

    </body>
</html>