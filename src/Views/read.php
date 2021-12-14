     <style>
     .listText > div{
         padding:20px;
         display: flex;
         flex-direction: column;
     }
     
     .textBtn {
        width: 13%;
        border: none;
        background-color:none;
        text-align:left;
        margin-top:20px;
     }

     .text-body {
        background-color: #f4f4f4;
        border-top: 1px solid #888;
     }

     .text-hidden {
         display:none;
     }

     .card-body img {
         width:50%;
     }
     .user-profile img {
        width:25px;
        height: 25px;
        border-radius: 50%;
    }

    .user-profile {
        display: flex;
    }

    .delText {
        height:40vh;
        font-weight:bold;
    }
     </style>
         <script src="/js/reply.js"></script>
    <script src="/js/jquery-3.4.1.js"></script>
</head>
<body>
<section id="img-visual">
    <img src="/img/img2.png" alt="" id="bImg">
        <div class="side-nav between">
            <div class="icon-img">
            <a href="/"><img src="/img/home.png" alt=""></a>
        </div>
            <p>| READ</p>
        </div>
    </section>
    <div class="container">
        <section id="read">
        <?php if($b->delCheck=="삭제"): ?>
            <p class="delText center">삭제된 게시글 입니다.</p>


        <?php else: ?>
            <h2><?= htmlentities($b->title) ?></h2>
            <div class="user-profile">
                <?php if($profile!="") :?>
                    <img src="/img/<?=$profile ?>" alt="">
                <?php else: ?>
                <div class="img center"><i class="fas fa-user"></i></div>
                <?php endif; ?>
            <div class="user-text">
                <p><?=$b->writer ?></p>
                <p><?= $b->date ?></p>
            </div>
                                       
            <div class="card-group">
            <!-- <p style="font-size:13px; margin-right:10px;">조회수 : <?=$b->view ?></p> -->
            <button type="button"><a href="/board?select=1&p=1">목록</a></button>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']->name == $b->writer) :?>
                <button type="button"><a href="/board/mod?id=<?= $b->id ?>">수정</a></button>
                <button onclick="del()" type="button">삭제</button>
            <?php endif; ?>
            </div>
        </div><hr>
        <p><?= nl2br(htmlentities($b->content)) ?></p>
        <form>
        <div id="thumbs"> 
            <input type="hidden" name="id" value=<?=$b->id ?>>
            <input type="hidden" name="email" value=<?=$_SESSION['user']->email?>>
        <i class="far fa-thumbs-up" id="thumbsBtn"></i><?=$b->cnt?>
        </div>
        </form>
        <?php if($b->img!=""): ?>
            <img src="/img/<?=$b->img ?>" class="card-img-top" alt="첨부이미지" />
            <?php endif; ?>
            <?php if(isset($_SESSION['user'])): ?>
                <form method="post" id="cooment_form">
                    <div class="textBox">
                        <input type="hidden" value="<?= $b->id ?>" name="viewID">
                        <input type="text"  id="comment" placeholder="댓글을 입력하세요" name="comment" style="width:92%;">
                        <input type="submit" id="submit" name="submit" placeholder="등록">
                    </div>
                </form>
                <?php endif; ?>
                        <div id="text-group">
                        <?php foreach($text as $c): ?>
                            <?php if($c->id == $b->id): ?>
                                <div class="text-body">
                                    <p style="font-weight: bold;"><?=$c->name ?></p>
                                    <div class="textBox"><?=$c->enoTe ?></div>
                                    <p><?=$b->date ?></p>
                                    
                            <?php if($_SESSION['user']->id== "admin"): ?>
                                    <a href="/admin/comment?idx=<?=$c->idx ?>">삭제</a>
                            <?php endif; ?>

                            <?php endif; ?>
                        <?php endforeach; ?>
                        </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        </div>
    </section>
</div>
    <footer class="center">copyright</footer>
    </div>
    <script>
        function del() {
            let ans=  confirm("정말 삭제하시겠습니까?");
            if(ans) {
                location="/board/delete?id=<?=$b->id ?>";
            }
        }
    </script>
</body>

</html>