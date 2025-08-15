<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="content">
    <div class="row">
        <h1>Добавить расписание</h1>
        <form class="" action="<?= base_url('admin/schedule') ?>" method="post">
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title">
            </div>
            <div class="form-group">
                <label for="title">Город</label>
                <select name="type" id="">
                    <option value="moscow">Москва</option>
                    <option value="novosib">Новосибирск</option>
                </select>
            </div>            
            <div class="form-group">
                <label for="text">Text</label>
                <textarea name="text" id="editor" cols="30" rows="10"></textarea>
            </div> 
            <div class="form-group">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </form>        
    </div>
</div>
<div>
    <div class="row">
        <h2>Расписание Москва</h2>
        <? foreach($schedule_msc as $i): ?>
            <div class="post">
                <div>
                    <?=$i['title'];?>
                </div>
                <!-- <div>
                    <?=$i['text'];?>
                </div> -->
                <div class="btn-group">
                    <a href="<?=base_url('admin/edit_schedule/'.$i['id']);?>" class="btn edit">Редактировать</a>                    
                    <a href="<?=base_url('admin/delete_schedule/'.$i['id']);?>" class="btn delete">Удалить</a>
                </div>                
            </div>
        <? endforeach; ?>
        <h2>Расписание Новосибирск</h2>
        <? foreach($schedule_nvc as $i): ?>
            <div class="post">
                <div>
                    <?=$i['title'];?>
                </div>
                <!-- <div>
                    <?=$i['text'];?>
                </div> -->
                <div class="btn-group">
                    <a href="<?=base_url('admin/edit_schedule/'.$i['id']);?>" class="btn edit">Редактировать</a>                    
                    <a href="<?=base_url('admin/delete_schedule/'.$i['id']);?>" class="btn delete">Удалить</a>
                </div>                
            </div>
        <? endforeach; ?>        
    </div>
</div>
<script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>
<?= $this->endSection() ?>