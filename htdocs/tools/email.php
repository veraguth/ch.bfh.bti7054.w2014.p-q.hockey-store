<?php

//http://stackoverflow.com/questions/21556757/php-send-e-mail-with-pdf-attachment
function send_pdf_to_user(){
    if($_REQUEST['action'] == 'pdf_invoice' ){
        require('html2pdf.php');
        require_once('class.phpmailer.php');
        $pdf=new PDF_HTML();
        $pdf->SetFont('Arial','',11);
        $pdf->AddPage();

        $text = get_html_message($_REQUEST['eventid'], $_REQUEST['userid']);
        if(ini_get('magic_quotes_gpc')=='1')
            $text=stripslashes($text);
        $pdf->WriteHTML($text);

        $mail = new PHPMailer(); // defaults to using php "mail()"
        $body = "This is test mail by monirul";

        $mail->AddReplyTo("webmaster@test.ch","Test Lernt");
        $mail->SetFrom('webmaster@test.ch', 'Test Lernt');

        $address = "monirulmask@gmail.com";
        $mail->AddAddress($address, "Abdul Kuddos");
        $mail->Subject    = "Test Invoice";
        $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

        $mail->MsgHTML($body);
        //documentation for Output method here: http://www.fpdf.org/en/doc/output.htm
        $pdf->Output("Test Invoice.pdf","F");
        $path = "Walter Lernt Invoice.pdf";

        $mail->AddAttachment($path, '', $encoding = 'base64', $type = 'application/pdf');
        global $message;
        if(!$mail->Send()) {
            $message =  "Invoice could not be send. Mailer Error: " . $mail->ErrorInfo;
        } else {
            $message = "Invoice sent!";
        }

    }
}
?>