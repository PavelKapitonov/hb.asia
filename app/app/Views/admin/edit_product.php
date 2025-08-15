<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="content">
    <div class="row">
        <h1>Редактировать товар</h1>
        <p>
            <strong>Язык:</strong> <?= $locale; ?>  
            <?
                $categories_text = model(CategoriesTextModel::class);
                $brands_text = model(BrandsTextModel::class);
            ?>
            <strong>Категория:</strong> <? $cat = model(CategoriesModel::class)->where('id', $product['category-id'])->first(); echo $categories_text->getTextLang($cat['id'], 'ru')['title'];  ?>
            <? if($product['brand_id']!=='0'): ?>
                <strong>Бренд:</strong> <?  $c = model(BrandsModel::class)->where('id', $product['brand_id'])->first(); if($c){ echo $brands_text->getTextLang($c['id'], 'ru')['title']; }  ?>
            <? endif; ?>
        </p>
        <br>
        <?= form_open($locale.'/admin/edit_product/'.$product['id']) ?>      
            <div class="form-group">
                <label for="show_title">Показывать название в карточке</label>
                <select name="show_title" id="">
                    <option value="<?= $product['show_title']; ?>"><? if($product['show_title']!=='0'){ echo "Да"; }else{ echo "Нет"; } ; ?></option>
                    <option value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </div>            
            <div class="form-group">
                <label for="title">Ссылка на видео с YouTube</label>
                <input type="text" name="video" value="<?= $product['video']; ?>">
            </div>  
            <div class="form-group">
                <label for="text">Цена</label>
                <input type="text" name="price" value="<?= $product['price']; ?>" >
            </div> 
            <div class="form-group">
                <label for="text">Зачеркнутая цена</label>
                <input type="text" name="sale" value="<?= $product['sale']; ?>" >
            </div>             
            <div class="form-group">
                <label for="">Артикул</label>
                <input type="text" name="art" value="<?= $product['art']; ?>">
            </div>   

            <div class="form-group">
                <label for="">Нота</label>
                <input type="text" name="note" value="<?= $product['note']; ?>">
            </div>   
            <div class="form-group">
                <label for="">Частота</label>
                <input type="text" name="frequency" value="<?= $product['frequency']; ?>">
            </div>
            <div class="form-group">
                <label for="">Диаметр</label>
                <input type="text" name="diameter" value="<?= $product['diameter']; ?>">
            </div>            
            <div class="form-group">
                <label for="">Наличие</label>
                <select name="availability" id="">
                    <option value="<?= $product['availability']; ?>"><?= $product['availability']; ?></option>
                    <option value="В Непале">В Непале</option>
                    <option value="Доступно">Доступно</option>
                    <option value="В США">В США</option>
                    <option value="В Куала-Лумпуре">В Куала-Лумпуре</option>
                    <option value="Под заказ">Под заказ</option>
                </select>
            </div>   


            <input type="hidden" name="slug" value="<?= $product['slug']; ?>" >
            <div class="form-group">
                <label for="">Категория</label>
                <select name="category-id" id="">
                    <option value="<?= $product['category-id']; ?>"><?= $categories_text->getTextLang($cat['id'], 'ru')['title']; ?></option>
                    <? foreach($categories as $i): ?>
                        <option value="<?= $i['id']; ?>"><?= $categories_text->getTextLang($i['id'], 'ru')['title']; ?></option>
                    <? endforeach; ?>
                </select>
            </div>             
            <div class="form-group">
                <label for="">Бренд</label>
                <select name="brand_id" id="">
                    <? if($product['brand_id']!=='0'): ?>
                        <option value="<?= $product['brand_id']; ?>"><? if($c){ echo $brands_text->getTextLang($c['id'], 'ru')['title']; } ?></option>
                    <? endif; ?>    
                        <option value="">Не выбран</option>
                    
                    <? foreach($brands as $i): ?>
                        <option value="<?= $i['id']; ?>"><?= $brands_text->getTextLang($i['id'], 'ru')['title']; ?></option>
                    <? endforeach; ?>                    
                </select>
            </div>              
            

            <div class="form-group">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>        
    </div>
</div>

<div class="content">
    <div class="row">
        <h2>Добавить описание</h2>
        <?= form_open($locale.'/admin/product_text') ?>
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
            <input type="hidden" name="product-id" value="<?= $product['id']; ?>">
            <div class="form-group">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </form>
        <? 
        $text = model(ProductText::class)->getText($product['id']);
        foreach($text as $i):
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
                    <a href="<?=base_url($locale.'/admin/edit_product_text/'.$i['id']);?>" class="btn edit">Редактировать</a>      
                    <a href="<?=base_url($locale.'/admin/delete_product_text/'.$i['id']);?>" class="btn delete">Удалить</a>
                </div>                
            </div>
        <? endforeach; ?>
    </div>
</div>
<br>
<br>            

<div>
    <div class="row">
        <h2>Добавить фото</h2>
        <?= form_open_multipart($locale.'/admin/product_img') ?> 
            <div class="form-group">
                <label for="title">Фото товара</label>
                <input type="file" name="userfile" size="20">
            </div>
            <input type="hidden" name="product-id" value="<?= $product['id']; ?>">
            <div class="form-group">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </form>
        <? 
        $img = model(ProductImgModel::class)->getImg($product['id']);
        foreach($img as $i):
        ?>
            <div class="post">
                <div>
                    <img src="<?=base_url('images/'.$i['img']);?>" alt="">
                </div>       
                <div class="btn-group">                   
                    <a href="<?=base_url($locale.'/admin/delete_product_img/'.$i['id']);?>" class="btn delete">Удалить</a>
                </div>                
            </div>
        <? endforeach; ?>
    </div>
</div>
<br>
<br>
<div>
    <div class="row">
        <h2>Добавить чаши в набор</h2>
        <?= form_open($locale.'/admin/product_set') ?> 
            <div class="form-group">
                <label for="">Название</label>
                <input type="text" name="title" >
            </div>   
            <div class="form-group">
                <label for="">Диаметр</label>
                <input type="text" name="diameter">
            </div>
            <div class="form-group">
                <label for="">Нота</label>
                <input type="text" name="note" >
            </div>   
            <div class="form-group">
                <label for="">Частота</label>
                <input type="text" name="frequency" >
            </div>
            <input type="hidden" name="product-id" value="<?= $product['id']; ?>">
            <div class="form-group">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </form>
        <? 
        $set = model(ProductSetModel::class)->getSet($product['id']);
        foreach($set as $i):
        ?>
            <div class="post">
                <div>
                    <p><?= $i['title']; ?></p>
                </div>       
                <div>
                    <p><?= $i['diameter']; ?> см</p>
                </div>  
                <div>
                    <p><?= $i['note']; ?></p>
                </div>  
                <div>
                    <p><?= $i['frequency']; ?> Гц</p>
                </div>  
                
                <div class="btn-group">                   
                    <a href="<?=base_url($locale.'/admin/delete_product_set/'.$i['id']);?>" class="btn delete">Удалить</a>
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