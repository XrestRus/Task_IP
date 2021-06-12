<div class="content">
    <form class="layout--table">
        <div class="b-s" action="profile.php" method="post">
                
            <div class="c__title b-s">
                Список пользователей
            </div>
			<div class="<? isset($_GET['status']) ? $_GET['status'] == 'false' ? print 'f__error' : print 'f__access' : "" ?>">
                <? print $_this->message; ?>
            </div>
            <div class="r">
                <div class="c t">
                    <div class="wrap-table">
                        <table>
                            <tr class='tr--head'>
                                <td>Фамилия</td>
                                <td>Имя</td>
                                <td>Отчество</td>
                                <td>Телефон</td>
                                <td>Роль</td>

                                <td></td>
                                <td></td>
                                
                            </tr>
                            <tr>
                                <? while ($u = $_this->users->fetch_object()) { ?>
                                <tr>
                                    <td><?print $u->surname?></td>
                                    <td><?print $u->name?></td>
                                    <td><?print $u->patronymic?></td>
                                    <td><?print $u->phone ?></td>
                                    <td><?print usersR::GetRoleById($u->role_id)->title ?></td>
                                    <td class='td--event'>
                                        <div>
                                            <a href='<?print $staticPath?>/user/edit?user_id=<?print $u->id?>'>Изменить</a>
                                        </div>
                                    </td>
                                    <td class='td--event'>
                                        <div>
                                            <a href='<?print $staticPath?>/user/delete?user_id=<?print $u->id?>'>Удалить</a>
                                        </div>
                                    </td>
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
  