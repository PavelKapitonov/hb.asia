<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="content">
    <div class="row">
        <h1>Добавить бренд</h1>
        <?= form_open($locale.'/admin/brand') ?> 
            <div class="form-group">
                <label for="title">Категория</label>
                <select name="category_id" id="">
                    <? foreach($categories as $i): ?>
                        <? 
                            $categories_text = model(CategoriesTextModel::class);
                            $text = $categories_text->getTextLang($i['id'], 'ru');
                            ?>
                        <option value="<?=$i['id']; ?>"><?=$text['title']; ?></option>
                    <? endforeach; ?>    
                </select>
            </div>            
            <div class="form-group">
                <label for="title">Алиас</label>
                <input type="text" name="slug">
            </div> 
            <div class="form-group">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        <?= form_close(); ?>      
    </div>
</div>
<div>
    <div class="row">
        <h2>Товары</h2>
        <? foreach($brands as $i): ?>
            <div class="post">
                <div>
                    <img src="<?= base_url('images/'.$i['img']); ?>" alt="">
                </div>
                <div>
                    <?=$i['slug'];?>
                </div>
                <div class="btn-group">
                    <a href="<?=base_url($locale.'/admin/edit_brand/'.$i['id']);?>" class="btn edit">Редактировать</a>                    
                    <a href="<?=base_url($locale.'/admin/delete_brand/'.$i['id']);?>" class="btn delete">Удалить</a>
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