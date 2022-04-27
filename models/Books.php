<?php
    namespace app\models;
    use yii\db\ActiveRecord;
    class Books extends ActiveRecord
    {
        public $countName;
        
        public function getAuthor()
        {
            return $this->hasOne(Authors::class, ['ID' => 'AUTHOR']);
        }

        public function getGenre()
        {
            return $this->hasOne(Genres::class, ['ID' => 'GENRE']);
        }
    }