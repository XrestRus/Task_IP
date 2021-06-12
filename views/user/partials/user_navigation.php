<?
    $active = $strAction;
?>

<div class="b-s user--nav">
    <div><a <? $active == 'index' ? print 'class=active' : '' ?> href="../user/">Личные данные</a></div>
    <div><a <? $active == 'tariff' ? print 'class=active' : '' ?> href="../user/tariff">Ваш тариф</a></div>
    <div><a <? $active == 'account' ? print 'class=active' : '' ?> href="../user/account">Ваши счета</a></div>
</div>

