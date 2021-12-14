<section id="img-visual">
    <img src="/img/img2.png" alt="" id="bImg">
        <div class="side-nav between">
            <div class="icon-img">
            <a href="/"><img src="/img/home.png" alt=""></a>
        </div>
            <p>| LOGIN</p>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
            <form action="/user/login" method="post" style="margin:20px;">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text"  id="id" name="id" placeholder="아이디">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="password"  id="password" name="password" placeholder="비밀번호">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" style="float:left;">로그인</button>
                        </div>
                    </div>
                    <div class="find-group">
                    <a href="/user/passFind">비밀번호 찾기</a>
                    <a href="/user/idFind">아이디 찾기</a>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</body>

</html>