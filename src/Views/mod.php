<section id="img-visual">
        <img src="/img/img2.png" alt="" id="bImg">
        <div class="side-nav between">
            <div class="icon-img">
            <a href="/"><img src="/img/home.png" alt=""></a>
        </div>
            <p>| MOD</p>
        </div>
    </section>
    <div class="container">
        <form action="/board/mod" method="post">
        <input type="hidden" name="id" value="<?= $b->id ?>">
            <div class="form-group">
                <label for="title">제목</label>
                <input type="text" class="form-control" name="title" id="title" value="<?= $b->title ?>" placeholder="제목을 입력하세요">
            </div>
            <div class="form-group">
                <label for="content">글 내용</label>
                <textarea class="form-control" name="content" id="content" rows="8"><?= $b->content ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">수정</button>
        </form>
        </div>
    </div>
</body>
</html>