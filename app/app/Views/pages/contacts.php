<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
    <!-- CONTENT START -->
    <?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
    <!-- CONTENT START -->
    <header class="bg-hb bg-hb-3">
		<div class="black-bg"></div>
        <div class="content">
            <div class="row">
                <div class="breadcrumbs">
                    <a href="/"><?=lang('Contacts.text-01'); ?></a> <img src="/img/breadcrumbs.svg" alt=""> <?=lang('Contacts.text-02'); ?>
                </div>
                <h1><?=lang('Contacts.text-02'); ?></h1>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="row">
            <article>
                <h3><?=lang('Contacts.text-02'); ?></h3>

                <p><?=lang('Contacts.text-03'); ?></p>


                
            </article>
        </div>
    </div>

    <!-- CONTENT END -->
<?= $this->endSection() ?>
    <!-- CONTENT END -->
<?= $this->endSection() ?>

