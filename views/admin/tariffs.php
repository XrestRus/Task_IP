<div class="content">
    <form class="layout--table">
        <div class="b-s" action="profile.php" method="post">
                
            <div class="c__title b-s">
                Список тарифов
            </div>
            <div class="<? isset($_GET['status']) ? $_GET['status'] == 'false' ? print 'f__error' : print 'f__access' : "" ?>">
                <? print $_this->message; ?>
            </div>
            <div class="r">
                <div class="c t">
                    <div class="wrap-table">
                        <table>
                            <tr class='tr--head'>
                                <td>Название</td>
                                <td>Цена</td>
                                <td>Актуальность</td>

                                <td></td>
                                <td></td>
                                
                            </tr>
                            <tr>
                                <? while ($u = $_this->tariffs->fetch_object()) { ?>
                                <tr>
                                    <td><?print $u->title?></td>
                                    <td><?print $u->price?> руб/месяц</td>
                                    <td><?print $u->relevance == 1 ? 'Актуально' : 'Устаревшие'?></td>
                                    <td class='td--event'>
                                        <div>
                                            <a href="<?print $staticPath?>/tariffs/edit?tariff_id=<?print $u->id?>">Изменить</a>
                                        </div>
                                    </td>
                                    <td class='td--event'>
                                        <div>
                                            <a href="<?print $staticPath?>/tariffs/delete?tariff_id=<?print $u->id?>">Удалить</a>
                                        </div>
                                    </td>
                                </tr>
                                <? } ?>
                            </tr>
                        </table>
                    </div>
                    <div class="c__title b-s td--event">
                        <div>
                            <a href="<?print $staticPath?>/tariffs/add">Добавить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
  