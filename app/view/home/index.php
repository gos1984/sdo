<header id="header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-4 col-lg-6">
                <div class="logo"><a href="#"><img src="<?=PATH_TPL?>/img/logo.png" alt=""/></a></div>
            </div>
            <div class="col-md-8 col-lg-6">
                <div class="nav-mobile"><i></i><i></i><i></i></div>
                <nav class="main-menu">
                    <ul>
                        <li><a href="#section1" class="scroll-href">О программах</a></li>
                        <li><a href="#section2" class="scroll-href">Отзывы</a></li>
                        <li><a href="#section3" class="scroll-href">Контакты</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<section id="section1">
    <div class="container">
        <div class="row">
            <div class="col-12 center">
                <h1>Категории образовательных программ Радиологии Москвы</h1>
                <p class="h3">программы повышения квалификации из цикла НМО</p>
            </div>
        </div>
        <div class="row justify-content-center direction">
            <?php foreach ($data['direction'] as $key => $val) { ?>
                <div class="col-4 center">
                    <label for="<?= "direct_$key" ?>" class="check button"><input id="<?= "direct_$key" ?>" type="checkbox"
                                                                           value="<?= $key ?>"><span><?= $val ?></span></label>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="items d-flex justify-content-between">
                    <?php foreach ($data['category'] as $key => $val) { ?>
                        <div class="item">
                            <div class="image"><img src="<?= $val['image'] ?>" alt=""/></div>
                            <div class="descr">
                                <h3><?= $val['name'] ?></h3><a href="#products" class="button fancybox product" data-id="<?=$key?>">Подробнее</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="section2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Отзывы слушателей</h2>
                <div class="reviews d-flex justify-content-between">
                    <?php foreach ($data['review'] as $key => $val) { ?>
                        <div class="review">
                            <p><?= $val['description'] ?></p>
                            <div class="data">
                                <div class="image"><img src="<?= $val['photo'] ?>" alt=""/></div>
                                <span class="name"><?= $val['name'] ?></span><span
                                        class="position"><?= $val['position'] ?></span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="section3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Контакты</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <ul class="contacts">
                    <li><a href="tel:+74952760436">+7 (495) 276 04 36</a></li>
                    <li><a href="mailto:sdo@npcmr.ru" class="bold">sdo@npcmr.ru</a></li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-6">
                <form id="callback" action="javascript:void(null);" onsubmit="call('#callback','/send')">
                    <label for="fio">ФИО</label>
                    <input id="fio" type="text" name="fio" required="required"/>
                    <label for="email">E-mail</label>
                    <input id="email" type="email" name="email" required="required"/>
                    <label for="comment">Ваши идеи, предложения и другие важные мысли</label>
                    <textarea id="comment" name="comment"></textarea>
                    <button class="green">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="popup">
<div id="products">
    <div class="row">
        <div class="col-12">
            <div class="products"><span class="h3 center">Список курсов</span>
                <div class="products_wrap"></div>
            </div>
        </div>
    </div>
</div>


<div id="sales">
    <span class="h3 center">Корзина заказов</span>
    <form id="sale" action="javascript:void(null);" onsubmit="call('#sale','/pay')">
        <div class="table"></div>
        <p class="small_bold summ right">Сумма <span></span></p>
        <div class="data">
            <div class="format">
                <span class="title">Формат обучения</span>
                <label for="ask1" class="radio"><i></i>
                    <input id="ask1" type="radio" name="ask"/><span>Мне нужны баллы НМО и удостоверение о повышении квалификации (необходимо наличие высшего профессионального и/или среднего специального медицинского образования РФ)</span>
                </label>
                <label for="ask2" class="radio"><i></i>
                    <input id="ask2" type="radio" name="ask"/><span>Мне нужно только удостоверение о повышении квалификации (необходимо наличие высшего профессионального и/или среднего специального медицинского образования РФ)</span>
                </label>
                <label for="ask3" class="radio"><i></i>
                    <input id="ask3" type="radio" name="ask"/><span>Мне достаточно электронного сертификата (резидент РФ/нерезидент РФ)</span>
                </label>
            </div>
            <div class="pay_form">
                <label for="pay" class="offline">ФИО плательщика</label>
                <input id="pay" type="text" name="pay" class="offline"/>
            </div>
            <label for="name">ФИО учащегося</label>
            <input id="name" type="text" name="name" required="required"/>
            <label for="phone">Телефон</label>
            <input id="phone" type="tel" name="tel" required="required"/>
            <label for="email">Электронная почта</label>
            <input id="email" type="email" name="email" required="required"/>
            <label for="vuz">Медицинское учреждение (наименование работодателя/ учебного заведения)</label>
            <input id="vuz" type="text" name="vuz" required="required"/><span class="title">Укажите страну</span>
            <select id="country" name="country">
                <?php foreach ($data['country'] as $key => $val) { ?>
                    <option value="<?= $key ?>"><?= $val ?></option>
                <?php } ?>
            </select>
            <span class="title">Укажите свой регион</span>
            <select id="region" name="region">
                <option value=""></option>
            </select>
            <label for="city">Укажите свой город (если вы проживаете в регионе г. Москва, г. Санкт-Петербург, г.
                Севастополь - просто продублируйте название)</label>
            <input id="city" type="text" name="city"/>
            <label for="comments">Оставьте здесь любой комментарий, вопрос или пожелание</label>
            <textarea id="comments" name="comments"></textarea>
            <div class="summ right">
                <p class="h3 summ">Сумма <span></span></p>
                <input type="hidden" class="summ" name="summ"/>
            </div>
        </div>
        <button>Отправить</button>
        <p>Оплачивая обучение вы автоматически соглашаетесь с условиями оказания образовательных услуг в СДО «НПЦ
            медрадиологии» <a href="https://drive.google.com/file/d/10x9VXKhOmYOOdGzvLl4Qt63aYAJEMTVB/view"
                              target="_blank">с возможностью получения баллов НМО/удостоверения ПК</a> или с
            возможностью получения электронного сертификата <a
                    href="https://drive.google.com/file/d/1nUEzLiSFQlZpZfSPCLNGAYT-DIhFWYGj/view" target="_blank">по
                курсу МРТ</a>/ <a href="https://drive.google.com/file/d/1nUEzLiSFQlZpZfSPCLNGAYT-DIhFWYGj/view"
                                  target="_blank">по курсу УЗИ</a> (в зависимости от сделанного вами выбора).</p>
    </form>
</div>
</div>