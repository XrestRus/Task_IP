<div class="home main content c">
    <div class="banner r">
        <div class="b__left c">
            <div class="b__box">
                <div class="b__title">
                    TIP - Твой интернет провайдер!
                </div>
                <a href='./about/'>
                    Наши контакты
                </a>
            </div>
        </div>
        <div class="b__right c">

        </div>
    </div>

    <div class="tareff section c">
        <div class="s__title c__title-invert">
            Новости
        </div>
        <div class="s__content">
            <div class="slider" id="s1">
                <div class="slider__wrapper">
                    <div class="slider__items">
                        <?foreach ($_this->news as $key => $body) {?>
                            <div class="slider__item">
                                <div class="card b-s">
                                    <div class="c__title b-s">
                                        <? print $body['title'] ?>
                                    </div>
                                    <div class="c__body--text">
                                        <? print $body['description'] ?>
                                    </div>
                                    <div class="c__btn b-s">
                                        <a href="./news/detail?news_id=<?print $key?>"><span>Читать дальше</span><span> <? print $body['date'] ?></span></a>
                                    </div>
                                </div>
                            </div>
                        <?}?>
                    </div>
                </div>
                <a href="#" class="slider__control" data-slide="prev"></a>
                <a href="#" class="slider__control" data-slide="next"></a>
                <ol class="slider__indicators">
                    <?for ($i=0; $i < count($_this->news); $i++) { 
                        print '<li data-slide-to="'.$i.'"></li>';
                    }?>
                </ol>
            </div>
        </div>
        <a href='./news' class="s__btn c__title-invert">
            Читать все...
        </a>
    </div>

    <div class="rates section c">
        <div class="s__title c__title-invert">
            Тарифы
        </div>
        <div class="s__content">
            <?$rate = tariffR::GetTariffs();
            $rate_count=0;
            ?>

            <div class="slider" id="s2">
                <div class="slider__wrapper">
                    <div class="slider__items">
                        <? while ($r = $rate->fetch_object()) { 
                            $rate_count += 1;   
                        ?>
                            <div class="slider__item">
                                <div class="card b-s">
                                    <div class="c__title b-s">
                                        <? print $r->title ?>
                                    </div>
                                    <div class="c__body">
                                <?
                                    $services = tariffR::getService($r);
                                    foreach ($services as $key => $s) {
                                        ?>
                                            <div class="c__item">
                                                <div class="desc r">
                                                    <div class="l-img"></div>
                                                    <span class="description"><?print $s?></span>
                                                </div>
                                            </div>
                                        <?
                                    }
                                ?>
                                </div>
                                    <div class="c__btn b-s">
                                        <a href="<?print $staticPath?>/tariffs/application?tariff_id=<?print $r->id?>"> 
                                            <div>Подключить</div>
                                            <div><?print $r->price?> руб/месяц</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?}?>
                    </div>
                </div>
                <a href="#" class="slider__control" data-slide="prev"></a>
                <a href="#" class="slider__control" data-slide="next"></a>
                <ol class="slider__indicators">
                    <?for ($i=0; $i < $rate_count; $i++) { 
                        print '<li data-slide-to="'.$i.'"></li>';
                    }?>
                </ol>
            </div>
        </div>       
        <a href='<?print $staticPath?>/tariffs/' class="s__btn c__title-invert">
            Смотреть все...
        </a> 
    </div>

    <div class="support section c">
        <div class="s__title c__title-invert">
            Мы на карте!
        </div>
        <div class="s__content map">
            <div class="card b-s">
                <div class="c__body">
                    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A79de838935d779a249a56c69e31cdd5984a09100dc699a350378f49017c19219&amp;source=constructor" width="500" height="400" frameborder="0"></iframe>  
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slider = new ChiefSlider('#s1', {
            loop: true,
            autoplay: true,
            interval: 7000,
        });
        const slider2 = new ChiefSlider('#s2', {
            loop: true,
            autoplay: true,
            interval: 7000,
        });
    });
</script>