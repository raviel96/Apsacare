<?php
namespace app\controllers;
use app\models\Course;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Category;


class ApiController extends Controller {

    public function getAllCategories() {
        $categories = (new Category())->findAll();

        echo json_encode($categories, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }

    public function getAllCourses() {
        $courses = (new Course())->findAll();
        
        echo json_encode($courses, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }

    public function getOneCategory(Request $request, Response $response) {
        $data = $request->getParams();
        
        if($data) {
            $category = (new Category())->findOne($data);
            echo json_encode($category, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

    }

    public function getOneCourse(Request $request, Response $response) {
        $data = $request->getParams();
        
        if($data) {
            $course = (new Course())->findOne($data);
            echo json_encode($course, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }

    }
}