<div class="content">
    <div class="layout--form">
        <form class="b-s form--m" action="./save" method="post">
        
            <? include_once 'views/user/partials/user_navigation.php' ?>

            <div class="r">
                <div class="c">
                    <div class="f__b">
                        <label for="surname">Фамилия</label>
                        <input required value="<? print $_this->user->surname ?>" name="surname" id="surname">
                    </div>
                    <div class="f__b">
                        <label for="name">Имя</label>
                        <input required value="<? print $_this->user->name ?>" name="name" id="name">
                    </div>
                    <div class="f__b">
                        <label for="middlename">Отчество</label>
                        <input required value="<? print $_this->user->patronymic ?>" name="middlename" id="middlename">
                    </div>
                    <div class="f__b">
                        <label for="phone">Телефон</label>
                        <input required value="<? print $_this->user->phone ?>" type="tel" name="phone" id="phone">
                    </div>
                </div>
                <div class="hr"></div>
                <div class="c">
                    <div class="f__b">
                        <label for="email">Почта</label>
                        <input required value="<? print $_this->user->email ?>" type="email" name="email" id="email">
                    </div>
                    <div class="f__b">
                        <label for="login">Логин</label>
                        <input required value="<? print $_this->user->login ?>" disabled name="login" id="login">
                    </div> 
                    <div class="f__b">
                        <label for="password">Пароль</label>
                        <input required value="<? print $_this->user->password ?>" disabled  name="password" id="password">
                    </div>
                    <div class="f__b f__access" >
                        <p>
                            <? print $_this->message ?>
                        </p>
                    </div>
                </div>
            </div>
            <input type="submit" value="Сохранить">
        </form>
    </div>
</div>
  