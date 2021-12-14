<?php
namespace Gondr\Controller;
use Gondr\App\DB;
use Gondr\Library\Lib;
use Gondr\Library\Pagination;
use Gondr\Library\Date;
class adminController extends MasterController {
    public function admin() {
        if($_SESSION['user']->id!="admin") {
            Lib::msgAndBack("권한이 없습니다.");
            exit;
        }

        $db= new DB();
        $boardCnt = $db->fetch("SELECT count(*) AS cnt FROM boards")->cnt;
        $userCnt=$db->fetch("SELECT count(*) AS cnt FROM user")->cnt;
        $board =$db->fetchAll("SELECT * FROM boards");
        $user=$db->fetchAll("SELECT * FROM user");
        $visit= $db->fetchAll("SELECT * FROM visitorList");
        $list_data = array();

        foreach($visit  as $v) {
            array_push($list_data,$v->view);
        }
        $this->render("admin",['bCnt'=>$boardCnt, 'uCnt'=>$userCnt,'board'=>$board,'user'=>$user,'visit'=>$list_data]);
    }

    public function delete() {
        $db= new DB();
        $id= $_GET['id'];
        $sql="UPDATE boards SET delCheck=? WHERE id=?";
        $b= $db->execute($sql,['삭제',$id]);

        if($b) {
            Lib::msgAndGo("글 삭제 완료",'/admin');
        }else {
            Lib::msgAndBack("DB 에러");
            exit;
        }
    }

    public function userDel() {
        $email = $_GET['email'];
         $db= new DB();
         $sql="UPDATE user SET delCh=? WHERE email=?";
         $re= $db->execute($sql,[1,$email]);
         if($re) {
             Lib::msgAndGo("삭제 완료",'/admin');
         }
    }

    public function comment() {
        $idx = $_GET['idx'];
         $db= new DB();
         $sql="DELETE FROM comment WHERE idx=?";
         $re = $db->execute($sql, [$idx]);
         if($re) {
             Lib::msgAndBack("삭제 완료");
         }
    }
}