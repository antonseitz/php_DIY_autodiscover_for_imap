<?php

/*-----------------------------
default configuration
-------------------------------*/

$config = array(
//set type to imap or activesync
'autodiscoverType' => 'imap',
'imap' => array(
'server' => 'wp11026024.mail.server-he.de',
'port' => '993',
'ssl' => 'on',
),
'smtp' => array(
'server' => 'wp11026024.mailout.server-he.de',
'port' => '465',
'ssl' => 'on'
)
);
/* ------------------------------------------------------------------------------------------------------------
   domain configuration - anderedomain.de
------------------------------------------------------------------------------------------------------------ */
if($domain == 'anderedomain.de') {
$config['autodiscoverType'] = 'imap';
$config['imap']['server'] = 'imap.anderedomain.de';
}

?>