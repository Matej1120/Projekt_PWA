<?php
session_start();
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: unos.php');
    exit;
}

$naslov = trim($_POST['naslov'] ?? '');
$sazetak = trim($_POST['sazetak'] ?? '');
$tekst = trim($_POST['tekst'] ?? '');
$kategorija = trim($_POST['kategorija'] ?? '');
$arhiva = isset($_POST['arhiva']) ? 1 : 0;

$dozvoljeneKategorije = ['politika', 'zdravlje'];
if (!in_array($kategorija, $dozvoljeneKategorije, true)) {
    die('Neispravna kategorija.');
}

$putanjaSlike = 'assets/img/placeholder.jpg';

if (isset($_FILES['slika']) && $_FILES['slika']['error'] === 0) {
    $nazivSlike = basename($_FILES['slika']['name']);
    $ekstenzija = strtolower(pathinfo($nazivSlike, PATHINFO_EXTENSION));
    $dozvoljeneEkstenzije = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (in_array($ekstenzija, $dozvoljeneEkstenzije, true)) {
        if (!is_dir('assets/img/uploads')) {
            mkdir('assets/img/uploads', 0777, true);
        }

        $novoIme = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $nazivSlike);
        $odrediste = 'assets/img/uploads/' . $novoIme;

        if (move_uploaded_file($_FILES['slika']['tmp_name'], $odrediste)) {
            $putanjaSlike = $odrediste;
        }
    }
}

$sql = "INSERT INTO vijesti (naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($dbc);

if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, 'sssssi', $naslov, $sazetak, $tekst, $putanjaSlike, $kategorija, $arhiva);
    mysqli_stmt_execute($stmt);
} else {
    die('Greška pri spremanju vijesti.');
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stern - Spremljena vijest</title>
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
            <div class="notice success">Vijest je uspješno spremljena.</div>
            <h1 class="article-title"><?php echo htmlspecialchars($naslov); ?></h1>
            <p class="article-summary"><?php echo htmlspecialchars($sazetak); ?></p>
            <img class="article-image" src="<?php echo htmlspecialchars($putanjaSlike); ?>" alt="<?php echo htmlspecialchars($naslov); ?>">

            <div class="article-content">
                <?php
                $odlomci = preg_split('/\r\n|\r|\n/', $tekst);
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
        Nachrichten vom 17.05.2019 | &copy; stern.de GmbH | Vijest
    </footer>
</body>
</html>
