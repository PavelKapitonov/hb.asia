<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
    <!-- CONTENT START -->
    <header class="bg-hb bg-hb-2">
		<div class="black-bg"></div>
        <div class="content">
            <div class="row">
                <div class="breadcrumbs">
                    <a href="/"><?=lang('Knowledge.text-01'); ?></a> <img src="/img/breadcrumbs.svg" alt=""> <?=lang('Knowledge.text-02'); ?>
                </div>
                <h1><?=lang('Knowledge.text-03'); ?></h1>
                <div class="togetconsultation">
                    <a href="<?= base_url($locale.'/catalog/video-courses'); ?>" class="bt-modal"><?=lang('Catalog.text-20'); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 0.999999C14 0.447714 13.5523 -8.61581e-07 13 -1.11446e-06L4 -3.13672e-07C3.44772 -6.50847e-07 3 0.447715 3 0.999999C3 1.55228 3.44772 2 4 2L12 2L12 10C12 10.5523 12.4477 11 13 11C13.5523 11 14 10.5523 14 10L14 0.999999ZM1.70711 13.7071L13.7071 1.70711L12.2929 0.292893L0.292893 12.2929L1.70711 13.7071Z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </header>
	<section class="bg-fa">
		<div class="content">
			<div class="row">
				<div class="apr2">
					<h4><?=lang('Knowledge.text-05'); ?></h4>				
				</div>
			</div>
		</div>
		<div class="hb-pro">
			<div class="content">
				<div class="white">
					<h3><?=lang('Knowledge.text-06'); ?></h3>
					<p>
                    <?=lang('Knowledge.text-07'); ?>
                    </p>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="row">
				<div class="inf">
					<p>
                        <?=lang('Knowledge.text-08'); ?>
                        <a href="<?= base_url($locale.'/catalog/video-courses'); ?>" class="bt-modal"><?=lang('Buttons.couses'); ?> 
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 0.999999C14 0.447714 13.5523 -8.61581e-07 13 -1.11446e-06L4 -3.13672e-07C3.44772 -6.50847e-07 3 0.447715 3 0.999999C3 1.55228 3.44772 2 4 2L12 2L12 10C12 10.5523 12.4477 11 13 11C13.5523 11 14 10.5523 14 10L14 0.999999ZM1.70711 13.7071L13.7071 1.70711L12.2929 0.292893L0.292893 12.2929L1.70711 13.7071Z" />
                            </svg>
                        </a>
					</p>
				</div>
			</div>
		</div>
	</section>
    <section class="content">
        <div class="row bg-knowledge">
            <h4><?=lang('Knowledge.text-09'); ?></h4>
            <div>
                <p class="sitemap">
                    <a class="go_to" href="#1"><?=lang('Knowledge.text-10'); ?></a>
                    <a class="go_to" href="#2"><?=lang('Knowledge.text-11'); ?></a>
                    <a class="go_to" href="#3"><?=lang('Knowledge.text-12'); ?></a>
                    <a class="go_to" href="#4"><?=lang('Knowledge.text-13'); ?></a>
                    <a class="go_to" href="#5"><?=lang('Knowledge.text-14'); ?></a>
                    <a class="go_to" href="#6"><?=lang('Knowledge.text-15'); ?></a>
                    <a class="go_to" href="#7"><?=lang('Knowledge.text-17'); ?></a>
                    <a class="go_to" href="#8"><?=lang('Knowledge.text-18'); ?></a>
                    <a class="go_to" href="#9"><?=lang('Knowledge.text-19'); ?></a>
                    <a class="go_to" href="#10"><?=lang('Knowledge.text-20'); ?></a>
                    <a class="go_to" href="#11"><?=lang('Knowledge.text-21'); ?></a>
                    <a class="go_to" href="#12"><?=lang('Knowledge.text-22'); ?></a>
                    <a class="go_to" href="#13"><?=lang('Knowledge.text-23'); ?></a>
                </p>
            </div>
        </div>
        <div class="row">
            <article>
                <h3 id="1"><?=lang('Knowledge.text-24'); ?></h3>
<?=lang('Knowledge.text-25'); ?>
                <h3 id="2"><?=lang('Knowledge.text-26'); ?></h3>
                <?=lang('Knowledge.text-27'); ?>
                <img src="<?=base_url('img/kn-01.jpg');?>" alt="">
                <h3 id="3"><?=lang('Knowledge.text-28'); ?></h3>
                <?=lang('Knowledge.text-29'); ?>
                <img src="<?=base_url('img/kn-02.jpg');?>" alt="">
                <h3 id="4"><?=lang('Knowledge.text-30'); ?></h3>
                <?=lang('Knowledge.text-31'); ?>
                <img src="<?=base_url('img/kn-03.jpg');?>" alt="">
                <h3 id="5"><?=lang('Knowledge.text-32'); ?></h3>
                <?=lang('Knowledge.text-33'); ?>
                <img src="<?=base_url('img/kn-04.jpg');?>" alt="">
                <h3 id="6"><?=lang('Knowledge.text-34'); ?></h3>
                <?=lang('Knowledge.text-35'); ?>
                <img src="<?=base_url('img/kn-05.jpg');?>" alt="">
                <h3 id="7"><?=lang('Knowledge.text-36'); ?></h3>
                <?=lang('Knowledge.text-37'); ?>
                <img src="<?=base_url('img/kn-06.jpg');?>" alt="">
                <h3 id="8"><?=lang('Knowledge.text-38'); ?></h3>
                <?=lang('Knowledge.text-39'); ?>
                <img src="<?=base_url('img/kn-07.jpg');?>" alt="">
                <h3 id="9"><?=lang('Knowledge.text-40'); ?></h3>
                <?=lang('Knowledge.text-41'); ?>
                <img src="<?=base_url('img/kn-08.jpg');?>" alt="">
                <h3 id="10"><?=lang('Knowledge.text-42'); ?></h3>
                <?=lang('Knowledge.text-43'); ?>
                <img src="<?=base_url('img/kn-09.jpg');?>" alt="">
                <h3 id="11"><?=lang('Knowledge.text-44'); ?></h3>
                <?=lang('Knowledge.text-45'); ?>
                <img src="<?=base_url('img/kn-10.jpg');?>" alt="">
                <h3 id="12"><?=lang('Knowledge.text-46'); ?></h3>
                <?=lang('Knowledge.text-47'); ?>
                <img src="<?=base_url('img/kn-11.jpg');?>" alt="">
                <h3 id="13"><?=lang('Knowledge.text-48'); ?></h3>
                <?=lang('Knowledge.text-49'); ?>
            </article>
        </div>
    </section>
    <section>
    <?= $this->include('partials/special') ?>
    </section>
    <!-- CONTENT END -->
<?= $this->endSection() ?>