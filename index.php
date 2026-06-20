<?php
session_start();
require_once 'connect.php';

$politikaUpit = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = 'politika' ORDER BY datum DESC LIMIT 3";
$zdravljeUpit = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = 'zdravlje' ORDER BY datum DESC LIMIT 3";

$politikaRezultat = mysqli_query($dbc, $politikaUpit);
$zdravljeRezultat = mysqli_query($dbc, $zdravljeUpit);
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stern - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="container">
        <div class="header-top">
            <a href="index.php" style="display:flex; align-items:center; gap:16px;">
                <div class="logo-mark"></div>
                <div class="logo-text">stern</div>
            </a>
        </div>

        <nav>
            <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="kategorija.php?id=politika">Politik</a></li>
                <li><a href="kategorija.php?id=zdravlje">Gesundheit</a></li>
                <li><a href="unos.php">Unos</a></li>
                <li><a href="administracija.php">Administracija</a></li>
                <?php if (isset($_SESSION['korisnicko_ime'])): ?>
                    <li><a href="logout.php">Odjava</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main class="container">
        <h2 class="section-title">Politik <span class="arrow">›</span></h2>
        <section class="news-grid">
            <?php while ($red = mysqli_fetch_assoc($politikaRezultat)): ?>
                <article class="news-card">
                    <a href="clanak.php?id=<?php echo $red['id']; ?>">
                        <img src="<?php echo htmlspecialchars($red['slika']); ?>" alt="<?php echo htmlspecialchars($red['naslov']); ?>">
                        <div class="card-tag">Europawahl</div>
                        <h3><?php echo htmlspecialchars($red['naslov']); ?></h3>
                        <p><?php echo htmlspecialchars($red['sazetak']); ?></p>
                    </a>
                </article>
            <?php endwhile; ?>
        </section>

        <h2 class="section-title">Gesundheit <span class="arrow">›</span></h2>
        <section class="news-grid">
            <?php while ($red = mysqli_fetch_assoc($zdravljeRezultat)): ?>
                <article class="news-card">
                    <a href="clanak.php?id=<?php echo $red['id']; ?>">
                        <img src="<?php echo htmlspecialchars($red['slika']); ?>" alt="<?php echo htmlspecialchars($red['naslov']); ?>">
                        <div class="card-tag">Gesund und schlank</div>
                        <h3><?php echo htmlspecialchars($red['naslov']); ?></h3>
                        <p><?php echo htmlspecialchars($red['sazetak']); ?></p>
                    </a>
                </article>
            <?php endwhile; ?>
        </section>
    </main>

    <footer>
        Nachrichten vom 17.05.2019 | &copy; stern.de GmbH | Home
    </footer>
</body>
</html>
