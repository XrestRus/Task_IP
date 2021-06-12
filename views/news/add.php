<div class="content c">
    <div class="layout--form">
        <form class="b-s form--s" action="addPOST" method="post">
            <div class="c__title b-s">
                <h1>Добавить новость</h1>
            </div>
            <div class="f__b">
                <label for="title">Заголовок</label>
                <input required name="title" id="title">
            </div> 
            <div class="f__b">
                <label for="date">Дата</label>
                <input required type="date" name="date" id="date">
            </div>
            <div class="f__b">
                <label for="desc">Описание</label>
                <textarea name="desc" id="desc"></textarea>
            </div>
            <input type="submit" value="Добавить">
        </form>
    </div>
</div>