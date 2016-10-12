 $( document ).ready(function() {
            chart();
            retina();
            circle_progess();
            $('select').material_select();
            $('.datepicker').pickadate({
              selectMonths: true, // Creates a dropdown to control onth
              selectYears: 30, // Creates a dropdown of 15 years to control year
							max: new Date(2015,12,14)
            });
            // Materialize.showStaggeredList('#staggered-test');
            Materialize.fadeInImage('.staggered-test');
            $('ul.tabs').tabs();
	 
              
});

function chart(){

    if($('.verticalChart')) {
      
      $('.singleBar').each(function(){
        
        var theColorIs = $(this).parent().parent().parent().css("background");
        
        var percent = $(this).find('.value span').html();
        
        $(this).find('.value span').css('color',theColorIs);
        
        $(this).find('.value').animate({height:percent}, 2000, function() {
            
        $(this).find('span').fadeIn();
         
        });
        
      });
      
    }
    
  }
  function retina(){
  
  retinaMode = (window.devicePixelRatio > 1);
  
  return retinaMode;
  
} 


/* ---------- Circle Progess Bars ---------- */

function circle_progess() {
  
  var divElement = $('div'); //log all div elements
  
  if (retina()) {
    
    $(".whiteCircle").knob({
          'min':0,
          'max':100,
          'readOnly': true,
          'width': 240,
          'height': 240,
      'bgColor': 'rgba(255,255,255,0.5)',
          'fgColor': 'rgba(255,255,255,0.9)',
          'dynamicDraw': true,
          'thickness': 0.2,
          'tickColorizeValues': true
      });
  
    $(".circleStat").css('zoom',0.5);
    $(".whiteCircle").css('zoom',0.999);
    
    
  } else {
    
    $(".whiteCircle").knob({
          'min':0,
          'max':100,
          'readOnly': true,
          'width': 120,
          'height': 120,
      'bgColor': 'rgba(255,255,255,0.5)',
          'fgColor': 'rgba(255,255,255,0.9)',
          'dynamicDraw': true,
          'thickness': 0.2,
          'tickColorizeValues': true
      });
    
  }
  
  
  
  $(".circleStatsItemBox").each(function(){
    
    var value = $(this).find(".value > .number").html();
    var unit = $(this).find(".value > .unit").html();
    var percent = $(this).find("input").val()/100;
    
    countSpeed = 2300*percent;
    
    endValue = value*percent;
    
    $(this).find(".count > .unit").html(unit);
    $(this).find(".count > .number").countTo({
      
      from: 0,
        to: endValue,
        speed: countSpeed,
        refreshInterval: 50
    
    });
    
    //$(this).find(".count").html(value*percent + unit);
    
  });
  
}                
