const Client = require('node-regon');

// Klucz produkcyjny
const key = "e6b53a07ba8b47318a0a";

// Pobierz NIP z argumentów
const nip = process.argv[2];

(async () => {
    let gus = Client.createClient({
        key: key,
        birVersion: '1.1', // Możesz zmienić wersję API
    });

    try {
        const companyInfo = await gus.findByNip(nip);
        console.log(JSON.stringify(companyInfo)); // Zwróć dane w JSON
    } catch (error) {
        console.error("Error:", error);
    }
})();
