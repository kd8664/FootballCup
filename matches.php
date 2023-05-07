<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Checkout - пользовательская форма заказа, показывающая компоненты формы и функции проверки. Версия v4.0.0">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="../../../../favicon.ico">

    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
        }


        .btn {
            float: right;
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
    $sql = "SELECT * FROM Game ORDER BY Game.id ASC";
    $sqlgame = $conn->query($sql);
    ?>
    <div class="container pt-5">
        <div class="center">
            <h3 class="mt-5"><b>Футбол</b></h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <p align=left>Номер матча</p>
                        </th>
                        <th> </th>
                        <th>
                            <p align=right>1 команда</p>
                        </th>
                        <th class="table-active">
                            <p align=center>Счёт</p>
                        </th>

                        <th>
                            <p align=left>2 команда</p>
                        </th>
                        <th> </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($sqlgame as $games) :
                        $id_game = $games['id'];
                        $id_team1 = $games['id_team1'];
                        $sqlname = $conn->query("SELECT Team.Name FROM Team WHERE Team.id = $id_team1");
                        $name1 = $sqlname->fetch(PDO::FETCH_ASSOC);
                        $sqlname = $conn->query("SELECT Team.emblem FROM Team WHERE Team.id = $id_team1");
                        $emblem1 = $sqlname->fetch(PDO::FETCH_ASSOC);
                        $id_team2 = $games['id_team2'];
                        $sqlname = $conn->query("SELECT Team.Name FROM Team WHERE Team.id = $id_team2");
                        $name2 = $sqlname->fetch(PDO::FETCH_ASSOC);
                        $sqlname = $conn->query("SELECT Team.emblem FROM Team WHERE Team.id = $id_team2");
                        $emblem2 = $sqlname->fetch(PDO::FETCH_ASSOC);
                        $goals1 = $games['Goals1'];
                        $goals2 = $games['Goals2'];
                        $logo1 = $emblem1['emblem'];
                        $logo2 = $emblem2['emblem']
                    ?>
                        <tr>
                            <th><?= $id_game ?></th>
                            <td align=right> <img src='<?= $logo1 ?>' heigth=40 width=50 alt='' /></td>
                            <td align=right><?= $name1['Name'] ?></td>
                            <td class="table-active" align=center><b><?= $goals1 ?>:<?= $goals2 ?></b></td>
                            <td><?= $name2['Name'] ?></td>
                            <td><img src='<?= $logo2 ?>' heigth=40 width=50 alt='' /></td>

                            <td>
                                <a href="/editevent.php?id=<?= $games['id'] ?>"><img class="ml-3" src="/assets/edit.png" width="20" height="20"></a>
                                <a href="/deleteevent.php?id=<?= $games['id'] ?>"><img class="ml-3" style="float:right" src="/assets/del.png" width="20" height="20"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form>
                <button formaction="/NewMatch.php" class="btn  mt-3">
                    <ya-tr-span data-type="trSpan">Добавить матч</ya-tr-span>
                </button>
            </form>
        </div>
    </div>
</body>