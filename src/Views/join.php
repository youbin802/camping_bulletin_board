<style>
    .container {
        margin-top:30px;
    }
</style>
<section id="img-visual">
        <img src="/img/img2.png" alt="" id="bImg">
        <div class="side-nav between">
            <div class="icon-img">
            <img src="/img/home.png" alt="">
        </div>
            <p>| JOIN</p>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <form action="/user/register" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text"id="id" name="id" placeholder="아이디">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="name" name="name" placeholder="이름">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="password" id="password" name="password" placeholder="비밀번호">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="password" id="passwordc" name="passwordc" placeholder="비밀번호 확인">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="file" id="image" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="email" id="email" name="email" placeholder="이메일">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" style="float:left;">회원가입</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</body>

</html>