<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/kalkulator.css">
    <title>Kalkulator Jejak Karbon</title>
</head>
<body>
    <div class="navbar">
        <nav>
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Kalkulator</a></li>
                <li><a href="#">Update</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Panduan</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </nav>
    </div>

    <section class="category-section">
        <h2>Pilih Kategori Penghitungan Jejak Karbon</h2>
        <div class="category-selection">
            <div id="transportasi-darat" class="category-option active" onclick="selectCategory('transportasi-darat')">
                <img src="assets/img/ico-vehicle.png" alt="Transportasi Darat">
                <p>Transportasi Darat</p>
            </div>
            <div id="transportasi-udara" class="category-option" onclick="selectCategory('transportasi-udara')">
                <img src="assets/img/ico-plane.png" alt="Transportasi Udara">
                <p>Transportasi Udara</p>
            </div>
            <div id="daya-rumah" class="category-option" onclick="selectCategory('daya-rumah')">
                <img src="assets/img/ico-energy.png" alt="Daya Rumah Tangga">
                <p>Daya Rumah Tangga</p>
            </div>
            <div id="peralatan-rumah" class="category-option" onclick="selectCategory('peralatan-rumah')">
                <img src="assets/img/ico-microwave.png" alt="Peralatan Rumah Tangga">
                <p>Peralatan Rumah Tangga</p>
            </div>
            <div id="makanan" class="category-option" onclick="selectCategory('makanan')">
                <img src="assets/img/ico-burger.png" alt="Makanan">
                <p>Makanan</p>
            </div>
        </div>
    </section>

    <!-- Section for Transportasi Darat -->
    <section id="section-transportasi-darat" class="calculator-section">
        <h2>TRANSPORTASI DARAT</h2>
        <div class="input-section">
            <h3>Jenis Kendaraan:</h3>
            <div class="vehicle-options">
                <label>
                    <input type="radio" name="vehicle-type" value="mobil" onclick="calculateEmissions()" checked>
                    <img src="assets/img/mobil.png" alt="Mobil">
                    <p>Mobil</p>
                </label>
                <label>
                    <input type="radio" name="vehicle-type" value="motor" onclick="calculateEmissions()">
                    <img src="assets/img/motor.png" alt="Motor">
                    <p>Motor</p>
                </label>
                <label>
                    <input type="radio" name="vehicle-type" value="bus" onclick="calculateEmissions()">
                    <img src="assets/img/bis.png" alt="Bus">
                    <p>Bus</p>
                </label>
                <label>
                    <input type="radio" name="vehicle-type" value="kereta" onclick="calculateEmissions()">
                    <img src="assets/img/kereta.png" alt="Kereta">
                    <p>Kereta Listrik</p>
                </label>
            </div>
        </div>

        <div class="input-section">
            <label for="distance">Jarak Tempuh (KM/Hari):</label>
            <input type="number" id="distance" name="distance" min="0" placeholder="Masukkan jarak tempuh">
        </div>

        <button class="calculate-btn" onclick="calculateEmissions()">Hitung Emisi</button>

        <div class="result">
            <p>Total Emisi: <span>0.00</span> ton CO₂eq</p>
        </div>
    </section>

    <!-- Section for Transportasi Udara -->
    <section id="section-transportasi-udara" class="calculator-section" style="display: none;">
        <h2>TRANSPORTASI UDARA</h2>
        <div class="input-section">
            <h3>Kelas Penerbangan</h3>
            <div class="flight-class">
                <label>
                    <input type="radio" name="flight-class" value="economy" checked>
                    <img src="assets/img/icon-kelaseco.png" alt="Kelas Ekonomi">
                    <p>Kelas Ekonomi</p>
                </label>
                <label>
                    <input type="radio" name="flight-class" value="business">
                    <img src="assets/img/icon-kelasbisnis.png" alt="Kelas Bisnis">
                    <p>Kelas Bisnis</p>
                </label>
            </div>
        </div>

        <!-- Pilihan Satu-Arah atau Dua-Arah -->
        <div class="input-section">
            <h3>Satu-Arah/Dua-Arah</h3>
            <div class="flight-type">
                <label>
                    <input type="radio" name="flight-type" value="one-way" checked>
                    <img src="assets/img/icon-oneway.png" alt="One Way">
                    <p>One Way</p>
                </label>
                <label>
                    <input type="radio" name="flight-type" value="round-trip">
                    <img src="assets/img/icon-roundtrip.png" alt="Round Trip">
                    <p>Round Trip</p>
                </label>
            </div>
        </div>

        <!-- Frekuensi Penerbangan -->
        <div class="input-section">
            <h3>Frekuensi Penerbangan Dalam Setahun</h3>
            <div class="flight-frequency">
                <label><input type="radio" name="flight-frequency" value="1" checked> 1</label>
                <label><input type="radio" name="flight-frequency" value="2"> 2</label>
                <label><input type="radio" name="flight-frequency" value="3"> 3</label>
                <label><input type="radio" name="flight-frequency" value="4"> 4</label>
                <label><input type="radio" name="flight-frequency" value="5"> 5</label>
            </div>
        </div>

        <!-- Jarak Penerbangan -->
        <div class="input-section">
            <h3>Jarak Penerbangan (KM/Trip)</h3>
            <input type="range" id="flight-distance" min="0" max="14000" step="500" value="0" oninput="document.getElementById('distance-display').value = this.value">
            <input type="number" id="distance-display" value="0" readonly> km
        </div>

        <!-- Tombol Penghitungan -->
        <button class="calculate-btn" onclick="calculateFlightEmissions()">Hitung Emisi</button>

        <!-- Hasil Emisi -->
        <div class="result">
            <p>Total Emisi: <span>0.00</span> ton CO₂eq</p>
        </div>
    </section>

    <section id="section-daya-rumah" class="calculator-section" style="display: none;">
        <h2>DAYA RUMAH TANGGA</h2>
        <div class="input-section appliance-list">
            <div class="appliance-item">
                <label for="alat-1">Peralatan 1 (Daya dalam Watt):</label>
                <input type="number" id="alat-1-daya" value="100">
                <label for="alat-1-jam">Lama Pemakaian (jam/hari):</label>
                <input type="number" id="alat-1-jam" value="1">
            </div>
            <div class="appliance-item">
                <label for="alat-2">Peralatan 2 (Daya dalam Watt):</label>
                <input type="number" id="alat-2-daya" value="75">
                <label for="alat-2-jam">Lama Pemakaian (jam/hari):</label>
                <input type="number" id="alat-2-jam" value="1">
            </div>
            <div class="appliance-item">
                <label for="alat-3">Peralatan 3 (Daya dalam Watt):</label>
                <input type="number" id="alat-3-daya" value="200">
                <label for="alat-3-jam">Lama Pemakaian (jam/hari):</label>
                <input type="number" id="alat-3-jam" value="1">
            </div>
        </div>

        <!-- Tombol Hitung -->
        <button class="calculate-btn" onclick="calculateApplianceEmissions()">Hitung Emisi</button>

        <!-- Hasil Emisi -->
        <div class="result">
            <p>Total Emisi Peralatan Rumah Tangga: <span id="appliance-emission">0.00</span> ton CO₂/Tahun</p>
        </div>
    </section>

    <section id="section-peralatan-rumah" class="calculator-section" style="display: none;">
        <h2>PERALATAN RUMAH TANGGA</h2>
        
    </section>

    <section id="section-makanan" class="calculator-section" style="display: none;">
    <h2>MAKANAN</h2>
    <div class="food-options">
            <!-- Opsi Beras -->
            <div class="food-item">
                <label>
                    <input type="checkbox" id="rice-checkbox" value="rice">
                    <img src="assets/img/rice.png" alt="Beras">
                    <p>Beras</p>
                </label>
                <div id="rice-frequency" class="frequency-options">
                    <label><input type="radio" name="rice-frequency" data-emission="0.4"> 1-3 kali per minggu</label>
                    <label><input type="radio" name="rice-frequency" data-emission="0.8"> 4-5 kali per minggu</label>
                    <label><input type="radio" name="rice-frequency" data-emission="1.4"> Setiap Hari</label>
                </div>
            </div>

            <!-- Opsi Seafood -->
            <div class="food-item">
                <label>
                    <input type="checkbox" id="seafood-checkbox" value="seafood">
                    <img src="assets/img/seafood.png" alt="Seafood">
                    <p>Seafood</p>
                </label>
                <div id="seafood-frequency" class="frequency-options">
                    <label><input type="radio" name="seafood-frequency" data-emission="1.5"> 1-3 kali per minggu</label>
                    <label><input type="radio" name="seafood-frequency" data-emission="2.5"> 4-5 kali per minggu</label>
                    <label><input type="radio" name="seafood-frequency" data-emission="4.0"> Setiap Hari</label>
                </div>
            </div>

            <!-- Opsi Unggas -->
            <div class="food-item">
                <label>
                    <input type="checkbox" id="poultry-checkbox" value="poultry">
                    <img src="assets/img/poultry.png" alt="Unggas">
                    <p>Unggas</p>
                </label>
                <div id="poultry-frequency" class="frequency-options">
                    <label><input type="radio" name="poultry-frequency" data-emission="0.8"> 1-3 kali per minggu</label>
                    <label><input type="radio" name="poultry-frequency" data-emission="1.5"> 4-5 kali per minggu</label>
                    <label><input type="radio" name="poultry-frequency" data-emission="2.3"> Setiap Hari</label>
                </div>
            </div>

            <!-- Opsi Domba -->
            <div class="food-item">
                <label>
                    <input type="checkbox" id="lamb-checkbox" value="lamb">
                    <img src="assets/img/lamb.png" alt="Domba">
                    <p>Domba</p>
                </label>
                <div id="lamb-frequency" class="frequency-options">
                    <label><input type="radio" name="lamb-frequency" data-emission="2.0"> 1-3 kali per minggu</label>
                    <label><input type="radio" name="lamb-frequency" data-emission="3.5"> 4-5 kali per minggu</label>
                    <label><input type="radio" name="lamb-frequency" data-emission="5.0"> Setiap Hari</label>
                </div>
            </div>

            <!-- Opsi Sapi -->
            <div class="food-item">
                <label>
                    <input type="checkbox" id="beef-checkbox" value="beef">
                    <img src="assets/img/beef.png" alt="Sapi">
                    <p>Sapi</p>
                </label>
                <div id="beef-frequency" class="frequency-options">
                    <label><input type="radio" name="beef-frequency" data-emission="2.5"> 1-3 kali per minggu</label>
                    <label><input type="radio" name="beef-frequency" data-emission="4.0"> 4-5 kali per minggu</label>
                    <label><input type="radio" name="beef-frequency" data-emission="6.5"> Setiap Hari</label>
                </div>
            </div>

            <!-- Opsi Olahan Susu -->
            <div class="food-item">
                <label>
                    <input type="checkbox" id="dairy-checkbox" value="dairy">
                    <img src="assets/img/dairy.png" alt="Olahan Susu">
                    <p>Olahan Susu</p>
                </label>
                <div id="dairy-frequency" class="frequency-options">
                    <label><input type="radio" name="dairy-frequency" data-emission="0.7"> 1-3 kali per minggu</label>
                    <label><input type="radio" name="dairy-frequency" data-emission="1.3"> 4-5 kali per minggu</label>
                    <label><input type="radio" name="dairy-frequency" data-emission="2.0"> Setiap Hari</label>
                </div>
            </div>
    </section>
<script src="assets/js/function.js"></script>
    <footer>
        <div class="subscribe">
            <h3>Tetap Terhubung Bersama Kami</h3>
            <input type="email" placeholder="Tuliskan Email Kamu">
            <button>Submit</button>
        </div>
        <p>&copy; Copyright 2024, All right reserved by IESR</p>
    </footer>
</body> 
</html>
