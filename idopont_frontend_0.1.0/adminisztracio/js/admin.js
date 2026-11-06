
/* ========================================
   1. Tesztadatok
======================================== */

const entries = [
    {
        name: 'Kiss Anna',
        service: 'Állapotfelmérés',
        urgency: 'Normál',
        status: 'Új'
    },
    {
        name: 'Nagy Péter',
        service: 'Fogászati konzultáció',
        urgency: 'Sürgős',
        status: 'Feldolgozás alatt'
    },
    {
        name: 'Tóth Éva',
        service: 'Röntgen',
        urgency: 'Normál',
        status: 'Egyeztetve'
    },
    {
        name: 'Farkas Dóra',
        service: 'Fogtömés',
        urgency: 'Normál',
        status: 'Új'
    }
];

/* ========================================
   2. Táblázat törzsének kiválasztása
======================================== */

const tbody = document.getElementById('rows');

/* ========================================
   3. Táblázat megjelenítése és frissítése
======================================== */

function render() {

    // Keresési szöveg lekérése
    const q = document
        .getElementById('search')
        .value
        .toLocaleLowerCase('hu');

    // Státuszszűrő értéke
    const s = document
        .getElementById('statusFilter')
        .value;

    // Sürgősségi szűrő értéke
    const u = document
        .getElementById('urgencyFilter')
        .value;

    // Korábbi táblázatsorok eltávolítása
    tbody.replaceChildren();

    // Jelentkezések szűrése és megjelenítése
    entries
        .filter(x =>
            (x.name + ' ' + x.service)
                .toLocaleLowerCase('hu')
                .includes(q) &&

            (!s || x.status === s) &&

            (!u || x.urgency === u)
        )
        .forEach(x => {

            // Új táblázatsor létrehozása
            const tr = document.createElement('tr');

            // Jelentkezés adatainak megjelenítése
            for (const val of [
                x.name,
                x.service,
                x.urgency,
                x.status
            ]) {
                const td = document.createElement('td');

                td.textContent = val;

                tr.append(td);
            }

            // Státuszmódosító cella
            const td = document.createElement('td');

            // Legördülő lista létrehozása
            const select = document.createElement('select');

            select.setAttribute(
                'aria-label',
                x.name + ' státusza'
            );

            // Választható státuszok
            for (const status of [
                'Új',
                'Feldolgozás alatt',
                'Egyeztetve'
            ]) {
                const o = document.createElement('option');

                o.textContent = status;

                select.append(o);
            }

            // Aktuális státusz beállítása
            select.value = x.status;

            // Státuszváltozás kezelése
            select.addEventListener('change', () => {

                x.status = select.value;

                render();
            });

            // Legördülő lista hozzáadása a cellához
            td.append(select);

            // Cella hozzáadása a sorhoz
            tr.append(td);

            // Sor hozzáadása a táblázathoz
            tbody.append(tr);
        });

    /* ========================================
       4. Statisztikák frissítése
    ======================================== */

    for (const [id, status] of [
        ['newCount', 'Új'],
        ['progressCount', 'Feldolgozás alatt'],
        ['doneCount', 'Egyeztetve']
    ]) {
        document.getElementById(id).textContent =
            entries.filter(x => x.status === status).length;
    }
}

/* ========================================
   5. Keresés és szűrők eseménykezelése
======================================== */

for (const id of [
    'search',
    'statusFilter',
    'urgencyFilter'
]) {
    document
        .getElementById(id)
        .addEventListener('input', render);
}

/* ========================================
   6. Adminisztrációs fülek kezelése
======================================== */

document.querySelectorAll('[data-tab]').forEach(b => {

    b.addEventListener('click', () => {

        // Aktív fül megjelölése
        document.querySelectorAll('[data-tab]').forEach(x => {

            x.classList.toggle('active', x === b);
        });

        // Jelentkezések fül megjelenítése / elrejtése
        document
            .getElementById('applications')
            .classList.toggle(
                'hide',
                b.dataset.tab !== 'applications'
            );

        // Jogosultságok fül megjelenítése / elrejtése
        document
            .getElementById('permissions')
            .classList.toggle(
                'hide',
                b.dataset.tab !== 'permissions'
            );
    });
});

/* ========================================
   7. Kezdeti megjelenítés
======================================== */

render();
