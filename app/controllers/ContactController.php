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
                $subject = "";
                $body = "De : ".$contact->lastname." ".$contact->firstname."\r\n"
                        ."Email : ".$contact->email."\r\n"
                        ."Téléphone : ".$contact->phone."\r\n"
                        ."Message : ".$contact->message;

                mail(self::SEND_TO, $subject, $body);

                return "Email send";
            }

            return $this->render("contact", ["model" => $contact]);
        }
        
        return $this->render("contact", ["model" => $contact]);
    }
}