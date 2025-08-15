<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div>
    <div class="row">
        <h2>Товары</h2>
        <? foreach($products as $i): ?>
            <div class="post">
                <div>
                    <img src="<?=base_url('images/'.$i['img']);?>" alt="">
                </div>
                <div>
                    <?=$i['art'];?>
                </div>
                <div>
                    <?=$i['price'];?> USD
                </div>
                <div class="btn-group">
                    <a href="<?=base_url($locale.'/admin/cart_up/'.$i['id']);?>" class="btn edit">Восстановить</a>                    
                </div>                
            </div>
        <? endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>