<section id="visual">
        <div class="logo-text center">
            <h1 style="font-size: 67px;">YOUT PERFECT HEALING</h1>
            <p style="font-size: 17px;">사랑하는 가족, 연인과의 편안한 힐링여행</p>
        </div>
        <img src="img/tent-5441144_1920.jpg" alt="">
        <div class="bottom-text center">
            <h2>ABOUT CAMPINGFIRST</h2>
        <div class="bar"></div>
            <p style="text-align: center; margin-top:20px;">캠핑의 즐거움과 자연의 공기가 가득한 기분을 느끼고, 숲 속 빈 공간에 앉아<br>
            편히 쉬며 힐링을 하며 캠핑을 하고 싶다면 가기위한 정보들을 "캠핑힐" 에서 보면서 시작을 해보아요.</p>
        </div>
    </section>
    <section id="main">
        <div class="icon-card center">
            <div class="icard center">
                <img src="/img/icon1.png" alt="">
                <h3>소개</h3>
                <p>전국 캠핑<br>정보를 알 수 있습니다.</p>
            </div>
            <div class="icard center">
                <img src="/img/col_01_icon03.png" alt="">
                <h3>소통</h3>
                <p>대화를 나누어<br>정보를 교환합니다.</p>
            </div>
            <div class="icard center">
                <img src="/img/icon2.png" alt="">
                <h3>힐링</h3>
                <p>자유를<br>느껴보세요.</p>
            </div>
            <div class="icard center">
                <img src="/img/icon4.png" alt="">
                <h3>서비스</h3>
                <p>편리하고 신속한<br>서비스를 제공합니다.</p>
            </div>
        </div>
    </section>
    <section id="ex-section">
        <img src="img/camping-691424_1920.jpg" alt="">
        <div class="ex-card">
            <h4 style="font-size:45px;">EXCELLENCE<br>FIND YOUR <span style="color:#824f86;">CAMPING</span></h4>

            <p style="margin-top: 23px;">안성맞춤인 적합하고 편한한 장소를<br>
            찾아 좋은 환경인 캠핑장으로 휴양하시길 바랍니다.</p>
        </div>
    </section>
    <section id="business" class="center">
        <div class="container">
            <div class="side-text">
                <h2>business</h2>
            </div>
        <div class="more-group">
        <?php foreach($list as $b): ?>
            <div class="more-card">
                <img src="/img/<?=$b->img ?>" alt="">
            </div>
            <div class="more-card" style="padding:30px;">
                <h3><?=$b->title ?></h3>
                <p><?=$b->content ?></p>
                <button id="moreBtn"><a href="/board/view?id=<?=$b->id?>">more <span>></span> </a></button>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    </section>
    <footer class="center">copyright</footer>
</body>
</html>