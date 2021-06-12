<div class="content">
    <div class="layout--form">
        <form class="b-s form--m" action="../user/payPOST" method="post">
            <div class="c__title b-s">
                <h1>Оплата</h1>
            </div>
            <div class="r">
                <div class="c">
                    <div class="f__b">
                        <label for="surname">Фамилия</label>
                        <input type="hidden" name='pay_id' id="pay_id" value='<? print $_this->user_pay_object->id; ?>'>
                        <input required name="surname" id="surname" value='<? print $_this->user_object->surname; ?>'>
                    </div>
                    <div class="f__b">
                        <label for="name">Имя</label>
                        <input required name="name" id="name" value='<? print $_this->user_object->surname; ?>'>
                    </div>
                    <div class="f__b">
                        <label for="middlename">Отчество</label>
                        <input required name="middlename" id="middlename" value='<? print $_this->user_object->patronymic; ?>'>
                    </div>
                    <div class="f__b">
                        <label for="card_number">Номер карты</label>
                        <input type='number' min='100000' required name="card_number" id="card_number" >
                    </div>
                    <div class="f__b">
                        <label for="csv">csv</label>
                        <input type='number' min='100' max='999' required name="csv" id="csv">
                    </div> 
                </div>
                <div class="hr"></div>
                <div class="c">
                    <div class="f__b">
                        <label for="pay_id">Номер оплаты</label>
                        <input id="pay_id" name='pay_id' value='<? print $_this->user_pay_object->id; ?>' disabled>
                    </div>
                    <div class="f__b">
                        <label for="pay_date">Дата оплаты</label>
                        <input  required id="pay_date" value='<? print $_this->user_pay_object->date; ?>' disabled>
                    </div> 
                    <div class="f__b">
                        <label for="pay_price">Сумма</label>
                        <input type='number' required id="pay_price" value='<? print $_this->user_pay_object->price; ?>' disabled>
                    </div> 
                   
                    <div class="f__error">
                        <? print $_this->message; ?>
                    </div>
                </div>
            </div>
            <input type="submit" value="Оплатить">
        </form>
    </div>
</div>