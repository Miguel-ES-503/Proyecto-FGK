	<?php 
	if (isset($_SESSION['message5'])){?>
		<div id="EstiloAlerta3"  class="alert alert-<?= $_SESSION['message6']?> alert-dismissible fade show" role="alert" >
			<center><?= $_SESSION['message5']?></center>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>	
		</div>
		<br>
		<?php if (isset($_SESSION['message5'])==isset($_SESSION['message5'])) 
		{
			$Vaciar = null;
			$_SESSION['message5']=$Vaciar;
		}	}
		?>