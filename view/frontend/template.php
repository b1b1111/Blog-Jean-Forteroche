<!DOCTYPE html>
<html lang="fr"/>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="<?= $_POST['URL_PATH'] ?>public/css/style.css" type="text/css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,regular,italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P:regular" rel="stylesheet" />
    </head>
    
    <header>
    <?php echo $menu; ?>
    
    <div id="header_content">

        <div class="header_separator"></div>

        <h1><a href="index.php">Billet simple pour l'Alaska</a></h1>
        <h2>Jean Forteroche</h2>
        
    </div>

    </header>

    <body>
        <?= $content ?>

        <script src="https://cdn.tiny.cloud/1/376mz5siri1y6bnkll7l26kltznbqkwp9mi2aorxqpadvuxj/tinymce/5/tinymce.min.js"></script>
        
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        
    </body>

    <footer id="footer"></footer>
</html>