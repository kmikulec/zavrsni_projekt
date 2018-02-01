<?php

	echo "
    
    <script src='js/vendor/foundation.min.js'></script>
    <script src='http://foundation.zurb.com/sites/docs/v/5.5.3/assets/js/all.js'></script>
    <script>
      $(document).foundation();
      $(document).foundation('offcanvas', 'reflow');
    </script>
    <script>
        $('li.padajuci').click(function() {
       $('li.padajuci').not(this).find('ul').hide();
       $(this).find('ul').toggle();
        });
        
        $('section.hambi').click(function() {
       $('section.hambi').not(this).find('ul').hide();
       $(this).find('ul').toggle();
        });
    </script>
  </body>
</html>";

?>