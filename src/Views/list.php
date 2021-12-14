<style>
    #taskOption{
    padding: 3px;
    width: 20%;
    box-shadow: 5px 2px 5px -1px rgb(0 0 32 / 33%);
    border: 1px solid #DDE;
}

</style>
<section id="img-visual">
        <img src="img/img2.png" alt="" id="bImg">
        <div class="side-nav between">
            <div class="icon-img">
            <a href="/"><img src="/img/home.png" alt=""></a>
        </div>
            <p>| NOTICE</p>
        </div>
    </section>
    <div class="container">
    <section id="list">
    <div class="select-group">
    <!-- <form action="/board" method="get" id="option_form">
        <select name="select" class="form-select" aria-label="Default select example" id="taskOption" onchange="selectChange();" style="float:right; margin:20px;">
            <option value="1" <?= $mod == 1 ? 'selected' : '' ?>>일주일</option>
            <option value="2" <?= $mod == 2 ? 'selected' : '' ?>>한달</option>
            <option value="3" <?= $mod == 3 ? 'selected' : '' ?>>전체</option>
        </select>
        
        <input type="submit" style="display:none;" value="submit the form" id="submit">
    </form> -->
    </div>
        <table class="table">
            <thead>
              <tr>
            <th scope="col">글번호</th>
            <th scope="col">글제목</th>
            <th scope="col">글쓴이</th>
            <th scope="col">작성일</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($list as $b):?>
                <tr>
                    <td><?=$b->id ?></td>
                    <td><a href="/board/view?id=<?= $b->id ?>"><?=$b->title ?></a></td>
                    <td><?=$b->writer ?></td>
                    <td><?=$b->date ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
    </section>
    <?php if(isset($_SESSION['user'])):?>
    <div class="row">
        <div class="col-12 text-right">
            <a href="/board/write" style="background-color: #bda379; border:none;" class="btn btn-info">글작성</a>    
        </div>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php if($pg->prev) :?>
                    <li class="page-item"><a class="page-link" href="/board?select=<?=$mod ?>&p=<?=$pg->start -1 ?>"><<</a></li>
                    <?php endif; ?>
                    <?php for($i =$pg->start; $i<=$pg->end; $i++) :?>
                    <li class="page-item"><a class="page-link" href="/board?select=<?=$mod ?>&p=<?=$i ?>"><?=$i ?></a></li>
                    <?php endfor; ?>
                    <?php if($pg->next) :?>
                    <li class="page-item"><a class="page-link" href="/board?select=<?=$mod ?>&p=<?=$pg->end +1 ?>">>></a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<script>
        function selectChange(){
                $("#submit").click();
            }
</script>
</body>
</html>