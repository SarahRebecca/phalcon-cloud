//TODO 4.2 Mes disques

<h1>Mes disques -> <?php echo $user; ?> </h1>

<?php echo $q['glButton1']; ?>

<?php echo $q['liste']; ?>

<?php
	foreach ($disques as $disque) {
	$tarif = ModelUtils::getDisqueTarif($disque);
	$occupation = ModelUtils::getDisqueOccupation($cloud,$disque);
		echo "<li><h4>". $disque->nom ."</h4>";
		echo "<h4>".  $occupation/ModelUtils::sizeConverter("Ko") . " Ko/" .  $tarif->getQuota() . " Mo</h4>";
		
		echo $q["pb"]. $q["glButton2"] ."</li>" ;
	}
?>
