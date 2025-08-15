<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
    <!-- CONTENT START -->
    <header class="bg-hb bg-hb-3">
		<div class="black-bg"></div>
        <div class="content">
            <div class="row">
                <div class="breadcrumbs">
                    <a href="/"><?=lang('Aboutus.text-01'); ?></a> <img src="/img/breadcrumbs.svg" alt=""> <?=lang('Aboutus.text-02'); ?>
                </div>
                <h1><?=lang('Aboutus.text-02'); ?></h1>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="row">
            <article>
                <h3><?=lang('Aboutus.text-03'); ?></h3>
                <p class="sitemap">
                    <a class="go_to" href="#healingbowl">Healingbowl</a>
                    <a class="go_to" href="#our-mission"><?=lang('Aboutus.text-04'); ?></a>
                    <a class="go_to" href="#singing-bowls"><?=lang('Aboutus.text-05'); ?></a>
                    <a class="go_to" href="#Techniques"><?=lang('Aboutus.text-06'); ?></a>
                    <a class="go_to" href="#Head-and-Founder-of-healingbowl"><?=lang('Aboutus.text-07'); ?></a>
<div class="content__pic">
    <img src="../img/about-01.jpg" alt="">
</div>
<p><?=lang('Aboutus.text-08'); ?></p>

<h3 id="healingbowl">HEALINGBOWL</h3>

<?=lang('Aboutus.text-09'); ?>
<div class="content__pic">
    <img src="../img/about-02.jpg" alt="">
</div>
<?=lang('Aboutus.text-10'); ?>

<h3 id="our-mission"><?=lang('Aboutus.text-11'); ?></h3>

<?=lang('Aboutus.text-12'); ?>

<h3 id="singing-bowls"><?=lang('Aboutus.text-13'); ?></h3>

<?=lang('Aboutus.text-14'); ?>
<div class="content__pic">
    <img src="../img/about-03.jpg" alt="">
</div>

<?=lang('Aboutus.text-15'); ?>

<h3 id="Techniques"><?=lang('Aboutus.text-16'); ?></h3>

<?=lang('Aboutus.text-17'); ?>

<div class="content__pic">
    <img src="../img/about-04.jpg" alt="">
</div>

<?=lang('Aboutus.text-18'); ?>

<h3 id="Head-and-Founder-of-healingbowl"><?=lang('Aboutus.text-19'); ?></h3>

<?=lang('Aboutus.text-20'); ?>
<div class="content__pic">
    <img src="../img/about-05.jpg" alt="">
</div>

<?=lang('Aboutus.text-21'); ?>
            </article>
        </div>
    </div>



    <?= $this->include('partials/hb-pro') ?>
	<?= $this->include('partials/special') ?>
    <!-- CONTENT END -->
<?= $this->endSection() ?>