//TODO 4.2 Mes disques

<h1>Mes disques -> {{user}} </h1>

{{q["glButton1"]}}

{{q["liste"]}}

<?php
	foreach ($disques as $disque) {
	$tarif = ModelUtils::getDisqueTarif($disque);
	$occupation = ModelUtils::getDisqueOccupation($cloud,$disque);
		echo '<li class="list-group-item"><h4>'. $disque->nom ."</h4>";
		
		$quota=$tarif->getQuota();
		
		$tab= ["progress-bar-info"=>10,"progress-bar-success"=>50,"progress-bar-warning"=>80,"progress-bar-danger"=>100];
		if(strlen($occupation)<=6){
			$occupation1=round($occupation/ModelUtils::sizeConverter("Ko"),2);
			echo "<h4>".  $occupation1 . " Ko/" .  $quota . " Ko</h4>";
			$pb= $this->jquery->bootstrap()->HtmlProgressbar("pb","progress-bar-default",round(($occupation1/$quota)*100,2));
		}else{
			$occupation2=round($occupation/ModelUtils::sizeConverter("Mo"),2);
			echo "<h4>".  $occupation2 . " Mo/" .  $quota . " Mo</h4>";
			$pb= $this->jquery->bootstrap()->HtmlProgressbar("pb","progress-bar-default",round(($occupation2/$quota)*100,2));
		}
		$pb->setStyleLimits($tab);
        $pb->setStriped(true);
        $pb->setActive(true);
        $pb->showCaption(true);
        $this->jquery->compile($this->view);
        
		echo $pb. $q["glButton2"] ."</li>" ;
	}
?>
{{script_foot}} 
