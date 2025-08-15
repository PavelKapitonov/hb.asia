<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
    <!-- CONTENT START -->
    <header class="bg-hb bg-spa-1">
		<div class="black-bg"></div>
        <div class="content">
            <div class="row">
                <div class="breadcrumbs">
                    <a href="/"><?=lang('Spa.text-01'); ?></a> <img src="/img/breadcrumbs.svg" alt=""> <?=lang('Spa.text-02'); ?>
                </div>
                <h1><?=lang('Spa.title'); ?></h1>
                <div class="togetconsultation">
                    <div></div>
                    <p>
                        <?=lang('Spa.text-03'); ?>
                    </p>							
                </div>
            </div>
        </div>
    </header>
    <section class="content">
        <div class="row grid_spa">
            <aside>
                <video data-src="https://storage.yandexcloud.net/healingbowlschool/healingbowlru/spa/6/playlist.m3u8" poster="<?= base_url('img/spa_top.jpg'); ?>" class="videoS" controls></video>
            </aside>
            <div>
                <h4><?=lang('Spa.text-04'); ?></h4>
                <div class="sp">
                    <p><?=lang('Spa.text-05'); ?></p>
                </div>
                <p><?=lang('Spa.text-06'); ?></p>

            </div>
        </div>
    </section>
    <section>
        <div class="content">
            <div class="row">
                <div class="apr2">
                    <p class="apr"><?=lang('Spa.text-07'); ?></p>
                    <h2><?=lang('Spa.text-08'); ?></h2>	
                    <p><?=lang('Spa.text-081'); ?></p>			
                </div>
            </div>
        </div>        
    </section>
    <div class="special_grid">
        <a href="#video" class="play-video" data-video="<?=lang('Spa.video-01'); ?>">
            <div class="sp-bg-4">
                <small><?=lang('Spa.text-09'); ?></small>
                <h3><?=lang('Spa.text-10'); ?></h3>
                <img src="/img/play.svg" alt="" class="play">
            </div>
        </a>
        <a href="#video" class="play-video" data-video="<?=lang('Spa.video-02'); ?>">
            <div class="sp-bg-5">
                <small><?=lang('Spa.text-11'); ?></small>
                <h3><?=lang('Spa.text-12'); ?></h3>
                <img src="/img/play.svg" alt="" class="play">
            </div>
        </a>
        <a href="#video" class="play-video" data-video="<?=lang('Spa.video-03'); ?>">
            <div class="sp-bg-6">
                <small><?=lang('Spa.text-13'); ?></small>
                <h3><?=lang('Spa.text-14'); ?></h3>
                <img src="/img/play.svg" alt="" class="play">	
            </div>
        </a>
    </div>
    <section class="bg-fa">
        <div class="content">
            <div class="row">
                <div class="apr2">
                    <p class="apr"><?=lang('Spa.text-15'); ?></p>
                    <h2><?=lang('Spa.text-16'); ?></h2>				
                </div>
                <div class="grid_3 training">
                    <div class="grid_2">
                        <div class="bg-spa-1">
                            <div class="row">
                                <small><?=lang('Spa.text-17'); ?></small>
                                <h4><?=lang('Spa.text-18'); ?></h4>
                                <p><?=lang('Spa.text-19'); ?>
                                
                                </p>                                
                            </div>
                        </div>
                        <div>
                            <div class="row logo">
                                <img src="/img/logo.svg" alt="">
                                <p><?=lang('Spa.text-20'); ?></p>                                
                            </div>
                        </div>
                    </div>
                    <div class="bg-spa-2">
                        <div class="row">
                            <small><?=lang('Spa.text-21'); ?></small>
                            <h4><?=lang('Spa.text-22'); ?> </h4>
                            <p><?=lang('Spa.text-23'); ?></p>                            
                        </div>
                    </div>
                    <div class="grid_2">
                        <div class="spa-44">
                            <div class="row">
                                <small><?=lang('Spa.text-24'); ?></small>
                                <h4><?=lang('Spa.text-25'); ?></h4>
                                <p><?=lang('Spa.text-26'); ?></p>                                
                            </div>
                        </div>
                        <div class="bg-spa-3">
                            <div class="row">
                                <small><?=lang('Spa.text-27'); ?></small>
                                <h4><?=lang('Spa.text-28'); ?></h4>
                                <p><?=lang('Spa.text-29'); ?></p>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </section>
    <section class="bg-ff">
        <div class="content">
            <div class="row">
                <div class="apr2">
                    <p class="apr"><?=lang('Spa.text-30'); ?></p>
                    <h2><?=lang('Spa.text-31'); ?></h2>				
                </div>
                <div class="payshi">
                    <div>
                        <p><?=lang('Spa.text-32'); ?></p>
                        <div class="messedgers">
                            <a href="https://wa.me/13022500056" class=""><img src="/img/wa-1.svg" alt=""> WhatsApp</a>
                            <a href="https://t.me/+13022500056" class=""><img src="/img/tg-1.svg" alt=""> Telegram</a>
                            <!-- <a href="" class=""><img src="/img/vb-1.svg" alt=""> Viber</a>
                            <a href="" class=""><img src="/img/wc-1.svg" alt=""> WeChat</a> -->
                        </div>
                        <!-- <div class="tels">
                            <a href="tel:+60 11-2376 2265" class="bd-more">+60 11-2376 2265</a>
                            <a href="tel:+977 981-3244998" class="bd-more">+977 981-3244998</a>
                        </div> -->
                    </div>
                    <img src="/img/spa-04.jpg" alt="">
                </div>
            </div>
        </div>        
    </section>
    <section class="bg-fa">
        <div class="content">
            <div class="row spa-products">
                <div class="info">
                    <div class="apr2">
                        <p class="apr"><?=lang('Spa.text-33'); ?></p>
                        <h3><?=lang('Spa.text-34'); ?></h3>				
                    </div>
                    <p><?=lang('Spa.text-35'); ?></p>
                    <h4><?=lang('Spa.text-361'); ?></h4>
                    <div class="char">
                        <div>
                            <p><?=lang('Spa.text-36'); ?></p>
                            <p><?=lang('Spa.text-37'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-38'); ?></p>
                            <p><?=lang('Spa.text-39'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-40'); ?></p>
                            <p><?=lang('Spa.text-41'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-42'); ?></p>
                            <p><?=lang('Spa.text-43'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-44'); ?></p>
                            <p><?=lang('Spa.text-45'); ?></p>
                        </div>
                        <!-- <div class="price">
                            <p><?=lang('Spa.text-46'); ?></p>
                            <p><?=lang('Spa.text-47'); ?></p>
                        </div> -->
                    </div>
                    <a href="" class="callback bt-red"><?=lang('Spa.text-48'); ?></a>
                </div>
                <div class="o-slider">
                    <div class="slider-k">
                        <div class="full__slid">
							<img src="/img/spa-1-01.png" alt="">                       
                        </div>
                        <div class="slides">
							<div><img src="/img/spa-1-01.png" alt=""></div>
							<div><img src="/img/spa-1-02.png" alt=""></div>
							<div><img src="/img/spa-1-03.png" alt=""></div>
							<div><img src="/img/spa-1-04.png" alt=""></div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-ff">
        <div class="content">
            <div class="row spa-products">
                <div class="info">
                    <div class="apr2">
                        <p class="apr"><?=lang('Spa.text-49'); ?></p>
                        <h3><?=lang('Spa.text-50'); ?></h3>				
                    </div>
                    <p><?=lang('Spa.text-51'); ?></p>
                    <h4><?=lang('Spa.text-52'); ?></h4>
                    <div class="char">
                        <div>
                            <p><?=lang('Spa.text-53'); ?></p>
                            <p><?=lang('Spa.text-54'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-55'); ?></p>
                            <p><?=lang('Spa.text-56'); ?></p>
                        </div>                        
                        <div>
                            <p><?=lang('Spa.text-57'); ?></p>
                            <p><?=lang('Spa.text-58'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-59'); ?></p>
                            <p><?=lang('Spa.text-60'); ?></p>
                        </div>                        
                        <div>
                            <p><?=lang('Spa.text-61'); ?></p>
                            <p><?=lang('Spa.text-62'); ?></p>
                        </div>
                        <!-- <div class="price">
                            <p><?=lang('Spa.text-63'); ?></p>
                            <p><?=lang('Spa.text-64'); ?></p>
                        </div> -->
                    </div>
                    <a href="" class="callback bt-red"><?=lang('Spa.text-65'); ?></a>
                </div>
                <div class="o-slider">
                    <div class="slider-k">
                        <div class="full__slid">
							<img src="/img/spa-2-01.png" alt="">                       
                        </div>
                        <div class="slides">
							<div><img src="/img/spa-2-01.png" alt=""></div>
							<div><img src="/img/spa-2-02.png" alt=""></div>
							<div><img src="/img/spa-2-03.png" alt=""></div>
							<div><img src="/img/spa-2-04.png" alt=""></div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-fa">
        <div class="content">
            <div class="row spa-products">
                <div class="info">
                    <div class="apr2">
                        <p class="apr"><?=lang('Spa.text-66'); ?></p>
                        <h3><?=lang('Spa.text-67'); ?></h3>				
                    </div>
                    <p><?=lang('Spa.text-68'); ?></p>
                    <h4><?=lang('Spa.text-69'); ?></h4>
                    <div class="char">
                        <div>
                            <p><?=lang('Spa.text-70'); ?></p>
                            <p><?=lang('Spa.text-71'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-72'); ?></p>
                            <p><?=lang('Spa.text-73'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-74'); ?></p>
                            <p><?=lang('Spa.text-75'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-76'); ?></p>
                            <p><?=lang('Spa.text-77'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-78'); ?></p>
                            <p><?=lang('Spa.text-79'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-80'); ?></p>
                            <p><?=lang('Spa.text-81'); ?></p>
                        </div>
                        <!-- <div class="price">
                            <p><?=lang('Spa.text-82'); ?></p>
                            <p><?=lang('Spa.text-83'); ?></p>
                        </div> -->
                    </div>
                    <a href="" class="callback bt-red"><?=lang('Spa.text-84'); ?></a>
                </div>
                <div class="o-slider">
                    <div class="slider-k">
                        <div class="full__slid">
							<img src="/img/spa-3-01.png" alt="">                       
                        </div>
                        <div class="slides">
							<div><img src="/img/spa-3-01.png" alt=""></div>
							<div><img src="/img/spa-3-02.png" alt=""></div>
							<div><img src="/img/spa-3-03.png" alt=""></div>
							<div><img src="/img/spa-3-04.png" alt=""></div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-ff">
        <div class="content">
            <div class="row spa-products">
                <div class="info">
                    <div class="apr2">
                        <p class="apr"><?=lang('Spa.text-85'); ?></p>
                        <h3><?=lang('Spa.text-86'); ?></h3>				
                    </div>
                    <p><?=lang('Spa.text-87'); ?></p>
                    <h4><?=lang('Spa.text-88'); ?></h4>
                    <div class="char">
                        <div>
                            <p><?=lang('Spa.text-89'); ?></p>
                            <p><?=lang('Spa.text-90'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-91'); ?></p>
                            <p><?=lang('Spa.text-92'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-93'); ?></p>
                            <p><?=lang('Spa.text-94'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-95'); ?></p>
                            <p><?=lang('Spa.text-96'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-97'); ?></p>
                            <p><?=lang('Spa.text-98'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-99'); ?></p>
                            <p><?=lang('Spa.text-100'); ?></p>
                        </div>
                        <!-- <div class="price">
                            <p><?=lang('Spa.text-101'); ?></p>
                            <p><?=lang('Spa.text-102'); ?></p>
                        </div> -->
                    </div>
                    <a href="" class="callback bt-red"><?=lang('Spa.text-103'); ?></a>
                </div>
                <div class="o-slider">
                    <div class="slider-k">
                        <div class="full__slid">
							<img src="/img/spa-4-01.png" alt="">                       
                        </div>
                        <div class="slides">
							<div><img src="/img/spa-4-01.png" alt=""></div>
							<div><img src="/img/spa-4-02.png" alt=""></div>
							<div><img src="/img/spa-4-03.png" alt=""></div>
							<div><img src="/img/spa-4-04.png" alt=""></div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-fa">
        <div class="content">
            <div class="row spa-products">
                <div class="info">
                    <div class="apr2">
                        <p class="apr"><?=lang('Spa.text-104'); ?></p>
                        <h3><?=lang('Spa.text-105'); ?></h3>				
                    </div>
                    <p><?=lang('Spa.text-106'); ?></p>
                    <h4><?=lang('Spa.text-107'); ?></h4>
                    <div class="char">
                        <div>
                            <p><?=lang('Spa.text-108'); ?></p>
                            <p><?=lang('Spa.text-109'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-110'); ?></p>
                            <p><?=lang('Spa.text-111'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-112'); ?></p>
                            <p><?=lang('Spa.text-113'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-114'); ?></p>
                            <p><?=lang('Spa.text-115'); ?></p>
                        </div>                        
                        <div>
                            <p><?=lang('Spa.text-116'); ?></p>
                            <p><?=lang('Spa.text-117'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-118'); ?></p>
                            <p><?=lang('Spa.text-119'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-120'); ?></p>
                            <p><?=lang('Spa.text-121'); ?></p>
                        </div>
                        <!-- <div class="price">
                            <p><?=lang('Spa.text-122'); ?></p>
                            <p><?=lang('Spa.text-123'); ?></p>
                        </div> -->
                    </div>
                    <a href="" class="callback bt-red"><?=lang('Spa.text-124'); ?></a>
                </div>
                <div class="o-slider">
                    <div class="slider-k">
                        <div class="full__slid">
							<img src="/img/spa-5-01.png" alt="">                       
                        </div>
                        <div class="slides">
							<div><img src="/img/spa-5-01.png" alt=""></div>
							<div><img src="/img/spa-5-02.png" alt=""></div>
							<div><img src="/img/spa-5-03.png" alt=""></div>
							<div><img src="/img/spa-5-04.png" alt=""></div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-ff">
        <div class="content">
            <div class="row spa-products">
                <div class="info">
                    <div class="apr2">
                        <p class="apr"><?=lang('Spa.text-125'); ?></p>
                        <h3><?=lang('Spa.text-126'); ?></h3>				
                    </div>
                    <p><?=lang('Spa.text-127'); ?></p>
                    <h4><?=lang('Spa.text-128'); ?></h4>
                    <div class="char">
                        <div>
                            <p><?=lang('Spa.text-129'); ?></p>
                            <p><?=lang('Spa.text-1291'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-130'); ?></p>
                            <p><?=lang('Spa.text-131'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-132'); ?></p>
                            <p><?=lang('Spa.text-133'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-134'); ?></p>
                            <p><?=lang('Spa.text-135'); ?></p>
                        </div>                        
                        <div>
                            <p><?=lang('Spa.text-136'); ?></p>
                            <p><?=lang('Spa.text-137'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-138'); ?></p>
                            <p><?=lang('Spa.text-139'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-140'); ?></p>
                            <p><?=lang('Spa.text-141'); ?></p>
                        </div>
                        <!-- <div class="price">
                            <p><?=lang('Spa.text-142'); ?></p>
                            <p><?=lang('Spa.text-143'); ?></p>
                        </div> -->
                    </div>
                    <a href="" class="callback bt-red"><?=lang('Spa.text-144'); ?></a>
                </div>
                <div class="o-slider">
                    <div class="slider-k">
                        <div class="full__slid">
							<img src="/img/spa-6-01.png" alt="">                       
                        </div>
                        <div class="slides">
							<div><img src="/img/spa-6-01.png" alt=""></div>
							<div><img src="/img/spa-6-02.png" alt=""></div>
							<div><img src="/img/spa-6-03.png" alt=""></div>
							<div><img src="/img/spa-6-04.png" alt=""></div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-fa">
        <div class="content">
            <div class="row spa-products">
                <div class="info">
                    <div class="apr2">
                        <p class="apr"><?=lang('Spa.text-145'); ?></p>
                        <h3><?=lang('Spa.text-146'); ?></h3>				
                    </div>
                    <p><?=lang('Spa.text-147'); ?></p>
                    <h4><?=lang('Spa.text-148'); ?></h4>
                    <div class="char">
                        <div>
                            <p><?=lang('Spa.text-149'); ?></p>
                            <p><?=lang('Spa.text-150'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-151'); ?></p>
                            <p><?=lang('Spa.text-152'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-153'); ?></p>
                            <p><?=lang('Spa.text-154'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-155'); ?></p>
                            <p><?=lang('Spa.text-156'); ?></p>
                        </div>                        
                        <div>
                            <p><?=lang('Spa.text-157'); ?></p>
                            <p><?=lang('Spa.text-158'); ?></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-159'); ?></p>
                            <p></p>
                        </div>
                        <div>
                            <p><?=lang('Spa.text-160'); ?></p>
                            <p><?=lang('Spa.text-161'); ?></p>
                        </div>
                        <!-- <div class="price">
                            <p><?=lang('Spa.text-162'); ?></p>
                            <p><?=lang('Spa.text-163'); ?></p>
                        </div> -->
                    </div>
                    <a href="" class="callback bt-red"><?=lang('Spa.text-164'); ?></a>
                </div>
                <div class="o-slider">
                    <div class="slider-k">
                        <div class="full__slid">
							<img src="/img/spa-7-01.png" alt="">                       
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-ff">
        <div class="content">
            <div class="row">
                <div class="apr2">
                    <p class="apr"><?=lang('Spa.text-165'); ?></p>
                    <h2><?=lang('Spa.text-166'); ?></h2>				
                </div>
                <div class="payshi">
                    <div>
                        <div class="messedgers">
                            <a href="https://wa.me/13022500056" class=""><img src="/img/wa-1.svg" alt=""> WhatsApp</a>
                            <a href="https://t.me/+13022500056" class=""><img src="/img/tg-1.svg" alt=""> Telegram</a>
                            <!-- <a href="" class=""><img src="/img/vb-1.svg" alt=""> Viber</a>
                            <a href="" class=""><img src="/img/wc-1.svg" alt=""> WeChat</a> -->
                        </div>
                        <!-- <div class="tels">
                            <a href="tel:+60 11-2376 2265" class="bd-more">+60 11-2376 2265</a>
                            <a href="tel:+977 981-3244998" class="bd-more">+977 981-3244998</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>        
    </section>

















    <!-- CONTENT END -->
<?= $this->endSection() ?>