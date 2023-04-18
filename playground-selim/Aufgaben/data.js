var data = {
    'produkte': [
        { name: 'Ritterburg', preis: 59.99, kategorie: 1, anzahl: 3 },
        { name: 'Gartenschlau 10m', preis: 6.50, kategorie: 2, anzahl: 5 },
        { name: 'Robomaster' ,preis: 199.99, kategorie: 1, anzahl: 2 },
        { name: 'Pool 250x400', preis: 250, kategorie: 2, anzahl: 8 },
        { name: 'Rasenmähroboter', preis: 380.95, kategorie: 2, anzahl: 4 },
        { name: 'Prinzessinnenschloss', preis: 59.99, kategorie: 1, anzahl: 5 }
    ],
    'kategorien': [
        { id: 1, name: 'Spielzeug' },
        { id: 2, name: 'Garten' }
    ]
};

function getMaxPreis(data)
{
    let max = data.produkte[0].preis;
    for (var i = 0; i < data.produkte.length; i++) 
    {
        var preis = data.produkte[i].preis;
        if(preis > max)
            max = preis;
    }
    console.log(max);
    return max;
}


function getMinPreisProduk(data)
{
    let min = data.produkte[0].preis;
    let produkt = data.produkte[0];
    for (var i = 0; i < data.produkte.length; i++) 
    {
        var preis = data.produkte[i].preis;
        if(preis < min)
        {
            min = preis;
            produkt = data.produkte[1];
        }
    }
    console.log(produkt);
    return produkt;

}

function getPreisSum(data)
{
    let sum = 0;
    for (var i = 0; i < data.produkte.length; i++) 
    {
        sum += data.produkte[i].preis;
    }
    console.log(sum);
    return sum;
}

function getGesamtWert(data)
{
    let sum = 0;
    for (var i = 0; i < data.produkte.length; i++)
    {
        preis = data.produkte[i].preis * data.produkte[i].anzahl;
        sum += preis;
    }
    console.log(sum);
    return sum;
}

function getAnzahlProdukteOfKategorie(data, katerogie)
{
    let gesamtzahl = 0;
    for (var i = 0; i < data.produkte.length; i++)
    {
        if(katerogie == data.produkte[i].kategorie)
            gesamtzahl += data.produkte[i].anzahl
    }
    console.log(gesamtzahl);
    return gesamtzahl
}

//getMaxPreis(data);
//getMinPreisProduk(data);
//getPreisSum(data);
//getGesamtWert(data);
getAnzahlProdukteOfKategorie(data,2);