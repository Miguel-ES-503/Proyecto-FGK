	<?php 
	if (isset($_SESSION['message3'])){?>
		<div id="EstiloAlertaCorreo"  class="alert alert-<?= $_SESSION['message4']?> alert-dismissible fade show" role="alert" >
			<center><?= $_SESSION['message3']?></center>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>	
		</div>
		<br>
		<?php if (isset($_SESSION['message3'])==isset($_SESSION['message3'])) 
		{
			$Vaciar = null;
			$_SESSION['message3']=$Vaciar;
		}	}
		?>