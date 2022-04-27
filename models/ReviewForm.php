<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ReviewForm extends Model
{
    public $name;
    public $email;
    public $age;
    public $visitDate;
    public $favoriteFood;
    public $shareToFriends;
    public $textReview;


    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'age', 'visitDate', 'favoriteFood', 'shareToFriends', 'textReview'], 'required', 'message' => 'Поле не заполнено'],
            // email has to be a valid email address
            ['email', 'email', 'message' => 'Некорректный email'],
            
            // verifyCode needs to be entered correctly
            
            // проверяет, что "name" это строка с длиной от 5 до 30 символов
            ['name', 'string', 'length' => [5, 30], 'message' => 'Имя длиной от 5 до 30 символов'],
            
            
            // проверяет, является ли "age" числом от 18 до 100
            ['age', 'compare', 'compareValue' => 18, 'operator' => '>=', 'type' => 'number', 'message' => 'Возраст от 18'],
            ['age', 'compare', 'compareValue' => 100, 'operator' => '<=', 'type' => 'number', 'message' => 'Возраст до 100'],
            
            
            // обрезает пробелы вокруг "username" и "email"
            ['textReview', 'trim',],
                
        ];
    }

}