<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<meta name='description' content=''>
	<meta name='author' content=''>
	<link rel='shortcut icon' href=''>
	<title>CAAL</title>
	<link href='stylesheets/betsy.css' rel='stylesheet' type='text/css'>
<!-- 	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
</head>
<body>
	<div id='banner-bar'>
		<div id='logo'><span>CAAL</span></div>
		<nav id='navbar'>
			<div class='vertically-centered'>
				<a href='/home'><i class="fa fa-home"></i>Home</a>
				<a href='#about'><i class="fa fa-info-circle"></i>About</a>
				<a href='/announcements'><i class="fa fa-bullhorn"></i>Announcements</a>
				<a href='/committees'><i class="fa fa-sitemap"></i>Committees</a>
				<a href='/events'><i class="fa fa-calendar-o"></i>Events</a>
				<a href='/community'><i class="fa fa-group"></i>Community</a>
				<a href='/resources'><i class="fa fa-wrench"></i>Resources</a>
				<a href='#contact'><i class="fa fa-envelope-o"></i>Contact</a>
			</div>
		</nav>
	</div>
	<div id='content'>
		<div id='left-column'>
			<div id='logo-banner'>
				<div>
					Chinese American Association of Lexington
					<div id='logo-chinese'>勒星顿华人协会</div>
				</div>
			</div>
		<img src="http://i.imgur.com/FUMwa76.jpg" width	=100%/>
			<?php
			require "functions.php";
			$b = new BlogManager;
			$b->filterReverseChron(0,3);
			echo $b->toString();
			?>
		</div>
		<div id='right-column'>
			<strong><span style=font-size:25px>Some Stuff</span></strong>
			<p>The Chinese American Association of Lexington is dedicated to something in the form of a couple of different actions located in the place of somewhere.</p>
			<ul><li>Coffee with Cake</li><li>Bubble Tea</li><li>The Milky Way</li></ul>
			<div class='button'>
				<a href="/something">CLICK ME</a>
			</div>
			<div id='text-chinese'>
				<span style=font-size:30px>一些东西</span>
				<p>列克星敦的中国美国商会是一家致力于东西，一对夫妇位于某处的地方不同的操作形式。</p>
				<ul><li>远在银河系的西部旋臂的</li><li>一个小不受注意的黄色太阳</li><li>我不知道中国</li></ul>
			</div>
			<div class='button'>
				<a href="/something"><strong>参与</strong></a>
			</div>
		</div>
	</div>
</body>
</html>
