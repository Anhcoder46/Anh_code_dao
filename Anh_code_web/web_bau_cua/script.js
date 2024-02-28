const symbols = ['bầu', 'cua', 'tôm', 'gà', 'nai', 'cá'];

function roll() {
    const cube = document.getElementById('cube');
    const slots = document.getElementById('slots');

    // Clear previous slots
    slots.innerHTML = '';

    // Randomly select a symbol for each slot
    for (let i = 0; i < 3; i++) {
        const randomIndex = Math.floor(Math.random() * symbols.length);
        const symbol = symbols[randomIndex];

        // Create slot element
        const slot = document.createElement('div');
        slot.classList.add('slot');

        // Create image element for the symbol
        const img = document.createElement('img');
        img.src = `${symbol}.png`; // Assuming you have images for each symbol
        img.alt = symbol;

        // Append image to slot
        slot.appendChild(img);

        // Append slot to slots container
        slots.appendChild(slot);
    }

    // Randomly rotate the cube
    const randomRotation = Math.floor(Math.random() * 360);
    cube.style.transform = `rotate(${randomRotation}deg)`;
}