<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="input.css">
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
        <form id="form_dosen" action="proses_inputdosen.php" method="post">
            <fieldset>
                <legend>Input Data Dosen</legend>
                <p>
                    <label for="idDosen">ID Dosen :</label>
                    <input type="text" name="idDosen" id="idDosen" placeholder="Misal: D001" required>
                </p>
                <p>
                    <label for="namaDosen">Nama Dosen :</label>
                    <input type="text" name="namaDosen" id="namaDosen" required>
                </p>
                <p>
                    <label for="noHP">No HP :</label>
                    <input type="text" name="noHP" id="noHP" placeholder="Contoh: 081222333444" required>
                </p>
            </fieldset>
            <p>
                <input type="submit" name="input" value="Simpan">
            </p>
        </form>
    </div>
</body>
</html>
