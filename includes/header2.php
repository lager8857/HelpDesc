<?php

require_once("dbconnect.php");

?>

<div class="container-fluid header-top">
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-12 ">
                <div class="header-logo">
                    <a class="navbar-brand" href="/">HelpDesc</a>
                </div>
                <div class="header-links col-md-8">
                    <ul>
                        <li><a href="/client/tickets">Заявки</a></li>
                        <li><a href="/client/base">База знаний</a></li>
                        <li><a href="/client/faq">FAQ</a></li>
                        <li><a href="/client/documentation">Документация</a></li>
                        <li>
                            <div class="user-bar-segment">
                                <?php
                                if (!isset($_SESSION['email']) && !isset($_SESSION['password'])){
                                ?>
                        <li><a class="" href="/login/form_auth.php">Авторизация</a></li>
                        <li><a class="" href="/register/form_register.php">Регистрация</a></li>
                        <?php
                        } else {
                            ?>
                            <img src="http://support.patchesoft.com/uploads/default.png" class="user_avatar"> <a
                                    href="javascript:void(0)" class="dropdown-toggle" id="dropdownMenu1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <?php echo $_SESSION['surname'] . ' ' . $_SESSION['firstname']; ?>
                            </a>
                            <ul class="dropdown-menu" id="user-menu-links" aria-labelledby="dropdownMenu1">
                                <li><a href="/cp.php">Личный кабинет</a></li>
                                <li><a href="/user_setting">Страница пользователя</a></li>
                                <li><a href="/logout.php">Выход</a></li>
                            </ul>
                            <?php
                            $test = $_SESSION['firstname'];
                            $zapr_result = $mysqli->query("SELECT * FROM `user1` WHERE firstname = '$test'", MYSQLI_USE_RESULT);

                            while ($row = mysqli_fetch_assoc($zapr_result)) {
                                $id = $row['id'];

                                $_SESSION['id'] = $row['id'];
                                $id1 = $_SESSION['id'];
                                // выводим
                            }


                        }
                        ?>
                </div>
                </li>
                </ul>

            </div>
        </div>

    </div>
</div>
</div>
<div class="container-fluid background-area">
</div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="row">

                    <div class="col-md-offset-2 col-md-8 header-search">
                        <h2>Чем мы можем вам помочь?</h2>
                        <form action="http://support.patchesoft.com/client/knowledge_search" method="post"
                              accept-charset="utf-8">
                            <input type="hidden" name="csrf_test_name" value="6371ec9d4145c5f1c1b48a455fb0c478"/>
                            <div class="input-group">
                                <input type="text" name="search" class="form-control input-lg"
                                       placeholder="Задайте вопрос"/>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-info btn-lg">
                                        <i class="fab fa-sistrix"></i></button>
                                </div><!-- /btn-group -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>