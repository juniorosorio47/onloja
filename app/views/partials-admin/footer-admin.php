</div>
</div>

<footer class="footer-admin">
        <p>Dari Osorio Junior - Copyright 2018</p>
</footer>
<script>
    $(document).ready(function(){
        $('.close').click(function(event){
            event.preventDefault();
            $('.alert').fadeOut("fast");
            $('.info-user').hide('slow');
            
        });
    });
</script>

<script src="views\partials\js\layout.js"></script>
</body>
</html>