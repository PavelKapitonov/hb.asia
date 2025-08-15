<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
    <!-- CONTENT START -->
	<!-- <section class="slider">
		
		<div class="owl-carousel slider__1">
			<div class="slide bg-1">
				<div class="black-bg"></div>
				<div class="content">
					<div class="row">
						<p class="ap"><?=lang('Home.text-01'); ?></p>
						<h1>
                            <?=lang('Home.text-02'); ?>
						</h1>
						<div class="togetconsultation">
							<a href="#modal" class="bt-modal callback"><?=lang('Buttons.popup'); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M14 0.999999C14 0.447714 13.5523 -8.61581e-07 13 -1.11446e-06L4 -3.13672e-07C3.44772 -6.50847e-07 3 0.447715 3 0.999999C3 1.55228 3.44772 2 4 2L12 2L12 10C12 10.5523 12.4477 11 13 11C13.5523 11 14 10.5523 14 10L14 0.999999ZM1.70711 13.7071L13.7071 1.70711L12.2929 0.292893L0.292893 12.2929L1.70711 13.7071Z" />
								</svg>
								</a>
							<p>
								<?=lang('Home.text-03'); ?>
							</p>							
						</div>
					</div>
				</div>				
			</div>
			<div class="slide bg-2">
				<div class="black-bg"></div>
				<div class="content">
					<div class="row">
						<p class="ap"><?=lang('Home.text-01'); ?></p>
						<h1>
                            <?=lang('Home.text-02'); ?>
						</h1>
						<div class="togetconsultation">
							<a href="#modal" class="bt-modal"><?=lang('Buttons.popup'); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M14 0.999999C14 0.447714 13.5523 -8.61581e-07 13 -1.11446e-06L4 -3.13672e-07C3.44772 -6.50847e-07 3 0.447715 3 0.999999C3 1.55228 3.44772 2 4 2L12 2L12 10C12 10.5523 12.4477 11 13 11C13.5523 11 14 10.5523 14 10L14 0.999999ZM1.70711 13.7071L13.7071 1.70711L12.2929 0.292893L0.292893 12.2929L1.70711 13.7071Z" />
								</svg>
								</a>
							<p>
                                <?=lang('Home.text-03'); ?>
							</p>							
						</div>
					</div>
				</div>				
			</div>			
		</div>

	</section> -->


    <section class="bg-fa">
        <section class="content">
            <div class="row catalog">
                <div class="apr1">
                    <p class="apr"><?=lang('Home.text-09'); ?></p>
                    <h2><?=lang('Home.text-10'); ?></h2>
                </div>
                <div class="grid_catalog">
                    <div class="catalog_flex">
                        <div class="bg-1">
                            <a href="<?= base_url($locale.'/catalog/singing-bowls'); ?>">
                                <h3><?=lang('Home.text-14'); ?></h3>
                            </a>                            
                        </div>
                        <div class="g_2">
                            <div class="bg-2">
                                <a href="<?= base_url($locale.'/catalog/tinsha-and-bells'); ?>">
                                    <h3><?=lang('Home.text-12'); ?></h3>
                                </a>
                            </div>
                            <div class="bg-3">
                                <a href="<?= base_url($locale.'/catalog/accessories-and-incense'); ?>">
                                    <h3><?=lang('Home.text-13'); ?></h3>
                                </a>
                            </div>
                        </div>
                        <div class="bg-4">
                            <a href="<?= base_url($locale.'/catalog/collectible-singing-bowls-and-sets'); ?>">
                                <h3><?=lang('Home.text-16'); ?></h3>
                            </a>
                        </div>
                    </div>
                    <div class="catalog_flex">
                        <div class="bg-5">
                            <a href="<?= base_url($locale.'/catalog/healingbowl-professional'); ?>">
                                <h3><?=lang('Home.text-11'); ?></h3>
                            </a>
                            
                        </div>
                        <div class="bg-6">
                            <a href="<?= base_url($locale.'/catalog/healingbowl-sets'); ?>">
                                <h3><?=lang('Home.text-15'); ?></h3>
                            </a>
                            
                        </div>
                        <div class="bg-7">
                            <a href="<?= base_url($locale.'/knowledge-base'); ?>">
                                <h3><?=lang('Home.text-17'); ?></h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <section class="bg-ff">
        <div class="row">
            <div class="apr1">
                <p class="apr"><?=lang('Home.text-18'); ?></p>
                <h2><?=lang('Home.text-19'); ?></h2>
            </div>		
        </div>

        <div class="content aboutus">
            <div class="aboutus_grid">
                <div class="shadow">
                    <div><img src="/img/about-1.svg" alt=""></div>
                    <p><span><?=lang('Home.text-20'); ?></span></p>
                    <p><?=lang('Home.text-21'); ?></p>
                </div>
                <div class="shadow">
                    <div><img src="/img/about-2.svg" alt=""></div>
                    <p><span><?=lang('Home.text-22'); ?></span></p>
                    <p><?=lang('Home.text-23'); ?></p>
                </div>
                <div class="shadow">
                    <div><img src="/img/about-3.svg" alt=""></div>
                    <p><span><?=lang('Home.text-24'); ?></span></p>
                    <p><?=lang('Home.text-25'); ?></p>
                </div>
            </div>
            <div class="about-video">
                <p><?=lang('Home.text-26'); ?></p>
                <img src="/img/about-video.svg" alt="" class="l">
                <a href="#video" class="play-video" data-video="<?=lang('Home.text-37'); ?>">
                    <img src="/img/play.svg" alt="" class="play">
                </a>
            </div>
        </div>
    </section>
    <section class="bgfa">
        <section class="content about">
            <div class="owl-carousel slider__3">
                <div class="a">
                    <img src="/img/01.png" alt="">
                    <p><?=lang('Home.text-04'); ?></p>
                </div>
                <div class="a">
                    <img src="/img/02.png" alt="">
                    <p><?=lang('Home.text-05'); ?></p>
                </div>
                <div class="a">
                    <img src="/img/03.png" alt="">
                    <p><?=lang('Home.text-06'); ?></p>
                </div>
                <div class="a">
                    <img src="/img/04.png" alt="">
                    <p><?=lang('Home.text-07'); ?></p>
                </div>
                <div class="a">
                    <img src="/img/05.png" alt="">
                    <p><?=lang('Home.text-08'); ?></p>
                </div>
            </div>
        </section>	
    </section>
        <?= $this->include('partials/special') ?>

    <section class="bg-ff">
        <div class="content">
            <div class="row">
                <div class="apr2">
                    <p class="apr"><?=lang('Home.text-31'); ?></p>
                    <h2><?=lang('Home.text-32'); ?></h2>				
                </div>
                <div class="inf">
                    <p><?=lang('Home.text-33'); ?></p>
                    <p>
                        <span><?=lang('Home.text-34'); ?></span>
                        <a href="#d" class="bd-more"><?=lang('Buttons.more'); ?></a>

                    </p>
                    
                </div>
                <article>
                    <?=lang('Home.text-38'); ?>
                </article>
            </div>
        </div>
    </section>

    <section class="bg-bowl">
        <div></div>
    </section>

    <!-- <section class="bg-ff">
        <div class="content">
            <div class="row">
                <div class="apr2">
                    <p class="apr"><?=lang('Home.text-35'); ?></p>
                    <h2><?=lang('Home.text-36'); ?></h2>				
                </div>
            </div>
        </div>
        <div class="p-slider content">
            <div class="owl-carousel slider__2">
                <div class="shadow" ><img src="/img/p-1.svg" alt=""></div>
                <div class="shadow" ><img src="/img/p-2.svg" alt=""></div>
                <div class="shadow" ><img src="/img/p-3.png" alt=""></div>
                <div class="shadow" ><img src="/img/p-4.svg" alt=""></div>
                <div class="shadow" ><img src="/img/p-5.svg" alt=""></div>
                <div class="shadow" ><img src="/img/p-3.png" alt=""></div>
            </div>		
        </div>
    </section> -->
    <!-- CONTENT END -->

<?= $this->endSection() ?>