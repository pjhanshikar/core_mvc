<script language="javascript" type="text/javascript">

<?php
if($_SESSION['msg']!=""){ ?>
	alert('<?php  echo $_SESSION['msg'];?>');
	<?php $_SESSION['msg']=""; } ?>
	
</script>