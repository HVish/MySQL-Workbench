<html>
	<head>
		<title>MySQL Experiments</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-theme.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/theme.css">
	</head>
	<body>
		
		<div class="container">
			<div class="jumbotron col-sm-12" style="border-radius:0px">
				<h1>MySQL Workbench</h1> 
				<p>Enter your query here in the left pane, your output will be appeared in right pane.</p> 
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-primary">
						<div class="panel-heading">Enter Your SQL Query Here</div>
						<div class="panel-body">
							<label for="Query">Query:</label>
							<textarea class="form-control" rows="9" id="Query" onkeyup="init(this.value)"></textarea>
						</div>
						<div class="panel-footer">
							<button type="button" class="btn btn-primary btn-md" onclick="qryexec()">Run Query</button>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="panel panel-primary">
						<div class="panel-heading">Output</div>
						<div class="panel-body">
							<table id="output" class="table table-striped table-bordered table-hover" style="margin-bottom:0">
								<thead>
									<tr class="info">
										<th>Column 1</th>
										<th>Column 2 ...</th>
										<th>Column N</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Cell 1</td>
										<td>Cell 2 ...</td>
										<td>Cell N</td>
									</tr>
									<tr>
										<td>Cell 1</td>
										<td>Cell 2 ...</td>
										<td>Cell N</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="panel-footer" id="fd">Rows:0 Columns:0</div>
					</div>
				</div>
			</div>
		</div>
		<script>
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
			    
			    xmlhttp.open("POST", "<?php echo base_url()."index.php/home/sql";?>", true);
			    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			    xmlhttp.send("Query="+qry.innerHTML.toString());
			}
		</script>
	</body>
	<!--script src="<?php echo base_url();?>js/index.js"></script-->
</html>