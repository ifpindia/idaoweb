function createRequestObject() {
    var ro;
    var browser = navigator.appName;

    if(browser == "Microsoft Internet Explorer"){
        ro = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        ro = new XMLHttpRequest();
    }
    return ro;
}

var http = createRequestObject();

function showtreespecies() {	
    cat = document.getElementById("cbotype").value;
    if (cat == "0")
	cat = "1";
    
    if (cat == "1")
    {
	document.getElementById("clang").style.display = "block";
    }
    else
    {
	document.getElementById("clang").style.display = "none";
	http.open('get', 'searchspecies.php?searchtype='+cat);
	http.onreadystatechange = handleResponse;
	http.send(null);
    }
}

function showcnames()
{
	cat = document.getElementById("cbolang").value;
	http.open('get', 'searchspecies.php?searchtype='+cat);
	http.onreadystatechange = handleResponse;
	http.send(null);
}

function handleResponse() {
    if(http.readyState == 4){
        var response = http.responseText;
	//alert (response);
	document.getElementById("tree").innerHTML = response;
	//document.getElementById("sidetreecontrol").style.visibility = "visible";
	//document.getElementById("sidetreecontrol").style.display = "block";
	document.getElementById("species").style.visibility = "visible";
	document.getElementById("species").style.display = "block";
	
		$(document).ready(function(){
			$("#tree").treeview({
				animated: "fast",
				collapsed: true,
				unique: true,
				persist: location
			});
		})
    }
}
