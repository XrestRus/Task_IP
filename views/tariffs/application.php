<div class="content">
    <div class="layout--form">
        <form class="b-s form--m" action="../tariffs/applicationPOST" method="post">
            <div class="r">
                <div class="c">
                    <input type='hidden' name="tariff_id" id="tariff_id" value="<?print $_GET['tariff_id']?>">
                    <div class="f__b">
                        <label for="surname">Фамилия</label>
                        <input required name="surname" id="surname" value='<? print $_this->user->surname ?>'>
                    </div>
                    <div class="f__b">
                        <label for="name">Имя</label>
                        <input required name="name" id="name" value='<? print $_this->user->name ?>'>
                    </div>
                    <div class="f__b">
                        <label for="middlename">Отчество</label>
                        <input required name="middlename" id="middlename" value='<? print $_this->user->patronymic ?>'>
                    </div>
                </div>
                <div class="hr"></div>
                <div class="c">
                    <div class="f__b">
                        <label for="phone">Телефон</label>
                        <input required type="tel" name="phone" id="phone" value='<? print $_this->user->phone ?>'>
                    </div>
                    <div class="f__b">
                        <label for="email">Почта</label>
                        <input required type="email" name="email" id="email " value='<? print $_this->user->email ?>'>
                    </div>
                </div>
            </div>
            <div class="r">
                <div class="c">
                    <div class="f__b">
                        <label for="city">Город</label>
                        <input required name="city" id="city">
                    </div>
                    <div class="f__b">
                        <label for="street">Улица</label>
                        <input required name="street" id="street">
                    </div>
                </div>
                <div class="hr"></div>
                <div class="c">
                    <div class="f__b">
                        <label for="house">Дом</label>
                        <input required name="house" id="house">
                    </div>
                    <div class="f__b">
                        <label for="room">Квартира</label>
                        <input required name="room" id="room">
                    </div>                 
					<div class="<? isset($_GET['status']) ? $_GET['status'] == 'false' ? print 'f__error' : print 'f__access' : "" ?>">
                        <? print $_this->message; ?>
                    </div>
                </div>
            </div>
            <input type="submit" value="Отправить заявку">
        </form>
    </div>
</div>
  