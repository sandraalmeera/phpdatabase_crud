<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="input_matakuliah.css" />
    <style>
        h1 {
            text-align: center;
        }
        .container {
            width: 400px;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>Input Data</h1>
    <div class="container">
        <form id="form_matakuliah" action="proses_inputmatakuliah.php" method="post">
            <fieldset>
                <legend>Input Data Mata Kuliah</legend>
                <p>
                    <label for="kodeMK">Kode MK :</label>
                    <input type="text" name="kodeMK" id="kodeMK" placeholder="Contoh: MK001" required>
                </p>
                <p>
                    <label for="namaMK">Nama MK :</label>
                    <input type="text" name="namaMK" id="namaMK" placeholder="Contoh: Pemrograman Web" required>
                </p>
                <p>
                    <label for="sks">SKS :</label>
                    <input type="number" name="sks" id="sks" min="1" max="6" required>
                </p>
                <p>
                    <label for="jam">Jam :</label>
                    <input type="number" name="jam" id="jam" min="1" max="6" required>
                </p>
            </fieldset>
            <p>
                <input type="submit" name="input" value="Simpan">
            </p>
        </form>
    </div>
</body>
</html>
