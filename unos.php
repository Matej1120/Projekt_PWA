<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stern - Unos vijesti</title>
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
                <li><a class="active" href="unos.php">Unos</a></li>
                <li><a href="administracija.php">Administracija</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <div class="panel">
            <h1>Unos nove vijesti</h1>

            <form action="skripta.php" method="POST" enctype="multipart/form-data" name="unos_vijesti">
                <div class="form-group">
                    <label for="naslov">Naslov vijesti</label>
                    <input type="text" id="naslov" name="naslov" required>
                </div>

                <div class="form-group">
                    <label for="sazetak">Kratki sažetak vijesti</label>
                    <textarea id="sazetak" name="sazetak" required></textarea>
                </div>

                <div class="form-group">
                    <label for="tekst">Tekst vijesti</label>
                    <textarea id="tekst" name="tekst" required></textarea>
                </div>

                <div class="form-group">
                    <label for="kategorija">Kategorija</label>
                    <select id="kategorija" name="kategorija" required>
                        <option value="">Odaberi kategoriju</option>
                        <option value="politika">Politika</option>
                        <option value="zdravlje">Zdravlje</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="slika">Odabir slike</label>
                    <input type="file" id="slika" name="slika" accept="image/*" required>
                </div>

                <div class="checkbox-row">
                    <input type="checkbox" id="arhiva" name="arhiva">
                    <label for="arhiva">Spremi u arhivu</label>
                </div>

                <button type="submit">Pošalji</button>
            </form>
        </div>
    </main>

    <footer>
        Nachrichten vom 17.05.2019 | &copy; stern.de GmbH | Unos
    </footer>
</body>
</html>
