var qry = document.getElementById("Query");
function init(str) {
    qry.innerHTML = str;
}
function qryexec(){
    
	var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("output").innerHTML = xmlhttp.responseText;
            var fd = document.getElementById("fd");
            var t = document.getElementById("output");
            fd.innerHTML = "Rows:" + t.getElementsByTagName("tbody")[0].getElementsByTagName("tr").length
                + "    Columns:" + t.getElementsByTagName("thead")[0].getElementsByTagName("tr")[0].getElementsByTagName("th").length;
        }
    }
    
    xmlhttp.open("POST", "<?php echo base_url();?>sql.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("Query="+qry.innerHTML.toString());
}