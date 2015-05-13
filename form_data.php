<?php
    if(isset($_POST['mail'])) {
          
        // EDIT THE 2 LINES BELOW AS REQUIRED
        // $email_to = "hello@themestreet.net";
        $email_to = "contato@rayremota.com.br";
        $email_subject = "FORM-SITE-RAYRE";
         
        
        $name = $_POST['name']; // required
        $email_from = $_POST['mail']; // required
        $text = $_POST['message']; // required
         
        $email_message = "Message from Website: \n\n";
         
        function clean_string($string) {
          $bad = array("content-type","bcc:","to:","cc:","href");
          return str_replace($bad,"",$string);
        }
         
        $email_message .= "Name: ".clean_string($name)."\n";
        $email_message .= "Email: ".clean_string($email_from)."\n";
        $email_message .= "Subject: ".clean_string('Contato rayremota.com.br')."\n";
        $email_message .= "Message: ".clean_string($text)."\n";
         
         
    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    if(@mail($email_to, $email_subject, $email_message, $headers)) {
        $data['status'] = TRUE;
        $data['msg'] = 'Seu email foi enviado!';
        $data['class'] = 'success';
    } else {
        $data['status'] = FALSE;
        $data['msg'] = 'Seu email não foi enviado!';
        $data['class'] = 'error';
    }
    
    echo json_encode($data);
}
?>