<div class="content">
    <div class="layout--form">
        <form class="b-s form--m" action="./registrationPOST" method="post">
            <div class="c__title b-s">
                <h1>Регистрация</h1>
            </div>
            <div class="r">
                <div class="c">
                    <div class="f__b">
                        <label for="surname">Фамилия</label>
                        <input required name="surname" id="surname" >
                    </div>
                    <div class="f__b">
                        <label for="name">Имя</label>
                        <input required name="name" id="name" >
                    </div>
                    <div class="f__b">
                        <label for="middlename">Отчество</label>
                        <input required name="middlename" id="middlename" >
                    </div>
                    <div class="f__b">
                        <label for="phone">Телефон</label>
                        <input required type="tel" name="phone" id="phone" >
                    </div>
                    <div class="f__b">
                        <label for="role">Роль</label>
                        <select id='role' name='role' required>
                            <option value='2'>Клиент</option>
                        </select>
                    </div>
                </div>
                <div class="hr"></div>
                <div class="c">
                    <div class="f__b">
                        <label for="email">Почта</label>
                        <input required type="email" name="email" id="email" >
                    </div>
                    <div class="f__b">
                        <label for="login">Логин</label>
                        <input required name="login" id="login" >
                    </div> 
                    <div class="f__b">
                        <label for="password">Пароль</label>
                        <input required type="password" name="password" id="password" >
                    </div>
                    <?php if (isset($_this->message) && $_this->message != "" ) { ?>
                    <div class="f__error">
                        <? print $_this->message; ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <input type="submit" value="Зарегистрировать">
        </form>
    </div>
</div>