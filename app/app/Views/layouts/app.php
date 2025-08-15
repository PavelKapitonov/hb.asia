<!DOCTYPE html>
<html lang="en">
<head>
    <title>AdminPanel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="admin">
        <aside class="side">
            <div class="row">
                <a href="<?=base_url('ru/admin/crm');?>">Заказы</a>
                <a href="<?=base_url('ru/admin/product');?>">Товары</a>
                <a href="<?=base_url('ru/admin/cart');?>">Корзина</a>
                <a href="<?=base_url('ru/admin/brand');?>">Бренды</a>
                <a href="<?=base_url('ru/admin/categories');?>">Категории</a>
            </div>
        </aside>
        <section>
            <?= $this->renderSection("body") ?>
        </section>        
    </div>
</body>
</html>