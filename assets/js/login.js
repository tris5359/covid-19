  $(document).ready(function() {
      
      var animating = false,
          submitPhase1 = 1100,
          submitPhase2 = 400,
          logoutPhase1 = 800,
          $login = $(".login"),
          $app = $(".app");
      
      function ripple(elem, e) {
        $(".ripple").remove();
        var elTop = elem.offset().top,
            elLeft = elem.offset().left,
            x = e.pageX - elLeft,
            y = e.pageY - elTop;
        var $ripple = $("<div class='ripple'></div>");
        $ripple.css({top: y, left: x});
        elem.append($ripple);
      };
      
      $(document).on("click", ".login__submit", function(e) {
        if (animating) return;
        animating = true;
        var that = this;
        if (document.getElementById("idpengguna").value!='' && document.getElementById("pswd").value!='') {
        $(that).addClass("processing");
        setTimeout(function() {
         //  window.location = "verify.php?username="+document.getElementById("idpengguna").value+"&pass="+document.getElementById("pswd").value+"&login=";
          $(that).addClass("success");
          setTimeout(function() {
            animating = false;
            $(that).removeClass("success processing");
          });
        }, submitPhase1);}
      });
      
      });