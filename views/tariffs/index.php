<div class="rate content c">
    <div class="r">
        <div class="rate-shared c">
            <div class="c__title-invert b-s rate">
                <h1>Тарифы</h1>
            </div>
            <div class="layout--grid-content">
                <?
                    while ($r = $_this->rate->fetch_object()) {
                        ?>
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
                        <?
                    }
                ?>
            </div>
        </div>


        <div class="fix-hr">
            <div class="hr"></div>
        </div>


        <div class="c">
            <?if(isset($_SESSION['user_id']) && $_this->user_contract_row > 0) {?>
            <div class="c__title-invert b-s my-rate">
                <h1>Мой тариф</h1>
            </div>
            <div class="user-rate card b-s">
                <div class="c__title b-s">
                    <? print $_this->tariff->title ?>
                </div>
                <div class="c__body">
                <?
                    $services = tariffR::getService($_this->tariff);
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
                    <? if ($_this->user_contract_object->state == STATE_AWAITING_PAY) { ?>
                    <a href='../user/account'> <? print $_this->user_contract_object->state ?></a>
                    <?} else { ?>
                    <a> <? print $_this->user_contract_object->state ?></a>
                    <?}?>
                </div>
            </div>
            <?}?>
        </div>
    </div>
</div>