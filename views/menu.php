<header class="page-header col-12 col-sm-12 bg-primary white">
	<div class="container flex flex-align-center flex-justify-space">
		<h1 class="page-logo bold muted display-1 normal">Zakład stolarski Waldemar</h1>
		<nav>
			<ul class="flex nav-ul">
				<li>
					<a href="index.php" class="white link block p-2 light">Strona Główna</a>
				</li>
				<?php
					if(isset($_SESSION['is_logged']) && $_SESSION['is_logged'] == true){ ?>
		
					
					
						<li>
							<a href="panel.php" class="white link block p-2 light">Panel</a>
						</li>
						<li>
							<a href="cart.php" class="white link block p-2 light">Koszyk</a>
						</li>
						<li>
							<a href="logout.php" class="white link block p-2 light">Wyloguj się</a>
						</li>
						
					<?php } else { ?>
						<li>
							<a href="login.php" class="white link block p-2 light">Zaloguj się</a>
						</li>
						<li>
							<a href="register.php" class="white link block p-2 light">Zarejestruj się</a>
						</li>
					<?php };
				?>
			</ul>
		</nav>
	</div>
</header>