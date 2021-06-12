<?
    $texts = explode(PHP_EOL, $_this->news['description']);
?>

<div class="content c">
    <div class="detail layout--form">
        <div class="layout">
            <div class="card b-s">
                <div class="c__title b-s">
                    <? print $_this->news['title']?>
                    <hr>
                    Дата публикации - <? print $_this->news['date']?>
                </div>
                <div class="c__body--text">
                    <? foreach ($texts as $t) 
                        if (trim($t) !== "")
                            print '<span class="s_t">'.$t.'</span><br>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>