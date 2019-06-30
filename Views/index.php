<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Actualités MGLSI</title>
	<link rel="stylesheet" type="text/css" href="Views/design/style.css">
</head>
<body>
    <?php include "inc/entete.php"?>

    <div id="contenu">
        <?php
            if($this->allArticles)
            {
                    foreach($this->allArticles as $article)
                { ?>
                    <div class="article">
                        <h1><a href="index.php?id=<?= $article->getId() ?>"><?= $article->getTitre() ?></a></h1>
                        <p><?= substr($article->getContenu(), 0, 300) . '...' ?></p>
                    </div>
                    
                <?php }
            }
            else {
                echo "<h1>Aucun article trouvé ! </h1>";
            }
    ?>
    </div>

    <?php require_once 'inc/menu.php'; ?>
</body>
</html>