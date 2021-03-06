

//Google Analytics tracking code
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45494511-1', 'bidwellselfstorage.com');
  ga('send', 'pageview');






//NODE FACADE TO SUPPORT TOUCH EVENTS ON MOBILE========================================
//================================================================================
(function(){
  if (typeof(window.ontouchstart)!='undefined'){
    TOUCHSTART='touchstart';
    TOUCHEDN='touchend';
  }
  else if(typeof(window.onmspointerdown)!='undefined'){
      TOUCHSTART="MSPointerDown"
      TOUCHEND="MSPointerUp"
  } else{
      TOUCHSTART="mousedown";
      TOUCHEND="mousedup"
  }

  function NodeFacade(node){
    this._node = node;
  }
  NodeFacade.prototype.getDomNode = function(){
    return this._node;
  }
  NodeFacade.prototype.on = function(event,callback){
    if(evt==='tap'){
      this._node.addEventListener(TOUCHSTART,callback);
    } else if(evt==='tapend'){
      this._node.addEventListener(TOUCHEND,callback);
    } else{
      this._node.addEventListener(evt,callback)
    }
    return this;
  }
  NodeFacade.prototype.off= function(event,callback){
    if(evt==='tap'){
      this._node.removeEventListener(TOUCHSTART,callback);
    } else if(evt==='tapend'){
      this._node.removeEventListener(TOUCHEND,callback);
    } else{
      this._node.removeEventListener(evt,callback)
    }
    return this;
  }
  //allow the $ function to find node based on selector and instantiate facade
  window.$ = function(selector){
    var node=document.querySelector(selector);
    if(node){
      return new NodeFacade(node);
    }else{
      return null;
    }
  }
});




//===============================================================
//========================EVENTS UPON DOCUMENT READY EVENT=================================
//================================================================================

//CACHE ALL AJAX REQUESTS
$.ajaxSetup({
  cache: true
});


$(document).ready(function(){
    //send ajax get request to the controller code
    function scroll_to(div){
    $('html, body').animate({
        scrollTop: $(div).offset().top
    },1000);
    }
    var showLengths = function(width){
        $.get("/Bidwell3.0/pricing/controller.php",{'width':width}).done(function(data){
          $("#length").html(data);
          $("#length").fadeIn("slow");
     
        });
    }
    var width="4";
    var length="4";
    var rent_type="monthly"; 

    $("#width").on('change',function(){
      width = this.value;
      showLengths(width); 
    }); 
    $("#length-selector").on('change',function(){
      length = this.value;
      $("#billing_options").fadeIn("slow");
      scroll_to("#billing_options");
    });
    $("#rent_type").on('change',function(){
      rent_type = this.value;
      $('#price_button').fadeIn('slow');
    });
    $("#unit_form").submit(function(event){
      event.preventDefault();
      var object = {'width':width,
        'length':length,
        'rent_type':rent_type
      }
      //WATCH OUT HERE!!!! CHANGE THE PATH UPON UPDLOADING VIA FTP CLIENT
      $.ajax({
        type:"GET",
        url:"/Bidwell3.0/pricing/controller.php",
        data:object
      }).done(function(data){
        $("#form-results").html(data);
      });
    });
    $("#call-us").hover(
      function(){
      $("#fade-in").fadeIn("slow");
      },
      function(){
        $("#fade-in").fadeOut("slow");
      }); 


    $(".button").on('tap',function(event){
      $(".mobile-list").slideDown("slow");
      event.stopPropagation();
    });
    $(document).on('tapend',function(){
      $(".mobile-list").slideUp("slow");
    });
    $(".button").click(function(event){
      event.stopPropagation();
      $(".mobile-list").slideDown("slow");
    })
    $(document).click(function(){
      $(".mobile-list").slideUp("slow");
    })
    
    //FETCH GOOGLE DATA WHEN REQUESTED BY USER
    $("#getMap").click(function(event){
     
      $("#loading").removeClass("hidden").css('display','block');
      event.preventDefault();
      $.getScript("js/map.js", function(data,status,jqxhr){   
        //if status =200 proceed
        initialize();
        calcRoute();
        //if status !=200 don't proceed

        console.log($("#map-canvas").children()); 
        if( $('#map-canvas').css('display')=='hidden' || $('#directionsPanel').css('display')=='hidden'){

      }      
      })
      
    });
    $(document).ajaxComplete(function(){
      $("#loading").css('display','none');
      $("#direction-container").fadeIn('slow');
      $("#location").css('background-color','#ACACAC') 
      console.log($("#map-canvas").children());
      $("#getMap").hide();
      $("#hideMap").show();
    });
    $("#hideMap").click(function(){
     
      $(this).hide();
      $("#location").css("background-color","white");
      $("#getMap").show();
      $("#direction-container").fadeOut('slow');
    })

    
    
    //ANIMATE SCROLLING TO INTERNAL LINKS
    $(function(){
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });

    //CONFIGURE TRIGGERS AND TARGETS
    $(".trigger").hover(
      function(){
        $(this).children(".target").fadeIn('slow');
      },
      function(){
        $(this).children(".target").fadeOut("slow");
      }
    )

    
  });



