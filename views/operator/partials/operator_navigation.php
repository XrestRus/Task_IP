<?
    $active = $strAction;
?>

<div class="b-s user--nav">
    <div><a <? $active == 'applications' ? print 'class=active' : '' ?> href="../operator/applications">Заявки</a></div>
    <div><a <? $active == 'contracts' ? print 'class=active' : '' ?> href="../operator/contracts">Договора</a></div>
</div>