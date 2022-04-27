<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\ReviewForm;
use app\models\Authors;
use app\models\Genres;
use app\models\Books;
use app\models\SearchBookForm;
use app\models\AddAuthorForm;
use app\models\DeleteAuthorForm;

class LabController extends Controller {
    
    public function actionInfo() {
        return $this->render('info');
    }

    public function actionLab1() {
        $model = new ReviewForm();
        return $this->render('lab1', ['model' => $model]);
    }

    public function actionLab2() {
        $authors = Authors::find() -> all();
        $genres = Genres::find() -> all();
        $books = Books::find() -> all();
        $querySearchBook = new SearchBookForm();
        $modelAuthorAdd = new AddAuthorForm();
        $modelAuthorDel = new DeleteAuthorForm();

        $queryYear = Books::find() 
        -> where(['between', 'DATE', '1901', '2000'])
        -> orderBy('DATE')
        -> all();

        $queryAuthors = Books::find() 
        -> select(['COUNT(NAME) AS countName', 'AUTHOR'])
        -> groupBy('AUTHOR')
        -> all();

        if($querySearchBook->load(Yii::$app->request->post()) && $querySearchBook->validate()) {
            $query = Books::find() 
            -> where(['like', 'NAME', 'Два'])
            -> all();
        }

        if($modelAuthorAdd->load(Yii::$app->request->post()) && $modelAuthorAdd->validate()) {
            $author = new Authors();
            $author->ID = $modelAuthorAdd->id;
            $author->NAME =  $modelAuthorAdd->name;
            $author->LASTNAME =  $modelAuthorAdd->lastname;
            $author->save();
        }

        if($modelAuthorDel->load(Yii::$app->request->post()) && $modelAuthorDel->validate()) {
            $author = new Authors();
            $author = Authors::findOne($modelAuthorDel->id);
            $author->delete();
        }

        return $this->render('lab2', [
            'authors' => $authors,
            'genres' => $genres,
            'books' => $books,
            'queryYear' => $queryYear,
            'queryAuthors' => $queryAuthors,
            'querySearchBook' => $querySearchBook,
            'query' => $query,
            'modelAuthorAdd' => $modelAuthorAdd,
            'modelAuthorDel' => $modelAuthorDel,
        ]);


    }

    public function actionLab3() {
        return $this->render('lab3');
    }

}


?>