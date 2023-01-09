<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>내집 꾸미기</title>
	<link rel="stylesheet" href="/Publishing/resources/css/main.css">
	<link rel="stylesheet" href="/Publishing/resources/fontawesome/css/font-awesome.css">
	<link rel="stylesheet" href="/Publishing/resources/fontawesome/css/font-awesome.min.css">
	<script src="/sub/js/jquery-3.4.1.min.js"></script>
</head>
<body>
	<div class="popup_wrap">
		<form class="popup" method="post" enctype="multipart/form-data">
			
		</form>
	</div>
	<header>
		<div class="logo"><a href="/"><img src="/Publishing/resources/images/logo2.jpg" alt="logo" title="logo"></a></div>
		<div class="menu">
			<!-- <div class="buger"><i class="fa fa-align-justify"></i></div> -->
			<ul>
				<li><a href="/">홈</a></li>
				<li><a href="/house/house">온라인 집들이</a></li>
				<li><a href="/sub/store.html">스토어</a></li>
				<li><a href="#">전문가</a></li>
				<li><a href="#">시공 견적</a></li>
			</ul>
			<?php if(!ss()) : ?>
			<button><p>로그인</p></button>
			<button class="join_btn"><p>회원가입</p></button>
			<?php else : ?>
			<p class="user"><?= ss()->name ?>(<?= ss()->id ?>)</p>
			<button class="logout_btn"><p><a href="/user/logout">로그아웃</a></p></button>
			<?php endif; ?>
		</div>
	</header>
	<section class="visual">
		<img src="/Publishing/resources/images/a (30).jpg" alt="visual" title="visual">
	</section>
	<script>
		$(document)
		.on('click','.house_write',function(){
			$('.popup').attr('action','/house/write');
			$(".popup").html(`
				<div class="Xbtn">X</div>
				<p class="firstp"><span>before : </span><input type="file" name="befor"></p>
				<p><span>after : </span><input type="file" name="after"></p>
				<p><span>노하우</span></p>
				<textarea name="knowhow"></textarea>
				<button><p>작성 완료</p></button>
			`)
			$(".popup_wrap").css("display",'block');
		})
		.on('click','.popup .Xbtn',function(){
			$(".popup_wrap").css('display','none');
		})
		.on('click','.menu button:not(.logout_btn)',function(){
			let captcha = getCaptcha();
			$('.popup').attr('action','/user/login');
			$(".popup").html(`
				<div class="Xbtn">X</div>
				<p class="firstp"><span>아이디 : </span><input type="text" name="id"></p>
				<p><span>비밀번호 : </span><input type="password" name="pw"></p>
			`)
			$(".popup_wrap").css('display','block');
			if($(this).attr('class') == 'join_btn'){
				$('.popup').attr('action','/user/join');
				$(".popup").append(`
					<p><span>이름 : </span><input type="text" name="name"></p>
					<p><span>사진 : </span><input type="file" name="img"></p>
					<div class="answer"></div>
					<input type="text" placeholder="captcha" name="captcha">
					<input type="hidden" name="answer" value=${captcha}>
				`)
			}
		$(".popup").append('<button><p>완료</p></button>');

		const svg = `<svg xmlns="http://www.w3.org/2000/svg">
	  <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle">${captcha}</text>
		</svg>`;
		const url = URL.createObjectURL(new Blob([svg], {type: 'image/svg+xml'}));
		$(".answer").append(`<img src="${url}" />`);
	})
	const getCaptcha = () => {
    	return [...new Array(5)].map(() => {
      		let str = String.fromCharCode(Math.random() * 122);
      		while (!/[a-zA-Z0-9]/.test(str)) {
	    		str = String.fromCharCode(Math.random() * 122);
      		}
      		return str;
    	}).join('');
	}
	</script>