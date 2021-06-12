<div class="content">
    <div class="layout--form">
        <form class="b-s form--m" action="./editPOST" method="post">
            <div class="r">
                <div class="c">
                    <div class="f__b">
                        <label for="surname">Фамилия</label>
                        <input required value="<? print $_this->user->surname ?>" name="surname" id="surname">
                        <input type='hidden' value="<? print $_this->user->id ?>" name="user_id" id="user_id">
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
                        <label for="role">Роль</label>
                        <select id='role' name='role' required>
                            <? while ($r = $_this->roles->fetch_object()) {
                               print "<option value='$r->id'".($_this->user->role_id == $r->id ? "selected" : "").">$r->title</option>";
                            } ?>
                        </select>
                    </div>
                    <div class="f__b f__access" >
                        <p>
                            <? print $_this->message ?>
                        </p>
                    </div>
                </div>
            </div>
            <input type="submit" value="Изменить">
        </form>
    </div>
</div>
  