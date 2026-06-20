<?php
session_start();
require_once 'connect.php';

$prijavljen = isset($_SESSION['korisnicko_ime']);
$admin = isset($_SESSION['razina']) && (int)$_SESSION['razina'] === 1;

$sql = "SELECT * FROM vijesti ORDER BY datum DESC";
$rezultat = mysqli_query($dbc, $sql);
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stern - Administracija</title>
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
                <li><a class="active" href="administracija.php">Administracija</a></li>
                <?php if ($prijavljen): ?>
                    <li><a href="logout.php">Odjava</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main class="container">
        <div class="panel" style="max-width: 100%;">
            <h1>Administracija</h1>

            <?php if (!$prijavljen): ?>
                <div class="notice error">
                    Morate se prvo prijaviti. <a href="login.php">Prijava</a> |
                    <a href="registracija.php">Registracija</a>
                </div>
            <?php elseif (!$admin): ?>
                <div class="notice error">
                    <?php echo htmlspecialchars($_SESSION['korisnicko_ime']); ?>, nemate dovoljna prava za pristup ovoj stranici.
                </div>
            <?php else: ?>
                <div class="notice success">
                    Prijavljeni ste kao administrator: <?php echo htmlspecialchars($_SESSION['korisnicko_ime']); ?>
                </div>

                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naslov</th>
                            <th>Kategorija</th>
                            <th>Arhiva</th>
                            <th>Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($red = mysqli_fetch_assoc($rezultat)): ?>
                            <tr>
                                <td><?php echo $red['id']; ?></td>
                                <td><?php echo htmlspecialchars($red['naslov']); ?></td>
                                <td><?php echo htmlspecialchars($red['kategorija']); ?></td>
                                <td><?php echo $red['arhiva'] ? 'Da' : 'Ne'; ?></td>
                                <td>
                                    <div class="action-links">
                                        <a class="btn small-btn" href="uredi.php?id=<?php echo $red['id']; ?>">Uredi</a>
                                        <a class="btn small-btn" href="obrisi.php?id=<?php echo $red['id']; ?>" onclick="return confirm('Jeste li sigurni da želite obrisati vijest?');">Obriši</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        Nachrichten vom 17.05.2019 | &copy; stern.de GmbH | Administracija
    </footer>
</body>
</html>
