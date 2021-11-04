<?php include("./components/header.php"); ?>

<!-- Carousel Starts Here -->
<div class="slideshow-container">
	<div class="mySlides fade">
		<div class="numbertext">1 / 3</div>
		<img src="https://www.leoncycle.com/media/wysiwyg/T720.jpg" style="width: 100%" />
		<div class="text">Caption Text</div>
	</div>

	<div class="mySlides fade">
		<div class="numbertext">2 / 3</div>
		<img src="https://scontent.fktm3-1.fna.fbcdn.net/v/t31.18172-8/12017508_835719683210187_3637132125565545658_o.jpg?_nc_cat=111&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=OhGv4hfTvFcAX_sSSlz&tn=FLDB-hoaW99p3EAo&_nc_ht=scontent.fktm3-1.fna&oh=8d832fbc7ecc32f027957073da313996&oe=61961A9E" style="width: 100%" />
		<div class="text">Caption Two</div>
	</div>

	<div class="mySlides fade">
		<div class="numbertext">3 / 3</div>
		<img src="https://www.leoncycle.com/media/wysiwyg/T720.jpg" style="width: 100%" />
		<div class="text">Caption Three</div>
	</div>

	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br />

<div style="text-align: center">
	<span class="dot" onclick="currentSlide(1)"></span>
	<span class="dot" onclick="currentSlide(2)"></span>
	<span class="dot" onclick="currentSlide(3)"></span>
</div>
<!-- ========== Carousel ends here ============= -->

<!-- ========= Footer Starts Here ========= -->
<?php include("./components/footer.php"); ?>
<!-- =========== Footer  Ends Here ============ -->
<script src="./index.js"></script>