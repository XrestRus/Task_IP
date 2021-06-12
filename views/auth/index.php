<div class="content c">
    <div class="layout--form">
        <form class="b-s form--s" action="loginPOST" method="post">
            <div class="c__title b-s">
                <h1>Войти</h1>
            </div>
            <div class="f__b">
                <label for="login">Логин</label>
                <input required name="login" id="login">
            </div> 
            <div class="f__b">
                <label for="password">Пароль</label>
                <input required type="password" name="password" id="password">
            </div>
            <div class="<? isset($_GET['status']) && $_GET['status'] == 'false' ? print 'f__error' : print 'f__access' ?>">
                <? print $_this->message; ?>
            </div>
            <input type="submit" value="Войти">
        </form>
    </div>
</div>