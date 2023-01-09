<?php
	namespace src\Controller;

	use src\Core\DB;

	class UserController
	{
		public function login(){
			$row = DB::fetch("SELECT * FROM user WHERE id=? AND pw=?",[$_POST['id'],$_POST['pw']]);
			if($row){
				$_SESSION['user'] = $row;
				back();
			}
			back("아이디 또는 비밀번호가 일치하지 않습니다.");
		}

		public function join(){
			$img = $_FILES['img']['name'];
			$type = explode(".", $img)[1];
			$id = $_POST['id'];
			$pw = $_POST['pw'];
			$name = $_POST['name'];
			if(!strcasecmp($type, "jpg") && !strcasecmp($type, "png") && !strcasecmp($type, "jpeg") && !strcasecmp($type, "gif")){
				back("파일 첨부는 이미지만 가능합니다.");
			}else if(empty($img) || empty(trim($id)) || empty(trim($pw)) || empty(trim($name)) || empty(trim($_POST['captcha']))){
				back("빈칸을 채워주세요");
			}else if($_POST['answer'] != $_POST['captcha']){
				back("자동입력방지 문자를 잘못 입력하였습니다.");
			}else{
				$row = DB::exec("INSERT INTO user SET id=?,pw=?,name=?",[$id,$pw,$name]);
				if($row)
					back("회원가입 완료");
			}
			back("중복되는 아이디입니다. 다른 아이디를 사용해주세요.");
		}

		public function logout(){
			session_unset();
			back("");
		}
	}