#
# patch for the DotProject Sysvals Restore to Original
#
# NOTE: sysvals restore patch according to dotproject 1.0.x
#       
#
# !                  W A R N I N G                !
# !BACKUP YOUR DATABASE BEFORE APPLYING THIS SCRIPT!
# !                  W A R N I N G                !
#

#
# Table structure for table 'sysvals'
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
# Table structure for table 'sysvals'
#

INSERT INTO syskeys VALUES("1", "SelectList", "Enter values for list", "0", "\n", "|");
INSERT INTO sysvals (sysval_key_id,sysval_title,sysval_value) VALUES("1", "ProjectStatus", "0|Not Defined\r\n1|Proposed\r\n2|In Planning\r\n3|In Progress\r\n4|On Hold\r\n5|Complete");
INSERT INTO sysvals (sysval_key_id,sysval_title,sysval_value) VALUES("1", "CompanyType", "0|Not Applicable\n1|Client\n2|Vendor\n3|Supplier\n4|Consultant\n5|Government\n6|Internal");
INSERT INTO sysvals (sysval_key_id,sysval_title,sysval_value) VALUES("1", "TaskDurationType", "1|hours\n24|days");
INSERT INTO sysvals (sysval_key_id,sysval_title,sysval_value) VALUES("1", "EventType", "0|General\n1|Appointment\n2|Meeting\n3|All Day Event\n4|Anniversary\n5|Reminder");