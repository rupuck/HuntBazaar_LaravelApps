<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <input placeholder="search" id="searchbox">
    <div id="designers" class="hidden">
    </div>
</body>

<script>
    // anggep aja ini dari db
    let designers = ['bambang', 'susi', 'unggul', 'unggay', 'gay'];

    // populate designer data
    let designerEl = document.querySelector('#designers')
    for (let designer of designers) {
        designerEl.innerHTML += `
        <div class="cebok">
            <input type="checkbox" value="${designer}">${designer}
        </div>
        `
    }

    let inputEl = document.querySelector('#searchbox')
    inputEl.addEventListener('keyup', onInputChange)

    function onInputChange(e) {
        if (inputEl.value != '') {
            designerEl.className = ''
            designerEl.querySelectorAll('.cebok').forEach(v => {
                let designerName = v.querySelector('input').value
                if (!designerName.includes(inputEl.value)) {
                    v.className = 'cebok hidden'
                } else {
                    v.className = 'cebok'
                }
            })
        } else {
            designerEl.className = 'hidden'
        }
    }

</script>


<script>
    function includeCSRF() {
        var send = XMLHttpRequest.prototype.send,
            token = $('#csrf_token').val();
        XMLHttpRequest.prototype.send = function(data) {
            this.setRequestHeader('X-CSRF-Token', token);
            return send.apply(this, arguments);
        };
    }

    includeCSRF()
</script>




</html>