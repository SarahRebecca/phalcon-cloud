<?php

class MyDisquesController extends \ControllerBase{
	/**
	 * Affiches les disques de l'utilisateur
	 */
	public function indexAction(){
		//TODO 4.2
		$controller=$this;
		$user=Auth::getUser($controller);
		
		$this->view->setVar("user", $user);
		$idUtilisateur=$user->getId();
		
		$cloud = $this->config->cloud;
		$this->view->setVar("cloud", $cloud);
		
		//récupération des disque de l'utilisateur
		$disques = Disque::find(array(
				"idUtilisateur = $idUtilisateur",
				"order" => "nom"
		));

		$this->view->setVar("disques", $disques);
		//$this->view->setVar("tarif", $tarif);	
		
		$glButton1=$this->jquery->bootstrap()->HtmlGlyphButton("glButton1","glyphicon-plus","Creer un disque");
		//$glButton1->onClick($this->jquery->show("#panel",2000));
		
		$glButton2=$this->jquery->bootstrap()->HtmlGlyphButton("glButton2","glyphicon-folder-open","Ouvrir");
		//$glButton2->onClick($this->jquery->show("#panel",2000));
		
		$liste=$this->jquery->bootstrap()->htmlListgroup("liste");
		$this->progressbarAction();
		
		$this->jquery->compile($this->view);	
	}
	
	public function progressbarAction(){
		$tab= ["progressbar_info"=>10 ,"progressbar_success"=>50,"progressbar_warning"=>80,"progressbar_danger"=>100];
		
		$pb= $this->jquery->bootstrap()->htmlProgressbar("pb");
        $this->jquery->compile($this->view);
        $pb->setStyleLimits($tab);
        $pb->setStriped(true);
        $pb->setActive(true);
        $pb->showCaption(true);
	}
}