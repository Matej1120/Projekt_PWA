<?php
session_start();
require_once 'connect.php';

$poruka = '';
$greska = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime = trim($_POST['ime'] ?? '');
    $prezime = trim($_POST['prezime'] ?? '');
    $korisnickoIme = trim($_POST['korisnicko_ime'] ?? '');
    $lozinka = $_POST['lozinka'] ?? '';
    $ponovljenaLozinka = $_POST['ponovljena_lozinka'] ?? '';

    if ($lozinka !== $ponovljenaLozinka) {
        $greska = 'Lozinke se ne podudaraju.';
    } else {
        $provjeraSql = "SELECT id FROM korisnik WHERE korisnicko_ime = ?";
        $provjeraStmt = mysqli_stmt_init($dbc);
        mysqli_stmt_prepare($provjeraStmt, $provjeraSql);
        mysqli_stmt_bind_param($provjeraStmt, 's', $korisnickoIme);
        mysqli_stmt_execute($provjeraStmt);
        $provjeraRezultat = mysqli_stmt_get_result($provjeraStmt);

        if (mysqli_num_rows($provjeraRezultat) > 0) {
            $greska = 'Korisničko ime već postoji.';
        } else {
            $hashLozinke = password_hash($lozinka, PASSWORD_BCRYPT);

            $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, 0)";
            $stmt = mysqli_stmt_init($dbc);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssss', $ime, $prezime, $korisnickoIme, $hashLozinke);
                mysqli_stmt_execute($stmt);
                $poruka = 'Registracija je uspješna. Sada se možete prijaviti.';
            } else {
                $greska = 'Greška pri registraciji.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stern - Registracija</title>
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
                <li><a class="active" href="registracija.php">Registracija</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <div class="panel">
            <h1>Registracija korisnika</h1>

            <?php if ($poruka): ?>
                <div class="notice success"><?php echo htmlspecialchars($poruka); ?></div>
            <?php endif; ?>

            <?php if ($greska): ?>
                <div class="notice error"><?php echo htmlspecialchars($greska); ?></div>
            <?php endif; ?>

            <form method="POST" action="registracija.php">
                <div class="form-group">
                    <label for="ime">Ime</label>
                    <input type="text" id="ime" name="ime" required>
                </div>

                <div class="form-group">
                    <label for="prezime">Prezime</label>
                    <input type="text" id="prezime" name="prezime" required>
                </div>

                <div class="form-group">
                    <label for="korisnicko_ime">Korisničko ime</label>
                    <input type="text" id="korisnicko_ime" name="korisnicko_ime" required>
                </div>

                <div class="form-group">
                    <label for="lozinka">Lozinka</label>
                    <input type="password" id="lozinka" name="lozinka" required>
                </div>

                <div class="form-group">
                    <label for="ponovljena_lozinka">Ponovi lozinku</label>
                    <input type="password" id="ponovljena_lozinka" name="ponovljena_lozinka" required>
                </div>

                <button type="submit">Registriraj se</button>
            </form>
        </div>
    </main>

    <footer>
        Nachrichten vom 17.05.2019 | &copy; stern.de GmbH | Registracija
    </footer>
</body>
</html>
