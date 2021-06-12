<div class="support content c">
    <div class="detail layout--form">
        <input id="fullname" type="hidden" value="<?php print $_this->fullname ?>">
        <input id="role" type="hidden" value="<?php print $_SESSION['role_id'] ?>">
        <div class="s__card b-s">
            <div class="c__title-invert b-s">
                <span>
                    Чат с технической поддержкой   
                </span>
               
            </div>
            <div id="messages" class="c__body">
                 
            </div>
            <div class="submit">
                <textarea placeholder="Введите сообщение" type="text" id="message" class="input-message"></textarea>
                <button title="Отправить" id="submit" class="btn-message svg-send"></button>
                <button title="Закрыть" id="close" class="btn-message svg-close" ></button>
            </div>
        </div>
    </div>
</div>

<script>

    const btn = document.querySelector("#submit");
    const btnClose = document.querySelector("#close");
    const text = document.querySelector("#message");
    const windowText = document.querySelector("#messages");
    const fullname = document.querySelector("#fullname").value;
    const role = document.querySelector("#role").value;

    let data = [];

    document.addEventListener("keydown", e => {
        if (e.key === "Enter" && !e.shiftKey) {
            submit();
        }
    })

    btn.onclick = e => {
        submit();
    }

    async function submit() {
        let mes = text.value;
        
        if(!validate(mes)) return;

        text.value = "";

        await pushToServer(mes, fullname);
        await getMessages();
        await pushToClient(data);
    }

    function validate(mes) {
        if (mes.trim() !== "") { 
            return true;
        } else {
            alert("Введите сообщение");
            return false;
        }        
    }

    async function pushToServer(message, author) {

        let id = new URLSearchParams(location.href).get("http://localhost/Task_IP/support/room?id");

        let d = new FormData();
        d.append("message", message);
        d.append("author", author);
        d.append("client_id", id);

        await fetch("./postMessages", {
            method: "POST",
            body: d 
        })
       
    }

    async function getMessages() {
        let dataJSON = await fetch("./getMessages"+location.search)
            .then(i => i.json());

        data = dataJSON;
    }

    function pushToClient(data) {
        let html = ``;
        
        html = data
            .map(i => {

                let r = roleColor(i.role_id);
                let s = status(fullname, i);

                if (fullname === i.author) {
                    return `<div class="message message--my ${ s }">
                        <div class="img ${ r }"></div>
                        <div class="text ">
                            ${ i.text }
                        </div>
                        <div class='date date--my'>
                            ${ i.date }    
                        </div>
                        <div class='date author--my'>
                            ${ i.author }    
                        </div>
                    </div>` 
                } else {
                    return `<div class="message message--all ${ s }">
                        <div class="img ${ r }"></div>
                        <div class="text ">
                            ${ i.text }
                        </div>
                        <div class='date date--all'>
                            ${ i.date }    
                        </div>
                        <div class='date author--all'>
                            ${ i.author }    
                        </div>
                    </div> `
                } 
            })
            .join("");

        windowText.innerHTML = html;

        windowText.scroll({top: windowText.scrollHeight});
    }

    function roleColor(id) {
        switch (id) {
            case "3":
                return "role-3";
            case "4":
                return "role-4";
            case "5":
                return "role-5";     
            default:
                return "";
        }
    }

    function status(fullname, i) {
        if (fullname !== i.author && i.status == "Новое сообщение" ) {
            return "new";
        }
    }

    async function init() {
        await getMessages();

        pushToClient(data);
    };

    async function isMessage() {
        let res = await fetch("./isMessage"+location.search+"&count="+data.length)
            .then(i => i.text());

        return res;
    }

    setInterval(async () => {
        if (await isMessage() === "true") {
            await init();
        }
    }, 1000);

    function updateA() {
        const s = document.querySelector("#support");
        
        if (res.status == "true") {
                s.innerText = `Поддержка (+${ res.count })`;
        }
    }

    init();

    btnClose.onclick = e => {
        fetch("./close"+location.search);
    };

</script>