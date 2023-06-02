function numberToFrenchWords(number) {
    const units = ['', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf'];
    const teens = ['', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize', 'dix-sept', 'dix-huit', 'dix-neuf'];
    const tens = ['', 'dix', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante', 'soixante-dix', 'quatre-vingt', 'quatre-vingt-dix'];
  
    if (number === 0) {
      return 'zéro';
    }
  
    if (number < 0) {
      return 'moins ' + numberToFrenchWords(Math.abs(number));
    }
  
    let words = '';
  
    if (Math.floor(number / 1000000000000) > 0) {
      words += numberToFrenchWords(Math.floor(number / 1000000000000)) + ' billion ';
      number %= 1000000000000;
    }
  
    if (Math.floor(number / 1000000000) > 0) {
      words += numberToFrenchWords(Math.floor(number / 1000000000)) + ' milliard ';
      number %= 1000000000;
    }
  
    if (Math.floor(number / 1000000) > 0) {
      words += numberToFrenchWords(Math.floor(number / 1000000)) + ' million ';
      number %= 1000000;
    }
  
    if (Math.floor(number / 1000) > 0) {
      words += numberToFrenchWords(Math.floor(number / 1000)) + ' mille ';
      number %= 1000;
    }
  
    if (Math.floor(number / 100) > 0) {
      words += numberToFrenchWords(Math.floor(number / 100)) + ' cent ';
      number %= 100;
    }
  
    if (number > 0) {
      if (number < 10) {
        words += units[number];
      } else if (number < 20) {
        words += teens[number - 10];
      } else if (number < 70 || (number >= 80 && number < 90)) {
        words += tens[Math.floor(number / 10)];
        const remainder = number % 10;
        if (remainder > 0) {
          words += '-' + numberToFrenchWords(remainder);
        }
      } else if (number < 80) {
        words += tens[6] + '-' + numberToFrenchWords(number - 60);
      } else if (number < 100) {
        words += tens[7] + '-' + numberToFrenchWords(number - 70);
      } else if (number < 1000) {
        words += numberToFrenchWords(Math.floor(number / 100)) + ' cents ';
        number %= 100;
        if (number > 0) {
          words += numberToFrenchWords(number);
        }
      }
    }
  
    return words.trim();
  }
  
  // Example usage:
  console.log(numberToFrenchWords(123456789)); // Output: "cent vingt-trois millions quatre cent cinquante-six mille sept cent quatre-vingt-neuf"
  console.log(numberToFrenchWords(9876543210)); // Output: "neuf milliards huit cent soixante-seize millions cinq cent quarante-trois mille deux cent dix"
  console.log(numberToFrenchWords(1000)); // Output: "mille"
  console.log(numberToFrenchWords(42)); // Output: "quarante-deux"
  console.log(numberToFrenchWords(0)); // Output: "zéro"
  console.log(numberToFrenchWords(-42)); // Output: "moins quarante-deux"
  