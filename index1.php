<?php
require_once 'session.start.php';
require_once 'configDB.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>STUD_FILES</title>
</head>
<body>
<div class="nav-container">
    <nav class="navbar">
        <h1 id="navbar-logo">STUD_FILES</h1>
        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <ul class="nav-menu">
            <li><a href="#home" class="nav-links">Главная</a></li>
            <li><a href="personal_page.php" class="nav-links nav-links-btn" id="reg">Здравствуйте, <?=$_SESSION['user']['user_name']?></a></li>
            <li><a id="exit_account_button" class="nav-links nav-links-btn2">Выход</a></li>
        </ul>
    </nav>
</div>

<div class="main">
    <div class="main-container">
        <div class="main-content">
            <h1>
                Вперед к знаниям
            </h1>
            <p>
                Платформа STUD FILES поможет быстро найти необходимые учебные материалы других пользователей и загрузить свои
            </p>
            <button class="main-btn">
                <a href="#">
                    Поехали
                </a>
            </button>
        </div>
        <div class="main-img-container">
            <img src="images/pic1.svg" alt="" id="main-img">
        </div>
    </div>
</div>

<!-- add_post -->
<div class="modal3" id="4email-modal">
    <div class="modal3-content">
        <span  class="close-btn3" style="position: absolute;top: 2%;right: 3%;font-size: 1.5rem;z-index: 1;">&times;</span>
        <div class="modal3-content-left">
            <img id="Modal3-img" src="images/pic4.svg" alt="">
        </div>
        <div class="modal3-content-right">
            <form class="modal3-form" id="add_form">
                <h2>
                    Добавьте пост уже сейчас
                </h2>
                <div class="form-validation3">
                    <input type="text" class="modal3-input" id="name_add" name="text" placeholder="Название" required minlength="3" maxlength="20">
                </div>
                <div class="form-validation2">
                    <textarea class="modal3-input" id="text_add" name="textarea" placeholder="Описание" required minlength="10" maxlength="150"></textarea>
                </div>
                <div class="example-1">
                    <div class="form-group">
                        <label class="label">
                            <i class="material-icons">attach_file</i>
                            <span class="title" style="font-size: 15px; ">Добавить файл</span>
                            <input id="file_add" type="file">
                        </label>
                     </div>
                </div>
                <button type="submit" class="modal3-input-btn" id="submit">Добавить</button>
            </form>
        </div>
    </div>
</div>

<!-- Cards -->
<div class="services1" id="services">
    <h1>Доступные файлы</h1>
    <button class="btn-services2" style="color: white;">Добавить пост</button>
    <div id="second_wrapper" class="services_wrapper1">
        <?php
        $query = 'SELECT `id_post`, `name`,  `date_added` FROM `post_file` ORDER BY `id_post` DESC LIMIT :limit';
        if (!empty($pdo)) {
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                               'limit' => 2
                           ]);
            while($row = $stmt->fetch(PDO::FETCH_LAZY)){
                ?>
                <div data-id="<?=$row->id_post?>" class="services1_card">
                    <h2><?=$row->name?></h2>
                    <p><?=$row->date_added?></p>
                    <div class="services1_btn"><button data-id="<?=$row->id_post?>"  class="detail_page_button">
                            Показать</button></div>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <button class="btn-services1"><a>Показать ещё</a></button>
</div>

<!-- Footer -->
<div class="footer_container">
    <section class="social_media">
        <div class="social_media-wrap">
            <div class="footer_logo">
                <a href="#" id="footer_logo">STUD_FILES</a>
            </div>
            <p class="website_right">Ⓒ STUD_FILES 2021. Все права защищены.</p>
            <div class="social_icons">
                <a href="/" class="social_icon-link" target="_blank"><i class='fab fa-facebook-f'></i></a>
                <a href="/" class="social_icon-link"><i class='fab fa-instagram f-10x'></i></a>
                <a href="/" class="social_icon-link"><i class="far fa-envelope" style="color: white;font-size: 35px"></i></a>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="js/JQuery3.3.1.js"></script>
<script src="js/app2.js"></script>
<script src="js/add.js"></script>
<script type="text/javascript">
    const modal11 = document.getElementById('4email-modal');
    const openBtn11 = document.querySelector('.btn-services2');
    const closeBtn3 = document.querySelector('.close-btn3');

    openBtn11.addEventListener('click',() => {
        modal11.style.display = 'block';
    });
    closeBtn3.addEventListener('click',() => {
        modal11.style.display = 'none';
    });

    window.addEventListener('click',(e) => {
        if(e.target === modal11){
            modal11.style.display = 'none';
        }
    })
</script>
</body>
</html>
