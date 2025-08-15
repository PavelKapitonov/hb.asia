<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

    <header class="bg-hb bg-hb-1" style="background: url(/images/<?= $img; ?>); background-size: cover; background-repeat: no-repeat;">
		<div class="black-bg"></div>
        <div class="content">
            <div class="row">
                <div class="breadcrumbs">
                    <a href="/"><?=lang('Catalog.title'); ?></a> <img src="/img/breadcrumbs.svg" alt=""> <?= $category_text['title']; ?>
                </div>
                <h1><?= $category_text['title']; ?></h1>
                <div class="togetconsultation">
					<? if(in_array($category['slug'], array("video-courses", "video-modules"))): ?>
						<a href="<?= base_url($locale.'/knowledge-base'); ?>" class="bt-modal"><?=lang('Catalog.text-22'); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14 0.999999C14 0.447714 13.5523 -8.61581e-07 13 -1.11446e-06L4 -3.13672e-07C3.44772 -6.50847e-07 3 0.447715 3 0.999999C3 1.55228 3.44772 2 4 2L12 2L12 10C12 10.5523 12.4477 11 13 11C13.5523 11 14 10.5523 14 10L14 0.999999ZM1.70711 13.7071L13.7071 1.70711L12.2929 0.292893L0.292893 12.2929L1.70711 13.7071Z" />
						</svg>
						</a>
					<? endif; ?>
                    <!-- <a href="#modal" class="bt-modal"><?=lang('Buttons.readmore'); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 0.999999C14 0.447714 13.5523 -8.61581e-07 13 -1.11446e-06L4 -3.13672e-07C3.44772 -6.50847e-07 3 0.447715 3 0.999999C3 1.55228 3.44772 2 4 2L12 2L12 10C12 10.5523 12.4477 11 13 11C13.5523 11 14 10.5523 14 10L14 0.999999ZM1.70711 13.7071L13.7071 1.70711L12.2929 0.292893L0.292893 12.2929L1.70711 13.7071Z" />
                        </svg>
                        </a> -->
							
                </div>
            </div>
        </div>
    </header>
	<section class="content catalog-store">
		<div class="row">
			<h4><?= $category_text['title']; ?></h4>
			<nav class="catalog">
				<? foreach($brands as $i): ?>
					<a href="<?= base_url(); ?>/<?= $locale; ?>/catalog/<?= $category['slug']; ?>/<?= $i['slug']; ?>"><? $brand = model(BrandsTextModel::class)->getTextLang($i['id'], $locale); if(isset($brand)){echo $brand['title'];}  ?></a>
				<? endforeach; ?>
				<? $sortByArt = array("video-courses", "video-modules"); ?>
				<? if(!empty($brands) && !in_array($category['slug'], $sortByArt)): ?>
					<a href="<?= base_url(); ?>/<?= $locale; ?>/catalog/<?= $category['slug']; ?>"><?=lang('Catalog.text-01'); ?></a>
				<? endif; ?>
				<? if(in_array($category['slug'], array("video-courses"))): ?>
					<a href="<?= base_url(); ?>/<?= $locale; ?>/catalog/video-modules"><?=lang('Catalog.text-21'); ?></a>
					<a href="<?= base_url(); ?>/<?= $locale; ?>/knowledge-base"><?=lang('Catalog.text-22'); ?></a>
				<? endif; ?>
				<? if(in_array($category['slug'], array("video-modules"))): ?>
					<a href="<?= base_url(); ?>/<?= $locale; ?>/catalog/video-courses"><?=lang('Catalog.text-20'); ?></a>
					<a href="<?= base_url(); ?>/<?= $locale; ?>/knowledge-base"><?=lang('Catalog.text-22'); ?></a>
				<? endif; ?>				
			</nav>
			<div class="desc">
				<? if(isset($brands_text)): ?>
					<?= $brands_text['text']; ?>
				<? else: ?>
					<?= $category_text['text']; ?>
				<? endif; ?>
			</div>
			<!-- <a href="" class="bd-more"><?=lang('Buttons.readmore'); ?></a> -->
			<div <? if(in_array($category['slug'], ["healingbowl-professional", "singing-bowls", "collectible-singing-bowls-and-sets"])): ?>class="store__grid"<? else: ?>class="store__grid_full" <? endif; ?>>
				<? if(in_array($category['slug'], ["healingbowl-professional", "singing-bowls", "collectible-singing-bowls-and-sets"])): ?>
				<aside>
					
					<p><span><?=lang('Catalog.text-02'); ?></span></p>
					<?  
						$prod = model(ProductsModel::class);
						$cat = $category['id'];
						$minPrice = $prod->where('category-id', $cat)->select('min(price) as minPrice')->first();
						$maxPrice = $prod->where('category-id', $cat)->select('max(price) as maxPrice')->first();
						$minDiameter = $prod->where('category-id', $cat)->select('min(diameter) as minDiameter')->first();
						$maxDiameter = $prod->where('category-id', $cat)->select('max(diameter) as maxDiameter')->first();
						$minFrequency = $prod->where('category-id', $cat)->select('min(frequency) as minFrequency')->first();
						$maxFrequency = $prod->where('category-id', $cat)->select('max(frequency) as maxFrequency')->first();
						if($brandSlug!==""){
							$b = "/".$brandSlug;
						}else{
							$b = "";
						}
					?>
					<?= form_open("{locale}/catalog/".$category['slug'].$b); ?>
					<div class="filter">
						<p><?=lang('Catalog.text-03'); ?></p>
						<img src="/img/top-arrow.svg" class="togg">
						<div>
							<div><label for=""><?=lang('Catalog.text-04'); ?></label><input type="text" name="minPrice" value="<?= $minPrice['minPrice']; ?>"></div>
							<div><label for=""><?=lang('Catalog.text-05'); ?></label><input type="text" name="maxPrice" value="<?= $maxPrice['maxPrice']; ?>"></div>
						</div>
					</div>
					<div class="filter">
						<p><?=lang('Catalog.text-07'); ?></p>
						<img src="/img/top-arrow.svg" class="togg">
						<div>
							<div><label for=""><?=lang('Catalog.text-04'); ?></label><input type="text" name="minDiameter" value="<?= $minDiameter['minDiameter'];  ?>"></div>
							<div><label for=""><?=lang('Catalog.text-05'); ?></label><input type="text" name="maxDiameter" value="<?= $maxDiameter['maxDiameter'];  ?>"></div>
						</div>
					</div>
					<div class="filter">
						<p><?=lang('Catalog.text-08'); ?></p>
						<img src="/img/top-arrow.svg" class="togg">
						<div>
							<div><label for=""><?=lang('Catalog.text-04'); ?></label><input type="text" name="minFrequency" value="<?= $minFrequency['minFrequency'];  ?>"></div>
							<div><label for=""><?=lang('Catalog.text-05'); ?></label><input type="text" name="maxFrequency" value="<?= $maxFrequency['maxFrequency'];  ?>"></div>
						</div>
					</div>
					<input type="submit" value="<?=lang('Catalog.text-09'); ?>" class="bt-red">
					<?= form_close(); ?>
					<p class="r_filter">
						<a href=""><?=lang('Catalog.text-06'); ?></a>
					</p>
					
				</aside>
				<? endif; ?>
				<div>
					<div class="order-by">
						<p>
							<?=lang('Template.text-21'); ?> 
							<? $session = session();
								if(!empty($session->get("orderBy"))){
									$order = $session->get("orderBy");
									$orderRule = $session->get("orderRule"); 
									if($order.$orderRule == 'pricedesc'){
										$orderNow = lang('Template.text-20');
									}elseif($order.$orderRule == 'priceasc'){
										$orderNow = lang('Template.text-20');
									}elseif($order.$orderRule == 'frequencyasc'){
										$orderNow = lang('Template.text-22');
									}elseif($order.$orderRule == 'diameterasc'){
										$orderNow = lang('Template.text-23');
									}
								}else{
									$orderNow = lang('Template.text-19');
								}
							?>
							<strong><?=$orderNow; ?></strong>
						</p>
						<div>
							<a href=<?= base_url("en/order/price/asc"); ?> ><?=lang('Template.text-19'); ?></a>  <br>
							<a href=<?= base_url("en/order/price/desc"); ?> ><?=lang('Template.text-20'); ?></a> <br>
							<a href=<?= base_url("en/order/frequency/asc"); ?> ><?=lang('Template.text-22'); ?></a> <br>
							<a href=<?= base_url("en/order/diameter/asc"); ?> ><?=lang('Template.text-23'); ?></a> 
						</div>
					</div>
					<? $product_text = model(ProductText::class);  ?>
					<div class="catalog_grid">
						<? foreach($products as $i): ?>
						<div class="catalog__item">
							<a href="/<?= $locale; ?>/product/<?= $i['slug']; ?>">
								<div class="pic">
									<img src="/images/<?= $i['img']; ?>" alt="" class="i">
									<img src="/img/i_cart.svg" alt="" class="cart">
								</div>								
							</a>
							<? if($i['show_title']=="1"): ?>
								<p class="title"><? $title = $product_text->getTextLang($i['id'], $locale); if($title){ echo $title['title']; } ?></p>
							<? endif; ?>
							<div class="art_price">
								<p><?= $i['art']; ?></p>
								<p class="price">
									<? if($i['sale']!=="0" && isset($i['sale'])): ?>
										<span class="red"><?= ceil($i['sale']*$MYR); ?>&nbspMYR</span>
									<? endif; ?>
									<?= ceil($i['price']*$MYR); ?> MYR
								</p>
							</div>
							<p class="nalichie">
								<? if($i['availability'] == "В Непале"): ?>
									<?=lang('Catalog.text-23'); ?>
								<? elseif($i['availability'] == "Доступно"): ?>
									<?=lang('Catalog.text-24'); ?>
								<? elseif($i['availability'] == "В США"): ?>
									<?=lang('Catalog.text-25'); ?>
								<? elseif($i['availability'] == "В Малайзии"): ?>
									<?=lang('Catalog.text-26'); ?>
								<? elseif($i['availability'] == "В Куала-Лумпуре"): ?>
									<?=lang('Catalog.text-26'); ?>									
								<? elseif($i['availability'] == "Под заказ"): ?>
									<?=lang('Catalog.text-27'); ?>
								<? endif; ?>
									
							</p>
							<div class="ncd">
								<? if($i['note']): ?>
									<p><span><?=lang('Catalog.text-11'); ?></span><br><?= $i['note']; ?></p>
								<? endif; ?>
								<? if($i['frequency']): ?>
									<p><span><?=lang('Catalog.text-12'); ?></span><br><?= $i['frequency']; ?> <?=lang('Catalog.text-13'); ?></p>
								<? endif; ?>
								<? if($i['diameter']): ?>
									<div><img src="/img/dia.svg" alt=""><p><?= $i['diameter']; ?> <?=lang('Catalog.text-14'); ?></p></div>
								<? endif; ?>
							</div>
							<?= form_open('{locale}/cart'); ?>
								<input type="hidden" name="id" value="<?= $i['id']; ?>">
								<input type="hidden" name="art" value="<?= $i['art']; ?>">
								<input type="hidden" name="price" value="<?= ceil($i['price']*$MYR); ?>">									
								<input type="submit" value="<?=lang('Catalog.text-15'); ?>" class="bt-red">
							<?= form_close(); ?>
						</div>
						<? endforeach; ?>

						
					</div>
				</div>
			</div>
		</div>
	</section>

		<?= $this->include('partials/hb-pro') ?>
		<?= $this->include('partials/special') ?>
	</section>
<?= $this->endSection() ?>