<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="content">
    <div class="row">
        <h1>Добавить даты: <?=$course['title'];?></h1>
        <form class="" action="<?= base_url('admin/edit_kurs') ?>" method="post">
            <div class="form-group">
                <label for="date">Дата</label>
                <input type="text" name="date" value="">
            </div> 
            <input type="hidden" name="alias" value="<?=$course['alias'];?>">   
            <input type="hidden" name="id" value="<?=$course['id'];?>">   
            <div class="form-group">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>     
        </form>        
    </div>
</div>

<div>
    <div class="row">
        <h2>Даты:</h2>
        <? foreach($kursdate as $i): ?>
            <div class="post">
                <div>
                    <?=$i['date'];?>
                </div>
                <div class="btn-group">                    
                    <a href="<?=base_url('admin/delete_kurs/'.$i['id']).'/'.$course['id'];?>" class="btn delete">Удалить</a>
                </div>                
            </div>
        <? endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>