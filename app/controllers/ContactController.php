<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Contact;

class ContactController extends Controller {

    public const SEND_TO = "meldoune971@gmail.com";

    public function contact(Request $request, Response $response) {
       
        $contact = new Contact();
       
        if($request->isPost()) {
            $contact->loadData($request->getData());
            
            if($contact->validate()) {
                $br = "<br>";

                $subject = $contact->subject;
                $body = "De : ".$contact->lastname." ".$contact->firstname.$br
                        ."Statut : " .$contact->status. $br
                        ."Email : ".$contact->email. $br
                        ."Téléphone : ".$contact->phone. $br
                        ."Message : ".$br.
                        '<div style="line-height: 1.2;margin: 10px">'
                        .$contact->message.
                        '</div>';

                $toto = '<html>
                            <head>
                                <title>Message de contact</title>
                            </head>
                            <body>
                                <p style="font-size: 18px;"><strong>ApsaCare</strong></p>
                                <p style="margin: 10px 0; font-size: 15px;">Vous avez reçu une nouvelle prise de contact avec les informations suivantes : </p>
                                <table style="font-size: 15px;border-spacing: 0 5px;margin: 20px 0;">
                                    <tbody>
                                        <tr>
                                            <td><strong>Nom :</strong> </td>
                                            <td>'.$contact->lastname.'</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Prénom :</strong> </td>
                                            <td>'.$contact->firstname.'</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Statut :</strong> </td>
                                            <td>'.$contact->status.'</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email :</strong> </td>
                                            <td>'.$contact->email.'</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Téléphone :</strong> </td>
                                            <td>'.$contact->phone.'</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="font-size: 15px;margin-top: 10px;margin-inline: 10px;">
                                    <p><strong>Message :</strong> </p>
                                    <p>'.$contact->message.'</p>
                                </div>
                            </body>

                        </html>
                ';

                $headers = [
                    "From" => $contact->email,
                    "Reply-To" => $contact->email,
                    "X-Mailer" => 'PHP/' .phpversion(),
                    "X-Priority" => "1",
                    "MIME-Version" => "1.0",
                    "Content-Type" => "text/html; charset=UTF-8"
                ];

                if(!mail(self::SEND_TO, $subject, $toto, $headers)) {
                    return "Erreur lors de l'envoie du message";
                }

                return "Votre message a été envoyé avec succès !";
                
            }

            return $this->render("contact", ["model" => $contact]);
        }
        
        return $this->render("contact", ["model" => $contact]);
    }
}