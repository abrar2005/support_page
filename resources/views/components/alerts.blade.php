<style>
    .alert_box {
        padding: 1rem 3rem;
        margin: 1rem;
        width: fit-content;

        border: 2px solid var(--border_clr);
        background-color: var(--background);
        color: var(--clr);
        font-weight: 300;

        position: absolute;
        top: 0;
        right: 50%;
        transform: translateX(50%);
        border-radius: 10px;
    }

    .success {
        --background: rgb(195, 248, 195);
        --border_clr: rgb(99, 201, 99);
        --clr: rgb(3, 99, 3);
    }

    .fail {
        --background: rgb(248, 195, 195);
        --border_clr: rgb(201, 99, 99);
        --clr: rgb(99, 3, 3);
    }
</style>



@if (Session::has('success'))
    <div id="popup" class="alert_box success">{{ Session::get('success') }}</div>
@endif



@if (Session::has('fail'))
    <div id="popup" class="alert_box fail">{{ Session::get('fail') }}</div>
@endif


<script>
    // Assign the command to execute and the number of seconds to wait
    var strCmd = "document.getElementById('popup').style.display = 'none'";
    var waitseconds = 3;

    // Calculate time out period then execute the command
    var timeOutPeriod = waitseconds * 1000;
    var hideTimer = setTimeout(strCmd, timeOutPeriod);
</script>
