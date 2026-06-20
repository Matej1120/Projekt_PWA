<?php
session_start();
require_once 'connect.php';

$poruka = '';
$greska = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $korisnickoIme = trim($_POST['korisnicko_ime'] ?? '');
    $lozinka = $_POST['lozinka'] ?? '';

    $sql = "SELECT * FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $korisnickoIme);
    mysqli_stmt_execute($stmt);
    $rezultat = mysqli_stmt_get_result($stmt);
    $korisnik = mysqli_fetch_assoc($rezultat);

    if ($korisnik && password_verify($lozinka, $korisnik['lozinka'])) {
        $_SESSION['korisnicko_ime'] = $korisnik['korisnicko_ime'];
        $_SESSION['ime'] = $korisnik['ime'];
        $_SESSION['prezime'] = $korisnik['prezime'];
        $_SESSION['razina'] = (int)$korisnik['razina'];

        if ((int)$korisnik['razina'] === 1) {
            header('Location: administracija.php');
            exit;
        }

        $poruka = $korisnik['korisnicko_ime'] . ', nemate dovoljna prava za pristup administratorskoj stranici.';
    } else {
        $greska = 'Neispravno korisničko ime i/ili lozinka. Potrebno se prvo registrirati.';
    }
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stern - Login</title>
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
                <li><a class="active" href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <div class="panel">
            <h1>Prijava korisnika</h1>

            <?php if ($poruka): ?>
                <div class="notice success"><?php echo htmlspecialchars($poruka); ?></div>
            <?php endif; ?>

            <?php if ($greska): ?>
                <div class="notice error">
                    <?php echo htmlspecialchars($greska); ?>
                    <br>
                    <a href="registracija.php">Idi na registraciju</a>
                </div>
            <?php endif; ?>

            <form method="POST" action="login.php">
                <div class="form-group">
                    <label for="korisnicko_ime">Korisničko ime</label>
                    <input type="text" id="korisnicko_ime" name="korisnicko_ime" required>
                </div>

                <div class="form-group">
                    <label for="lozinka">Lozinka</label>
                    <input type="password" id="lozinka" name="lozinka" required>
                </div>

                <button type="submit">Prijavi se</button>
            </form>
        </div>
    </main>

    <footer>
        Nachrichten vom 17.05.2019 | &copy; stern.de GmbH | Login
    </footer>
</body>
</html>
