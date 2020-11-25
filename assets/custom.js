//title
(function () {
var original = document.title;
var timeout;

window.flashTitle = function (newMsg, howManyTimes) {
    function step() {
        document.title = (document.title == original) ? newMsg : original;

        if (--howManyTimes > 0) {
            timeout = setTimeout(step, 1000);
        };
    };

    howManyTimes = parseInt(howManyTimes);

    if (isNaN(howManyTimes)) {
        howManyTimes = 5;
    };

    cancelFlashTitle(timeout);
    step();
};

window.cancelFlashTitle = function () {
    clearTimeout(timeout);
    document.title = original;
};

}());




function loading(disini)
{
	$(disini).html("<div id='loading'><center><span class='fa fa-spinner'></span> Loading...</center></div>");
	//$(disini).append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	
	
}

function loading_hide(disini)
{
	$(disini).find("#loading").remove();
	
}

function eksekusi_controller(method)
{
	loading(".content-wrapper");
	
	document.title=method;
	
	$.get(url+method,function(e){
				
		$(".content-wrapper").html(e);
		loading_hide(".content-wrapper");
		
	})
	
}


function loading_cool(disini)            
{
	
	$(disini).after('<div class="overlay" id="loading_cool"><i class="fa fa-refresh fa-spin"></i></div>');
	
}

function loading_cool_hide(disini)            
{
	
	$(disini).next(".overlay").remove();
	
}


function hanya_alphanumeric(input)
{
	

	$(input).keypress(function (e) {
		var regex = new RegExp("^[a-zA-Z0-9]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(str)) {
			return true;
		}

		e.preventDefault();
		return false;
	});
		
		
}



//firebase log
function set_log(id_admin, username, action, jam,callback) 
{
  firebase.database().ref('tbl_admin_log/').push({
    id_admin: id_admin,
    username: username,
    action 	: action,
    jam 	: jam
  });
  
  
  
  callback();
  
  
  
  
}

function baca_snap_log()
{
	
	
  //baca log
  
  
  //baca sekali
	firebase.database().ref('tbl_admin_log/').startAt().limitToLast(1).on("child_added", function(snap){
		
		snap.forEach(function(childSnapshot) { 
			var childKey = childSnapshot.key;
			var childData = childSnapshot.val();
				
				$("#t4_snap_log_admin").html('<i class="fa fa-warning text-yellow"></i> <b>'+childData.username+'</b> '+childData.action+' pada '+childData.jam);
				
				
		  });
	  
	}); 
		
	
  //baca saat ada perubahan
	firebase.database().ref('tbl_admin_log/').on("value", function(snap) {
	  
	  
	  snap.forEach(function(childSnapshot) { 
			var childKey = childSnapshot.key;
			var childData = childSnapshot.val();
				
				$("#t4_snap_log_admin").html('<i class="fa fa-warning text-yellow"></i> <b>'+childData.username+'</b> '+childData.action+' pada '+childData.jam);
				
				
		  });
	  
	}); 
  
}



















function admin_online(id_admin,username)
{
	
		
	/**********************************************user online***********************************/

	var presenceRef = firebase.database().ref('.info/connected');
	var tbl_admin_online = firebase.database().ref('tbl_admin_online/'); 


	var a = new Date(),
				date = a.getFullYear()+'-'+a.getMonth()+'-'+a.getDate()+' '+a.getHours()+':'+a.getMinutes()+':'+a.getSeconds();
			
	var aku 		= id_admin;	
	
	//browser info
	navigator.sayswho= (function(){
		var ua= navigator.userAgent, tem, 
		M= ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
		if(/trident/i.test(M[1])){
			tem=  /\brv[ :]+(\d+)/g.exec(ua) || [];
			return 'IE '+(tem[1] || '');
		}
		if(M[1]=== 'Chrome'){
			tem= ua.match(/\b(OPR|Edge)\/(\d+)/);
			if(tem!= null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
		}
		M= M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
		if((tem= ua.match(/version\/(\d+)/i))!= null) M.splice(1, 1, tem[1]);
		return M.join(' ');
	})();
	
	// Add ourselves to presence list when online.
	presenceRef.on("value", function(snap) {
	  if (snap.val()) {
		
		tbl_admin_online.child(aku).set({'id_admin':id_admin,'username':username,'waktu':a.toString(),'koneksi':true,'info':navigator.sayswho});
		
		tbl_admin_online.child(aku).onDisconnect().remove();
		
		
	  }
	});

	// Number of online users is the number of objects in the presence list.
	tbl_admin_online.on("value", function(snap) {
	  console.log("# t4_jumlah_online of online admins = " + snap.numChildren());
	  
	  $("#t4_jumlah_online").html(snap.numChildren());
	  $("#t4_admin_online").html('<i class="fa fa-users text-aqua"></i> '+snap.numChildren()+' admin online');
	  
	  $("#t4_all_admin_online").html('');
	  
	  snap.forEach(function(childSnapshot) { 
			var childKey = childSnapshot.key;
			var childData = childSnapshot.val();
				
				console.log(childKey+"# Semua admin online " + childData.username );
				
				$("#t4_all_admin_online").append('<button class="btn btn-primary btn-sm btn-flat">'+childData.username+'</button>');
				
				
		  });
	  
	}); 


	/**********************************************user online***********************************/	
		

	
}



