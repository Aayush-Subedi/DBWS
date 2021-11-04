<footer>
    <div><a href="#">Contact Us</a></div>
    <div>Group17<span>&copy;</span>Copyright 2021</div>
    <div>
        <?php

        if (end(explode("/", getcwd())) == 'public_html') {
            echo  '<a href="./disclaimer.php">';
        } else {
            echo  '<a href="../disclaimer.php">';
        }

        ?>
        Disclaimer</a>
    </div>
    <div id="social-media">
        <i class="fab icons fa-2x fa-facebook"></i>
        <i class="fab icons fa-2x fa-instagram"></i>
        <i class="fab icons fa-2x fa-twitch"></i>
        <i class="fab icons fa-2x fa-twitter"></i>
    </div>
    <!-- Bootstrap JS -->

</footer>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>