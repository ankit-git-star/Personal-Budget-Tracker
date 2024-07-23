<footer>
    <div class="copyright">
        <p>Copyright &copy; All Right reserved</p>
    </div>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="{{ asset('js/event.js') }}"></script>

<style>
    footer {

        color: white;
        margin-top: 20px;
        background: #4885ED;
        position: relative;
    }

    footer::before {
        content: "";
        background-color: black;
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0.2;
    }

    footer .copyright {
        background-color: #20C997;
        border-bottom-left-radius: 20px;
        width: 100%;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    footer p {
        color: white;
        position: relative;
        margin-bottom: 0 !important;

    }
</style>