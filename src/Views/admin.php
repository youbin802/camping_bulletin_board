<style>
    .im-card {
        width:200px;
        height:100px;
        border:1px solid #ddd;
    }
    .list {
        display:flex;
    }

    #delBtn {
        border:1px solid #ddd;
        border-radius: 40px;
    }
    .table-group {
        display: grid;
        grid-template-columns: repeat(2,451px);
        gap: 41px
    }
    .im-group {
      display: flex;
    }

    .im-card {
      font-weight: bold;
      margin:10px;
    }

    .graphBox {
      top: 104%;
      position: absolute;
      left: 48%;
    }

    .tbody-scroll {
      position: absolute;
    height: 330px;
    overflow-x: hidden;
    }
    .board-scroll {
      position: absolute;
    height: 65%;
    overflow-x: hidden;
    }
</style>
<section id="img-visual">
    <img src="/img/img2.png" alt="" id="bImg">
        <div class="side-nav between">
            <div class="icon-img">
            <a href="/"><img src="/img/home.png" alt=""></a>
        </div>
            <p>| ADMIN</p>
        </div>
    </section>
    <div class="container">
<section id="admin-section">
    <div class="im-group">
    <div class="im-card center">게시글 수 : <?=$bCnt ?></div>
    <div class="im-card center">회원 수 : <?=$uCnt ?></div>
    </div>
    <div class="table-group">
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" tabindex="0">
    <table class="table" id="boardTable">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TITLE</th>
      <th scope="col">DATE</th>
      <th scope="col">WRITER</th>
      <th scope="col">DELETE</th>
    </tr>
  </thead>
  <tbody class="board-scroll">
  <?php foreach($board as $b): ?>
    <tr>
      <td><?= $b->id?></td>
      <td><?= $b->title?></td>
      <td><?= $b->date?></td>
      <td><?= $b->writer?></td>
      <?php if($b->delCheck=="삭제") : ?>
      <td style="font-size:13px;">삭제된 게시글</td>
      <?php else: ?>
      <td id="delBtn"><a href="/admin/delete?id=<?=$b->id ?>">삭제</a></td>
      <?php endif; ?>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">DELETE</th>
    </tr>
  </thead>
  <tbody class="tbody-scroll">
  <?php foreach($user as $b): ?>
    <tr>
      <td><?= htmlentities($b->id)?></td>
      <td><?= $b->name?></td>
      <td><?= $b->email?></td>
      <?php if($b->delCh==1) : ?>
      <td>탈퇴된 회원</td>
      <?php else: ?>
      <td id="delBtn"><a href="/admin/userDel?email=<?=$b->email ?>">탈퇴</a></td>
      <?php endif; ?>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
    <div class="graphBox">
    <h2>방문 수</h2>
        <canvas id="lineCanvas" width="600" height="400"></canvas>
        </div>
</section>
</div>
</body>
<script>
let visit_data = JSON.parse(`<?= json_encode($visit) ?>`);
let data = {
  labels: ["월","화","수","목","금","토","일"],
  datasets: [{
        label: "",
        fillColor: "rgba(151,187,205,0.2)",
        strokeColor: "rgba(151,187,205,1)",
        pointColor: "rgba(151,187,205,1)",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(151,187,205,1)",
        data: visit_data
    }]
};

let ctx = document.getElementById("lineCanvas").getContext("2d");
let options = { };
let lineChart = new Chart(ctx).Line(data, options);
</script>