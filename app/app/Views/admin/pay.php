<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="content">
    <div class="row">
        <h1>Добавить ссылку на оплату</h1>
        <?= form_open_multipart('admin/pay') ?>
            <div class="form-group">
                <label for="title">Превью</label>
                <input type="file" name="userfile" size="20">
            </div>        
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title">
            </div>
            <div class="form-group">
                <label for="text">Цена</label>
                <input type="text" name="price">
            </div>
            <div class="form-group">
                <label for="video">Алиас</label>
                <input type="text" name="alias">
            </div>    

            <div class="form-group">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </form>        
    </div>
</div>
<div>
    <div class="row">
        <h2>Курсы</h2>
        <? foreach($courses as $i): ?>
            <div class="post">
                <div>
                    <img src="<?=base_url('images/'.$i['img']);?>" alt="">
                </div>
                <div>
                    <?=$i['title'];?>
                </div>
                <div>
                    <?=$i['price'];?> RUB
                </div>
                <div>
                    <a href="<?=base_url('cart/'.$i['alias']);?>" target="_blanck">Ссылка</a>
                </div>
                <div class="btn-group">
                    <a href="<?=base_url('admin/edit_pay/'.$i['id']);?>" class="btn edit">Редактировать</a>                    
                    <a href="<?=base_url('admin/delete_pay/'.$i['id']);?>" class="btn delete">Удалить</a>
                </div>                
            </div>
        <? endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>