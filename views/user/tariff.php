<div class="content">
    <div class="layout--form">
        <form class="rate b-s form--m">
            <? include_once 'views/user/partials/user_navigation.php' ?>
            
            <?if($_this->user_contract_row > 0) {?>
            <div class="user-rate card">
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
            <?} else {?>
                <div class="user-rate card">
                <div class="c__title b-s f__access">
                    <? print $_this->message ?>
                </div>
                <a href="<?print $staticPath?>/tariffs/" class="c__title b-s">
                    Выбрать тариф
                </a>
            </div>
            <?}?>
        </form>
    </div>
</div>
  