<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>메인화면</title>
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/jquery-3.4.1.js"></script>
    <script src="/js/user.js"></script>
</head>
<style> 
 #profile-popup {
    position: fixed;
    width:100%;
    height:100%;
    left:0;
    display: none;
    top:0;
    background-color: rgba(0, 0, 0, 0.39);
    z-index: 100;
}

#profile-popup .inner {
    background-color: #fff;
    border-top: 30px solid #fddd;
     width:500px;
     height:130px;
     position: absolute;
     top:20%;
     left:37%;
     padding:40px;
 }

</style>
<body>
    <header>
       <a href="/"><div class="logo"><img src="/img/logo.png" alt=""></div></a>
        <nav>
            <a href="/">HOME</a>
            <a href="/board?select=1">NOTICE</a>
            <a href="/peed">IMGFEED</a>
        </nav>
        <div class="user" style="display:flex;">
            <?php if(!isset($_SESSION['user'])):?>
                    <a class="nav-link" href="/user/register">회원가입</a>
                    <a class="nav-link" href="/user/login">로그인</a>
                <?php else :?>
                    <?php if($_SESSION['user']->id=="admin"): ?>
                        <div class="img center"><i class="fas fa-user"></i></div>
                    <?php elseif($_SESSION['user']->img!=""): ?>
                        <div class="img"><img src="/img/<?=$_SESSION['user']->img ?>" alt=""></div>
                    <?php else: ?>
                        <div class="img center"><i class="fas fa-user"></i></div>
                <?php endif; ?>
                    <a class="nav-link" href="#"><?= htmlentities($_SESSION['user']->name)?>님</a>
            <?php endif; ?>
        </div>
    </header>

    <?php if(!isset($_SESSION['user'])):?>
        <div id="user-popup" class="center">
                <div class="inner">
                    <?php if($_SESSION['user']->id=="admin"): ?>
                        <div class="img center"><i class="fas fa-user"></i></div>
                            <?php elseif($_SESSION['user']->img!=""): ?>
                                <div class="img"><img src="/img/<?=$_SESSION['user']->img ?>" alt=""></div>
                            <?php else: ?>
                            <div class="img center"><i class="fas fa-user"></i></div>
                    <?php endif; ?>
                    <p><a href="/admin"><?=$_SESSION['user']->name ?></a></p>
                    <p><?=$_SESSION['user']->email ?></p>
                    <hr>
                    <button id="pChange" style="background:none;">프로필 바꾸기</button>
                    <a class="nav-link" href="/user/logout">로그아웃</a>
                </div>
            </div>
            <div id="profile-popup">
                <div class="inner">
                    <p id="close" style="width:15px; padding:5px;">x</p>
                    <form  action="/user/profile" method="post" enctype="multipart/form-data">
                        <input style="margin-top:10px;" type="file" name="img" id="img">
                        <button style="background:none; border:1px solid #ddd; padding:10px;">바꾸기</button>
                    </form>
                </div>
            </div>
    <?php endif; ?>
  
          