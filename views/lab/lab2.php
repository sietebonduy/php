<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



?>

<div class="alert alert-success" role="alert">
  Лабораторная работа №2
</div>

<h1>Authors</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">LASTNAME</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($authors as $author): ?>
      <tr>
        <td><?= Html::encode("{$author->ID}") ?></td>
        <td><?= Html::encode("{$author->NAME}") ?></td>
        <td><?= Html::encode("{$author->LASTNAME}") ?></td>
      </tr>
    <?php endforeach; ?>


  </tbody>
</table>

<h1>Genres</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($genres as $genre): ?>
      <tr>
        <td><?= Html::encode("{$genre->ID}") ?></td>
        <td><?= Html::encode("{$genre->NAME}") ?></td>
      </tr>
    <?php endforeach; ?>


  </tbody>
</table>

<h1>Books</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">AUTHOR</th>
      <th scope="col">GENRE</th>
      <th scope="col">DATE</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($books as $book): ?>
      <tr>
        <td><?= Html::encode("{$book->ID}") ?></td>
        <td><?= Html::encode("{$book->NAME}") ?></td>
        <td><?= Html::encode("{$book->author->LASTNAME}") ?></td>
        <td><?= Html::encode("{$book->genre->NAME}") ?></td>
        <td><?= Html::encode("{$book->DATE}") ?></td>
      </tr>
    <?php endforeach; ?>


  </tbody>
</table>



<h1>Запросы</h1>
    </br>
<h3>Книга была написана в 20 веке</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">AUTHOR</th>
      <th scope="col">GENRE</th>
      <th scope="col">DATE</th>
    </tr> 
  </thead>
  <tbody>
    <?php foreach ($queryYear as $book): ?>
      <tr>
        <td><?= Html::encode("{$book->ID}") ?></td>
        <td><?= Html::encode("{$book->NAME}") ?></td>
        <td><?= Html::encode("{$book->author->LASTNAME}") ?></td>
        <td><?= Html::encode("{$book->genre->NAME}") ?></td>
        <td><?= Html::encode("{$book->DATE}") ?></td>
      </tr>
    <?php endforeach; ?>


  </tbody>
</table>




<h3>Кол-во книг у авторов</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">AUTHOR</th>
      <th scope="col">Count_Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($queryAuthors as $book): ?>
      <tr>
        <td><?= Html::encode("{$book->author->LASTNAME}") ?></td>
        <td><?= Html::encode("{$book->countName}") ?></td>

      </tr>
    <?php endforeach; ?>


  </tbody>
</table>




<h3>Поиск книги</h3>
<?php $form = ActiveForm::begin(); ?>
  <?= $form->field($querySearchBook, 'name') -> label('Название книги:') ?>

  <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>

<?php if($querySearchBook->load(Yii::$app->request->post()) && $querySearchBook->validate()) { ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">AUTHOR</th>
      <th scope="col">GENRE</th>
      <th scope="col">DATE</th>
    </tr>
  </thead>
  <tbody>
      <tr>
        <?php foreach ($query as $book): ?>
            <td><?= Html::encode("{$book->ID}") ?></td>
            <td><?= Html::encode("{$book->NAME}") ?></td>
            <td><?= Html::encode("{$book->author->LASTNAME}") ?></td>
            <td><?= Html::encode("{$book->genre->NAME}") ?></td>
            <td><?= Html::encode("{$book->DATE}") ?></td>
        <?php endforeach; ?>
      </tr>
    
  </tbody>
</table>
<?php } ?>




<h3>Добавить автора</h3>
<?php $form = ActiveForm::begin(); ?>
  <?= $form->field($modelAuthorAdd, 'id') -> label('ID:') ?>
  <?= $form->field($modelAuthorAdd, 'name') -> label('Имя автора:') ?>
  <?= $form->field($modelAuthorAdd, 'lastname') -> label('Фамилия автора:') ?>

  <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">LASTNAME</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($authors as $author): ?>
      <tr>
        <td><?= Html::encode("{$author->ID}") ?></td>
        <td><?= Html::encode("{$author->NAME}") ?></td>
        <td><?= Html::encode("{$author->LASTNAME}") ?></td>
      </tr>
    <?php endforeach; ?>


  </tbody>
</table>



<h3>Удалить автора</h3>
<?php $form = ActiveForm::begin(); ?>
  <?= $form->field($modelAuthorDel, 'id') -> label('ID:') ?>

  <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">LASTNAME</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($authors as $author): ?>
      <tr>
        <td><?= Html::encode("{$author->ID}") ?></td>
        <td><?= Html::encode("{$author->NAME}") ?></td>
        <td><?= Html::encode("{$author->LASTNAME}") ?></td>
      </tr>
    <?php endforeach; ?>


  </tbody>
</table>