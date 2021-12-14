<?php
namespace Gondr\Controller;
use Gondr\App\DB;
use Gondr\Library\Lib;
use Gondr\Library\Pagination;
use Gondr\Library\Date;
class BoardController extends MasterController {
    //게시판 리스트 
    public function board() {
        $db = new DB();

        $page = 1;
        if (isset($_GET['p']) && is_numeric($_GET['p'])) {
            $page = $_GET['p'] * 1;
        }

        $start = ($page - 1) * 5;
        $cnt = $db->fetch("SELECT count(*) AS cnt FROM boards")->cnt;
        $pg = new Pagination($cnt, $page);

        if(isset($_GET['select'])) {
            $select= $_GET['select'];
            if($select==1) {
                $sql = "SELECT * from boards where DATE > date_add(now(),interval -7 day) ORDER BY DATE > date_add(now(),interval -7 day) AND NOW() DESC LIMIT {$start},5";
                $list = $db->fetchAll($sql);
            }else if($select==2){
                $sql = "SELECT * from boards where DATE > date_add(now(),interval -30 day) ORDER BY DATE > date_add(now(),interval -30 day) DESC LIMIT {$start},5";
                $list= $db->fetchAll($sql);
            }else {
                $sql="SELECT * FROM boards ORDER BY date DESC LIMIT {$start},5";
                $list= $db->fetchAll($sql);
            }
        }

        $this->render("list", ['list'=>$list, 'pg' => $pg , 'mod' => $select]);
    }

    //게시글 읽기
    public function view() {
        $db= new DB();        
        $id=$_GET['id'];
        
        $cnt =$db->fetch("SELECT * FROM boards WHERE id=?",[$id]);
        // $viewCnt = $cnt->view;
        // $viewCnt = $viewCnt+=1;
        // $cntPut = $db->execute("UPDATE boards SET view=? WHERE id=?",[$viewCnt, $id]);
        
        $te = "SELECT * FROM comment ORDER BY date DESC";
        $text =$db->fetchAll($te);
        
        $sql="SELECT * FROM boards WHERE id=?";
        $b=$db->fetch($sql, [$id]);

        $prosql = "SELECT * FROM user WHERE email=?";
        $profile=$db->fetch($prosql,[$b->email]);
        $img = "";
        if(!empty($profile->img)) {
            $img = $profile->img;           
        }


        $sbd=$db->fetch($sql, [$id]);
        if($b) {
            $this->render("read",['b'=>$b,'text'=>$text,'profile'=>$img,'user'=>$sbd]);
        }else {
            Lib::msgAndBack("없는 게시물 입니다.");
            exit;
        }
    }

    //글 작성
    public function write() {
        if(!isset($_SESSION['user'])) {
            Lib::msgAndBack("접근 권한 없습니다");
            exit;
        }
        $this->render("write");
    }

    public function writeProcess() {
        $img = $_FILES['image'];
        $target =  __ROOT .'/public/img/ '.$img['name'];
        move_uploaded_file($img['tmp_name'],$target);

        $db= new DB();
        $title=$_POST['title'];
        $content=$_POST['content'];
        $writer= $_SESSION['user']->name;

        if(trim($title)=="" || trim($content)=="" ) {
            Lib::msgAndBack("누락");
            exit;
        }

        $sql="INSERT INTO boards (title, content, writer , date,img,email) VALUES(?,?,?,NOW(),?,?)";
        $result= $db->execute($sql, [$title, $content, $writer,$img['name'],$_SESSION['user']->email]);
        if($result) {
            Lib::msgAndGo("성공적으로 글 올렸습니다","/board?select=1&p=1");
        }else {
            Lib::msgAndBack("DB 입력실패");
            exit;
        }
    }
    
    //글 수정
    public function mod() {
        $db= new DB();
        $id=$_GET['id'];
        $sql="SELECT * FROM boards WHERE id=?";
        $b=$db->fetch($sql, [$id]);
        if (!isset($_SESSION["user"])) {
            lib::msgAndBack("권한이 없습니다.!");
            exit;
        }
        if($_SESSION['user']->name != $b->writer) {
            Lib::msgAndBack("접근 권한 없습니다.");
            exit;
        }

        $this->render("mod",['b'=>$b]);
    }

    public function modProcess() {
        $db= new DB();
        $title=$_POST['title'];
        $content=$_POST['content'];
        $id=$_POST['id'];

        if(!isset($_POST['id'])) {
            Lib::msgAndBack("접근 권한 없습니다!.");
            exit;
        }
        if(trim($title)=="" || trim($content)=="" ) {
            Lib::msgAndBack("누락");
            exit;
        }

        $sql="UPDATE boards SET title=?, content= ? WHERE id= ?";
        $result = $db->execute($sql, [$title, $content,$id]);

        if($result) {
            Lib::msgAndGo("성공적으로 수정 했습니다","/board/view?id={$id}");
        }else {
            Lib::msgAndBack("DB 입력실패");
            exit;
        }
    }

    //글 삭제
    public function delete() {
        if(!isset($_SESSION['user'])) {
            Lib::msgAndBack("접근 권한 없습니다");
            exit;
        }
        $db= new DB();
        $id=$_GET['id'];
        $sql="UPDATE boards SET delCheck WHERE id=?";
        $b= $db->execute($sql,['삭제',$id]);
        $session ="select name from user where id=?";
        $sessionName = $db->fetch($session);

        if (!isset($_SESSION["user"])) {
            lib::msgAndBack("권한이 없습니다.!");
            exit;
        }
        if($_SESSION['user']->name != $sessionName) {
            Lib::msgAndBack("접근 권한 없습니다.");
            exit;
        }

        echo ("<script language=javascript>del();</script>");
        
        if($b) {
            Lib::msgAndGo("성공적으로 삭제 했습니다","/board");
        }else {
            Lib::msgAndBack("DB 입력실패");
            exit;
        }
    }

    //댓글
    public function enorll() {
        if(empty($_POST['comment'])) {
            Lib::msgandBack("error");
            exit;
        }
        else {
            $comment = $_POST['comment'];
        }
    }

    public function viewProcess() {
        if(empty($_POST['comment'])) {
            Lib::msgandBack("error");
            exit;
        }
        else {
            $comment = $_POST['comment'];
            $id= $_POST['viewID'];
        }
        $db= new DB();
        $sql="INSERT INTO comment (id, name, date, enoTe) VALUES(?,?,NOW(),?)";
        $re = $db->execute($sql,[$id, $_SESSION['user']->name, $comment]);
        if($re) {
            echo ("<script language=javascript> location = '/board/view?id={$id}';</script>");
        }

    }

    //이미지 모아보기 페이지
    public function peed() {
        $db= new DB();
        $sql="SELECT * FROM boards";
        $list= $db->fetchAll($sql);
        $this->render("peed",['list'=>$list]);
    }

    public function thumbs() {
        extract($_POST);
        $count=0;
        $db= new DB();
        $c = "SELECT * FROM boards WHERE id=?";
        $cnt = $db->fetch($c,[$id]);
        $setBn=$db->fetch("SELECT * FROM thumblist WHERE idx = ? AND email=?",[$id,$email]);
        
        if($setBn) {
            $sql="UPDATE thumblist SET cnt=? WHERE idx = ? AND email=?";
            if($setBn->cnt==1) {
                $count = $cnt->cnt-1;
                $re = $db->execute($sql,[0,$id,$email]);
            }
            else {
                $count = $cnt->cnt +1;
                $re = $db->execute($sql,[1,$id,$email]);
            }
        }else {
            $sql="INSERT INTO thumblist (idx, cnt, email) VALUES(?,?,?)";
            $re = $db->execute($sql,[$id, 1, $email]);
            $count = $cnt->cnt +1;
        }
        $boardsql="UPDATE boards SET cnt=? WHERE id=?";
        $boardRe = $db->execute($boardsql,[$count,$id]);

        if($re && $boardRe) {
            echo "성공";
        }else {
            echo "실패";
        }
    }
}