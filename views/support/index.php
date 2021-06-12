<div class="content">
    <form class="layout--table">
        <div class="b-s" action="profile.php" method="post">
                
            <div class="c__title b-s">
                Список чатов
            </div>
			
            <div class="r">
                <div class="c t">
                    <div class="wrap-table">
                        <table>
                            <tr class='tr--head'>
                                <td>Чат №</td>
                                <td>Фамилия</td>
                                <td>Имя</td>
                                <td>Отчество</td>
                                <td>Статус</td>

                                <td></td>
                                
                            </tr>
                            <tr>
                                <? while ($u = $_this->user_chat->fetch_object()) { 
                                    $user = usersR::GetById($u->client_id);
                                    $count = supportR::CountMessToStatusUnread($u->client_id, 2);
                                    $status = supportR::GetStatus($u->client_id);
                                ?>
                                <tr>
                                    <input type='hidden' class='count' value='<?print $count ?>'>
                                    <td><?print $u->client_id?></td>
                                    <td><?print $user->surname?></td>
                                    <td><?print $user->name?></td>
                                    <td><?print $user->patronymic ?></td>
                                    <td class='status'>
                                    <? 
                                        if ( $status == "Закрыт" ) print "Закрыт";
                                        else if ( $count == 0 ) print "Прочитано";
                                        else print $status." (".$count.")";
                                    ?>
                                    </td>
                                    <td class='td--event'>
                                        <div>
                                            <a href='<?print $staticPath?>/support/room?id=<?print $u->client_id?>'>Перейти</a>
                                        </div>
                                    </td>
                                    <input type='hidden' class='fix-count' value='<?print $count ?>'>

                                </tr>
                                <? } ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    const count = document.querySelectorAll(".count");
                                    
    const status = ['Новое сообщение', 'Прочитано', 'Создано', 'Закрыт'];

    async function isMessage(id, count) {
        let res = await fetch("./isMessageAll?id="+id+"&count="+count)
            .then(i => i.json());

        return res;
    }    

    setInterval(async () => {
        count.forEach( async (i) => {
            let id = i.parentElement.children[1].textContent;

            let result = await isMessage(id, i.value);

            if (result.status == "true") {
                init(i, result);
            }
        });
        
    }, 1000);

    async function init(el, result) {
        el.parentElement.children[5].innerText = `${ result.status_chat } (${ result.count })`;

        el.value = result.count;
		el.parentElement.parentElement.insertBefore(el.parentElement, el.parentElement.parentElement.children[1]);
    }

	(function(){
		count.forEach(i => {
			if (i.parentElement.children[5].innerText.search("Новое сообщение") == 0) {
				i.parentElement.parentElement.insertBefore(i.parentElement, i.parentElement.parentElement.children[1]);
			}
			
		});
	})();

</script>