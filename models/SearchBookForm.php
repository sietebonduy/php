<?php
    namespace app\models;
    use yii\db\ActiveRecord;
    use yii\base\Model;
    class SearchBookForm extends Model
    {
        public $name;

        public function rules()
        {
            return [
                [['name'], 'required', 'message' => 'Поле не заполнено'],
                // обрезает пробелы
                ['name', 'trim',],
            ];
        }
    }