<footer class="navbar bottom" id="main-footer">
    <div><a href="#">Contact Us</a></div>
    <div>Group17<span>&copy;</span>Copyright 2021</div>
    <div>
        <a href="<?php echo( (end(explode("/", getcwd())) == 'public_html') ? '.':'..' )?>/disclaimer.php">Disclaimer</a>
    </div>
    <div>
        <a href="<?php echo( (end(explode("/", getcwd())) == 'public_html') ? '.':'..' )?>/pages/map.php">Map</a>
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
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://cdn.jsdelivr.net/gh/mgalante/jquery.redirect@master/jquery.redirect.js"></script>

<script>
    
    function send(e) {
        var url = '<?php echo((end(explode("/", getcwd())) == 'public_html') ? '.' : '..')?>/pages/main_search_result.php';
        $.redirect(url, {
                'name': document.getElementById('search-input').value,
                'username': "group17",
                'password': "IINsT1"
            },
            "post"
        )
    }

    $('.auto-search').autocomplete({
        source: function(request, response) {
            $.ajax({
                type: "post",
                url: '<?php echo((end(explode("/", getcwd())) == 'public_html') ? '.' : '..')?>/scripts/queries.php',
                data: {
                    'search': request.term,
                    'username': '',
                    'password': '',
                    'type': 'items-auto'
                },
                success: function(data) {
                    if (data) {
                        data = data.slice(1, -1);
                        var list = data.split("{");

                        var vals = []
                        for (var i in list) {
                            list[i] = list[i].slice(0, -1);

                        }

                        for (var i in list) {
                            vals.push(list[i].split(":")[1]);
                        }

                        for (var i in vals) {
                            if (vals[i].charAt(0) === '"')
                                vals[i] = vals[i].substring(1);
                            if (vals[i].charAt(vals[i].length - 1) === '"')
                                vals[i] = vals[i].substring(0, vals[i].length - 1);
                        }
                        response(vals)
                    }
                }
            })
        }
    })
</script>