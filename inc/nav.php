<nav>
	<ul id="slide-out" class="sidenav">
		<li><div class="user-view">
			<div class="background">
				<img src="../content/upload/1.jpg">
			</div>
			<a href="#user"><img class="circle" src="../content/upload/avaness.jpeg"></a>
			<a href="#name"><span class="name">Lee Harvey Avaness</span></a>
			<a href="mailto:leeharveyavaness@gmail.com"><span class="email">leeharveyavaness@gmail.com</span></a>
		</div></li>
		<?php if(isset($_SESSION['loggedin'])) : ?>
			<li><a href="../about">About</a></li>
			<li><a href="portfolio">Portfolio</a></li>
			<li><a href="inc/admin">Admin</a></li>
                        <li><a href="../inc/create">Add Post</a></li>
			<li><a href="../logout">Logout</a></li>
		<?php else : ?>
			<li><a href="about">About</a></li>
			<li><a href="portfolio">Portfolio</a></li>
                        <li><a href="../inc/log">Login</a></li>
			<li><a href="#"></a></li>
		<?php endif; ?>
	</ul>
	<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
	<div class="nav-wrapper">
		<div class="container">
			<div class="row">
				<a href="/" class="brand-logo">Avaness</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<?php if(isset($_SESSION['loggedin'])) : ?>
						<li><a href="../about">About</a></li>
						<li><a href="../portfolio">Portfolio</a></li>
						<li><a href="../inc/admin">Admin</a></li>
                                                <li><a href="../inc/create">Add Post</a></li>
						<li><a href="../logout">Logout</a></li>
					<?php else : ?>
						<li><a href="about">About</a></li>
						<li><a href="portfolio">Portfolio</a></li>
                                                <li><a href="../inc/log">Login</a></li>
						<li><a href="#"></a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</nav><br>