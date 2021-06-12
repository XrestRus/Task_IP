<div class="content">
    <div class="layout--table">
        <div class="b-s" action="profile.php" method="post">
                
            <? include_once 'views/user/partials/user_navigation.php' ?>
            
            <div class="c__title b-s">
                <?if ($_this->user_pay_row > 0) { ?> Номер договора: <?print $_this->user_pay_object->contract_id; }?>
            </div>
            <div class="r">
                <div class="c t">
                    <div class="c__title b-s">
                        Текущий платёж
                    </div>
                    <div class="wrap-table">
                        <table>                            
                            <tr class='tr--head'>
                                <td>Тариф</td>
                                <td>Дата</td>
                                <td>Сумма</td>
                                <td>Состояние</td>
                                <td>Действие</td>
                            </tr>
                            <?
                            if ($_this->user_pay_row > 0) {
                                    $contract = contractR::GetByUserId($_this->user_pay_object->contract_id)->fetch_object();
                                    $app = applicationR::GetById($contract->app_id)->fetch_object();
                                    $data = $_this->viewModelAppContract($app);
                                    ?>
                                        <tr class='tr--info'>
                                            <td><?print $data['tariff']->title?></td>
                                            <td><?print $_this->user_pay_object->date?></td>
                                            <td><?print $_this->user_pay_object->price?></td>
                                            <td><?print $_this->user_pay_object->state?></td>
                                            
                                            <td class='td--event'>
                                                <div>
                                                    <?if ($_this->user_pay_object->state != STATE_PAY) {?>
                                                    <a href='../user/pay?id=<?print $_this->user_pay_object->id;?>'>Оплатить</a>
                                                    <?} else {?>
                                                        <p style='color:white'>Оплата не требуется</p>
                                                    <?}?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?
                            }
                            else print '<tr><td colspan="5">Платежей нету!</td></tr>'; 
                            ?>
                        </table>
                    </div>
                    <div class="c__title b-s">
                        Архив
                    </div>
                    <div class="wrap-table">
                        <table>                            
                            <tr class='tr--head'>
                                <td>Тариф</td>
                                <td>Дата</td>
                                <td>Сумма</td>
                                <td>Состояние</td>
                            </tr>
                            <?
                            if ($_this->user_pay_row > 1) {
                                $app = $_this->user_pay;
                                while ($i = $app->fetch_object()) {
                                    $contract = contractR::GetByUserId($i->contract_id)->fetch_object();
                                    $applocal = applicationR::GetById($contract->app_id)->fetch_object();
                                    $data = $_this->viewModelAppContract($applocal);
                                    ?>
                                        <tr class='tr--info'>
                                            <td><?print $data['tariff']->title?></td>
                                            <td><?print $i->date?></td>
                                            <td><?print $i->price?></td>
                                            <td><?print $i->state?></td>
                                           
                                        </tr>
                                    <?
                            }   }
                            else print '<tr><td colspan="5">Архив пуст!</td></tr>'; 
                            ?>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
  