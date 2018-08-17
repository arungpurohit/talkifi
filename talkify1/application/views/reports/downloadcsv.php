<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Talkifi Admin</title>
<base href="<?php echo base_url();?>/csv_reports/"/>
</head>
<body>

<?php 

$dwnFile = $fileName;

header("Content-type: text/csv");
header("Cache-Control: no-store, no-cache");
header('Content-Disposition: attachment; filename='.$dwnFile);
?>
<script type="text/javascript">
parent.window.close();
</script>

</body>


</html>
