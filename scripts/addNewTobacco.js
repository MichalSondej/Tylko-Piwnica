function checkOption(selectElement) {
    let brandTobaccoInput = document.getElementById('brandTobacco');
    let brandLabel = document.getElementById('labelBrand');


    if (selectElement.value === 'newBrand') {
        // Jeśli wybrano opcję "Dodaj nową firmę", pokazujemy pole tekstowe
        console.log('newBrand');
        brandTobaccoInput.style.display = 'block';
        brandLabel.style.display = 'block';
    } else {
        // W przeciwnym razie ukrywamy pole tekstowe
        brandTobaccoInput.style.display = 'none';
        brandLabel.style.display = 'none';
        console.log('siurek');
    }
}

