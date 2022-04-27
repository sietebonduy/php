<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="alert alert-success" role="alert">Лабораторная работа №1</div>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name') -> label('Ваше имя:') ?>

    <?= $form->field($model, 'email') -> label('Ваш email:') ?>

    <?= $form->field($model, 'age') -> label('Ваш возвраст:') ?>

    <?= $form->field($model, 'visitDate') -> input('date') -> label('Время посещения:') ?>

    <?= $form->field($model, 'favoriteFood') -> input('select') -> label('Любимая кухня:')  -> dropdownlist([
        1 => 'Итальянская',
        2 => 'Французкая',
        3 => 'Японская',
        4 => 'Китайская',
        5 => 'Немецкая',

    ], ['prompt'=>'Выберите кухню'])?>

    <?= $form->field($model, 'shareToFriends') -> label('Порекомендуете нас друзьям?') -> radioList([
        1 => 'Да',
        2 => 'Нет',
    ])
?>

    <?= $form->field($model, 'textReview') ->label('Текст отзыва:') -> textarea() ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

<?php if($model->load(Yii::$app->request->post()) && $model->validate()) {?>
    <div class="review">
        <h4>Переданный отзыв</h4>

        <table class="table">
            <tbody>
            <tr>
            <th scope="row"> Ваше имя: </th>
                <td><?= Html::encode($model->name) ?> </td>
            </tr>
            <tr>
                <th scope="row"> Ваше email: </th>
                <td><?= Html::encode($model->email) ?> </td>
            </tr>
            <tr>
                <th scope="row"> Дата посещения: </th>
                <td> <?= Html::encode($model->visitDate) ?> </td>
            </tr>
            <tr>
                <th scope="row"> Ваш возраст: </th>
                <td><?= Html::encode($model->age) ?> </td>
            </tr>
            <tr>
                <th scope="row"> Любимая кухня: </th>
                <td><?= Html::encode($model->favoriteFood) ?> </td>
            </tr>
            <tr>
                <th scope="row"> Порекомендуете друзьям? </th>
                <td><?= Html::encode($model->shareToFriends) ?> </td>
                </tr>
            <tr>
                <th scope="row"> Текст отзыва: </th>
                <td><?= Html::encode($model->textReview) ?> </td>
            </tr>
            </tbody>
        </table>
    </div>
<?php } ?>
