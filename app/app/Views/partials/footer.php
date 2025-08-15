<!-- footer -->
<footer class="bgfa">
	<div class="content">
		<div class="f">
			<div class="logo">
				<a href="/"><img src="/img/logo.svg" alt="Healingbowl"></a>
				<p>
					<span>HEALINGBOWL®</span><br>
					<?=lang('Template.text-03'); ?>
				</p>
			</div>
			<?= $this->include('partials/social') ?>
			<a href="/<?= $locale; ?>/user-agreements"><?=lang('Template.text-05'); ?></a>
			<a href="/<?= $locale; ?>/privacy-policy"><?=lang('Template.text-06'); ?></a>
		</div>
		<div class="info_content">
			<p><strong><?=lang('Template.text-07'); ?> </strong></p>
			<p class="info">
				<span>
					<a href="/<?= $locale; ?>/aboutus"><?=lang('Nav.title-02'); ?></a><br>
					<a href="/<?= $locale; ?>/healingbowl">Healingbowl®</a>
				</span>
				<span>
					<a href="/<?= $locale; ?>/knowledge-base"><?=lang('Nav.title-11'); ?></a>
					<a href="/<?= $locale; ?>/sitemap"><?=lang('Nav.title-10'); ?></a>
					<a href="/documents/Data Protection & Privacy .docx" target="_blanck">Data Protection & Privacy</a>
					<a href="/documents/Healingbowl Refund Policy.docx" target="_blanck">Healingbowl Refund Policy</a>
					<a href="/documents/Healingbowl.Asia Terms of Service.docx" target="_blanck">Healingbowl.Asia Terms of Service</a>
					<a href="/documents/PERSONAL DATA PROTECTION NOTICE.docx" target="_blanck">PERSONAL DATA PROTECTION NOTICE</a>

				</span>
			</p>
		</div>
		<div class="catalog">
			<p><strong><?=lang('Template.text-08'); ?></strong></p>
			<? 
						$items = model(CategoriesModel::class)->orderBy('id', 'asc')->find();
						foreach($items as $i):
							$text = model(CategoriesTextModel::class)->getTextLang($i['id'], $locale);	
					?>
						<a href="/<?= $locale; ?>/catalog/<?= $i['slug']; ?>"><?= $text['title']; ?></a>
					<? endforeach; ?>
		</div>
		<div class="contact-info">
			<p><strong><?=lang('Template.text-09'); ?></strong></p>
			<!-- <a class="tel" href="tel:+601123780085">+60 11 2378 0085</a> -->
			<div class="social">
				<p><?=lang('Template.text-18'); ?></p>
					<a href="https://t.me/+13022500056" target="_blanck" ><img src="/img/tg.svg" alt=""></a>
					<a href="https://wa.me/13022500056" target="_blanck"><img src="/img/wa.svg" alt=""></a>
					<a href="https://www.pinterest.com/healingbowlasia/" target="_blanck" ><img src="/img/pin.svg" alt=""></a>
					<a href="https://www.tiktok.com/@healingbowl.asia" target="_blanck"><img src="/img/tiktok.svg" alt=""></a>
					
				</div>
			<a class="mail" href="mailto:healingbowl.my@gmail.com">healingbowl.my@gmail.com</a>
			<a class="map" href=""><?=lang('Template.text-01'); ?></a>
			<a href="/<?= $locale; ?>/contacts"><?=lang('Nav.title-06'); ?></a>
		</div>
	</div>
	<div class="content line">
		<p><?=lang('Template.text-10'); ?></p>
	</div>
</footer>

<section class="menu">
	<div class="row menu_top menu_flex">
		<img src="/img/burger.svg" class="burger_btn">
		<div class="logo">
			<a href="/"><img src="/img/logo.svg" alt="Healingbowl"></a>
			<p>
				<span>HEALINGBOWL®</span><br>
				<?=lang('Template.text-03'); ?>
			</p>
		</div>
		<div class="social">

					<a href="https://t.me/+601123780085" target="_blanck" ><img src="/img/tg.svg" alt=""></a>
					<a href="https://wa.me/+601123780085" target="_blanck"><img src="/img/wa.svg" alt=""></a>
				</div>
				<p><a href="<?= base_url('en'); ?>">En</a> / <a href="<?= base_url('ru'); ?>">Ru</a></p>
		<a href="<?= base_url($locale.'/cart'); ?>"><img src="/img/cart-m.svg" alt=""></a>
	</div>
	<div class="row menu_nav">
		<div class="menu_flex">
			<div class="logo">
				<a href="/"><img src="/img/logo.svg" alt="Healingbowl"></a>
				<p>
					<span>HEALINGBOWL®</span><br>
					<?=lang('Template.text-03'); ?>
				</p>
			</div>
			<img src="/img/close.svg" class="close">		
		</div>
		<!-- <form action="" id="search">
			<input type="text" class="search" placeholder="Найти" required>
			<label for=""><img src="/img/search.svg" alt=""></label>
		</form> -->
		<?= $this->include('partials/nav') ?>
		<div class="info">
			<div class="row">
				<p>
					<a href="/">HEALINGBOWL®.</a> <?=lang('Template.text-02'); ?>
				</p>				
				<div class="map">
					<img src="/img/map.svg" alt="">
					<p>
						<?=lang('Template.text-01'); ?>
					</p>
				</div>
				<div class="social">
					<p><?=lang('Template.text-18'); ?></p>
					<a href="https://t.me/+601123780085" target="_blanck" ><img src="/img/tg.svg" alt=""></a>
					<a href="https://wa.me/+601123780085" target="_blanck"><img src="/img/wa.svg" alt=""></a>
				</div>
				<?= $this->include('partials/social') ?>
			</div>
		</div>
	</div>

</section>
<!-- footer END -->