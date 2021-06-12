<?
    include_once "./repositories/usersR.php";
    include_once "./repositories/supportR.php";

    if (isset($_SESSION['user_id'], $_SESSION['role_id'])) {
        
        $countO = supportR::CountMessToStatusUnread($_SESSION['user_id'], 3);
        $countA = supportR::CountMessToStatusUnread($_SESSION['user_id'], 4);

        $count = $countA + $countO;
        $role = usersR::GetRoleById($_SESSION['role_id'])->title;
    } else {
        $role = "гость";
    }
    
    $activeController = $strController;
    $activeAction = $strAction;
?>

<nav class="nav">   
    <ul class="boxs--nav">
        <li class="menu"><span>Меню</span></li>
        <li><a <? $activeController == 'news' ? print 'class=active' : '' ?> href="<?print $staticPath?>/news/">Новости</a></li>
        <li><a <? $activeController == 'tariffs' ? print 'class=active' : '' ?> href="<?print $staticPath?>/tariffs/">Тариф</a></li>
        <li><a <? $activeController == 'about' ? print 'class=active' : '' ?> href="<?print $staticPath?>/about/">Контакты</a></li>
<? switch ($role) {
    case 'клиент': ?>
        <li><a id='support' data-id='<? print $_SESSION['user_id'] ?>' data-count='<? print $count ?>' <? $activeController == 'support' ? print 'class=active' : '' ?> href="<?print $staticPath?>/support/">Поддержка <? if ($count > 0) { ?> (+<? print $count ?>) <? } ?></a></li>
        <li><a <? $activeController == 'user' ? print 'class=active' : '' ?> href="<?print $staticPath?>/user/">Личные кабинет</a></li>
    <? break;
    case 'администратор': ?>
        <li><a <? $activeController == 'support' ? print 'class=active' : '' ?> href="<?print $staticPath?>/support/">Поддержка</a></li>
        <li><a <? $activeController == 'user' ? print 'class=active' : '' ?> href="<?print $staticPath?>/user/">Личные кабинет</a></li>
        <li><a <? $activeAction == 'users' ? print 'class=active' : '' ?> href="<?print $staticPath?>/admin/users">Список пользователей</a></li>
        <li><a <? $activeAction == 'tariffs' ? print 'class=active' : '' ?> href="<?print $staticPath?>/admin/tariffs">Список тарифов</a></li>
        <li><a <? $activeAction == 'news' ? print 'class=active' : '' ?> href="<?print $staticPath?>/admin/news">Список новостей</a></li>
    <? break;
    case 'оператор': ?>
        <li><a <? $activeController == 'support' ? print 'class=active' : '' ?> href="<?print $staticPath?>/support/">Поддержка</a></li>
        <li><a <? $activeController == 'user' ? print 'class=active' : '' ?> href="<?print $staticPath?>/user/">Личные кабинет</a></li>
        <li><a <? $activeAction == 'applications' ? print 'class=active' : '' ?> href="<?print $staticPath?>/operator/applications">Список заявок</a></li>
        <li><a <? $activeAction == 'contracts' ? print 'class=active' : '' ?> href="<?print $staticPath?>/operator/contracts">Список договоров</a></li>
    <? break;
} ?>  
    </ul>
</nav>

<? if ($role == "клиент") { ?>
<script>
    const s = document.querySelector("#support");

    async function isMessageNavigate(id, count) {
        let res = await fetch(s.href+"isMessageAll?id="+id+"&count="+count+"&mode='user'")
            .then(i => i.json());

        return res;
    }    

    setInterval(async () => {
            let res = await isMessageNavigate(s.dataset.id, s.dataset.count);

            if (res.status == "true") {
                s.innerText = `Поддержка ${ res.count != 0 ? "(+"+res.count+")" : "" }`;
                s.dataset.count = res.count;
            }
    }, 1);

</script>
<? }?>

<script>
    const navrBoxs = document.querySelectorAll(".boxs--nav li");
    const navBtn = document.querySelector(".boxs--nav .menu");
    navBtn.onclick = e => {
        navrBoxs.forEach(i => i.classList.toggle("show"));
    };

</script>