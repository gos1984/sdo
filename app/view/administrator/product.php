<div class="row">
<div class="col-12">
    <div class="table">
        <div class="tr">
            <div class="td">Наименование</div>
            <div class="td">Категория</div>
            <div class="td">Специализация</div>
            <div class="td">Дата</div>
            <div class="td">Цена</div>
            <div class="td">Формат</div>
            <div class="td">Кол-во мест</div>
            <div class="td">Ссылка</div>
            <div class="td"></div>
        </div>
        <form action="/admin/edit?action=add&type=product" method="POST" class="tr">
            <div class="td">
                <textarea name="name"></textarea>
            </div>
            <div class="td">
                <select name="category" value="">
                    <?php foreach ($data['category'] as $key => $val) { ?>
                        <option value="<?=$key?>"><?=$val['name']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="td">
                <select name="direction" value="">
                    <?php foreach ($data['direction'] as $key => $val) { ?>
                        <option value="<?=$key?>"><?=$val?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="td">
                <input type="text" name="date" value="">
            </div>
            <div class="td">
                <input type="text" name="price" value="">
            </div>
            <div class="td">
                <input type="checkbox" name="format">
            </div>
            <div class="td">
                <input type="number" name="quantity" value="" min="0">
            </div>
            <div class="td">
                <input type="text" name="link" value="">
            </div>
            <div class="td">
                <button class="button green">Добавить</button>
            </div>
        </form>
        <?php foreach ($data['product'] as $p => $product) { ?>
        <form id="update_<?=$p?>" action="javascript:void(null);" onsubmit="call('#update_<?=$p?>','/admin/edit?action=update&type=product', false)"class="tr">
            <div class="td">
                <textarea name="name"><?=$product['name']?></textarea>
            </div>
            <div class="td">
                <select name="category" value="">
                    <?php foreach ($data['category'] as $key => $val) { ?>
                        <option value="<?=$key?>" <?php echo $key == $product['category_id'] ? 'selected': '' ?>><?=$val['name']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="td">
                <select name="direction" value="">
                    <?php
                    foreach ($data['direction'] as $key => $val) { ?>
                        <option value="<?=$key?>" <?php echo $key == $product['direction_id'] ? 'selected': '' ?>><?=$val?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="td">
                <input type="text" name="date" value="<?=$product['date']?>">
            </div>
            <div class="td">
                <input type="text" name="price" value="<?=$product['price']?>">
            </div>
            <div class="td">
                <input type="checkbox" name="format" <?php echo $product['format'] == 1 ? 'checked': '' ?>>
            </div>
            <div class="td">
                <input type="number" name="quantity" value="<?=$product['quantity']?>" min="0">
            </div>
            <div class="td">
                <input type="text" name="link" value="<?=$product['link']?>">
            </div>
            <div class="td">
                <input type="hidden" name="id" value="<?= $p ?>">
                <button>Редактировать</button>
            </div>
            <div class="td"><a href="javascript:void(null);" data-del="/admin/edit?action=del&type=product&id=<?= $p ?>" class="button red">Удалить</a></div>
        </form>
        <?php } ?>
    </div>
</div>
</div>