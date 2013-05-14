jQuery.noConflict();
jQuery(document).ready(function(){

/************ slideshow *************/
  if (jQuery('.ssslideshow').length !=0) {
    
    var numofslides = new Array();
    var curimg = new Array();
    var slidedelay = new Array();
    var timeout = new Array();
    var imagestoload = new Array();
    var rel = new Array();
    var imgheight = new Array();
    var imgtitle = new Array();
    var imgwidth = new Array();
    var imgsubtitle = new Array();
    var i = new Array();
  
    jQuery('.ssslideshow').each(function(index) {
    
      var newthis = jQuery(this);
    
      jQuery(newthis).height(jQuery('.sssheight',this).text());
      jQuery('.restslides',this).hide();
      numofslides[index] = jQuery('.restslides a',newthis).length + 1;
      curimg[index] = 0;
      slidedelay[index] = parseInt(jQuery('.sssdelay',newthis).text());
      rel[index] = '';
      
      imagestoload[index] = new Array();
      imgwidth[index] = new Array();
      imgheight[index] = new Array();
      imgtitle[index] = new Array();
      imgsubtitle[index] = new Array();
      
      imagestoload[index][0] = jQuery('img',this).eq(0).attr('src');
      imgwidth[index][0] = jQuery('img',this).eq(0).attr('width');
      imgheight[index][0] = jQuery('img',this).eq(0).attr('height');
      imgtitle[index][0] = jQuery('img',this).eq(0).attr('title');
      imgsubtitle[index][0] = jQuery('.slidedescr',this).html();
      
      // add dots
      if (jQuery('.slidedots', newthis).length !=0) {
        for (i[index]=0; i[index]<numofslides[index]; i[index]++) {  
          var newi = i[index];  
          if (newi == 0) { var sssimgtitle = imgtitle[index][newi]; } else { var sssimgtitle = jQuery('.restslides a',this).eq((newi-1)).attr('title'); }        
          jQuery('.slidedots',this).append("<a href=\"\" class=\"dot\" title=\""+ sssimgtitle +"\"></a>\n"); 
        }
        jQuery('.slidedots a',this).eq(0).addClass('active');
      }
      // get all images
      for (i[index]=1; i[index]<numofslides[index]; i[index]++) {
        var newi = i[index];
        imagestoload[index][newi] = jQuery('.restslides a',this).eq((newi-1)).attr('href');
        rel[newi] = jQuery('.restslides a',this).eq((newi-1)).next('span.ssoptions').text().split("|");
        imgwidth[index][newi] = rel[newi][0];
        imgheight[index][newi] = rel[newi][1];
        
        var ssscaption = '<span>'+rel[newi][2]+'</span>';
        if (rel[newi][3] != '' ) { ssscaption += ' - '+rel[newi][3]; }
        
        if (rel[newi][4] != '') {
          imgsubtitle[index][newi] = '<a href="'+rel[newi][4]+'" title="'+rel[newi][2]+'">'+ssscaption+'</a>';
        } else {
          imgsubtitle[index][newi] = ssscaption;
        }

      }
      
            // fade first image in and start slideshow
      //jQuery('img',newthis).hide();
      //jQuery('img',newthis).bind("load", function () { jQuery('img',newthis).fadeIn('fast', function() {   }); });
      timeout[index] =  setInterval(function(){nextslide(newthis)}, slidedelay[index]);
      jQuery('img',newthis).css({'left': (jQuery(newthis).width() / 2) - (jQuery('img',newthis).width() / 2)+'px' }); // center image

      function nextslide(main){
        
        curimg[index]++;
        var newci = curimg[index];
        var img = new Image();
      
        // wrap our new image in jQuery, then:
        jQuery(img).load(function () {
          jQuery(this).hide();
          jQuery(main).append(this);
          jQuery(this,main).css({'left': (jQuery(newthis).width() / 2) - (jQuery(this,main).width() / 2)+'px' }); 
          jQuery('img',main).fadeOut(1000);
          jQuery(this,main).fadeIn(function() { 
            jQuery('img',main).eq(0).remove();
            if (jQuery('.slidedots', main).length !=0) {
              jQuery('.slidedots a',main).removeClass('active');
              jQuery('.slidedots a',main).eq(curimg[index]).addClass('active');
            }
          });
        }).error(function () {  
          
        }).attr('src', imagestoload[index][newci]).attr('width', imgwidth[index][newci]).attr('height', imgheight[index][newci]).attr('title', jQuery('.restslides a',newthis).eq((newci-1)).attr('title')).attr('alt', jQuery('.restslides a',newthis).eq((newci-1)).attr('title'));
        
        // load imgsubtitle
        
        jQuery('.slidedescr',newthis).html(imgsubtitle[index][newci]);
        if (newci  == numofslides[index] -1) { curimg[index] = -1; }
      }
      
      if (jQuery('.slidedots', newthis).length !=0) {
        jQuery('.slidedots a',this).click(function() { 
          if (jQuery(this).attr('class') != 'dot active') {
            clearInterval (timeout[index]);
            curimg[index] = jQuery(this).index() -1;
            timeout[index] =  setInterval(function(){nextslide(newthis)}, slidedelay[index]);
            nextslide(newthis);
          }
          return false; 
        });
      }
      
      if (jQuery('.sssarrow', newthis).length !=0) {
        jQuery('.sss-arrow-left',this).click(function() { 
            clearInterval (timeout[index]);
            if (curimg[index] == 0) {
              curimg[index] = numofslides[index] - 2;
            } else {
              curimg[index] = jQuery('.slidedots a.active',newthis).index() - 2;
            }
            timeout[index] =  setInterval(function(){nextslide(newthis)}, slidedelay[index]);
            nextslide(newthis);
          return false; 
        });
        
        jQuery('.sss-arrow-right',this).click(function() { 
          if (curimg[index] != curimg[index].length) {
            clearInterval (timeout[index]);
            curimg[index] = curimg[index];
            timeout[index] =  setInterval(function(){nextslide(newthis)}, slidedelay[index]);
            nextslide(newthis);
          }
          return false; 
        });
      }
      
      if (jQuery('.top-center', newthis).length !=0 || jQuery('.bottom-center', newthis).length !=0) {
      
        jQuery('.slidedots.top-center', newthis).css({'left': (jQuery(newthis).width() / 2) - (jQuery('.top-center', newthis).width() / 2)+'px' });
        jQuery('.slidedots.bottom-center', newthis).css({'left': (jQuery(newthis).width() / 2) - (jQuery('.bottom-center', newthis).width() / 2)+'px' });
      
      }
      
    });
  }
});