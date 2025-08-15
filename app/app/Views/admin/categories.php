<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="content">
    <div class="row">
        <h1>Добавить категорию</h1>
        <br>
        <?= form_open($locale.'/admin/categories') ?> 
            <div class="form-group">
                <label for="title">Алиас</label>
                <input type="text" name="slug">
            </div>            
            <div class="form-group">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </form>        
    </div>
</div>
<div>
    <div class="row">
        <h2>Категории</h2>
        <? foreach($categories as $i): ?>
            <div class="post">
                <div>
                    <img src="<?= base_url('images/'.$i['img']); ?>" alt="">
                </div>
                <div>
                    <?=$i['slug'];?>
                </div>
                <div class="btn-group">
                    <a href="<?=base_url($locale.'/admin/edit_category/'.$i['id']);?>" class="btn edit">Редактировать</a>                    
                    <a href="<?=base_url($locale.'/admin/delete_category/'.$i['id']);?>" class="btn delete">Удалить</a>
                </div>                
            </div>
        <? endforeach; ?>
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