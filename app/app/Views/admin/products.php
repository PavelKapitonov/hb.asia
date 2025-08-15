<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="content">
    <div class="row">
        <h1>Выбрать категорию</h1>
        <? foreach($categories as $i): 
            $categories_text = model(CategoriesTextModel::class);
            ?>
            <strong><a href="/<?= $locale; ?>/admin/product/<? echo $i['slug']; ?>"><? echo $categories_text->getTextLang($i['id'], 'ru')['title']; ?></a></strong> 
            <br>
            <br>
            <p style="padding-left: 15px">
                <? $brands = model(BrandsModel::class)->where('category_id', $i['id'])->findAll(); 
                $brands_text = model(BrandsTextModel::class);
                ?>
                <? foreach($brands as $x): 
                    
                    ?>

                    <a href="/<?= $locale; ?>/admin/product/<? echo $i['slug']; ?>/<? echo $x['slug']; ?>"><? echo $brands_text->getTextLang($x['id'], 'ru')['title']; ?></a><br>
                <? endforeach; ?>    
                <br>
            </p>

        <? endforeach; ?>
        <h1>Добавить товар</h1>
        <p>
            <strong>Язык:</strong> <?= $locale; ?>  
            <strong>Категория:</strong> <? if($category){ $cat = model(CategoriesModel::class)->where('id', $category)->first(); echo $categories_text->getTextLang($cat['id'], 'ru')['title']; } ?>
            <strong>Бренд:</strong> <? if($brand){ $c = model(BrandsModel::class)->where('id', $brand)->first(); echo $brands_text->getTextLang($c['id'], 'ru')['title']; } ?>
        </p>
        <br>
        <?= form_open_multipart($locale.'/admin/product') ?>
            <div class="form-group">
                <label for="title">Превью</label>
                <input type="file" name="userfile" size="20">
            </div>   
            <div class="form-group">
                <label for="title">Ссылка на видео с YouTube</label>
                <input type="text" name="video">
            </div>                 

            <div class="form-group">
                <label for="show_title">Показывать название в карточке</label>
                <select name="show_title" id="">
                    <option value="0">Нет</option>
                    <option value="1">Да</option>
                </select>
            </div> 
            <div class="form-group">
                <label for="text">Цена</label>
                <input type="text" name="price">
            </div> 
            <div class="form-group">
                <label for="text">Зачеркнутая цена</label>
                <input type="text" name="sale" value="" >
            </div>   
            <div class="form-group">
                <label for="">Артикул</label>
                <input type="text" name="art">
            </div>   

            <div class="form-group">
                <label for="">Нота</label>
                <input type="text" name="note">
            </div>   
            <div class="form-group">
                <label for="">Частота</label>
                <input type="text" name="frequency">
            </div>
            <div class="form-group">
                <label for="">Диаметр</label>
                <input type="text" name="diameter">
            </div>            
            <div class="form-group">
                <label for="">Наличие</label>
                <select name="availability" id="">
                    <option value="В Непале">В Непале</option>
                    <option value="Доступно">Доступно</option>
                    <option value="В США">В США</option>
                    <option value="В Куала-Лумпуре">В Куала-Лумпуре</option>
                    <option value="Под заказ">Под заказ</option>
                </select>
            </div>   


            <input type="hidden" name="slug">
            <input type="hidden" name="category-id" value="<?= $category; ?>">
            <input type="hidden" name="brand_id" value="<?= $brand; ?>">
            <div class="form-group">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </form>        
    </div>
</div>
<div>
    <div class="row">
        <h2>Товары</h2>
        <? foreach($products as $i): ?>
            <div class="post" <? if($i['type']=='1'): ?> style="background: #ffabab; opacity: 0.5" <? endif; ?>>
                <div>
                    <img src="<?=base_url('images/'.$i['img']);?>" alt="">
                </div>
                <div>
                    <?= form_open_multipart($locale.'/admin/product_img_update') ?> 
                    
                        <div class="form-group">

                            <input type="file" name="userfile" size="20">
                            <input type="hidden" name="id" value="<?= $i['id']; ?>">
                            <button type="submit" class="btn btn-success">обновить</button>
                        </div>
                    </form>
                </div>
                <div>
                    <?=$i['art'];?>
                </div>
                <div>
                    <?=$i['price'];?> USD
                </div>
                <div>
                    <a href="<?=base_url($locale.'/product/'.$i['slug']);?>" target="_blanck">Ссылка</a>
                </div>
                <div class="btn-group">
                    <a href="<?=base_url($locale.'/admin/edit_product/'.$i['id']);?>" class="btn edit">Редактировать</a>                    
                    <a href="<?=base_url($locale.'/admin/delete_product/'.$i['id']);?>" class="btn delete">Удалить</a>
                    <? if($i['type']=='0'): ?>
                        <a href="<?=base_url($locale.'/admin/hide_product/'.$i['id'].'/1');?>" class="btn delete">Скрыть</a>
                    <? else: ?>
                        <a href="<?=base_url($locale.'/admin/hide_product/'.$i['id'].'/0');?>" class="btn delete">Показать</a>
                    <? endif; ?>
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