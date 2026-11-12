
/* ========================================
   1. Űrlap és üzenetmező kiválasztása
======================================== */

const form = document.querySelector('#patientForm');
const msg = document.querySelector('#formMessage');

// Kiválasztott rádiógomb értékének lekérése
const byName = n =>
    form.querySelector(`input[name="${n}"]:checked`)?.value;

/* ========================================
   2. Feltételes mezők kezelése
======================================== */

function conditional(name, wrap, field) {

    // Ellenőrizzük, hogy az "igen" válasz van-e kiválasztva
    const yes = byName(name) === 'yes';

    // Részletező mező megjelenítése vagy elrejtése
    document
        .getElementById(wrap)
        .classList.toggle('hide', !yes);

    // Kötelezővé tesszük a mezőt, ha "igen" a válasz
    document.getElementById(field).required = yes;

    // Ha nem "igen", töröljük a mező tartalmát
    if (!yes) {
        document.getElementById(field).value = '';
    }
}

/* ========================================
   3. Születési dátum: éééé.hh.nn
======================================== */

const birthInput = document.getElementById('birthDate');

// Hibaüzenet a mező alatt
const birthErr = document.createElement('p');
birthErr.className = 'error';
birthInput.after(birthErr);

// Hibaüzenetet ad vissza, vagy üres szöveget, ha a dátum rendben van
function birthError(v) {

    const m = /^(\d{4})\.(\d{2})\.(\d{2})$/.exec(v);

    if (!m) return 'Adja meg a dátumot éééé.hh.nn formában.';

    const y = +m[1], mo = +m[2], d = +m[3];
    const thisYear = new Date().getFullYear();

    if (y < 1900) return 'A születési év nem lehet 1900 előtti.';
    if (y > thisYear) return `A születési év nem lehet ${thisYear} utáni.`;

    // Létezik-e a dátum (pl. 2001.02.30 nem)
    const dt = new Date(y, mo - 1, d);
    if (
        dt.getFullYear() !== y ||
        dt.getMonth() !== mo - 1 ||
        dt.getDate() !== d
    ) return 'Nem létező dátum.';

    if (dt > new Date()) return 'A születési dátum nem lehet jövőbeli.';

    return '';
}

birthInput.addEventListener('input', e => {

    // Csak számjegyek, legfeljebb 8 db (4 év + 2 hónap + 2 nap)
    const d = birthInput.value.replace(/\D/g, '').slice(0, 8);

    // Törlésnél nem tesszük vissza a pontot, különben nem lehetne törölni
    const deleting = e.inputType && e.inputType.startsWith('delete');

    // Összerakás: éééé. hh. nn
    let out = d.slice(0, 4);
    if (d.length >= 4 && !(deleting && d.length === 4)) out += '.';
    if (d.length > 4) out += d.slice(4, 6);
    if (d.length >= 6 && !(deleting && d.length === 6)) out += '.';
    if (d.length > 6) out += d.slice(6, 8);
    if (d.length < 4) out = d;

    birthInput.value = out;

    // Az év már a 4. számjegy után ellenőrizhető
    let err = '';
    if (d.length >= 4) {
        const y = +d.slice(0, 4);
        const thisYear = new Date().getFullYear();

        if (y < 1900) err = 'A születési év nem lehet 1900 előtti.';
        else if (y > thisYear) err = `A születési év nem lehet ${thisYear} utáni.`;
    }

    // A teljes dátumot akkor ellenőrizzük, ha mind a 8 számjegy megvan
    if (!err && d.length === 8) err = birthError(out);

    birthErr.textContent = err;
    birthInput.setCustomValidity(err);
});

/* ========================================
   4. Feltételes mezők frissítése
======================================== */

function update() {

    // Sürgős jelentkezés részletei
    conditional(
        'urgent',
        'urgentDetailWrap',
        'urgentDetail'
    );

    // Allergiával kapcsolatos részletek
    conditional(
        'allergy',
        'allergyDetailWrap',
        'allergyDetail'
    );

    // Gyógyszerszedéssel kapcsolatos részletek
    conditional(
        'medication',
        'medicationDetailWrap',
        'medicationDetail'
    );

    // Érzékenységgel kapcsolatos részletek
    conditional(
        'sensitivity',
        'sensitivityDetailWrap',
        'sensitivityDetail'
    );
}

/* ========================================
   5. Űrlapváltozás figyelése
======================================== */

// Bármely mező megváltozásakor frissítjük
// a feltételesen megjelenő mezőket
form.addEventListener('change', update);

/* ========================================
   6. Űrlap alaphelyzetbe állítása
======================================== */

form.addEventListener('reset', () => {

    setTimeout(() => {

        // Feltételes mezők frissítése
        update();

        // Korábbi üzenet törlése
        msg.textContent = '';

    }, 0);
});

/* ========================================
   7. Űrlap beküldésének kezelése
======================================== */

form.addEventListener('submit', e => {

    // Megakadályozzuk a tényleges elküldést
    e.preventDefault();

    // Korábbi üzenet törlése
    msg.textContent = '';

    /* ========================================
       8. Születési dátum ellenőrzése
    ======================================== */

    const err = birthError(birthInput.value);
    birthInput.setCustomValidity(err);
    birthErr.textContent = err;

    /* ========================================
       9. Telefonszám ellenőrzése
    ======================================== */

    const phone = document.getElementById('phone');

    phone.setCustomValidity(
        phone.value.trim() &&
        !/^[+0-9 ()-]{7,20}$/.test(phone.value.trim())
            ? 'Ellenőrizze a telefonszámot.'
            : ''
    );

    /* ========================================
       10. TAJ-szám ellenőrzése
    ======================================== */

    const taj = document.getElementById('taj');

    taj.setCustomValidity(
        /^\d{9}$/.test(taj.value)
            ? ''
            : 'Pontosan 9 számjegyet adjon meg.'
    );

    /* ========================================
       11. Feltöltött dokumentumok ellenőrzése
    ======================================== */

    // Feltöltött fájlok listája
    const files = [
        ...document.getElementById('documents').files
    ];

    // Méret és kiterjesztés ellenőrzése
    if (
        files.some(f =>
            f.size > 5 * 1024 * 1024 ||
            !(/\.(pdf|png|jpe?g)$/i).test(f.name)
        )
    ) {
        msg.innerHTML =
            '<p class="error">' +
            'A dokumentum csak PDF/JPG/PNG lehet, ' +
            'legfeljebb 5 MB méretben.' +
            '</p>';

        return;
    }

    /* ========================================
       12. Teljes űrlap ellenőrzése
    ======================================== */

    if (!form.checkValidity()) {

        // Böngésző beépített hibaüzeneteinek megjelenítése
        form.reportValidity();

        // Általános hibaüzenet
        msg.innerHTML =
            '<p class="error">' +
            'Ellenőrizze a kötelező és hibásan ' +
            'kitöltött mezőket.' +
            '</p>';

        return;
    }

    /* ========================================
       13. Sikeres kliensoldali ellenőrzés
    ======================================== */

    msg.innerHTML =
        '<div class="notice">' +
        'A kliensoldali ellenőrzés sikeres. ' +
        'Ez demó, a jelentkezés NEM lett elküldve ' +
        'és nem lett elmentve.' +
        '</div>';

    // Görgetés az üzenethez
    msg.scrollIntoView({
        behavior: 'smooth',
        block: 'center'
    });
});

/* ========================================
   14. Kezdeti állapot beállítása
======================================== */

update();
