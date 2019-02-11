<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edmin</title>
	<link type="text/css" href="/System/systemBasic/bootstrap/css2/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="/System/systemBasic/bootstrap/css2/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/System/systemBasic/css/style.css">
	<link rel="stylesheet" type="text/css" href="/System/systemBasic/images/icons/fontawesome/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
	<script src="/System/systemBasic/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="/System/systemBasic/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="/System/systemBasic/bootstrap/js2/bootstrap.min.js" type="text/javascript"></script>
	<script src="/System/systemBasic/js/ajax.js" type="text/javascript"></script>
	<script src="/System/systemBasic/js/bootstrap-growl.js" type="text/javascript"></script>
	<script src="/System/systemBasic/sweetalert/docs/assets/sweetalert/sweetalert.min.js"></script>
	<script src="/System/systemBasic/chart/chart.js/dist/Chart.min.js"></script>
	<style type="text/css">
		#body{
			background: #e28b03;
		}

		.swal-overlay {
			background-color: rgba(0,0,0,0.45);
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function() {
			swal("Enviado com sucesso!", "Obrigado!", "success").then((willDelete) => {
				if (willDelete) {
					javascript:history.back(-1)
				} else {
					javascript:history.back(-1)
				}
			});
		});
	</script>
</head>
<body id="body">

</body>
</html>
