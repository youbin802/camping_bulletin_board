<?php
namespace Gondr\Controller;
use Gondr\App\DB;
use Gondr\Library\Lib;
class UserController extends MasterController {
    //회원가입
    public function register() {
        if(isset($_SESSION['user'])) {
            Lib::msgAndBack("접근 권한 없습니다");
            exit;
        }
        $this->render("join");
    }

    public function registerProcess() {
        $img = $_FILES['image'];
        $target = __ROOT . '/public/img/' .$img['name'];
        move_uploaded_file($img['tmp_name'],$target);

        $db= new DB();
        $id=$_POST['id'];
        $password=$_POST['password'];
        $passwordc=$_POST['passwordc'];
        $name=$_POST['name'];
        $email =$_POST['email'];
        if(trim($id)=="" || trim($password)=="" ||trim($passwordc)=="" ||trim($name)=="" || trim($email)=="") {
            Lib::msgAndBack("누락");
            exit;
        }

        if($password !== $passwordc) {
            Lib::msgAndBack("비밀번호 불일치");
            exit;
        }

        $idCheck= $db->fetch("SELECT * FROM user WHERE id =?",[$id]);
        if($idCheck) {
            Lib::msgAndBack("현재 아이디 이미 사용중");
            exit;
        }
        $emailCheck =$db->fetch("SELECT * FROM user WHERE email=?",[$email]);
        if($emailCheck) {
            Lib::msgAndBack("현재 이메일은 이미 사용 중 입니다.");
            exit;
        }
        $sql="INSERT INTO user (id, name, password,img,email) VALUES(?,?,?,?,?)";
        $result = $db->execute($sql,[$id,$name, $password, $img['name'], $email]);
        if($result) {
            Lib::msgAndGo("성공적으로 회원가입 됨", '/');
        }else {
            Lib::msgAndBack("DB 입력실패");
            exit;
        }
    }

    //로그인
    public function login() {
        if(isset($_SESSION['user'])) {
            Lib::msgAndBack("접근 권한 없습니다");
            exit;
        }

        $this->render("login");
    }

    public function loginProcess() {
        $db= new DB();
        $id=$_POST['id'];
        $password=$_POST['password'];
        if(trim($id)=="" || trim($password)=="" ) {
            Lib::msgAndBack("누락");
            exit;
        }

        $sql="SELECT * FROM user WHERE id=? AND password=?";
        $result = $db->fetch($sql, [$id, $password]);
        
        $user= $db->fetch("SELECT * FROM user WHERE id =?",[$id]);
        if(!$user) {
            Lib::msgAndBack("존재하지 않는 아이디 입니다.");
            exit;
        }
        if($result) {
            $_SESSION['user']= $result;
            Lib::msgAndGo("성공적으로 로그인 됨", '/');
        }else {
            Lib::msgAndBack("아이디 또는 비밀번호가 일치하지 않습니다.");
            exit;
        }
    }

    //로그아웃
    public function logout() {
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            Lib::msgAndGo("성공적으로 로그아웃 됨", '/');
        }else {
            Lib::msgAndGo("접근불가", '/');

        }
    }

    public function idFind() {
        $this->render("idFind");
    }

    public function idFindProcess() {
        $pass = $_POST['pass'];
        $email =$_POST['email'];
        $db= new DB();
        if(trim($pass)=="" || trim($email)=="") {
            Lib::msgAndBack("입력 부탁드립니다.");
            exit;
        }

        $sql="SELECT * FROM user WHERE password=? AND email=?";
        $re = $db->fetch($sql, [$pass, $email]);
        if($re) {
            Lib::msgAndGo("찾으시는 아이디는 ". $re->id . "입니다",'/user/login');
        }else {
            Lib::msgAndBack("찾으시는 아이디가 없습니다.");
            exit;
        }
    }
    public function passFind() {
        $this->render("passFind");
    }

    public function passFindProcess() {
        $id = $_POST['id'];
        $email =$_POST['email'];
        $db= new DB();
        if(trim($id)=="" || trim($email)=="") {
            Lib::msgAndBack("입력 부탁드립니다.");
            exit;
        }

        $sql="SELECT * FROM user WHERE id=? AND email=?";
        $re = $db->fetch($sql, [$id, $email]);
        if($re) {
            Lib::msgAndGo("찾으시는 아이디는 ". $re->password . "입니다",'/user/login');
        }else {
            Lib::msgAndBack("찾으시는 아이디가 없습니다.");
            exit;
        }
    }

    public function profile() {
        $img = $_FILES['img'];
        $db= new DB();
        $target =  __ROOT .'/public/img/ '.$img['name'];
        move_uploaded_file($img['tmp_name'],$target);
        $sql="UPDATE user SET img=? WHERE email=?";
        $re = $db->execute($sql,[$img['name'], $_SESSION['user']->email]);
        if($re) {
            Lib::msgAndGo("프로필 바꾸기 완료",'/');
        }else {
            Lib::msgAndBack("에러");
            exit;
        }
    }
}