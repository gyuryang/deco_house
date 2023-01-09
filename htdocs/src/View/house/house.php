<section class="house">
		<div class="title">
			<p>HOUSEWARMING</p>
			<h2><span class="goad"><span></span></span>온라인 집들이<span class="goad"><span></span></span></h2>
		</div>
		<div class="btn_wrap"><button class="house_write"><p>글쓰기</p></button></div>
		<div class="grid">
			<?php foreach($house as $key => $v) : ?>
			<div class="grid_item">
				<p class="top">before</p><p class="top">after</p>
				<img src="/upload/<?= $v->befor ?>" alt="before" title="before">
				<img src="/upload/<?= $v->after ?>" alt="after" title="after">
				<textarea readonly><?= $v->knowhow ?></textarea>
				<p class="infor"><span><?= $v->name ?>(<?= $v->id ?>)</span><span><?= $v->today ?></span><span class="star"><i class="fa fa-star"></i><?= $v->grade ?></span></p>
				<button><p>평점 주기</p></button>
			</div>
			<?php endforeach; ?>
		</div>
</section>