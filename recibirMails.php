<?php
$mbox = imap_open('{pop.1and1.mx:995/pop3/ssl/novalidate-cert}INBOX', 'contacto@eduardoabad.com', 'password') or die('Connexion impossible : '.imap_last_error());
 
$MC = imap_check($mbox);
 
// Récupère le sommaire pour tous les messages contenus dans INBOX
$result = imap_fetch_overview($mbox,"1:{$MC->Nmsgs}",0);
foreach ($result as $overview) {
    echo "#{$overview->msgno} ({$overview->date}) - To: {$overview->message_id} De: {$overview->from} - Sujet: {$overview->subject}<br />\n";
}
imap_close($mbox);
?>