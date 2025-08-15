<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
    <!-- CONTENT START -->
    <section class="content">
        <div class="row">
            <h3>Карта сайта</h3>
            <p class="sitemap">
                <a href="/<?= $locale; ?>"><?=lang('Nav.title-01'); ?></a>
                <a href="/<?= $locale; ?>/aboutus"><?=lang('Nav.title-02'); ?></a>
                <a href="/<?= $locale; ?>/healingbowl"><?=lang('Nav.title-03'); ?></a>
                <a href="/<?= $locale; ?>/documents"><?=lang('Nav.title-05'); ?></a>
                <a href="/<?= $locale; ?>/contacts"><?=lang('Nav.title-06'); ?></a>
                <a href="/<?= $locale; ?>/spa"><?=lang('Nav.title-07'); ?></a>
                <a href="/<?= $locale; ?>/payment-and-delivery"><?=lang('Nav.title-08'); ?></a>
                <a href="/<?= $locale; ?>/whosale"><?=lang('Nav.title-09'); ?></a>
                <a href="/<?= $locale; ?>/sitemap"><?=lang('Nav.title-10'); ?></a>
                <a href="/<?= $locale; ?>/knowledge-base"><?=lang('Nav.title-11'); ?></a>
                <a href="/<?= $locale; ?>/privacy-policy"><?=lang('Nav.title-12'); ?></a>
                <a href="/<?= $locale; ?>/user-agreement"><?=lang('Nav.title-13'); ?></a>
                <a href="/ru"><?=lang('Nav.title-14'); ?></a>
                <a href="/en"><?=lang('Nav.title-15'); ?></a>
            </p>
        </div>
    </section>
    <!-- CONTENT END -->
<?= $this->endSection() ?>