nameBtn = document.getElementById('nameBtn');
textBtn = nameBtn.textContent;

textWithoutSpaces = textBtn.replace(/\s+/g, '');

text = textWithoutSpaces.charAt(0).toUpperCase() + textWithoutSpaces.slice(1);

nameBtn.textContent = text; 

