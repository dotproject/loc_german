<?php /* $Id: check.php,v 1.3 2003/05/28 04:31:57 eddieajau Exp $ */ ?> 
<html> 
<head> 
	<title>dotProject Roadmap</title> 
	<meta name="Generator" content="EditPlus"> 
	<meta name="Author" content="Andrew Eddie, gregorerhardt"> 
	<meta name="Description" content="dotProject Systemcheck">
 
	<link rel="stylesheet" type="text/css" href="../../style/default/main.css"> 
</head> 
<body> 
<h1>dotProject Systemcheck</h1> 
 
<table cellspacing="0" cellpadding="4" border="1" class="tbl"> 
<?php 
error_reporting( E_ALL ); 
 
require "../../includes/config.php"; 
 
if ($dbok = function_exists( 'mysql_pconnect' )) { 
	echo "<tr><td>MySQL</td><td>Verfügbar</td><td>OK</td></tr>"; 
 
	$host = $dPconfig['dbhost']; 
	$port = 3306; 
	$user = $dPconfig['dbuser']; 
	$passwd = $dPconfig['dbpass']; 
	$dbname = $dPconfig['dbname']; 
 
	if (mysql_pconnect( "$host:$port", $user, $passwd )) { 
		echo "<tr><td>MySQL Database Connection</td><td>Verbindung besteht.</td><td>OK</td></tr>"; 
 
		if ($dbname) { 
			if (mysql_select_db( $dbname )) { 
				echo "<tr><td>MySQL Database Select</td><td>Selected</td><td>OK</td></tr>"; 
			} else { 
				echo "<tr><td>MySQL Database Select</td><td class=error>Fehlgeschlagen</td><td class=error>Fatal: Es konnte keine Verbidnung zu $dbname aufgebaut werden.</td></tr>"; 
			} 
		} else { 
			echo "<tr><td>MySQL Database Select</td><td class=error>Fehlgeschlagen</td><td class=error>Fatal: kein Datenbankname verfügbar.</td></tr>"; 
		} 
	} else { 
		echo "<tr><td>MySQL Database Connection</td><td class=error>Fehlgeschlagen</td><td class=error>Fatal: Überprüfung von Host, Benutzername and Passwort</td></tr>"; 
	} 
} else { 
	echo "<tr><td>MySQL</td><td>Nicht verfügbar</td><td>Fatal: Überprüfung, ob PHP mit MySQL-Unterstützung kompiliert ist.</td></tr>"; 
} 
 
echo "<tr><td>Betriebssystem</td><td>".php_uname()."</td></tr>"; 
 
$msg = phpversion() < '4.1' ? "<td class=error>Zu alt, bitte aktualisieren.</td>" : "<td>OK</td>"; 
echo "<tr><td>PHP Version</td><td>".phpversion()."</td>$msg</tr>"; 
 
echo "<tr><td>Server API</td><td>".php_sapi_name()."</td></tr>"; 
 
echo "<tr><td>User Agent</td><td>".$_SERVER['HTTP_USER_AGENT']."</td></tr>"; 
 
echo "<tr><td>Standardlokalisierung</td><td>".setlocale( LC_ALL, 0 )."</td></tr>"; 
 
$msg = get_cfg_var( 'session.auto_start' ) > 0 ? "<td class=warning>Auf 0 setzen, falls Probleme mit WSOD bestehen.</td>" : "<td>OK</td>"; 
echo "<tr><td>session.auto_start</td><td>".get_cfg_var( 'session.auto_start' )."</td>$msg</tr>"; 
 
echo "<tr><td>session.save_handler</td><td>".get_cfg_var( 'session.save_handler' )."</td></tr>"; 
 
$msg = is_dir( get_cfg_var( 'session.save_path' ) ) ? "<td>OK</td>" : "<td class=error>Fatal: Speicherpfad existiert nicht</td>"; 
echo "<tr><td>session.save_path</td><td>".get_cfg_var( 'session.save_path' )."</td>$msg</tr>"; 
 
echo "<tr><td>session.serialize_handler</td><td>".get_cfg_var( 'session.serialize_handler' )."</td></tr>"; 
 
$cookies = intval( get_cfg_var( 'session.use_cookies' ) ); 
$msg = $cookies ? "<td>OK</td>" : "<td class=warning>Auf 0 setzen, falls Probleme bei der Anmeldung bestehen</td>"; 
echo "<tr><td>session.use_cookies</td><td>$cookies</td>$msg</tr>"; 
 
$sid = intval( get_cfg_var( 'session.use_trans_sid' ) ); 
$msg = $sid ? "<td class=warning>Bei eingeschalteter Funktion besteht Sicherheitsrisiko!</td>" : "<td>OK</td>"; 
echo "<tr><td>session.use_trans_sid</td><td>$sid</td>$msg</tr>"; 
 
$iw = is_writable( "{$dPconfig['root_dir']}/locales/en" ); 
$msg = $iw ? '<td>OK</td>' : '<td class=warning>Warnung: Übersetzungdateien können nicht gespeichert werden. Zugriffsrechte für Verzeichnisstruktur überprüfen.</td>'; 
echo "<tr><td>Schreibrechte für /locales/en Verzeichnis </td><td>$iw</td>$msg</tr>"; 

$iw = is_writable( "{$dPconfig['root_dir']}/locales/de" );
$msg = $iw ? '<td>OK</td>' : '<td class=warning>Warnung: Übersetzungdateien können nicht gespeichert werden. Zugriffsrechte für Verzeichnisstruktur überprüfen.</td>';
echo "<tr><td>Schreibrechte für /locales/de Verzeichnis </td><td>$iw</td>$msg</tr>";
 
$iw = is_writable( "{$dPconfig['root_dir']}/files" ); 
$msg = $iw ? '<td>OK</td>' : '<td class=warning>Warnung: Es können keine Dateien hochgeladen werden. Zugriffsrechte für Verzeichnisstruktur überprüfen.</td>'; 
 
echo "<tr><td>Schreibrechte für /files Verzeichnis</td><td>$iw</td>$msg</tr>"; 
 
$iw = is_writable( "{$dPconfig['root_dir']}/files/temp" ); 
$msg = $iw ? '<td>OK</td>' : '<td class=warning>Warnung: Es können keine PDF\'s erstellt werden. Zugriffsrechte für Verzeichnisstruktur überprüfen.</td>'; 
 
echo "<tr><td>Schreibrechte für /files/temp Verzeichnis</td><td>$iw</td>$msg</tr>"; 
 
echo "</table>"; 
 
 
 
 
?> 
</table> 
<body> 
</html>