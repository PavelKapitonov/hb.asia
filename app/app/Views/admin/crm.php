<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div>
    <div class="row">
        <h2>Заказы</h2>
        <div class="posts">
            <div class="post">
                <div>
                    <p>Данные клиента</p>
                </div>
                <div>
                    <p>Товар</p>
                </div>
                <div>
                    <p>Цена</p>
                </div>
                <div>
                    <p>Дата заказа</p>
                </div>
                <div>
                    <p>Статус оплаты</p>
                </div>                
                <div>
                    <p>Принять/отклонить платеж/</p>
                </div>
            </div>
            <? foreach($clients as $i): ?>
                <div class="post">
                    <div>
                        <p>
                            <?=$i['first_name']." ".$i['last_name'];?><br>
                            <a href="tel:<?=$i['phone'];?>"><?=$i['phone'];?></a><br>
                            <a href="mailto:<?=$i['email'];?>"><?=$i['email'];?></a>                        
                        </p>
                    </div>
                    <div>
                        <p class="tbl_text"><?=$i['product'];?></p>
                    </div>
                    <div>
                        <p><?=$i['price'];?> EUR</p>
                    </div>        
                    <div>
                        <p><? echo date("d.m.Y H:i", strtotime($i['created_at']));?></p>
                    </div> 
                    <div>
                        
                    </div>                                          
                    <div class="btn-group">
                        <div>
                            <a href="<?=base_url('admin/edit_news/'.$i['id']);?>" class="btn edit">Принять</a>                    
                            <a href="<?=base_url('admin/delete_news/'.$i['id']);?>" class="btn delete">Отклонить</a>
                        </div>
                    </div>                
                </div>
            <? endforeach; ?>            
        </div>

    </div>
</div>

<?= $this->endSection() ?>