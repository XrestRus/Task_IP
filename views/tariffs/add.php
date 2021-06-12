<div class="content">
    <div class="layout--table">
        <form class="b-s" action="../tariffs/addPOST" method="post">
            <div class="c__title b-s">
                Тариф - 
                <input required name='tariff_title' id='tariff_title' value="">
                <input type='submit' value='Добавить тариф'>
            </div>
            <div class="<? $_GET['status'] == 'false' ? print 'f__error' : print 'f__access' ?>">
                <? print $_this->message; ?>
            </div>
            <div class="r">
                <div class="c t">
                    <div class="wrap-table">
                        <table>
                            <tr class='tr--head'>
                                <td>Описание</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input name="description_1" id="description_1" value=""></td>
                                <td class='td--event'>
                                    <button>Удалить</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="c__title b-s">
                        Цена - 
                        <input required name='price' id='price' type='number' value='Цена'>
                    </div>
                    <input type='submit' value='Добавить поле услуг'>
                </div>
            </div>
            
        </form>
    </div>
</div>
  