<?php header("Content-Type: application/xml"); ?>
<?xml version="1.0" encoding="utf-8" ?>

<?php
/* error handling */
    if(!isset($_GET['emailaddress'])) {
        echo '<error>malformed request</error>';
        http_response_code(400);
        exit(0);
    }
 
    /* get email adress */
    $email = urldecode($_GET['emailaddress']);
?>
 
<clientConfig version="1.1">
    <emailProvider id="<?php echo $domain; ?>">
        <domain><?php echo $domain; ?></domain>
        <displayName><?php echo $email; ?></displayName>
        <displayShortName><?php echo $domain; ?></displayShortName>
        <incomingServer type="imap">
            <hostname><?php echo $config['imap']['server']; ?></hostname>
            <port><?php echo $config['imap']['port']; ?></port>
            <socketType><?php if($config['smtp']['ssl'] == 'on') { echo 'SSL'; } else { echo 'STARTSSL'; } ?></socketType>
            <authentication>password-cleartext</authentication>
            <username><?php echo $email; ?></username>
        </incomingServer>
        <outgoingServer type="smtp">
            <hostname><?php echo $config['smtp']['server']; ?></hostname>
            <port><?php echo $config['smtp']['port']; ?></port>
            <socketType><?php if($config['smtp']['ssl'] == 'on') { echo 'SSL'; } else { echo 'STARTSSL'; } ?></socketType>
            <authentication>password-cleartext</authentication>
            <username><?php echo $email; ?></username>
        </outgoingServer>
    </emailProvider>
</clientConfig>