<?php
session_start();
require_once 'connect.php';

if (!isset($_SESSION['razina']) || (int)$_SESSION['razina'] !== 1) {
    header('Location: login.php');
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $naslov = trim($_POST['naslov'] ?? '');
    $sazetak = trim($_POST['sazetak'] ?? '');
    $tekst = trim($_POST['tekst'] ?? '');
    $kategorija = trim($_POST['kategorija'] ?? '');
    $arhiva = isset($_POST['arhiva']) ? 1 : 0;

    $sqlUpdate = "UPDATE vijesti SET naslov = ?, sazetak = ?, tekst = ?, kategorija = ?, arhiva = ? WHERE id = ?";
    $stmtUpdate = mysqli_stmt_init($dbc);
    mysqli_stmt_prepare($stmtUpdate, $sqlUpdate);
    mysqli_stmt_bind_param($stmtUpdate, 'ssssii', $naslov, $sazetak, $tekst, $kategorija, $arhiva, $id);
    mysqli_stmt_execute($stmtUpdate);

    header('Location: administracija.php');
    exit;
}

$sql = "SELECT * FROM vijesti WHERE id = ?";
$stmt = mysqli_stmt_init($dbc);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$rezultat = mysqli_stmt_get_result($stmt);
$vijest = mysqli_fetch_assoc($rezultat);

if (!$vijest) {
    die('Vijest nije pronađena.');
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stern - Uredi vijest</title>
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
                <li><a class="active" href="administracija.php">Administracija</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <div class="panel">
            <h1>Uredi vijest</h1>

            <form method="POST" action="uredi.php">
                <input type="hidden" name="id" value="<?php echo $vijest['id']; ?>">

                <div class="form-group">
                    <label for="naslov">Naslov</label>
                    <input type="text" id="naslov" name="naslov" value="<?php echo htmlspecialchars($vijest['naslov']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="sazetak">Sažetak</label>
                    <textarea id="sazetak" name="sazetak" required><?php echo htmlspecialchars($vijest['sazetak']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="tekst">Tekst</label>
                    <textarea id="tekst" name="tekst" required><?php echo htmlspecialchars($vijest['tekst']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="kategorija">Kategorija</label>
                    <select id="kategorija" name="kategorija" required>
                        <option value="politika" <?php echo $vijest['kategorija'] === 'politika' ? 'selected' : ''; ?>>Politika</option>
                        <option value="zdravlje" <?php echo $vijest['kategorija'] === 'zdravlje' ? 'selected' : ''; ?>>Zdravlje</option>
                    </select>
                </div>

                <div class="checkbox-row">
                    <input type="checkbox" id="arhiva" name="arhiva" <?php echo $vijest['arhiva'] ? 'checked' : ''; ?>>
                    <label for="arhiva">Arhiva</label>
                </div>

                <button type="submit">Spremi promjene</button>
            </form>
        </div>
    </main>

    <footer>
        Nachrichten vom 17.05.2019 | &copy; stern.de GmbH | Uredi
    </footer>
</body>
</html>
