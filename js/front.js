$(function(){

  $(document).on('submit', '.ajax_form', function()
      {
        var $form = $(this);
          // return false;
          $(this).ajaxSubmit({
              url:        $form.attr('action'),
              type:       'post',
              dataType:   'json',
              success:    function(response)
              {
                
                  if (response.errors != undefined)
                  {
                        $('p#error').text(response.errors);
                        $('p#error').fadeIn("slow");
                        $('#username').addClass('parsley-error');
                      $('#password').addClass('parsley-error');
                  }
                  
                  // show message
                  
                  if (response.success != undefined)
                  {
                      $('#myModalLabel_header').text('Registration Successfully');
                      $('#model_body').text('Thank you For Registration');
                      $('#conf').click();
                  }

                  // home form
                  if (response.conf_redirect != undefined)
                  {
                      $('#close_btn').attr('onClick', 'window.location.href="'+response.conf_redirect + '"');
                  }

                  // Show Confirmation for pages
                  if (response.page != undefined)
                  {
                      show_alert(response.message); 
                      $('.clear').click();
                  }

                  // redirect
                  
                  if (response.redirect != undefined)
                  {
                      document.location.href = response.redirect; 
                  }
              }
          });
          
          return false;
      });
});

function echeck(str) {

    var at="@"
    var dot="."
    var lat=str.indexOf(at)
    var lstr=str.length
    var ldot=str.indexOf(dot)
    if (str.indexOf(at)==-1){
       alert("Invalid e-mail address.")
       return false
    }

    if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
       alert("Invalid e-mail address")
       return false
    }

    if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
        alert("Invalid e-mail address")
        return false
    }

     if (str.indexOf(at,(lat+1))!=-1){
        alert("Invalid e-mail address")
        return false
     }

     if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
        alert("Invalid e-mail address")
        return false
     }

     if (str.indexOf(dot,(lat+2))==-1){
        alert("Invalid e-mail address")
        return false
     }
    
     if (str.indexOf(" ")!=-1){
        alert("Invalid e-mail address")
        return false
     }

     return true          
  }
/*
  general show popup message function
*/
function show_popup_message(title,message){
  var post_data='';
  if(message!=''){
    post_data += 'message='+message;  
  }
  if(title!=''){
    post_data += '&title='+title; 
  }
  $("#message_pp").fancybox({
      ajax : {
        type  : "POST",
        data  : post_data
      },
      margin: 0,
      padding: 0
    });
  $("#message_pp").click();
}
function show_confirm_message(url, message, title){
  if(url==''){
    return false; 
  }
  var post_data='url='+url;
  if(message!=''){
    post_data += '&message='+message; 
  }
  if(title!=''){
    post_data += '&title='+title; 
  }
  $("#confirm_pp").fancybox({
      ajax : {
        type  : "POST",
        data  : post_data
      },
      margin: 0,
      padding: 0
    });
  $("#confirm_pp").click();
}
function show_ajax_confirm_message(code, message, title){
  if(url==''){
    return false; 
  }
  var post_data='code='+code;
  if(message!=''){
    post_data += '&message='+message; 
  }
  if(title!=''){
    post_data += '&title='+title; 
  }
  $("#confirm_pp").fancybox({
      ajax : {
        type  : "POST",
        data  : post_data
      },
      margin: 0,
      padding: 0
    });
  $("#confirm_pp").click();
}

function openForm(url) 
{ 
  $.ajax({

     type: "POST",

     url: url,

     success: function(msg){
    
    $("#basic-modal-content").html(msg);
    
    var maskHeight = $(document).height();    
    var maskWidth = $(window).width();  
    $('#gray_bak').css({height:maskHeight, width:maskWidth}).show();  
    $('#basic-modal-content').modal();
    
    }

   });     
}


function closePP()
{
  $('#gray_bak').hide();
  $.modal.close();
}