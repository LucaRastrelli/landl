<div id="header">
	<header>
		<div class="leftDiv">
			<a href="./main.php" title="LandL">
				<img src="./css/img/Logoneg.png" alt="LandL" class="logo">
			</a> 
		</div>
		<div class="rightDiv">
			<a id="profilo" href='./statistiche.php' title="Profilo" class="header-box">
			<?php
				if(isset($_SESSION['username'])) {
					echo $_SESSION['username'];
					echo "</a>";
					echo "<a id='logout' href='./php/logout.php' title='Logout' class='header-box'>";
					echo "<br>Logout</br>";

				}
				else {
					//echo "<img src='ICONA'>";
					echo "<a id='signup' href='./signup.php' title='Signup' class='header-box'>";
					echo "Registrati";
				}
				//echo "</a>";
			?>
				</a>
		</div>
	</header>
</div>