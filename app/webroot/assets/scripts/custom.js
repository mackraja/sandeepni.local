/**
Custom module for you to write your own javascript functions
**/
var Custom = function () {

    // private functions & variables

    var myFunc = function(text) {
        alert(text);
    }
    
    var swapDisplay = function(object, displaied,limit,initial){
    	var opened_object = "";   	
    		if(displaied){
    			for (var x =0;x <=limit;x = x+1){
        			var elem = document.getElementById(initial+x);
        			if(elem != null)
        				elem.style.display='none';
    			}
    			opened_object=object;
    			document.getElementById(object).style.display='block';
    		} else{
    			document.getElementById(object).style.display='none';
    			opened_object="";
    		}
    		document.getElementById('containerOff1').style.height=document.body.scrollHeight+'px' ;
    }
    
    var doCenter = function(id){
    	  opened_layer=id;
    	  centerHorizontally(id);
    	  centerVertically(id);
    	}

    var get_id_layer = function(name) {
	    if(name.indexOf("detail_")!=-1) { return (parseInt(name.substr(7),10)); }
	}
    
    // public functions
    return {

        //main function
        init: function () {
            
//        	$(document).keyup(function(e) {
//        	    if (opened_object=="") return;
//        	    if (e.keyCode == 27) {
//        	    	alert("key 27");
//        	        if(active_object != ""){
//        	            active_object.closest('tr').removeClass("hightlighted");
//        	        }
//        	    	swapDisplay(opened_object, false,0,0);
//        	    }
//        	});
//        	var active_object = "";
//        	$(document).keydown(function(e) {
//        	    if(opened_object.length == 0) return;
//        	    if(e.keyCode == 38) {
//        	    	alert("key 38");
//        	    	var n=get_id_layer(opened_object);
//        	        //alert("up to "+(n-1));
//        	        if(!document.getElementById("detail_"+(n-1))) return;
//        	        swapDisplay(opened_object, false,0,0);
//        	        swapDisplay("detail_"+(n-1), true,0,0);
//        	        doCenter('detail_'+(n-1));
//        	        document.getElementById("detail_"+(n-1)).style.height="";
//        	        drawChart((n-1),null);
//        	        if(active_object != ""){
//        	            active_object.closest('tr').removeClass("hightlighted");
//        	        }
//        	        active_object = $('#detail_'+(n-1));
//        	        active_object.closest('tr').addClass("hightlighted");
//        	        return false;
//        	    }
//        	    else if(e.keyCode == 40) {
//        	    	alert("key 40");
//        	        var n=get_id_layer(opened_object);
//        	        //alert("down to "+(n+1));
//        	        if(!document.getElementById("detail_"+(n+1))) return;
//        	        swapDisplay(opened_object, false,0,0);
//        	        swapDisplay("detail_"+(n+1), true,0,0);
//        	        doCenter('detail_'+(n+1));
//        	        document.getElementById("detail_"+(n+1)).style.height="";
//        	        drawChart((n+1),null);
//        	        if(active_object != ""){
//        	            active_object.closest('tr').removeClass("hightlighted");
//        	        }
//        	        active_object = $('#detail_'+(n+1));
//        	        active_object.closest('tr').addClass("hightlighted");
//        	        return false;
//        	    }
//        	});
        	
        	function drawChart(n,newperiod) {
        		var rel_access = $('#relaccess_'+n).text();
        	    var currentmerchantname = $('#merchantname_'+n).text();
        		if(newperiod!=null) period = newperiod;
        		document.getElementById("merchantname__"+n).innerHTML = currentmerchantname;
        		var jsonData = $.ajax({
        					url: "/ajax/online_status_chart.php?rel_access="+rel_access+"&period="+period,
        					dataType:"json",
        					async: false
        					}).responseText;
        	}
        },

        //some helper function
        doSomeStuff: function () {
            myFunc();
        }

    };

}();

/***
Usage
***/
//Custom.init();
//Custom.doSomeStuff();