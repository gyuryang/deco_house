<?php
	namespace src\Controller;

	use src\Core\DB;

	class HouseController
	{
		public function house(){
			$arr = (object)[];
			$arr->house = DB::fetchAll("SELECT h.*,u.id,u.name,IFNULL((SELECT floor(AVG(g.grade)) FROM grade g WHERE g.hidx = h.idx),0) grade FROM house h JOIN user u ON u.idx = h.uidx",[]);
			var_dump($arr->house);
			view("house/house",(array)$arr);
		}

		public function write(){
			$before = $_FILES['befor'];
			$after = $_FILES['after'];
			$type1 = explode(".", $before['name'])[1];
			$type2 = explode(".", $after['name'])[1];
			if(empty($type1) || empty($type2) || empty(trim($_POST['knowhow']))){
				// back("빈 칸을 채워주세요");
			}else if((!strcasecmp($type1, "jpg") && !strcasecmp($type1, "png") && !strcasecmp($type1, "jpeg") && !strcasecmp($type1, "gif"))||(!strcasecmp($type2, "jpg") && !strcasecmp($type2, "png") && !strcasecmp($type2, "jpeg") && !strcasecmp($type2, "gif"))){
				back("파일 첨부는 이미지만 가능합니다.");
			}else{
				DB::exec("INSERT INTO house SET uidx=?,knowhow=?,today=now()",[ss()->idx,$_POST['knowhow']]);
				$lastId = DB::lastInsertId();
				$beforeName = $lastId."before.".$type1;
				$afterName = $lastId."after.".$type2;
				move_uploaded_file($before['tmp_name'], 'upload/'.$beforeName);
				move_uploaded_file($after['tmp_name'], 'upload/'.$afterName);
				DB::exec("UPDATE house SET befor=?, after=? WHERE idx=?",[$beforeName,$afterName,$lastId]);
				back();
			}
		}
	}
