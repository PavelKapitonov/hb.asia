<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="content">
    <div class="row">
        <h1>Редактировать новость</h1>
        <form class="" action="<?= base_url('admin/edit_news/'.$news['id']) ?>" method="post">
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" value="<?=$news['title'];?>">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea name="text" id="" cols="30" rows="10"><?=$news['text'];?></textarea>
            </div>
            <div class="form-group">
                <label for="video">Ссылка на видео</label>
                <input type="text" name="video" value="<?=$news['video'];?>">
            </div>    
            <input type="hidden" name="id" value="<?=$news['id'];?>">   
            <div class="form-group">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>     
        </form>        
    </div>
</div>

<?= $this->endSection() ?>