<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<section class="product mb144">
        <div class="content">
            <div class="row">
                <div class="breadcrumbs">
                    <a href="/"><?=lang('Product.title'); ?></a> <img src="/img/breadcrumbs-gray.svg" alt=""> <a href="<?= base_url($locale.'/catalog/'.$category['slug']); ?>"><?= $category_text['title']; ?></a> <img src="/img/breadcrumbs-gray.svg" alt=""> <? if($product_text){ echo $product_text['title']; }; ?> <?= $product['art']; ?>
                </div>
                <div class="product__info">
                    <div class="slider-k">
                        <div class="slides">
							<? if($product['video']): ?>
								<div class="youtube"></div>
							<? endif; ?>
							<? foreach($product_img as $i): ?>
								<div><img src="<?= base_url('images/'.$i['img']); ?>" alt=""></div>
							<? endforeach; ?>
                        </div>
                        <div class="full__slid">
							<img src="<?= base_url('images/'.$product['img']); ?>" alt="">                       
							<? if($product['video']): ?>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $product['video']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
							<? endif; ?>
                        </div>
                    </div>
                    <div class="info">
						<h3><? if($product_text){ echo $product_text['title']; }; ?> <?= $product['art']; ?></h3>
						<div class="price_available">
							<p class="price"><?= number_format(ceil($product['price']*$MYR), 0, '.', ' '); ?> MYR</p>
							<p class="nalichie">
								<? if($product['availability'] == "В Непале"): ?>
									<?=lang('Catalog.text-23'); ?>
								<? elseif($product['availability'] == "Доступно"): ?>
									<?=lang('Catalog.text-24'); ?>
								<? elseif($product['availability'] == "В США"): ?>
									<?=lang('Catalog.text-25'); ?>
								<? elseif($product['availability'] == "В Малайзии"): ?>
									<?=lang('Catalog.text-26'); ?>
								<? elseif($product['availability'] == "В Куала-Лумпуре"): ?>
									<?=lang('Catalog.text-26'); ?>									
								<? elseif($product['availability'] == "Под заказ"): ?>
									<?=lang('Catalog.text-27'); ?>
								<? else: ?>
									<?= $product['availability']; ?>
								<? endif; ?>
								
							</p>
						</div>
						<div class="char">
							<? if($product['diameter']): ?>
								<div>
									<p><?=lang('Product.text-01'); ?></p>
									<p><img src="/img/dia.svg" alt=""> <?= $product['diameter']; ?> <?=lang('Product.text-02'); ?></p>
								</div>
							<? endif; ?>
							<? if($product['note']): ?>
								<div>
									<p><?=lang('Product.text-03'); ?></p>
									<p><?= $product['note']; ?></p>
								</div>
							<? endif; ?>
							<? if($product['frequency']): ?>
								<div>
									<p><?=lang('Product.text-04'); ?></p>
									<p><?= $product['frequency']; ?> <?=lang('Product.text-12'); ?></p>
								</div>
							<? endif; ?>
							<? if($product['brand_id']): ?>
								<div>
									<p><?=lang('Product.text-05'); ?></p>
									<p><a href="<?= base_url($locale.'/catalog/healingbowl-professional/'.$brand['slug']); ?>"><?= $brands_text['title']; ?></a></p>
								</div>
							<? endif; ?>
							<? foreach($product_set as $i): ?>
								<div>
									<p><?= $i['title']; ?></p>
									<p><?= $i['diameter']; ?> <?=lang('Product.text-02'); ?></p>
									<p><?= $i['note']; ?></p>
									<p><?= $i['frequency']; ?> <?=lang('Product.text-12'); ?></p>
								</div>
							<? endforeach; ?>
						</div>
						<div class="btns">
							<div>
									<?= form_open('{locale}/cart/add'); ?>
										<input type="hidden" name="id" value="<?= $product['id']; ?>">
										<input type="hidden" name="art" value="<?= $product['art']; ?>">
										<input type="hidden" name="price" value="<?= ceil($product['price']*$MYR); ?>">
										<input type="submit" value="<?=lang('Product.text-06'); ?>" class="bt-red">
									<?= form_close(); ?>
									<?= form_open('{locale}/cart'); ?>
										<input type="hidden" name="id" value="<?= $product['id']; ?>">
										<input type="hidden" name="art" value="<?= $product['art']; ?>">
										<input type="hidden" name="price" value="<?= ceil($product['price']*$MYR); ?>">									
										<input type="submit" value="<?=lang('Product.text-07'); ?>" class="bt-fill">
									<?= form_close(); ?>
							</div>
							<a href="" class="bt-fill callback"><?=lang('Product.text-08'); ?></a>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<section class="bg-fa">
		<div class="content">
			<div class="row description">
				<h4><?=lang('Product.text-09'); ?></h4>
				<? if($product_text){ echo $product_text['text']; }; ?>
			</div>
		</div>
	</section>
	<section class="bg-ff">
		<div class="content">
			<div class="row">
				<div class="apr2">
					<h4><?=lang('Product.text-11'); ?></h4>				
				</div>
			</div>
		</div>
		<div class="p-slider content">
			<div class="row">
				<div class="owl-carousel slider__4">

					<? $product_text = model(ProductText::class);  ?>
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
								<p><?= ceil($i['price']*$MYR); ?> MYR</p>
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
	</section>

	<!-- <section class="bgff mb144">
		<div class="content">
			<div class="row">
				<div class="apr2">
					<h4><?=lang('Product.text-11'); ?></h4>				
				</div>
			</div>
		</div>
		<div class="p-slider content">
			<div class="row">
				<div class="owl-carousel slider__5">
					<div class="catalog__item">
						<div class="pic">
							<img src="/img/image 92.jpg" alt="" class="i">
							<img src="/img/i_cart.svg" alt="" class="cart">
						</div>
						<div class="art_price">
							<p>HBBP-225</p>
							<p>14 500 ₽</p>
						</div>
						<p class="nalichie">Наличие в Москве</p>
						<div class="ncd">
							<p><span>Нота:</span><br>G(Соль)</p>
							<p><span>Частота:</span><br>100 <?=lang('Product.text-12'); ?></p>
							<div><img src="/img/dia.svg" alt=""><p>28 <?=lang('Product.text-02'); ?></p></div>
						</div>
						<input type="submit" value="Купить в 1 клик" class="bt-red">
					</div>
					<div class="catalog__item">
						<div class="pic">
							<img src="/img/image 92.jpg" alt="" class="i">
							<img src="/img/i_cart.svg" alt="" class="cart">
						</div>
						<div class="art_price">
							<p>HBBP-225</p>
							<p>14 500 ₽</p>
						</div>
						<p class="nalichie">Наличие в Москве</p>
						<div class="ncd">
							<p><span>Нота:</span><br>G(Соль)</p>
							<p><span>Частота:</span><br>100 <?=lang('Product.text-12'); ?></p>
							<div><img src="/img/dia.svg" alt=""><p>28 <?=lang('Product.text-02'); ?></p></div>
						</div>
						<input type="submit" value="Купить в 1 клик" class="bt-red">
					</div>						
					<div class="catalog__item">
						<div class="pic">
							<img src="/img/image 92.jpg" alt="" class="i">
							<img src="/img/i_cart.svg" alt="" class="cart">
						</div>
						<div class="art_price">
							<p>HBBP-225</p>
							<p>14 500 ₽</p>
						</div>
						<p class="nalichie">Наличие в Москве</p>
						<div class="ncd">
							<p><span>Нота:</span><br>G(Соль)</p>
							<p><span>Частота:</span><br>100 <?=lang('Product.text-12'); ?></p>
							<div><img src="/img/dia.svg" alt=""><p>28 <?=lang('Product.text-02'); ?></p></div>
						</div>
						<input type="submit" value="Купить в 1 клик" class="bt-red">
					</div>						
					<div class="catalog__item">
						<div class="pic">
							<img src="/img/image 92.jpg" alt="" class="i">
							<img src="/img/i_cart.svg" alt="" class="cart">
						</div>
						<div class="art_price">
							<p>HBBP-225</p>
							<p>14 500 ₽</p>
						</div>
						<p class="nalichie">Наличие в Москве</p>
						<div class="ncd">
							<p><span>Нота:</span><br>G(Соль)</p>
							<p><span>Частота:</span><br>100 <?=lang('Product.text-12'); ?></p>
							<div><img src="/img/dia.svg" alt=""><p>28 <?=lang('Product.text-02'); ?></p></div>
						</div>
						<input type="submit" value="Купить в 1 клик" class="bt-red">
					</div>
					<div class="catalog__item">
						<div class="pic">
							<img src="/img/image 92.jpg" alt="" class="i">
							<img src="/img/i_cart.svg" alt="" class="cart">
						</div>
						<div class="art_price">
							<p>HBBP-225</p>
							<p>14 500 ₽</p>
						</div>
						<p class="nalichie">Наличие в Москве</p>
						<div class="ncd">
							<p><span>Нота:</span><br>G(Соль)</p>
							<p><span>Частота:</span><br>100 <?=lang('Product.text-12'); ?></p>
							<div><img src="/img/dia.svg" alt=""><p>28 <?=lang('Product.text-02'); ?></p></div>
						</div>
						<input type="submit" value="Купить в 1 клик" class="bt-red">
					</div>
					<div class="catalog__item">
						<div class="pic">
							<img src="/img/image 92.jpg" alt="" class="i">
							<img src="/img/i_cart.svg" alt="" class="cart">
						</div>
						<div class="art_price">
							<p>HBBP-225</p>
							<p>14 500 ₽</p>
						</div>
						<p class="nalichie">Наличие в Москве</p>
						<div class="ncd">
							<p><span>Нота:</span><br>G(Соль)</p>
							<p><span>Частота:</span><br>100 <?=lang('Product.text-12'); ?></p>
							<div><img src="/img/dia.svg" alt=""><p>28 <?=lang('Product.text-02'); ?></p></div>
						</div>
						<input type="submit" value="Купить в 1 клик" class="bt-red">
					</div>
				</div>	
			</div>
		</div>
	</section> -->

	<?= $this->include('partials/special') ?>
    <?= $this->endSection() ?>
