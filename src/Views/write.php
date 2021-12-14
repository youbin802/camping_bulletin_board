<style>
    .form-group input {
    border:none;
    border-bottom: 1px solid #ddd;
}
</style>
<section id="img-visual">
        <img src="/img/img2.png" alt="" id="bImg">
        <div class="side-nav between">
            <div class="icon-img">
            <a href="/"><img src="/img/home.png" alt=""></a>
        </div>
            <p>| WRITE</p>
        </div>
    </section>
    <section id="write">
    <div class="container">
        <form action="/board/write" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">제목</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="제목을 입력하세요">
            </div>
            <div class="form-group">
                <label for="content">글 내용</label>
                <textarea class="form-control" name="content" id="content" rows="8"></textarea>
            </div>
            <div class="form-group">
                <label for="image">이미지</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <button type="submit" class="btn btn-primary">작성</button>
        </form>
    </div>
    </section>
</body>

</html>
