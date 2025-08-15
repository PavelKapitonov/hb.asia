	<!-- header -->

	<div class="scroll_nav">
		<div class="content">
			<div class="row top__nav">
				<div class="logo">
					<a href="/<?= $locale; ?>"><img src="/img/logo.svg" alt="Healingbowl"></a>
					<p>
						<span>HEALINGBOWL®</span><br>
						<?=lang('Template.text-03'); ?>
					</p>
				</div>
                <?= $this->include('partials/nav') ?>
				<!-- <form action="" id="search">
					<input type="text" class="search" placeholder="<?=lang('Template.text-11'); ?>" required>
					<label for=""><img src="/img/search.svg" alt=""></label>
				</form> -->
				<div class="social">
					<a href="https://t.me/+601123780085" target="_blanck" ><img src="/img/tg.svg" alt=""></a>
					<a href="https://wa.me/+601123780085" target="_blanck"><img src="/img/wa.svg" alt=""></a>
					<?= $this->include('partials/social') ?>
				</div>
				<p class="lang"><a href="<?= base_url('en'); ?>">En</a> / <a href="<?= base_url('ru'); ?>">Ru</a></p>
				<!-- <a href="tel:+13022500056" class="call">+13022500056</a> -->
				<a href="/<?= $locale; ?>/cart" class="cart">
					<img src="/img/cart.svg" alt="">
<?php
$cart = \Config\Services::cart(); // Получаем экземпляр нашей кастомной корзины
?>
<span><?= count($cart->contents()); ?></span>
					<p><?=lang('Template.text-04'); ?></p>
				</a>
			</div>
		</div>
	</div>
	<div class="topper"></div>
	<!-- header END -->