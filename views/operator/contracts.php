<div class="content">
    <form class="layout--table">
        <div class="b-s" action="profile.php" method="post">
                
            <? include_once 'views/operator/partials/operator_navigation.php' ?>
            
            <div class="r">
                <div class="c t">
                    <div class="c__title b-s">
                        Ожидают оплаты
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
                                <td>Действие</td>
                            </tr>
                            <?
                            if ($_this->contracts_rows > 0) {
                                $contract = $_this->contracts;
                                while ($a = $contract->fetch_object()) {
                                    $app = applicationR::GetById($a->app_id);
                                    while ($i = $app->fetch_object()) {
                                        $data = $_this->viewModelAppContract($i);
                                        ?>
                                            <tr class='tr--info'>
                                                <td><?print $data['client']->surname.' '.$data['client']->name.' '.$data['client']->patronymic?></td>
                                                <td><a href='tel:<?print $data['client']->phone?>'><?print $data['client']->phone?></a></td>
                                                <td><?print $data['tariff']->title?></td>
                                                <td><?print $a->date?></td>
                                                <td><?print $data['tariff']->price?></td>
                                                <td><?print $a->state?></td>
                                                
                                                <td class='td--event'>
                                                    <div>
                                                        <?if ($a->state == STATE_PAY) {?>
                                                        <a href='../operator/contracts?mode=ok&id=<?print $a->id;?>'>Активировать</a>
                                                        <?} else {?>
                                                            <p style='color:white'>Не оплачено</p>
                                                        <?}?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?
                                    }
                                }
                            }
                            else print '<tr><td colspan="6">Договоров ожидающих оплаты нету!</td></tr>'; 
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="r">
                <div class="c t">
                    <div class="c__title b-s">
                        Активные договора
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
                                <td>Действие</td>
                            </tr>
                            <?
                            if ($_this->contracts_active_rows > 0) {
                                $contract = $_this->contracts_active;
                                while ($a = $contract->fetch_object()) {
                                    $app = applicationR::GetById($a->app_id);
                                    while ($i = $app->fetch_object()) {
                                        $data = $_this->viewModelAppContract($i);
                                        ?>
                                            <tr class='tr--info'>
                                                <td><?print $data['client']->surname.' '.$data['client']->name.' '.$data['client']->patronymic?></td>
                                                <td><a href='tel:<?print $data['client']->phone?>'><?print $data['client']->phone?></a></td>
                                                <td><?print $data['tariff']->title?></td>
                                                <td><?print $a->date?></td>
                                                <td><?print $data['tariff']->price?></td>
                                                <td><?print $a->state?></td>

                                                <td class='td--event'>
                                                    <div>
                                                        <a href='../operator/contracts?mode=cancel&id=<?print $a->id;?>'>Деактивировать</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?
                                    }
                                }
                            }
                            else print '<tr><td colspan="6">Активных договоров нету!</td></tr>'; 
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