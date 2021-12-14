<style>
    .box-group {
    display: grid !important;
    grid-template-columns: repeat(4,230px);
    gap:20px;
}

.box {
    position: relative;
}

#feed .container {
    flex-direction: column;
}

p {
    margin: 0 !important;
}

.box img {
    width:100%;
    height:230px;
    object-fit: cover;
    transition: .4s;
}

.box:hover img{
    filter: brightness(50%);
}

#more-icon {
    position: absolute;
    top:20%;
    left:30%;
    opacity: 0;
    transition: .4s;
    color:#fff;
    border:none;
    background:none;
    color:#fff;

}

.post:hover #more-icon {
    opacity: 1;
    transform: translateY(-50%);
}

.post-group {
    display: grid;
    grid-template-columns: repeat(4,270px);
    gap:10px;
}

.post {
    height:312px;
}

.post img {
    width:100%;
    height:70%;
}

.post p:nth-child(1) {
    font-weight: bold;
}

.post span {
    font-weight: lighter;
    font-size: 12px;
}

.conBox {
    height:830px;
    border:1px solid #ddd;
    position: relative;
    overflow: hidden;
}

.post img {
    width:100%;
    height:76%;
    object-fit: cover;
    transition: .4s;
}

.post:hover img{
    filter: brightness(50%);
}

#more {
    padding:10px;
    width:40%;
    background-color: #bda379;
    margin:20px;
}
</style>
<section id="img-visual">
        <img src="img/img2.png" alt="" id="bImg">
        <div class="side-nav between">
            <div class="icon-img">
            <a href="/"><img src="/img/home.png" alt=""></a>
        </div>
            <p>| PEED</p>
        </div>
    </section>
    <section id="feed">
        <div class="container center">
            <div class="conBox">
                <div class="post-group">
                    <?php foreach($list as $b):?>
                        <?php if($b->img!="") :?>
                        <div class="post" onclick="moreClick(<?= $b->id ?>)">
                        <img src="/img/<?=$b->img ?>" alt="">
                        <div class="post-text">
                            <p><?=$b->writer ?></p>
                        <p style="font-size: 13px;"><?=$b->title ?></p>
                        <p style="font-size: 13px;"><?=$b->date ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <button id="more" onclick="plusClick();">더보기</button>
    </section>
    <script>
        function moreClick(id) {
            console.log(id);
            let idx=id;
            location="/board/view?id="+id;
        }

        function plusClick() {
            let post = document.querySelector(".post-group");
        let conBox = document.querySelector(".conBox");
        let list = document.querySelectorAll(".post");
        let postH=post.offsetHeight;


        let postLen = list.length;
        let page=1;
        let h = 830;
        let cnt =12;
        document.querySelector("#more").addEventListener("click",e=> {
            if(document.querySelector(".notMore")!=null) {
                return;
            }
            if(postLen <12*page) {
                console.log("안됨");
                const p= document.createElement("p");
                p.classList.add("notMore");
                p.innerText="게시물이 더이상 없습니다.";
                document.querySelector(".conBox").appendChild(p);
            }else {
                cnt=cnt*2;
                h= h+830;
                page=page+1;
                $(".conBox").animate({
                    height:h+"px"
                },200);
            }
        })
        }
    </script>
    </body>

</html>