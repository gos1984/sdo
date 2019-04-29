<div class="row justify-content-center">
    <div class="col-6">
        <div class="table">
            <form action="/admin/edit?action=add&type=direction" method="POST" class="tr">
                <div class="td">
                    <input type="text" name="name" value="">
                </div>
                <div class="td">
                    <button class="button green">Добавить</button>
                </div>
                <div class="td"></div>
            </form>
            <?php foreach ($data as $key => $value) { ?>
                <form id="update_<?=$key?>" action="javascript:void(null);" onsubmit="call('#update_<?=$key?>','/admin/edit?action=update&type=direction', false)"class="tr">
                    <div class="td">
                        <input type="text" name="name" value="<?= $value ?>">
                    </div>
                    <div class="td">
                        <input type="hidden" name="id" value="<?= $key ?>">
                        <button>Редактировать</button>
                    </div>
                    <div class="td"><a href="javascript:void(null);" data-del="/admin/edit?action=del&type=direction&id=<?= $key ?>" class="button red">Удалить</a></div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>

<script async>
    console.log($('#image1')[0].files());
</script>