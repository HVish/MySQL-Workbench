function qryexec(){
	var xmlhttp = new XMLHttpRequest();
    var qry = document.getElementById("Query").innerHTML.toString();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("output").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "sql.php?q=" + qry, true);
    xmlhttp.send();
}