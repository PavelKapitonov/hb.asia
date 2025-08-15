<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<?php
$cart = session()->get('cart') ?? [];
$total = array_reduce($cart, fn($sum, $item) => $sum + ($item['price'] * $item['qty']), 0);
?>
<section class="bg-ff">
    <div class="content cart">
        <h4>Shopping cart</h4>
        <?php foreach($cart as $id => $item): 
            $products = model(ProductsModel::class)->getProductById($id);
            $product_text = model(ProductText::class)->getTextLang($id, $locale);
        ?>
        <div class="cart__item">
            <div>
                <img src="<?= base_url('images/'.$products['img']); ?>" alt="">
            </div>
            <div>
                <p><?= esc($item['name']) ?> <?= esc($product_text['title'] ?? '') ?></p>
            </div>
            <div>
                <p>Qty: <?= $item['qty'] ?></p>
            </div>
            <div>
                <p><strong><?= number_format($item['price'], 2) ?> MYR</strong></p>
            </div> 
            <a href="<?= base_url($locale.'/cart/del/'.$id);?>" class="del">×</a>
        </div>
        <?php endforeach; ?>
        
        <div class="total">
            <p>Total: <strong><?= number_format($total, 2) ?> MYR</strong></p>
        </div> 
    </div>

    <div class="content cart">
        <h4>Checkout</h4>
        <?= form_open($locale.'/cart/client') ?>
            <input type="text" name="name" placeholder="<?= lang('Template.text-13') ?>" required>
            <input type="text" name="phone" placeholder="<?= lang('Template.text-14') ?>" required>
            <input type="text" name="email" placeholder="<?= lang('Template.text-15') ?>" required>
            <input type="hidden" name="price" value="<?= $total ?>">
            <input type="hidden" name="product" value="<?= htmlspecialchars(json_encode($cart)) ?>">
            <button type="submit" class="btn bt-red">Proceed to checkout</button>
        <?= form_close() ?> 
    </div>
</section>
<?= $this->endSection() ?>