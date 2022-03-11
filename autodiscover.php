<?php header("Content-Type: application/xml"); 
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<Autodiscover xmlns=\"http://schemas.microsoft.com/exchange/autodiscover/responseschema/2006\">";


    $data = file_get_contents("php://input");
 
    /* error handling */
    if(!$data) {
        list($usec, $sec) = explode(' ', microtime());
 
        echo '<Response>';
        echo '<Error Time="' . date('H:i:s', $sec) . substr($usec, 0, strlen($usec) - 2) . '" Id="2477272013">';
        echo '<ErrorCode>600</ErrorCode><Message>Invalid Request</Message><DebugData /></Error>';
        echo '</Response>';
        echo '</Autodiscover>';
 
        exit(0);
    }
 
    /* get email adress */
    preg_match("/\<EMailAddress\>(.*?)\<\/EMailAddress\>/", $data, $email);
    $email = $email[1];
?>
 
<?php if ($config['autodiscoverType'] == 'imap') { ?>
 
<Response xmlns="http://schemas.microsoft.com/exchange/autodiscover/outlook/responseschema/2006a">
    <Account>
        <AccountType>email</AccountType>
        <Action>settings</Action>
        <Protocol>
            <Type>IMAP</Type>
            <Server><?php echo $config['imap']['server']; ?></Server>
            <Port><?php echo $config['imap']['port']; ?></Port>
            <DomainRequired>off</DomainRequired>
            <LoginName><?php echo $email; ?></LoginName>
            <SPA>off</SPA>
            <SSL><?php echo $config['imap']['ssl']; ?></SSL>
            <AuthRequired>on</AuthRequired>
        </Protocol>
        <Protocol>
            <Type>SMTP</Type>
            <Server><?php echo $config['smtp']['server']; ?></Server>
            <Port><?php echo $config['smtp']['port']; ?></Port>
            <DomainRequired>off</DomainRequired>
            <LoginName><?php echo $email; ?></LoginName>
            <SPA>off</SPA>
            <SSL><?php echo $config['smtp']['ssl']; ?></SSL>
            <AuthRequired>on</AuthRequired>
            <UsePOPAuth>on</UsePOPAuth>
            <SMTPLast>off</SMTPLast>
        </Protocol>
    </Account>
</Response>
 
<?php }  ?>
 
</Autodiscover>