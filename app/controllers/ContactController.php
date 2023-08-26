<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Contact;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class ContactController extends Controller {

    public const SEND_TO = "meldoune971@gmail.com";

    public function contact(Request $request, Response $response) {
       
        $contact = new Contact();
       
        if($request->isPost()) {
            $contact->loadData($request->getData());
            
            if($contact->validate()) {
                
                $mail = new PHPMailer(true);
                try {
                    $tdStyle = 'style="padding: 10px;word-wrap: anywhere;"';
                    $titleClr = 'style="color: rgb(60, 139, 191);"';

                    $subject = $contact->subject;
                    $body = '<html>
                            <head>
                                <title>Message de contact</title>
                            </head>
                            <body>
                                <p style="font-size: 18px;"><strong><span style="color:#9BB43C">Apsa</span><span style="color:#3C8BBF">Care</span></strong></p>
                                <p style="margin: 10px 0; font-size: 15px;">Vous avez reçu une nouvelle prise de contact avec les informations suivantes : </p>
                                <table style="font-size: 15px;border-spacing: 0 5px;margin: 20px 0;table-layout: fixed">
                                    <tbody>
                                        <tr>
                                            <td><strong '.$titleClr.'>Nom :</strong> </td>
                                            <td '.$tdStyle.'>'.$contact->lastname.'</td>
                                        </tr>
                                        <tr>
                                            <td><strong '.$titleClr.'>Prénom :</strong> </td>
                                            <td '.$tdStyle.'>'.$contact->firstname.'</td>
                                        </tr>
                                        <tr>
                                            <td><strong '.$titleClr.'>Object du message :</strong> </td>
                                            <td '.$tdStyle.'>'.$contact->subject.'</td>
                                        </tr>
                                        <tr>
                                            <td><strong '.$titleClr.'>Statut :</strong> </td>
                                            <td '.$tdStyle.'>'.$contact->status.'</td>
                                        </tr>
                                        <tr>
                                            <td><strong '.$titleClr.'>Email :</strong> </td>
                                            <td '.$tdStyle.'>'.$contact->email.'</td>
                                        </tr>
                                        <tr>
                                            <td><strong '.$titleClr.'>Téléphone :</strong> </td>
                                            <td '.$tdStyle.'>'.$contact->phone.'</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="font-size: 15px;margin-top: 10px;margin-inline: 10px;">
                                    <p><strong '.$titleClr.'>Message :</strong> </p>
                                    <p>'.$contact->message.'</p>
                                </div>
                            </body>
                        </html>
                ';

                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = "meldoune971@gmail.com";
                    $mail->Password = "dwgkqpyiffjbdykj";
                    $mail->SMTPSecure = "tls";
                    $mail->Port = 587;

                    $mail->setFrom($contact->email, "ApsaCare");
                    $mail->addAddress(self::SEND_TO);
                    $mail->addReplyTo($contact->email);

                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body = $body;
                    $mail->send();
                    
                    $this->redirectToContact($response, "success", "Votre message a été envoyé avec succès !");
                } catch(Exception $e) {
                    $this->redirectToContact($response,"error", "Nous avons rencontré une erreur lors de l'envoie du message");
                }
                
            }

            return $this->render("contact", ["model" => $contact]);
        }
        
        return $this->render("contact", ["model" => $contact]);
    }



    protected function redirectToContact(Response $response, $flashKey, $falshMessage) {
        Application::$app->getSession()->setFlash($flashKey, $falshMessage);
        $response->redirect("/contact");
    }
}