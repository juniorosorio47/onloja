</div>

<footer class="footer">
    <nav class="navbar navbar-footer">
        <ul>
            <li><a href="#">Atendimento</a></li>
            <li><a href="#">Contato</a></li>
            <li><a href="#">Sobre</a></li>
        </ul>
    </nav>

    <nav class="navbar navbar-footer" id="nome-footer">
        <p>Dari Osorio Junior - Copyright 2018</p>
    </nav>

</footer>

<script>
    $(document).ready(function(){
        $('.close').click(function(event){
            event.preventDefault();
            $('.alert').fadeOut("fast");
        });
    });
</script>
</body>
</html>