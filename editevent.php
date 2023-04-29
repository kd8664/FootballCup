<?php
require "dbconnect.php";
require "auth.php";

$idMatch = $_GET['id'];
$sql = "SELECT Game.id, Game.id_team1, Game.id_team2, Game.Goals1, Game.Goals2 FROM Game WhERE Game.id=$idMatch";
$sqlgame = $conn->query($sql);

?>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Checkout - пользовательская форма заказа, показывающая компоненты формы и функции проверки. Версия v4.0.0">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="../../../../favicon.ico">

	<style>
        .center{
            margin-left:auto;
            margin-right:auto;
        }

        
    .btn {
        float:right;
        background-color: #4285F4;
        font-size: 18px;
        color: white;
    }

    .btn:hover {
        background-color: #1259b0;
        color: white;
    }
        </style>
  </head>

  <body>
  <?php
  foreach ($sqlgame as $games) : 
    $id_team1=$games['id_team1'];
    $sqlname = $conn->query("SELECT Team.Name FROM Team WHERE Team.id = $id_team1");
    $name1 = $sqlname->fetch(PDO::FETCH_ASSOC);
    $id_team2=$games['id_team2'];
    $sqlname = $conn->query("SELECT Team.Name FROM Team WHERE Team.id = $id_team2");
    $name2 = $sqlname->fetch(PDO::FETCH_ASSOC);
    $goals1= $games['Goals1'];
    $goals2= $games['Goals2'];
endforeach;
?>
<div class="container pt-5">
        <h2 class="text-center mt-5">Редактирование матча</h2>
        <a href="/index.php">На главную</a>
        <form class="needs-validation" action="/matches.php?id=<?= $idMatch ?>" method="POST">
                    <div class="card mb-4 mt-4 shadow-sm">
                        <div class="card-body">
                            <div class="col">
                                <div class="row">
                                    <div class="col mb-3">
                                        <h5 for="exampleFormControlTextarea1" class="form-label">Название 1 команды
                                        </h5>
                                        <input type="varchar" class="form-control" name="Name1" id="Name1" value = "<?= $name1['Name'] ?>">
                                    </div>
                                    <div class="col mb-3">
                                        <h5 for="exampleFormControlTextarea1" class="form-label">Счет 1 команды
                                        </h5>
                                        <input type="varchar" class="form-control" name="Goals1" id="Goals1" value = "<?= $goals1?>">
                                    </div>
                                    <div class="col mb-3">
                                        <h5 for="exampleFormControlTextarea1" class="form-label">Счет 2 команды
                                        </h5>
                                        <input type="varchar" class="form-control" name="Goals2" id="Goals2" value = "<?= $goals2?>">
                                    </div>
                                    <div class="col mb-3">
                                        <h5 for="exampleFormControlTextarea1" class="form-label">Название 2 команды
                                        </h5>
                                        <input type="varchar" class="form-control" name="Name2" id="Name2" value = "<?= $name2['Name'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-secondary btn-lg btn-block" formaction="/edit.php?id=<?= $idMatch ?>" type="submit">Сохранить изменения</button>
        </form>
    </div>

</div>
</body>