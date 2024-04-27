<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
			
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
				<li class="nav-item" id="myButton" style="display: none;"><a href="<?php echo $link;?>" class="nav-link"><?php echo $name; ?></a></li>
				<!-- <li class="nav-item">
					<form method="post"> 
						<input type="submit" name="logout" value="logout" class="nav-link">
					</form>
				</li> -->
	        </ul>
	      </div>
	    </div>
		<script>
				// Select the nav-link elements
				const navLinks = document.querySelectorAll('.navbar .nav-link');

				// Add event listener for hover
				navLinks.forEach(navLink => {
				navLink.addEventListener('mouseover', () => {
					if (document.querySelector('.navbar').classList.contains('scrolled')) {
					navLink.style.backgroundColor = '#f34949';
					navLink.style.color = 'white';
					navLink.style.setProperty('color', 'white', 'important');
					}
				});

				navLink.addEventListener('mouseout', () => {
					if (document.querySelector('.navbar') && !navLink.matches(':hover') ) {
					navLink.style.backgroundColor = '';
					navLink.style.color = '';
					}
				});
				});

		</script>
</nav>