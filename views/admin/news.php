<div class="content">
    <div class="layout--table">
        <div class="b-s" action="profile.php" method="post">
                
            <div class="c__title b-s">
                Список новостей
            </div>
            <div class="r">
                <div class="c t">
                    <div class="wrap-table">
                        <table>
                            <tr class='tr--head'>
                                <td>Название</td>
                                <td>Дата размещение</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?foreach ($_this->news as $key => $body) {?>
                            <tr>
                                <td><? print $body['title'] ?></td>
                                <td><? print $body['date'] ?></td>

                                <td class='td--event'>
                                    <div>
                                        <a href="<?print $staticPath?>/news/edit?news_id=<?print $key?>">Изменить</a>
                                    </div>
                                </td>
                                <td class='td--event'>
                                    <div>
                                        <a href="<?print $staticPath?>/news/delete?news_id=<?print $key?>">Удалить</a>
                                    </div>
                                </td>
                            </tr>
                            <?}?>   
                        </table>
                    </div>
                    <div class="c__title b-s td--event">
                        <div>
                            <a href="<?print $staticPath?>/news/add">Добавить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  