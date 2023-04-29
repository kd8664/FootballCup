<?php
require "dbconnect.php";
require "auth.php";

$sql = "SELECT * FROM Team";
$result_1 = $conn->query($sql);
$result_2 = $conn->query($sql);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://snipp.ru/cdn/selectize.js/0.12.6/dist/css/selectize.default.css">
    <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://snipp.ru/cdn/microplugin.js/src/microplugin.js"></script>
    <script src="https://snipp.ru/cdn/sifter.js/sifter.min.js"></script>
    <script src="https://snipp.ru/cdn/selectize.js/0.12.6/dist/js/selectize.min.js"></script>
    <title>Админ-панель</title>
    <style>
        .card {
            border: 1px solid #4285F4;
            border-radius: 5px;
        }

        .btn {
            justify-content: center;
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
    <div class="container pt-5">
        <h2 class="text-center mt-5">Создание матча</h2>
        <a href="/index.php">На главную</a>
        <form class="needs-validation" action="insertMatch.php" method="POST">
            <div class="card mb-4 mt-3 shadow-sm">
                <div class="card-body">
                    <div class="col">
                        <div class="row">
                            <div class="col-4 mb-3">
                                <h5 for="Name1" class="form-label">Название 1 команды
                                </h5>
                                <div class="select_wrp">
                                    <select class="Name1" name="Name1" placeholder="Выберите команду">
                                        <?php foreach ($result_1 as $object_1) {
                                            echo "<option value = ''>Выберите команду</option>";
                                            echo "<option value = '$object_1[Name]'> $object_1[Name] </option>";
                                        } ?>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $('.Name1').selectize();
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-2 mb-3">
                                <h5 for="Goals1" class="form-label">Счёт 1 команды
                                </h5>
                                <input type="Goals1" name="Goals1" class="form-control">
                            </div>
                            <div class="col-2 mb-3">
                                <h5 for="Goals2" class="form-label">Счёт 2 команды
                                </h5>
                                <input type="Goals2" name="Goals2" class="form-control">
                            </div>
                            <div class="col-4 mb-3">
                                <h5 for="Name2" class="form-label">Название 2 команды
                                </h5>
                                <div class="select_wrp">
                                    <select class="Name2" name="Name2" placeholder="Выберите команду">
                                        <?php foreach ($result_2 as $object_2) {
                                            echo "<option value = ''>Выберите команду</option>";
                                            echo "<option value = '$object_2[Name]'> $object_2[Name] </option>";
                                        } ?>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $('.Name2').selectize();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-secondary btn-lg btn-block" type="submit">Добавить матч</button>
        </form>
    </div>
</body>

</html>