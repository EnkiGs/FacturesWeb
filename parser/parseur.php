<?php

if($flux = simplexml_load_file(dirname(__FILE__).'/rss.xml'))
{
	$donnee = $flux->channel;
	//Lecture des données
	$mn= new ModeleNews();
	foreach($donnee->item as $valeur)
	{
	    $n=new News($valeur->title,$valeur->link,$valeur->description,NULL,NULL,explode('-',$valeur->pubDate)[0],0);
	    //echo $this->n->getDate();
	    $mn->addNews($n);
	}
}else echo 'Erreur de lecture du flux RSS';
?>