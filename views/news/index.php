<div class="content">
    <div class="c__title-invert b-s">
        <h1>Новости</h1>
    </div>
    <div class="layout">
        <?foreach ($_this->news as $key => $body) {?>
        <div class="card b-s">
            <div class="c__title b-s">
                <? print $body['title'] ?>
            </div>
            <div class="c__body--text">
                <? print $body['description'] ?>
            </div>
            <div class="c__btn b-s">
                <a href="../news/detail?news_id=<?print $key?>"><span>Читать дальше</span><span> <? print $body['date'] ?></span></a>
            </div>
        </div>
        <?}?>
    </div>
</div>