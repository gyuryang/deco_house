<?php
	function auto($f){
		require "$f.php";
	}
	spl_autoload_register("auto");

	function alert($t){
		echo "<script>alert('$t')</script>";
	}

	function back($t = ''){
		if(!empty($t))
			alert($t);
		echo "<script>history.back()</script>";
		exit;
	}

	function move($l, $t = ''){
		if(!empty($t))
			alert($t);
		echo "<script>location.replace('$f')</script>";
		exit;
	}

	function view($l, $d){
		extract($d);

		require "src/View/temp/header.php";
		if($l == 'main'){
			require "src/View/temp/main.php";
		}else{
			$l = explode("/", $l);
			require "src/View/$l[0]/$l[1].php";
		}
		require "src/View/temp/footer.php";
	}

	function ss(){
		return isset($_SESSION['user'])? $_SESSION['user'] : false;
	}