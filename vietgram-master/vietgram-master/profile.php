<?php
    session_start();
    include "koneksi.php";
    $dataFoto = mysqli_query($conn,"select * from photo 
    where username = '".$_SESSION['username']."'");
    $banyakDataFoto = mysqli_num_rows($dataFoto);
    while($photo[] = mysqli_fetch_array($dataFoto));
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navigation">
        <div class="navigation__column">
            <a href="feed.php">
                <img src="images/logo.png" />
            </a>
        </div>
        <div class="navigation__column">
            <i class="fa fa-search"></i>
            <form action = "search.php" method ="POST"><input name = "key" type="text" placeholder="Search"></form>
        </div>
        <div class="navigation__column">
            <ul class="navigations__links">
                <li class="navigation__list-item">
                    <a href="explore.php" class="navigation__link">
                        <i class="fa fa-compass fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="#" class="navigation__link">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="profile.php" class="navigation__link">
                        <i class="fa fa-user-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="logout.php" class="navigation__link">
                        <i class="fa fa-sign-out fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main id="profile">
        <header class="profile__header">
            <div class="profile__column">
                <img src="images/4x6.jpg" />
            </div>
            <div class="profile__column">
                <div class="profile__title">
                    <h3 class="profile__username"><?php echo $_SESSION['username']?></h3>
                    <a href="edit-profile.php">Edit profile</a>
                    <i class="fa fa-cog fa-lg"></i>
                </div>
                <ul class="profile__stats">
                    <li class="profile__stat">
                        <span class="stat__number"><?php echo $banyakDataFoto ?></span> posts
                    </li>
                    <li class="profile__stat">
                        <span class="stat__number">9999</span> followers
                    </li>
                    <li class="profile__stat">
                        <span class="stat__number">1</span> following
                    </li>
                </ul>
                <p class="profile__bio">
                    <span class="profile__full-name">
                        <?php echo $_SESSION["name"]."<br>" ?>
                    </span> 
                    <?php echo $_SESSION["bio"]?>
                    <a href="#"><?php echo $_SESSION["website"]?></a>
                    <?php
                    echo $_SESSION["email"]."<br>";
                    echo $_SESSION["hp"]."<br>";
                    echo $_SESSION["gender"];
                    ?>
                </p>
            </div>
        </header>
        <section class="profile__photos">
        <?php
            for($j=0; $j<$banyakDataFoto;$j++) {
        ?>
            <div class="profile__photo">
                <img height = "300px" width = "300px" src="<?php echo $photo[$j][1]; ?>" />
                <div class="profile__photo-overlay">
                    <span class="overlay__item">
                        <i class="fa fa-heart"></i>
                        <?php echo $photo[$j][3]; ?>
                    </span>
                    <span class="overlay__item">
                        <i class="fa fa-comment"></i>
                        12
                    </span>
                </div>
            </div>
            <?php } ?>
            
        </section>
    </main>
    <footer class="footer">
        <div class="footer__column">
            <nav class="footer__nav">
                <ul class="footer__list">
                    <li class="footer__list-item"><a href="#" class="footer__link">About Us</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Support</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Blog</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Press</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Api</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Jobs</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Privacy</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Terms</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Directory</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Language</a></li>
                </ul>
            </nav>
        </div>
        <div class="footer__column">
            <span class="footer__copyright">© 2017 Vietgram</span>
        </div>
    </footer>
</body>

</html>