<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="content">
    <div class="row">
        <h1>Редактировать категорию</h1>
        <br>
        <?= form_open($locale.'/admin/edit_brand/'.$brand['id']); ?> 
            <div class="form-group">
                <label for="title">Алиас</label>
                <input type="text" name="slug" value="<?= $brand['slug']; ?>">
            </div>          
            <div class="form-group">
                <label for="title">Категория</label>
                <select name="category_id" id="">
                    <? $categories_text = model(CategoriesTextModel::class); ?>
                    <option value="<?= $brand['category_id']; ?>"><?= $categories_text->getTextLang($brand['category_id'], 'ru')['title']; ?></option>
                    <? foreach($categories as $i): ?>
                        <? 
                            
                            $text = $categories_text->getTextLang($i['id'], 'ru');
                            ?>
                        <option value="<?=$i['id']; ?>"><?=$text['title']; ?></option>
                    <? endforeach; ?>    
                </select>
            </div> 
            <div class="form-group">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>  
        <br>
        <img src="<?= base_url('images/'.$brand['img']); ?>" alt="" style="width: 100%">
        <br>
        <h2>Обновить превью 1920*700</h2> 
        <?= form_open_multipart($locale.'/admin/brand_img/'.$brand['id']); ?> 
            <div class="form-group">
                <label for="title">Превью</label>
                <input type="file" name="userfile" size="20">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        <?= form_close(); ?>  
        <br>
        <h2>Редактировать текст</h2>
        <?= form_open($locale.'/admin/brand_text/'.$brand['id']); ?> 
        <div class="form-group">
                <label for="">Язык</label>
                <select name="lang" id="">
                    <option value="ru">Русский</option>
                    <option value="en">Английский</option>
                </select>
            </div>  
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title">
            </div>
            <div class="form-group">
                <label for="">Описание</label>
                <textarea name="text" id="editor" cols="30" rows="10"></textarea>
            </div>
            <input type="hidden" name="brand-id" value="<?= $brand['id']; ?>">
            <div class="form-group">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>  
        <?= form_close(); ?>    
        <? 
        foreach($brand_text as $i):
        ?>
            <div class="post">
                <div>
                    <p><?= $i['lang']; ?></p>
                </div>                
                <div>
                    <p><?= $i['title']; ?></p>
                </div>
                <div>
                    <p><?= $i['text']; ?></p>
                </div>                
                <div class="btn-group">                   
                    <a href="<?=base_url($locale.'/admin/edit_brand_text/'.$i['id']);?>" class="btn edit">Редактировать</a>
                    <a href="<?=base_url($locale.'/admin/delete_brand_text/'.$i['id']);?>" class="btn delete">Удалить</a>
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