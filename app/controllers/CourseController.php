<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Category;
use app\models\Course;
use Exception;

class CourseController extends Controller {


    public function create(Request $request, Response $response) {
        
        if($request->isPost()) {

            try {
                $course = new Course();
           
                $course->loadData($request->getData());

                // Insert course
                if(!$course->insert()) {
                    echo "erreur d'insertion";
                }
    
               $response->redirect("/portal/admin");
            }catch(Exception $e) {
                return $e;
            }
        }
    }

    public function get() {
        
    }

    public function update(Request $request, Response $response) {

        if($request->isPost()) {
            try {
                $courseId = $request->getData()["id"];

                $data = $request->getData();

                unset($data["id"]);
                unset($data["categoryId"]);

                if(!(new Course())->update($data, $courseId)) {
                    echo "erreur de mise à jour";
                }


                $response->redirect("/portal/admin");
            }catch(Exception $e) {
                return $e;
            } 
        }
    }

    public function delete(Request $request, Response $response) {
        
        if($request->isPost()) {
            try {
                (new Course)->delete($request->getParams());
                
                $response->redirect("/portal/admin");
            } catch(Exception $e) {
                return $e;
            }
        }
    }

    public function getCategory($id) {
        return (new Category)->findOne($id)->name;
    }
    
}