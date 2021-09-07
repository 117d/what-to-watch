<?php
	include('tmdb_v3/tmdb-api.php');
	
	// if you have no $conf it uses the default config
	$tmdb = new TMDB(); 
	$api_key = "aee9c280a62595241423e04a067bc3ce";
	//Insert your API Key of TMDB
	//Necessary if you use default conf
	$tmdb->setAPIKey($api_key);
	
    $movie_ids = file('movie_ids.txt', FILE_IGNORE_NEW_LINES);
    $movie = $tmdb->getMovie($movie_ids[rand(0, count($movie_ids))]);




?>





<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>RESULTS</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src="https://kit.fontawesome.com/772775928a.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body class="dark">
    <!-- Header -->
    <header>
        <div class="header-cont">
            <nav>
                <a href="index.html" class="logo-with-title">
                     <p><img src="images/favicon.ico" alt="Home"/>What to watch?</p>
                </a>
                <div class="nav-links">
                    <button id="button-demo" onclick="changeColor()" ><i class="far fa-sun"></i></button> 
                    <a href="index.html">Home</a>
                    <a href="index.html#start">Get Started</a>
                    <a href="index.html#about">About</a>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="results-text">
                <h1>Results</h1>
        </div>
        
<!-- RESULTS CARD FOR A MOVIE-->
            <div id="res-card" class="results-card">
                <h1 id="title-text"><?php echo $movie->getTitle() ?></h1>
                <!-- <a href="#" class="fave-button"><i class="fab fa-gratipay"></i></a> -->
                <a href="javascript:void(0)" class="close-button" onclick="closeCard()"><i class="fas fa-times"></i></a>
                <div class="descr-container" id="description">
                    <p><b>Genre:</b> <?php $genres = $movie->getGenres();
                    foreach ($genres as $genre) { 
                        echo $genre->getName() . ', ';
                    }?></p>
                    <p><b>Year:</b> 1995</p>
                    <p><b>Duration:</b> 90 minutes</p>
                    <p><b>Producer:</b><?php $crew = $movie->getCrew();
                    foreach ($crew as $person) {
                        echo ' ' . $person->getName();
                        break; } ?>
                    </p>
                    <p><b>Starring:</b> <?php $cast = $movie->getCast();
                    $i = 0;
                    foreach ($cast as $person) {
                        $i++;
                        if($i == 4) { echo $person->getName() . ' '; break;}
                        else {echo $person->getName() . ', ';} 
                        
                    }
                        ?>
                    </p>
                    <!--<p><b>Budget:</b> $165 million</p> -->

                </div>
                <img id="poster" src="images/default-thumbnail.jpg" alt="Movie Poster">
                <p id="rating">4.5/10</p>
                <p id="movie-desc"> <?php echo $movie->getTagline(); ?>
                </p>
                <?php if ($movie->getTrailer() !== null) {
                echo '<iframe id="movie-trailer" width="250" height="150" src="https://www.youtube.com/embed/' . $movie->getTrailer() . '?autoplay=0&mute=1"></iframe>';
                } 
                else { echo '<iframe id="movie-trailer" width="250" height="150" src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=0&mute=1"></iframe>';} ?>
                <div class="reviews">
                    <div class="review-demo"><i class="fas fa-user"></i>this is review</div>
                    <div class="review-demo"><i class="fas fa-user"></i>this is review</div>
                    <div class="review-demo"><i class="fas fa-user"></i>this is review</div>
                    <div class="review-demo"><i class="fas fa-user"></i>this is review</div>
                </div>
                <!-- <a href="" id="card-button1">WATCH LATER</a> -->
                <!--<a href="" id="card-button2">WATCH</a> -->
                <div class="drop-down" id="card-button2">
                    <button class="drop-button">WATCH</button>
                    <div class="drop-down-content">
                        <a href="https://www.netflix.com/kr-en/title/70305903?source=35" target="_blank" id="netflix_link">Netflix</a>
                        <a href="javascript:void(0)" id="amazon_link">Amazon</a>
                        <a href="javascript:void(0)" id="another_link">Another</a>
                    </div>
                </div>   
                <!-- <a href="" id="card-button3">WATCHED</a> -->
        </div>
        </div>

        
<!-- LINKS ON THE BOTTOM OF RESULTS PAGE -->
        <div class="search-return">
            <div class="search-again">
                <a href="random.php">SEARCH AGAIN</a>
            </div>
            <div class="go-back">
                <a href="index.html">GO BACK</a>
            </div>
        </div>

    </main>
    <!-- Footer -->
    <footer>
        <img src="images/favicon.ico" alt="Home"/>
        <p>What to Watch?</p>
        <p>2021</p>
    </footer>
    <script src='main.js'></script>

</body>
</html>