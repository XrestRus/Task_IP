<div class="content">
    <form class="layout--table">
        <div class="b-s" action="profile.php" method="post">
                
            <? include_once 'views/operator/partials/operator_navigation.php' ?>
            
            <div class="r">
                <div class="c t">
                    <div class="c__title b-s">
                        Активные заявки
                    </div>
                    <div class="wrap-table">
                        <table>                            
                            <tr class='tr--head'>
                                <td>Клиент</td>
                                <td>Адрес</td>
                                <td>Телефон</td>
                                <td>Тариф</td>
                                <td>Дата</td>
                                <td>Сумма</td>
                                <td>Состояние</td>
                                <td>Действие</td>
                            </tr>
                            <?
                            if ($_this->applications_rows > 0) {
                                $app = $_this->applications;
                                while ($i = $app->fetch_object()) {
                                    $data = $_this->viewModelAppContract($i);
                                    ?>
                                        <tr class='tr--info'>
                                            <td><?print $data['client']->surname.' '.$data['client']->name.' '.$data['client']->patronymic?></td>
                                            <td><?print $data['address']->city.' '.$data['address']->street.' '.$data['address']->house ?></td>
                                            <td><a href='tel:<?print $data['client']->phone?>'><?print $data['client']->phone?></a></td>
                                            <td><?print $data['tariff']->title?></td>
                                            <td><?print $i->date?></td>
                                            <td><?print $data['tariff']->price?></td>
                                            <td><?print $i->state?></td>
                                            
                                            <td class='td--event'>
                                                <div>
                                                    <a href='../operator/applications?mode=ok&id=<?print $i->id;?>'>Одобрить</a>
                                                </div>
                                                <div>
                                                    <a href='../operator/applications?mode=cancel&id=<?print $i->id;?>'>Отклонить</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?
                            }   }
                            else print '<tr><td colspan="8">Заявак нету!</td></tr>'; 
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="r">
                <div class="c t">
                    <div class="c__title b-s">
                        Обработанные заявки - Архив
                    </div>
                    <div class="wrap-table">
                        <table>                            
                            <tr class='tr--head'>
                                <td>Клиент</td>
                                <td>Телефон</td>
                                <td>Тариф</td>
                                <td>Дата</td>
                                <td>Сумма</td>
                                <td>Состояние</td>
                            </tr>
                            <?
                            if ($_this->applications_processing_rows > 0) {
                                $app = $_this->applications_processing;
                                while ($i = $app->fetch_object()) {
                                    $data = $_this->viewModelAppContract($i);
                                    ?>
                                        <tr class='tr--info'>
                                            <td><?print $data['client']->surname.' '.$data['client']->name.' '.$data['client']->patronymic?></td>
                                            <td><a href='tel:<?print $data['client']->phone?>'><?print $data['client']->phone?></a></td>
                                            <td><?print $data['tariff']->title?></td>
                                            <td><?print $i->date?></td>
                                            <td><?print $data['tariff']->price?></td>
                                            <td><?print $i->state?></td>
                                        </tr>
                                    <?
                            }   }
                            else print '<tr><td colspan="6">Заявак нету!</td></tr>'; 
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
  
<script>
if(document.querySelectorAll('table tr.tr--info').length == 0) document.querySelector('table').innerHTML = "<tr><td colspan=5>Заявак нету!</td></tr>";
</script>