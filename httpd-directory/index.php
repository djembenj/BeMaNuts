<?php

include("include/connexion.php");
include("include/auth.php");
include("include/equipement.php");
include("include/menu.php");

if ( $_GET['LANG'] ) {
  $LANG=$_GET['LANG'];
}
else {
  $_SESSION['Lang']="fr";
  $LANG="fr";
}
include(".config_$LANG.php");
session_start();
//verif_session();
entete($LANG);
?>
	<body class="homepage is-preload">
		<div id="page-wrapper">
			<!-- Header -->
				<section id="header">
					<div class="container">
							<?php menu();?>
							<h2><?php echo $nuts_title;?></h2>
						<div class="row aln-center">
							<div class="col-4 col-6-medium col-12-small">
									<section>
										<a href="calculator.php" class="image featured"><img src="images/info/calculator.png" alt="" /></a>
										<header>
											<h3><?php echo $home1;?></h3>
										</header>
										<p><?php echo $nuts_info_intro;?></p>
									</section>
							</div>
							<div class="col-4 col-6-medium col-12-small">
									<section>
										<a href="calculator.php#" class="image featured"><img src="images/info/nutsinfomiddel.png" alt="" /></a>
										<header>
											<h3><?php echo $home2;?></h3>
										</header>
										<p><?php echo $nuts_info_introbis;?></p>
									</section>
							</div>
							<div id="content" class="col-4 col-6-medium col-12-small">
									<section>
										<a href="calculator.php#" class="image featured"><img src="images/menu/datalake.png" alt="" /></a>
										<header>
											<h3><?php echo $home3;?></h3>
										</header>
											<p><?php  echo $nuts_info_introter;?></p>
									</section>
							</div>
							<div class="col-12">
								<ul class="actions">
									<li><a href="calculator.php" class="button icon solid fa-file"><?php echo $ici;?></a></li>
								</ul>
							</div>
						</div>
					</div>
				</section>
			<!-- Banner -->
				<section id="banner">
					<div class="container">
						<p><?php echo $nuts_info_intro1;?></p>
					</div>
				</section>
			<!-- Main -->
				<section id="main">
					<div class="container">
						<div class="row">
							<!-- Content -->
								<div id="content" class="col-8 col-12-medium">
									<!-- Post -->
										<article class="box post">
											<h3><?php echo $nuts_info_intro3;?></h3>
											<p><?php echo $nuts_info_intro2;?></p>
											<a href="#"><img src="images/menu/arbre.png" alt="" /></a>
											<p><?php echo $nuts_info_intro4;?></p>
											<img src="images/info/full-informations.png" alt=""  />
											<ul class="actions">
												<li><a href="calculator.php" class="button icon solid fa-file"><?php echo $ici;?></a></li>
											</ul>
												<p><?php echo $help;?></p>
										<iframe width="350" height="" src="https://www.youtube.com/embed/3BSpE5FzIBE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
										</article>
								</div>
							<!-- Sidebar -->
								<div id="sidebar" class="col-4 col-12-medium">
								<!-- Excerpts -->
										<section>
											<ul class="divided">
												<li>
												<!-- Excerpt -->
														<article class="box excerpt">
															<header>
																<span class="date">Février 01</span>
																<h3><a href="#">Nouvelle version</a></h3>
															</header>
															<p>Vous avez été nombreux à utiliser la Calculatrice dès son lancement, et donc voici une version Web Responsive, afin de vous apporter plus de confort</p>
														</article>

												</li>
												<li>
												<!-- Excerpt -->
														<article class="box excerpt">
															<header>
																<span class="date">Janvier 28</span>
																<h3><a href="#">Wahooo</a></h3>
															</header>
															<p>Merci Merci, vous avez été 707 à utiliser Nuts pour sa première journée.</p>
														</article>

												</li>
												<li>
													<!-- Excerpt -->
														<article class="box excerpt">
															<header>
																<span class="date">Janvier 27</span>
																<h3><a href="#">Let's Go</a></h3>
															</header>
															<p>Après plusieurs mois de documentations, de prises de contacts avec les constructeur Nuts, sort la version 1.0 de sa calculatrice grand public.</p>
														</article>

												</li>
											</ul>
										</section>
								</div>
						</div>
					</div>
				</section>

			<?php footer();?>
