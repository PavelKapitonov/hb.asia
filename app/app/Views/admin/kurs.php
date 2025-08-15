<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<!-- <div class="content">
    <div class="row">
        <h1>Добавить новость</h1>
        <form class="" action="<?= base_url('admin/news') ?>" method="post">
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea name="text" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="video">Ссылка на видео</label>
                <input type="text" name="video">
            </div>    
            <div class="form-group">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </form>        
    </div>
</div> -->
<div>
    <div class="row">
        <h2>Курсы</h2>
        <? foreach($courses as $i): ?>
            <div class="post">
                <div>
                    <?=$i['title'];?>
                </div>
                <div class="btn-group">
                    <a href="<?=base_url('admin/edit_kurs/'.$i['id']);?>" class="btn edit">Редактировать</a>                    
                    <a href="<?=base_url('admin/delete_kurs/'.$i['id']);?>" class="btn delete">Удалить</a>
                </div>                
            </div>
        <? endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>