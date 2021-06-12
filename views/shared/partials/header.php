<?
    if (isset($_SESSION['user_id'], $_SESSION['role_id'])) {
        $role = usersR::GetRoleById($_SESSION['role_id'])->title;
        $user = usersR::GetById($_SESSION['user_id']);  
    } else {
        $role = "гость";
    }
?>

<header class="header r--j b-s">
    <a href="<?print $staticPath?>/" class="logotip r">
        <div class="l-img"></div>
        <div class="l-title">TIP - Твой интернет провайдер!</div>
    </a>
    <div class="auth boxs">
        <a id='phone-a' class='a--img'><img title='Заказать звонок' src="<?print $staticPath;?>/public/src/svg/phone-call.svg"></a>
        <?if ($role == "гость") {?>
            <a href="<?print $staticPath?>/auth/">Войти</a>
            <a href="<?print $staticPath?>/auth/registration">Регистрация</a>
        <?} else {?>
            <div class="user-box">
                <span><?print $user->name?></span>
                <br>
                <span><?print $role?></span>
            </div>
            <a href="<?print $staticPath?>/auth/logout">Выйти</a>
        <?}?>
    </div>
</header> 

<script>
    document.querySelector('#phone-a').onclick = () => {
        prompt('Введите номер телефона и мы вам перезвоним!');
        alert('В скором времени мы вам перезвоним!');
    }
</script>