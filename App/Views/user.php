<?php require 'app/views/header.php'?>
    <h1>Сведения о пользователе:</h1>

<?=$data['user']->name?>
<?=$data['user']->surname?><br>
<?=$data['user']->email?>
<?php require 'app/views/footer.php'?>