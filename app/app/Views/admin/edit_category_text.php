<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="content">
    <div class="row">
        <h1>Редактировать описание</h1>
        <br>
        <?= form_open($locale.'/admin/edit_category_text/'.$category_text['id']); ?> 
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" value="<?= $category_text['title']; ?>">
            </div>   
            <div class="form-group">
                <label for="title">Текст</label>
                <textarea name="text" id="editor" cols="30" rows="10"><?= $category_text['text']; ?></textarea>
            </div>  
            <div class="form-group">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        <?= form_close(); ?>  
    </div>
</div>
<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
		<script src="/ckeditor/ckeditor.js"></script>
<script>

CKEDITOR.replace( 'editor' );

</script>
<?= $this->endSection() ?>