# $Id: sysvals_de_beta1.sql,v 1.0 2003/05/18 04:51:19 gregorerhardt Exp $
#
# German patch for the DotProject Sysvals
# for Version beta 1
#
# NOTE: use this sysvals patch only with dotproject beta 1
#       
#
# !                  W A R N I N G                !
# !BACKUP YOUR DATABASE BEFORE APPLYING THIS SCRIPT!
# !                  W A R N I N G                !
#

#
# Table structure for table `sysvals`
#

DROP TABLE IF EXISTS sysvals;
CREATE TABLE sysvals (
  sysval_id int(10) unsigned NOT NULL auto_increment,
  sysval_key_id int(10) unsigned NOT NULL default '0',
  sysval_title varchar(48) NOT NULL default '',
  sysval_value text NOT NULL,
  PRIMARY KEY  (sysval_id)
) TYPE=MyISAM;

#
# Dumping data for table `sysvals`
#

INSERT INTO sysvals VALUES (1, 1, 'ProjectStatus', '0|Nicht definiert\r\n1|Vorgeschlagen\r\n2|In Planung\r\n3|In Bearbeitung\r\n4|Auf Eis\r\n5|Vollstaendig');
INSERT INTO sysvals VALUES (2, 1, 'CompanyType', '0|Es trifft nichts zu\r\n1|Kunde\r\n2|Verkaeufer-\r\n3|Zulieferer\r\n4|Berater\r\n5|Geschaeftsleitung\r\n6|Intern');
INSERT INTO sysvals VALUES (3, 1, 'TaskDurationType', '1|Std\r\n24|Tage');
INSERT INTO sysvals VALUES (4, 1, 'EventType', '0|Allgemein\r\n1|Ernennung\r\n2|Treffen / Sitzung\r\n3|Tägliches Ereignis\r\n4|Geburtstag\r\n5|Erinnerung\r\n6|Tour\r\n7|Kurs');



