<footer class="footer footer--hidden r--j b-s">
    <div class="boxs--footer b-hidden">
         Развернуть
    </div>
    <div class="boxs--footer">
        <a href="https://www.facebook.com/" title="facebook"><img src="<?print $staticPath;?>/public/src/svg/fk.svg"></a>
        <a href="https://ok.ru/" title="Одноклассники"><img src="<?print $staticPath;?>/public/src/svg/ok.svg"></a>
        <a href="https://twitter.com/" title="twitter"><img src="<?print $staticPath;?>/public/src/svg/tw.svg"></a>
        <a href="https://vk.com/" title="vkontakte"><img src="<?print $staticPath;?>/public/src/svg/vk.svg"></a>
    </div>
    <div class="boxs--footer">
        <a href="<?print $staticPath?>/">
            <span>@2021 TIP - Твой интернет провайдер!</span>
        </a>
    </div>
    <div class="boxs--footer">
        <a href="tel:79233334245">+7 923 333 42 45</a>
        <a href="mailto:provaider@mail.com">provaider@mail.com</a>
    </div>
</footer>

<script>
    const footerBoxs = document.querySelectorAll(".boxs--footer");
    const footerBtn = document.querySelector(".b-hidden");
    footerBtn.onclick = e => {
        footerBtn.textContent = footerBtn.textContent == "Свернуть" ? "Развернуть" : "Свернуть";
        footerBoxs.forEach(i => i.classList.toggle("show"));
    };

</script>