<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
    <!-- CONTENT START -->
    <header class="bg-hb bg-hb-3">
		<div class="black-bg"></div>
        <div class="content">
            <div class="row">
                <div class="breadcrumbs">
                    <a href="/"><?=lang('Healingbowl.text-01'); ?></a> <img src="/img/breadcrumbs.svg" alt=""> Healingbowl®
                </div>
                <h1>HEALINGBOWL®</h1>
            </div>
        </div>
    </header>
	<section class="bg-fa">
		<div class="content">
			<div class="row">
				<div class="apr2">
					<h2><?=lang('Healingbowl.text-02'); ?></h2>				
				</div>
			</div>
		</div>
		<div class="hb-pro">
			<div class="content">
				<div class="white">
					<h3> <?=lang('Healingbowl.text-03'); ?></h3>
					<p>
                    <?=lang('Healingbowl.text-04'); ?>
                    </p>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="row">
				<div class="inf">
					<p>
                    <?=lang('Healingbowl.text-05'); ?>
                        <br><br>
                        <a href="/<?= $locale; ?>/spa" class="bt-modal"><?=lang('Buttons.spa'); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 0.999999C14 0.447714 13.5523 -8.61581e-07 13 -1.11446e-06L4 -3.13672e-07C3.44772 -6.50847e-07 3 0.447715 3 0.999999C3 1.55228 3.44772 2 4 2L12 2L12 10C12 10.5523 12.4477 11 13 11C13.5523 11 14 10.5523 14 10L14 0.999999ZM1.70711 13.7071L13.7071 1.70711L12.2929 0.292893L0.292893 12.2929L1.70711 13.7071Z" />
                        </svg>
                        </a>
					</p>
				</div>
			</div>
		</div>
	</section>
<section class="bg-title">
    <div class="one-bowl">
        <h4><?=lang('Healingbowl.text-06'); ?></h4>
        <button class="callback bt-callback"><?=lang('Buttons.callback'); ?></button>
    </div>
</section>
<section class="content">
    <div class="row">
        <article>
            <h3><?=lang('Healingbowl.text-07'); ?></h3>
            <p><?=lang('Healingbowl.text-08'); ?></p>

            <div class="content__pic">
                <video data-src="https://storage.yandexcloud.net/healingbowlschool/sb/playlist.m3u8" poster="../img/gp1.png" class="videoS" controls></video>
            </div>
            <div class="content__pic">
                <img src="../img/golden pearl set.jpg" alt="<?=lang('Healingbowl.text-09'); ?>">
            </div>
            <p><i><?=lang('Healingbowl.text-09'); ?></i></p>            
        </article>
    </div>
</section>
<?= $this->include('partials/bg3') ?>
<section class="content">
    <div class="row">
        <article>
            <h3><?=lang('Healingbowl.text-10'); ?></h3>

            <?=lang('Healingbowl.text-11'); ?>

            <div class="content__pic">
                <video data-src="https://storage.yandexcloud.net/healingbowlschool/sbg/playlist.m3u8" poster="../img/gip1.jpg" class="videoS" controls></video>
            </div>
            <div class="content__pic">
                <img src="../img/himalayan pearl set.jpg" alt="<?=lang('Healingbowl.text-12'); ?>">
            </div>
            <p><i><?=lang('Healingbowl.text-12'); ?></i></p>            
        </article>
    </div>
</section>
<?= $this->include('partials/bg3') ?>
<section class="content">
    <div class="row">
        <article>
            <h3><?=lang('Healingbowl.text-13'); ?> </h3>
            <?=lang('Healingbowl.text-14'); ?>

            <div class="content__pic">
                <video data-src="https://storage.yandexcloud.net/healingbowlschool/BLACKPEARL/playlist.m3u8" poster="../img/mustang.jpg" class="videoS" controls></video>
            </div> 
            <div class="content__pic">
                <img src="../img/black pearl set.jpg" alt="<?=lang('Healingbowl.text-15'); ?>">
            </div>
            <p><i><?=lang('Healingbowl.text-15'); ?></i></p>
        </article>
    </div>
</section>
<?= $this->include('partials/bg3') ?>
<section class="content">
    <div class="row">
        <article>
            <h3><?=lang('Healingbowl.text-16'); ?></h3>
            <?=lang('Healingbowl.text-17'); ?>

            <div class="content__pic">
                <video data-src="https://storage.yandexcloud.net/healingbowlschool/SILVERPEARL/playlist.m3u8" poster="../img/sb-006.png" class="videoS" controls></video>
            </div>
            <div class="content__pic">
                <img src="../img/silver pearl set.jpg" alt="<?=lang('Healingbowl.text-18'); ?>">
            </div>
            
            <p><i><?=lang('Healingbowl.text-18'); ?></i></p>
        </article>
    </div>
</section>
<?= $this->include('partials/bg3') ?>
<section class="content">
    <div class="row">
        <article>
            <h3><?=lang('Healingbowl.text-19'); ?></h3>
            
<?=lang('Healingbowl.text-20'); ?>
            <div class="content__pic">
                <video data-src="https://storage.yandexcloud.net/healingbowlschool/SuryaPearl/playlist.m3u8" poster="../img/sb-008.png" class="videoS" controls></video>
            </div>
            <div class="content__pic">
                <img src="../img/sb-009.png" alt="<?=lang('Healingbowl.text-21'); ?>">
            </div>
            <p><i><?=lang('Healingbowl.text-21'); ?></i></p>            
        </article>
    </div>
</section>
<?= $this->include('partials/bg3') ?>
<section class="content">
    <div class="row">
        <article>
            <h3><?=lang('Healingbowl.text-22'); ?></h3>
            <?=lang('Healingbowl.text-23'); ?>

            <div class="content__pic">
                <img src="../img/sb-26.png" alt="<?=lang('Healingbowl.text-24'); ?>">
            </div>
            <div class="content__pic">
                <img src="../img/giant set.png" alt="<?=lang('Healingbowl.text-24'); ?>">
            </div>
            
            <?=lang('Healingbowl.text-25'); ?>          
        </article>
    </div>
</section>
<section class="bg-title">
    <div class="content bg-sb-c">
            <h2><?=lang('Healingbowl.text-26'); ?>  </h2>
            <button class="callback bt-callback"><?=lang('Buttons.callback'); ?>  </button>
    </div>
</section>
<section class="content">
    <div class="row">
        <article>
            <h3><?=lang('Healingbowl.text-27'); ?></h3>
            <?=lang('Healingbowl.text-28'); ?>

            <div class="content__pic">
                <img src="../img/bg-27.png" alt="<?=lang('Healingbowl.text-29'); ?>">
            </div>
            <div class="content__pic">
                <img src="../img/bg-28.png" alt="<?=lang('Healingbowl.text-29'); ?>">
            </div>              
        </article>
    </div>
</section>
<?= $this->include('partials/bg3') ?>
<section class="content">
    <div class="row">
        <article>
            <h3><?=lang('Healingbowl.text-30'); ?></h3>
            
<?=lang('Healingbowl.text-31'); ?>
            <div class="content__pic">
                <img src="../img/tinco.jpg" alt="<?=lang('Healingbowl.text-30'); ?>">
            </div>             
        </article>
    </div>
</section>
<section class="bg-title">
    <div class="content bg-sb-011">
            <h2><?=lang('Healingbowl.text-32'); ?></h2>
            <button class="callback bt-callback"><?=lang('Buttons.callback'); ?></button>
    </div>
</section>
<section class="content">
    <div class="row">
        <article>
            <h3><?=lang('Healingbowl.text-33'); ?></h3>
            <?=lang('Healingbowl.text-34'); ?>
            <div class="content__pic">
                <video data-src="https://storage.yandexcloud.net/healingbowlschool/usa/healingbowl/1/playlist.m3u8" poster="../img/sb-22.png" class="videoS" controls></video>
            </div>
            <div class="content__pic">
                <img src="../img/old tibet set.jpg" alt="<?=lang('Healingbowl.text-33'); ?>">
            </div>
            <p><i><?=lang('Healingbowl.text-35'); ?></i></p>            
        </article>
    </div>
</section>
<?= $this->include('partials/bg3') ?>
<section class="content">
    <div class="row">
        <article>
            <h3><?=lang('Healingbowl.text-36'); ?></h3>
            <?=lang('Healingbowl.text-37'); ?>
            <div class="content__pic">
                <video data-src="https://storage.yandexcloud.net/healingbowlschool/usa/healingbowl/2/playlist.m3u8" poster="../img/sb-24.png" class="videoS" controls></video>
            </div>
            <div class="content__pic">
                <img src="../img/mustang luxury set.jpg" alt="<?=lang('Healingbowl.text-36'); ?>">  
            </div>
        </article>
    </div>
</section>


<section class="bg-title">
    <div class="one-bowl">
        <h4><?=lang('Healingbowl.text-38'); ?></h4>
<button class="callback bt-callback"><?=lang('Buttons.callback'); ?></button>
    </div>
</section>
<section class="content">
    <div class="row">
        <article>
            <p><strong><?=lang('Healingbowl.text-39'); ?></strong></p>  
        </article>
    </div>
</section>
    <!-- CONTENT END -->
<?= $this->endSection() ?>