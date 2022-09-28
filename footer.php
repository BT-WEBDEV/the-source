<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gka_theme
 */

?>

</div><!-- #content -->

<footer id="footer" class="site-footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 col-lg-4">
				<div>
					<img src="<?php echo get_template_directory_uri()."/images/TheSourceLogoFooter.svg"; ?>"
						alt="The Source" class="img-fluid w-100 logo">
				</div>
			</div>
			<div class="col-md-9 col-lg-8">
				<div>
					<ul id="footer-menu" class="list-unstyled d-flex flex-wrap justify-content-end">
						<?php 
						$footer_nav = wp_get_nav_menu_items(4);
						foreach ($footer_nav as $key => $item) {    				        
						?>
						<li class="">
							<a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="d-flex align-items-center contact-info">
			<h6 class="mb-0 font-weight-normal">CONTACT:</h6>
			<div class="social flex-grow-1 text-right">
				<a href="https://www.linkedin.com/in/the-source-elevate-your-style-603672246/"><img src="<?php echo (get_header_image()) ? get_header_image() : get_template_directory_uri()."/images/icons/Linkedin.svg"; ?>" alt=""></a>
				<a href="https://www.instagram.com/the_source_international/"><img src="<?php echo (get_header_image()) ? get_header_image() : get_template_directory_uri()."/images/icons/instagram.svg"; ?>" alt=""></a>
			</div>
		</div>
		<div class="d-flex align-items-center contact-info">
			<a href="https://www.google.com/maps/place/Canary+Wharf,+London,+UK/@51.5053467,-0.029885,15z/data=!3m1!4b1!4m5!3m4!1s0x487602ba7a12992f:0x4d821857a5e4a41!8m2!3d51.5054306!4d-0.0235333" class="info text-black font-weight-normal">Canary Wharf, London, England</a>
			<span>|</span>
			<a href="tel:447813719111" class="info text-black font-weight-normal">+44 7813 719111 </a>
			<span>|</span>
			<a href="mailto:roberta@thesource.ky" class="info text-black font-weight-normal">roberta@thesource.ky</a>
		</div>
		<div class="d-flex align-items-center contact-info">
		<a href="https://www.google.com/maps/place/Camana+Bay/@19.3219776,-81.3781115,15z/data=!4m5!3m4!1s0x0:0x2684b31630213fbc!8m2!3d19.3219776!4d-81.3781115" class="info text-black font-weight-normal">Camana Bay, Grand Cayman, Cayman Island</a>
			<span>|</span>
			<a href="tel:13453252766" class="info text-black font-weight-normal"> +1 345 325 2766</a>  
			<span>|</span>
			<a href="mailto:roberta@thesource.ky" class="info text-black font-weight-normal">roberta@thesource.ky</a>
		</div>
		<div class="copyright">© COPYRIGHT <?php echo getdate()['year']; ?> | <a href="" class="text-black">Privacy Policy</a></div>
	</div>
</footer>

<div id="gdpr-cookies" class="z-depth-2 d-none">
	<div>
		<h6 class="font-weight-medium">This website uses cookies</h6>
		<p>
			This site uses cookies to provide more personalized content, social media features, and ads, and to analyze
			our
			traffic. We might share information about your use of our site with our social media, advertising, and
			analytics
			partners who may combine it with other information that you’ve provided to them or that they’ve collected
			from
			your use of their services. We will never sell your information or share it with unaffiliated entities.
		</p>
	</div>
	<div>
		<button id="gdpr-button" class="btn custom-btn btn-blue">Accept</button>
	</div>
</div>

</div><!-- #page -->
<?php wp_footer(); ?>
<!-- Plugins -->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
</body>

</html>