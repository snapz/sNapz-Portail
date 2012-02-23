<?php
/*************************/
/* Auteur : sNapz        */
/* Date : 23/02/2012     */
/* Version : 1.0         */
/* sNapz-Portail v1      */
/*************************/

/******************************************************/
////////* Configuration de la base de donnée *//////////
/******************************************************/

const HOST = 'localhost';
const DB = 'snapz_2k12_ancestra_other';
const USER = 'root';
const PASS = '';


/******************************************************/
////////////* Configuration du portail *////////////////
/******************************************************/

// Config Portail

$typeEmu = 0; // Type de l'emulateur (pour les requetes SQL) - > 0 = ancestra , 1 = vemu , 2 = autres

// Ces 2 lignes sont à remplir seulement si $typeEmu = 3;
$nomTableComptes = ''; // Nom de la tables qui contient les comptes si autres emu que ancestra ou vemu
$nomTablePersonnages = ''; // Nom de la tables qui contient les personnages si autres emu que ancestra ou vemu

// Infos serveur
$ipServeur = '127.0.0.1'; // Ip de votre serveur
$portServeur = '444'; // Port de votre serveur
$nomDuServeur = 'sNapz Server'; // Nom de votre serveur

// URL
$urlSite = '/site/'; // Url vers le site
$urlForum = '/forum/'; // Url vers le forum
$urlVote = 'http://www.VOTREPAGEDEVOTE.COM'; // Url vers la page de vote


/*************************************************************************/
////////////* NE PAS MODIFIER LES CODES APRES CETTE LIGNE *////////////////
/*************************************************************************/

// Connexion à la base de donnée
try
{
	$Sql = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASS);
}
catch(Exception $e)
{
	echo 'Erreur : '.$e->getMessage().'<br />';
	echo 'N° : '.$e->getCode();
	die();
}

//*** Fonction pour savoir si le serveur est allumer ou non ***//
function statutServer($ip, $port)
{
	$statut = (@fsockopen($ip, $port, $errno, $errstr, 0.5)) ? $statut = 'on' : $statut = 'off';
	@fclose();
	return $statut;
}

// Recupere le nombres de comptes dans la bdd
function getComptes($Sql, $typeEmu, $nomTableComptes)
{
	if($typeEmu == 0)
		$nomTABLE = 'accounts';
	elseif($typeEmu == 1)
		$nomTABLE = 'player_accounts';
	elseif($typeEmu == 2)
		$nomTABLE = $nomTableComptes;
	
	$query = $Sql->prepare('SELECT COUNT(*) as nbComptes FROM '.$nomTABLE);
	$query->execute();
	$data = $query->fetch();
	$nbcomptes = $data['nbComptes'];
	$query->closeCursor();
	
	$nbcomptes = ($nbcomptes == '') ? 0 : $nbcomptes;
	
	return $nbcomptes;
}

// Recupere le nombres de personnages dans la bdd
function getPersonnages($Sql, $typeEmu, $nomTablePersonnages)
{
	if($typeEmu == 0)
		$nomTABLE = 'personnages';
	elseif($typeEmu == 1)
		$nomTABLE = 'player_characters';
	elseif($typeEmu == 2)
		$nomTABLE = $nomTablePersonnages;
	
	$query = $Sql->prepare('SELECT COUNT(*) as nbPersonnages FROM '.$nomTABLE);
	$query->execute();
	$data = $query->fetch();
	$nbPersonnages = $data['nbPersonnages'];
	$query->closeCursor();
	
	$nbPersonnages = ($nbPersonnages == '') ? 0 : $nbPersonnages;
	
	return $nbPersonnages;
}
?>