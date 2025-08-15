<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="content">
    <div class="row">
        <h1>Редактировать расписание</h1>
        <form class="" action="<?= base_url('admin/edit_schedule/'.$schedule['id']) ?>" method="post">
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" value="<?=$schedule['title'];?>">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea name="text" id="editor" cols="60" rows="10"><?=$schedule['text'];?></textarea>
            </div>  
            <input type="hidden" name="id" value="<?=$schedule['id'];?>">   
            <div class="form-group">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>     
        </form>        
    </div>
</div>
<script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>
<?= $this->endSection() ?>