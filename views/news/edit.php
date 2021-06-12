<div class="content c">
    <div class="layout--form">
        <form class="b-s form--m " action="editPOST" method="post">
            <div class="c__title b-s">
                <h1>Добавить новость</h1>
            </div>
            <div class="f__b">
                <label for="title">Заголовок</label>
                <input required name="title" id="title" value='<? print $_this->news['title']?>'>
                <input type='hidden' name="news_id" id="news_id" value='<? print $_GET['news_id']?>'>
            </div> 
            <div class="f__b">
                <label for="date">Дата</label>
                <input required type="date" name="date" id="date" value='<? print date('Y-m-d', strtotime($_this->news['date']))?>'>
            </div>
            <div class="f__b">
                <label for="desc">Описание</label>
                <textarea name="desc" id="desc"><? print $_this->news['description']?></textarea>
            </div>
            <input type="submit" value="Изменить">
        </form>
    </div>
</div>