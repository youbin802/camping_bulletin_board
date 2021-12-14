<?php
namespace Gondr\Controller;
use Gondr\App\DB;
class MainController extends MasterController {
            public function index() {
                $db= new DB();
                $sql="SELECT * FROM boards ORDER BY id DESC LIMIT 0,3";
                $week_N = array('','월','화','수','목','금','토','일');
                $cntsql ="SELECT * FROM visitorList WHERE week=?";
                $cnt = $db->fetch($cntsql,[$week_N[date("N")]]);

                // $viewCnt = $cnt->view;
                // $viewCnt= $viewCnt+=1;

                header("Content-Type: text/html; charset=UTF-8");
                // $week = $db->execute("UPDATE visitorList SET view=? WHERE week=?",[$viewCnt, $week_N[date("N")]]);

                $list = $db->fetchAll($sql);
                $this->render("main",['list'=>$list]);
    }
}