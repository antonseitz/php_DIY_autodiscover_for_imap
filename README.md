# php_DYIY_autodiscover_for_imap


Hosteurope erlaubt jetzt auch den Login mit der Mailadresse!
Aber ein Autodiscovery für IMAP gibt es nicht.

Mit diesen php files kann man es sich bauen.


Wir nutzen die Methode:
https://autodiscover.domain.de/autodiscover/autodiscover.xml


Bedingung:

- Subdomain autodiscover.domain.de einrichten auf ein beliebiges Verzeichnis
- diese Subdomain muss ein gültiges Zertifikat haben
- in dem Verzeichnis einen Ordner "autodiscover" erstellen und dort die files:
.htaccess
index.php
config.php
autodiscover.php
autoconfig.php

reinkopieren. config.php evtl. anpassen !

- testweise im Browser die URL: 
https://autodiscover.domain.de/autodiscover/autodiscover.xml
aufrufen.

Wenn das kommt:
This XML file does not appear to have any style information associated with it. The document tree is shown below.

<Autodiscover xmlns="http://schemas.microsoft.com/exchange/autodiscover/responseschema/2006">
<Response>
<Error Time="19:32:020.349519" Id="2477272013">
<ErrorCode>600</ErrorCode>
<Message>Invalid Request</Message>
<DebugData/>
</Error>
</Response>
</Autodiscover>

ist alles OK. Der FEhler kommt, weil keine POST Daten (email) geschickt wurden.

Dann Test mit Outlook "Email Konfiguration testen"

Mit email und pwd sollte jetzt ein XML zurück geliefert werden.



