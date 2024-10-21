// Function to handle category selection
function selectCategory(category) {
    const categories = document.querySelectorAll('.category-option');
    categories.forEach(cat => {
        cat.classList.remove('active');
    });
    document.getElementById(category).classList.add('active');

    // Hide all calculator sections
    const sections = document.querySelectorAll('.calculator-section');
    sections.forEach(section => {
        section.style.display = 'none';
    });

    // Show the selected category's section
    document.getElementById(`section-${category}`).style.display = 'block';
}

// Emisi per km untuk setiap jenis kendaraan (dalam ton CO₂eq/km)
const emissionFactors = {
    mobil: 0.00025,  // contoh, 250 gram CO₂/km
    motor: 0.00015,  // contoh, 150 gram CO₂/km
    bus: 0.0001,     // contoh, 100 gram CO₂/km
    kereta: 0.00005  // contoh, 50 gram CO₂/km (untuk kereta listrik)
};

// Fungsi untuk menghitung emisi karbon
function calculateEmissions() {
    const distance = document.getElementById('distance').value;
    const vehicleType = document.querySelector('input[name="vehicle-type"]:checked').value;

    // Hitung total emisi
    const totalEmissions = distance * emissionFactors[vehicleType];

    // Tampilkan hasil
    document.querySelector('.result span').textContent = totalEmissions.toFixed(3);
}

function calculateCarbonFootprint() {
    let totalEmission = 0;

    // Get all selected food items
    const selectedFoods = document.querySelectorAll('.food-item input[type="checkbox"]:checked');

    selectedFoods.forEach(food => {
        // Get the name of the food
        const foodName = food.value;

        // Find the selected frequency for this food
        const frequencyInput = document.querySelector(`input[name="${foodName}-frequency"]:checked`);

        if (frequencyInput) {
            // Get the emission value from the selected frequency
            const emission = parseFloat(frequencyInput.dataset.emission);
            totalEmission += emission;
        }
    });

    // Display the total emission
    document.getElementById('carbon-result').innerText = `Total Jejak Karbon: ${totalEmission.toFixed(2)} kg CO₂ per minggu`;
}

// Function to show/hide frequency options with fade-in animation
function toggleFrequency(food) {
    const checkbox = document.getElementById(`${food}-checkbox`);
    const frequencyDiv = document.getElementById(`${food}-frequency`);

    checkbox.addEventListener('change', () => {
        if (checkbox.checked) {
            frequencyDiv.classList.add('show');
        } else {
            frequencyDiv.classList.remove('show');
            // Reset the selected frequency when the checkbox is unchecked
            const radios = document.querySelectorAll(`input[name="${food}-frequency"]`);
            radios.forEach(radio => radio.checked = false);
        }
    });
}

// Call toggleFrequency for each food item
['rice', 'seafood', 'poultry', 'lamb', 'beef', 'dairy'].forEach(food => toggleFrequency(food));

function calculateFlightEmissions() {
    const flightClass = document.querySelector('input[name="flight-class"]:checked').value;
    const flightType = document.querySelector('input[name="flight-type"]:checked').value;
    const frequency = document.querySelector('input[name="flight-frequency"]:checked').value;
    const distance = document.getElementById('flight-distance').value;

    const oneWayMultiplier = flightType === 'round-trip' ? 2 : 1;
    const totalEmissions = flightEmissionFactors[flightClass] * distance * oneWayMultiplier * frequency;

    document.querySelector('.result span').textContent = totalEmissions.toFixed(3);
}