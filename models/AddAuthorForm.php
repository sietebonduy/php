<?php
    namespace app\models;
    use yii\base\Model;

    class AddAuthorForm extends Model
    {
        public $id;
        public $name;
        public $lastname;

        public function rules()
        {
            return [
                [['id', 'name', 'lastname'], 'required', 'message' => 'Поле не заполнено'],
                // обрезает пробелы
                [['id', 'name', 'lastname'], 'trim',],
                    
            ];
        }
    }