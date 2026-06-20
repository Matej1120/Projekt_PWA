<?php
session_start();
require_once 'connect.php';

$dozvoljeneKategorije = ['politika', 'zdravlje'];
$kategorija = $_GET['id'] ?? 'politika';

if (!in_array($kategorija, $dozvoljeneKategorije, true)) {
    $kategorija = 'politika';
}

$sql = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = ? ORDER BY datum DESC";
$stmt = mysqli_stmt_init($dbc);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, 's', $kategorija);
mysqli_stmt_execute($stmt);
$rezultat = mysqli_stmt_get_result($stmt);

$naslovKategorije = $kategorija === 'politika' ? 'Politik' : 'Gesundheit';
$oznaka = $kategorija === 'politika' ? 'Politik' : 'Gesundheit';
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stern - <?php echo $naslovKategorije; ?></title>
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
                <li><a href="index.php">Home</a></li>
                <li><a class="<?php echo $kategorija === 'politika' ? 'active' : ''; ?>" href="kategorija.php?id=politika">Politik</a></li>
                <li><a class="<?php echo $kategorija === 'zdravlje' ? 'active' : ''; ?>" href="kategorija.php?id=zdravlje">Gesundheit</a></li>
                <li><a href="unos.php">Unos</a></li>
                <li><a href="administracija.php">Administracija</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <h1 class="section-title"><?php echo $naslovKategorije; ?> <span class="arrow">›</span></h1>

        <section class="news-grid">
            <?php while ($red = mysqli_fetch_assoc($rezultat)): ?>
                <article class="news-card">
                    <a href="clanak.php?id=<?php echo $red['id']; ?>">
                        <img src="<?php echo htmlspecialchars($red['slika']); ?>" alt="<?php echo htmlspecialchars($red['naslov']); ?>">
                        <div class="card-tag"><?php echo $oznaka; ?></div>
                        <h3><?php echo htmlspecialchars($red['naslov']); ?></h3>
                        <p><?php echo htmlspecialchars($red['sazetak']); ?></p>
                    </a>
                </article>
            <?php endwhile; ?>
        </section>
    </main>

    <footer>
        Nachrichten vom 17.05.2019 | &copy; stern.de GmbH | <?php echo $naslovKategorije; ?>
    </footer>
</body>
</html>
