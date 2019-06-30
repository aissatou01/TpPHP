<div id="menu">
	<h1>Catégories</h1><hr width="20%">
	<ul>
		<li><a href="index.php?action=accueil">Tout</a></li>
		<?php foreach ($this->allCategories as $categorie): ?>
			<li><a href="index.php?categorie=<?= $categorie->getId() ?>"><?= $categorie->getLibelle() ?></a></li>
		<?php endforeach ?>
	</ul>
</div>