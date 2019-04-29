<div class="row justify-content-center">
    <div class="col-8">
        <div class="table">
            <form action="/admin/edit?action=add&type=category" method="POST" class="tr"  enctype="multipart/form-data">
                <div class="td">
                    <input type="text" name="name" value="">
                </div>
                <div class="td">
                    <label for="file_new" class="file">
                        <div class="image">
                            <img src="<?=PATH_TPL?>img/photo.svg" alt="">
                        </div>
                        <input id="file_new" type="file" name="image" value="" onchange="onChange(event)">
                    </label>
                </div>
                <div class="td">
                    <button class="button green">Добавить</button>
                </div>
                <div class="td"></div>
            </form>
            <?php foreach ($data as $key => $value) { ?>
                <form id="update_<?=$key?>" action="/admin/edit?action=update&type=category" method="POST" class="tr" enctype="multipart/form-data">
                    <div class="td">
                        <input type="text" name="name" value="<?= $value['name'] ?>">
                    </div>
                    <div class="td">
                        <label for="file<?= $key ?>" class="file">
                            <div class="image">
                                <img id="image<?= $key ?>" src="<?= $value['image'] ?>" alt="">
                            </div>
                            <input id="file<?= $key ?>" type="file" name="image" value="<?= $value['image'] ?>" onchange="onChange(event)">
                        </label>
                    </div>
                    <div class="td">
                        <input type="hidden" name="id" value="<?= $key ?>">
                        <button>Редактировать</button>
                    </div>
                    <div class="td"><a href="javascript:void(null);" data-del="/admin/edit?action=del&type=category&id=<?= $key ?>" class="button red">Удалить</a></div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>



<script>
    function onChange(event) {
        var el = event.target,
            file = el.files[0],
            reader = new FileReader();
        reader.onload = (
            function(aImg) {
            return function(e) {
                el.parentElement.querySelector('img').src = e.target.result;
            };
            })(file);

            // The file's text will be printed here


        reader.readAsDataURL(file);
    }

</script>