<?php
/*************************/
/* Auteur : sNapz        */
/* Date : 23/02/2012     */
/* Version : 1.0         */
/* sNapz-Portail v1      */
/*************************/

include('inc/configSnapzPortail.php');

// Recupere le status du serveur :: On / Off
$statusServ = statutServer($ipServeur, $portServeur);

// Recupere le nombres de comptes
$nbCompte = getComptes($Sql, $typeEmu, $nomTableComptes);

// Recupere le nombres de personnages
$nbPersonnages = getPersonnages($Sql, $typeEmu, $nomTablePersonnages);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title><?php echo $nomDuServeur; ?> - Powered by sNapz-portail</title>
<link href="snapz_portail_style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body oncontextmenu="return ClicDroitInterdit()">
<div id="global">
<div id="global2">
	<!-- Header -->
	<a href="#"><h1><?php echo $nomDuServeur; ?></h1></a>
	
	<!-- Message de bienvenue -->
	<p id="wellcome_mess">Bienvenue sur le portail de notre serveur :</p>
	
	<!-- Les boutons principaux -->
	<ul id="nav">
		<li id="site"><a href="<?php echo $urlSite; ?>">Site</a></li>
		<li id="forum"><a href="<?php echo $urlForum; ?>">Forum</a></li>
		<li id="vote"><a onClick="window.open(this.href);return false;" href="<?php echo $urlVote; ?>">Vote</a></li>
	</ul>
	
	<!-- La barre d'infos -->
	<ul id="infos">
		<li id="serveur"><img src="images/serveur_<?php echo $statusServ; ?>.png" alt="" /></li>
		<li id="comptes"><p><?php echo $nbCompte; ?></p></li>
		<li id="personnages"><p><?php echo $nbPersonnages; ?></p></li>
	</ul>
	
	<!-- Footer -->
	<p id="footer" onClick="return portailBy()">Portail conçus par sNapz (C) 2012</p>
	
	<!-- Musique -->
	<embed src="music/snapzMusic.mp3" autostart="true" loop="true" id="sound">
</div>
<div id="bg_top"></div>
<div id="bg_bot"></div>
</div>
<script>
// Ajustement de la dimension du portail sur les grandes résolutions
taille = ((document.documentElement.clientHeight - 662) / 2);

if(taille > 0)
{
	document.getElementById('global2').style.paddingTop = taille+"px";
}

function ClicDroitInterdit(){alert('<?php echo $nomDuServeur; ?>\nSnapz-portail.\n\nClic droit interdit.'); return false;}
function portailBy(){alert('Portail conçus par sNapz.'); return false;}
</script>

	<!-- NE PAS SUPPRIMER CE COPYRIGHT - RESPECTEZ MON TRAVAIL S'IL VOUS PLAIT -->
	<!-- Coded by sNapz -->
	<!-- NE PAS SUPPRIMER CE COPYRIGHT - RESPECTEZ MON TRAVAIL S'IL VOUS PLAIT -->
</body>
</html>