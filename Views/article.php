<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Affichage d'un article</title>
	<link rel="stylesheet" type="text/css" href="Views/design/style.css">
</head>
<body>
    <?php include "inc/entete.php"?>
	<div id="contenu">
        <?php if($article){ ?>
            <h1><?= $article->getTitre() ?></h1>
			<span>Publié le <?= $article->getDateCreation() ?></span>
                <p><?= $article->getContenu() ?></p>
        <?php } 
        else
            echo "<h1>Aucun article trouvé !</h1>";
        
        ?>
	</div>
    
    <?php require_once 'inc/menu.php'; ?>
</body>
</html>