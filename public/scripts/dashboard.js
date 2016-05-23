$(document).ready(function($){
	var URL = 'http://wts.dev/';
	var h = 0;
//Logining
	$("#content").on('submit', '#loginForm', function(e){
    var data = $(this).serialize();
$.ajax({
      url: "http://wts.dev/login/run",
      dataType: "json",
      type: "POST",
      data: data,
      success: function(data){
        		$('#bar_username').val(data.UserName);
        		$('#userbar_user').text(data.UserName);
        		$('#body_login').css('display','none');
        		$('#open_userbar').css('visibility','visible');
        		$('#open_userbar').text(data.UserName + " ");
        		$("#menu_login").hide();
        		$("#loginForm").fadeOut("slow"); 	
	  },
         error: function() {
                        alert("Неправильные логин или пароль");
                  }
        });
        return false; 
	});
	//Load Login form
	$('body').delegate('#menu_login', 'click', function(){
		$( "#content" ).empty();   
                $.ajax({   
                    url: URL+'login/index',  
                    success: function(html){  
                        $("#content").html(html);  
                    }  
                });  
                return false;  
            }); 
    //load lots table
    	$('body').delegate('#my_lots', 'click', function(){
		$( "#userbar_content" ).empty();   
                $.ajax({   
                    url: URL+'userpanel/index',  
                    success: function(html){  
                        $("#userbar_content").html(html);  
                    }  
                });  
                return false;  
            });             
	//logout from control panel
		$("#logout").click(function(e){
		var returnVal = confirm("Выйти из учетной записи?");
		if(returnVal){
			$('#open_userbar').click();
			//$('#top-box').attr("checked", false);
			$('#open_userbar').text("");
			$('#open_userbar').css('visibility','hidden');
			$("#menu_login").show();
			$.post("http://wts.dev/dashboard/logout",function(data){
     });
			
		}
	});
	//Check balance after open userPanel
	$('#open_userbar').click(function(e){
		if($("#top-box").is(':checked'))
		{
			//$('#tst').height(250);
			var h = $('#tst').height();
			$('#open_userbar').offset({top:0, right:5});
			$('#tst').offset({top: -h});
		}
		else
		{
			var h = $('#tst').height();
			$('#open_userbar').offset({top:h, right:5});
			$('#tst').offset({top: 0});
	  $.ajax({
 	  url: "http://wts.dev/userpanel/about",
      dataType: "json",
      type: "POST",
      success: function(data){
        		$('#userbar_rub').text(data.rub+ " ");
        		$('#userbar_dol').text(data.dol+ " ");
        		$('#userbar_bonuses').text(data.bon+ " "); 
        		$('#my_items').text("Мои Товары (" +data.itemcount+")"); 	
        		$('#my_lots').text("Мои Лоты (" +data.lotcount+")"); 
	  },
	  error:function(){
	  	alert("ERROR");
	  }
        });
      }
	});
	//Users lots
	$('#my_lots').click(function(e){
		$('#tst').animate({
    height: "500"
  }, 500, function() {
    $('#open_userbar').offset({top:500, right:5});
		$( "#tbl" ).empty();   
                $.ajax({   
                    url: URL+'userpanel/lots',  
                    success: function(html){  
                        $("#tbl").html(html);  
                    }  
                });     
  });
	});
		//Users items
	$('#my_items').click(function(e){
		$('#tst').animate({
    height: "500"
  }, 500, function() {
    $('#open_userbar').offset({top:500, right:5});
		$( "#tbl" ).empty();   
                $.ajax({   
                    url: URL+'userpanel/items',  
                    success: function(html){  
                        $("#tbl").html(html);  
                    }  
                });     
  });
  });
});