<div class="content">
    <div class="layout--table">
        <form class="b-s" action="../tariffs/editPOST" method="post">
            <div class="c__title b-s">
                Тариф - 
                <input required name='tariff_title' id='tariff_title' value="<?print $_this->tariff->title?>">
                <input type='hidden' name='tariff_id' id='tariff_id' value="<?print $_this->tariff->id?>">
                <input type='submit' value='Изменить тариф'>
            </div>
            <?if($_this->message != "") {?>
            <div class="<? (isset($_GET['status']) && $_GET['status'] == 'false') ? print 'f__error' : print 'f__access' ?>">
                <? print $_this->message; ?>
            </div>
            <?}?>
            <div class="r">
                <div class="c t">
                    <div class="wrap-table">
                        <table>
                            <tr class='tr--head'>
                                <td>Описание</td>
                                <td></td>
                            </tr>
                            <? $services = tariffR::getService($_this->tariff);
                                foreach ($services as $key => $s) {?>
                                <tr>
                                    <td><input name="description_<?print $key?>" id="description_<?print $key?>" value="<?print $s?>"></td>
                                    <td>
                                        <input type='button' value='Удалить' data-event='delete'>
                                    </td>
                                </tr>                               
                            <?}?>                             
                        </table>
                    </div>
                    <div class="c__title b-s">
                        Цена - 
                        <input required name='price' id='price' type='number' value='<?print $_this->tariff->price?>'>
                    </div>
                    <input type='button' value='Добавить поле услуг' data-event='add'>
                </div>
            </div>
            
        </form>
    </div>
</div>
  

<script>

    const deleteService = (event) => {
        const parentEl = event.target.parentElement.parentElement.remove();
    }                                

    const addService = (event) => {
        const table = document.querySelector('table');

        const count = table.querySelectorAll('tr').length;

        console.log(count);

        let tr = document.createElement('tr');
        tr.innerHTML = `
            <td><input name="description_${count}" id="description_${count}" value=""></td>
            <td>
                <input type='button' value='Удалить' data-event='delete'>
            </td>
        `;

        table.appendChild(tr);
    }                                

    document.querySelector('form').onclick = (event) => {
        let ev = event.target.dataset.event; 
        if (ev) {
            switch (ev) {
                case 'delete': deleteService(event); break;
                case 'add': addService(event); break;
            }
        }
    }

</script>