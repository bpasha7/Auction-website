$(document).ready(function($){
	$('#login_btn').click(function(e){
	var usr = $('#login_usr').val();
	var psd = $('#login_psd').val();
	//аворизация
	$.ajax({
      url: "login/connection.php",
      dataType: "json",
      type: "post",
      data: {username: usr, password: psd},
  datatype: 'json',
      success: function(data){
      	//alert(data.username+" "+ data.userrole);
        		//$('#menu_login').html(data);
        		$("#userbar").load("index.html");
        		$('#bar_username').val(data.username);
        		$('#userbar_user').text(data.username);
        		$('#body_login').css("display", "none");
        		//$("#login").css('display','none');
        		$('#open_userbar').css('visibility','visible');
        		$('#open_userbar').text(data.username + " ");
        		$("#menu_login").hide();	
        		$('#login').fadeIn('normal');  	
	  },
	  error:function(){
	  	alert("Неправильный логин/пароль");
	  }
        });
	});
	//загрузка даных в юзербар
	$('#open_userbar').click(function(e){
		$.ajax({
      url: "login/balance.php",
      dataType: "json",
      //type: "post",
      //data: {one: "1"},
  datatype: 'json',
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
	});
	$('#body_login').click(function(e){
		$(this).css("display", "none");
		$("#login").css('display','none');
		});
	$("#menu_login").click(function(e){
		$("#body_login").css('display','block');
		$("#login").css('display','block');
	});
	$("#menu_lots").click(function(e){
		$("#menu .active").removeClass();
		$("#main_page").load("lots.php");
		$(this).addClass('active');
	});
	$("#menu_main").click(function(e){
		$("#main_page").load("index.php #main_page");
		$("#menu .active").removeClass();
		$(this).addClass('active');
	});
	$("#logout").click(function(e){
		var returnVal = confirm("Выйти из учетной записи?");
		if(returnVal){
			$('#top-box').attr("checked", false);
			$('#open_userbar').css('visibility','hidden');
			$("#menu_login").show();
			$.post("session_clear.php",function(data){
     });
			
		}
	});
});