<br>
<div class="footer">
    <span>
        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a> <a href="#" target="_blank"><i class="fab fa-twitter"></i></a> <a href="#" target="_blank"><i class="fab fa-instagram"></i></a> <a href="#" target="_blank"><i class="fab fa-foursquare"></i></a> <a href="#" target="_blank"><i class="fab fa-vine"></i></a> <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a> <a href="#" target="_blank"><i class="fab fa-github-alt"></i></a>
        <br>
        <br>
        &copy; <?php echo date("Y"); ?> | Designed by <a href="http://2mcoffee.com" target="_self">Luciano Alfonsin</a> | <i class="fab fa-whatsapp"></i> <a href="#" target="_blank">Contact me!</a>
    </span>
</div>
<script>
    var mybutton = document.getElementById("up");
    
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
</script>
</body>
</html>