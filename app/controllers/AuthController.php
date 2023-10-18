<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Category;
use app\models\Course;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller {
   
   public const ROLE_USER = "ROLE_USER";
   public const ROLE_ADMIN = "ROLE_ADMIN";

   public function login(Request $request, Response $response) {

      $loginForm = new LoginForm();

      if($request->isPost()) {

         $loginForm->loadData($request->getData());

         if($loginForm->validate() && $loginForm->login()) {
            
            $user = Application::$app->getUser();
            
            //On vérifie si l'utilisateur existe
            if(!$user) {

            }

            //On vérifie si l'utilisateur est un utilisateur normal
            if($user && $user->role === self::ROLE_USER) {
            
            }

            //On vérifie si l'utilisateur est un administrateur
            if($user && $user->role === self::ROLE_ADMIN) {

               $response->redirect("/portal/admin");
               return;
            }
         } 
         
         return $this->render("login", ["model" => $loginForm]);
      }

        return $this->render("login", ["model" => $loginForm]);
   }
   
   
}