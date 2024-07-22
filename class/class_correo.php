<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    
class Correo{

    public static function EnviarCorreo($correo,$asunto,$body){
        include("../../PHPMailer/PHPMailer.php");
        include("../../PHPMailer/Exception.php");
        include("../../PHPMailer/SMTP.php");// Solo si estás usando SMTP

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings   
            $mail->isSMTP();                                                        //Send using SMTP
            $mail->SMTPDebug  =  0;                                                 //Enable verbose debug output                           
            $mail->Host       = 'smtp.mailersend.net';                              //Set the SMTP server to send through
            $mail->SMTPAuth   =  true;                                              //Enable SMTP authentication
            $mail->Username   = 'MS_mX3fQX@trial-v69oxl596yxg785k.mlsender.net';    //SMTP username
            $mail->Password   = 'FckVCuinkPnvDjAH';                                 //SMTP password
            $mail->SMTPSecure = 'tls';                                              //Enable implicit TLS encryption
            $mail->Port       =  587;                                               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('MS_mX3fQX@trial-v69oxl596yxg785k.mlsender.net','DDM');
            $mail->addAddress($correo,'Cliente');     //Add a recipient;

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $asunto;
            $mail->Body    = $body;

            $mail->send();
            $salida =  0;
        } catch (Exception $e) {
            $salida =  1;
        }
        return $salida;
    }

}