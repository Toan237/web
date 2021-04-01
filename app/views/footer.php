</div>
<div class="footer">
	<div class="container">
		<div class="row">

			<div class="col-6 col-md-6 col-xl-4">
				<h3>About us</h3>
				<p>We are a team of designers and developers that create high quality Magento, Prestashop, Opencart.</p>
			</div>
			<div class="col-6 col-md-6 col-xl-2">
				<h3>Information</h3>
				<ul>
					<li><a href="">Delivery</a></li>
					<li><a href="">About us</a></li>
					<li><a href="">Secure Payment</a></li>
					<li><a href="">Contact us</a></li>
					<li><a href="">Contact us</a></li>
					<li><a href="">Sitemap</a></li>
					<li><a href="">Stores</a></li>
				</ul>
			</div>
			<div class="col-6 col-md-6 col-xl-2">
				<h3>Custom Links</h3>
				<ul>
					<li><a href="">Legal Notice</a></li>
					<li><a href="">About us</a></li>
					<li><a href="">Price Drop</a></li>
					<li><a href="">New Products</a></li>
					<li><a href="">Best Sales</a></li>
					<li><a href="">Login</a></li>
					<li><a href="">My Account</a></li>
				</ul>
			</div>
			<div class="col-6 col-md-6 col-xl-4">
				<h3>Newsletter</h3>
				<p>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</p>
				<div class="newsletter">
					<input type="text" placeholder="Your email address">
					<button class="newsletter-btn">SIGN UP</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="toTop"><span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAj0lEQVRIie2TQQqAIBBF/3QxjxNtoqNkm+qy/TYTWWipuIn8IMig7zkwAr8KSSEpKXeaFDiAEcCcKomCk7Q8sxSTeODlJDf45sCPvc2WeOC9I2gdSXonPrjWSZK6z5OE4HdBrCQ0ptQ1iMgUeoyIrAA6PRsf7cJ46pcOnLopMrYhwVOif3JuqqAKPiCoec0OShkJTpttr90AAAAASUVORK5CYII="></span></div>
<link href="<?php echo BASE_URL ?>/public/css/flexslider.css" rel='stylesheet' type='text/css' />
<script defer src="<?php echo BASE_URL ?>/public/js/jquery.flexslider.js"></script>
<script type="text/javascript">
	AOS.init();

	let toTop = document.querySelector('.toTop');
	window.addEventListener('scroll', () => {
		if (window.pageYOffset > 200) {
			toTop.classList.add('active');
		} else {
			toTop.classList.remove('active');
		}
	});

	toTop.addEventListener('click', () => {
		window.scrollTo({
			top: 0,
			behavior: "smooth"
		})
	})

	$(function() {
		SyntaxHighlighter.all();
	});
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			start: function(slider) {
				$('body').removeClass('loading');
			}
		});
	});
</script>
</body>

</html>