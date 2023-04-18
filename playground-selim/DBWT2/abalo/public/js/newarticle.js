document.addEventListener("DOMContentLoaded", function() {
    const form = document.createElement('form');
    const br = document.createElement('br');
    const div = document.createElement('br');

    const artikelname = document.createElement('input');
    artikelname.setAttribute('type', 'text');
    artikelname.setAttribute('placeholder', 'Artikelname');
    artikelname.style.width = '250px'
    form.appendChild(artikelname);

    const preis = document.createElement('input');
    preis.setAttribute('type', 'number');
    preis.setAttribute('placeholder', 'Preis in Euro');
    preis.style.width = '250px'
    form.appendChild(preis);
    form.appendChild(div);


    const beschreibung = document.createElement('textarea');
    beschreibung.setAttribute('name', 'content');
    beschreibung.setAttribute('placeholder', 'Beschreibung');
    beschreibung.style.width = '509px'
    beschreibung.style.height = '209px'
    form.appendChild(beschreibung);
    form.appendChild(br);

    const submitButton = document.createElement('button');
    submitButton.setAttribute('type', 'submit');
    submitButton.textContent = 'Speichern';
    form.appendChild(submitButton);

    document.body.appendChild(form);
});
