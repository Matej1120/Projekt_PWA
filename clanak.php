<?php
session_start();
require_once 'connect.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT * FROM vijesti WHERE id = ?";
$stmt = mysqli_stmt_init($dbc);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$rezultat = mysqli_stmt_get_result($stmt);
$clanak = mysqli_fetch_assoc($rezultat);

if (!$clanak) {
    die('Članak nije pronađen.');
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($clanak['naslov']); ?> - Stern</title>
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
                <li><a href="kategorija.php?id=politika">Politik</a></li>
                <li><a href="kategorija.php?id=zdravlje">Gesundheit</a></li>
                <li><a href="unos.php">Unos</a></li>
                <li><a href="administracija.php">Administracija</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <div class="article-wrap">
            <div class="article-date"><?php echo date('d. m. Y.', strtotime($clanak['datum'])); ?></div>
            <h1 class="article-title"><?php echo htmlspecialchars($clanak['naslov']); ?></h1>
            <p class="article-summary"><?php echo htmlspecialchars($clanak['sazetak']); ?></p>
            <img class="article-image" src="<?php echo htmlspecialchars($clanak['slika']); ?>" alt="<?php echo htmlspecialchars($clanak['naslov']); ?>">

            <div class="article-content">
                <?php
                $odlomci = preg_split('/\r\n|\r|\n/', $clanak['tekst']);
                foreach ($odlomci as $odlomak) {
                    if (trim($odlomak) !== '') {
                        echo '<p>' . htmlspecialchars($odlomak) . '</p>';
                    }
                }
                ?>
            </div>
        </div>
    </main>

    <footer>
        Nachrichten vom 17.05.2019 | &copy; stern.de GmbH | Eine Donald-Trump-Gebetsmünze und die aberwitzige These dahinter
    </footer>
</body>
</html>
