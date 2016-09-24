<!DOCTYPE html>
<html>
<head>
	<title></title>
<!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
               
                $('#datepicker').datepicker({ 
                    dateFormat: 'yy-mm-dd'
                }).datepicker('setDate', new Date());
            });

	</script>
</head>
<body>
<input type="text" id="datepicker" name="date">
</body>
</html>

