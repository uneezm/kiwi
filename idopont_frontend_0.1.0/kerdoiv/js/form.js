
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
   3. Feltételes mezők frissítése
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
   4. Űrlapváltozás figyelése
======================================== */

// Bármely mező megváltozásakor frissítjük
// a feltételesen megjelenő mezőket
form.addEventListener('change', update);

/* ========================================
   5. Űrlap alaphelyzetbe állítása
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
   6. Űrlap beküldésének kezelése
======================================== */

form.addEventListener('submit', e => {

    // Megakadályozzuk a tényleges elküldést
    e.preventDefault();

    // Korábbi üzenet törlése
    msg.textContent = '';

    /* ========================================
       7. Születési dátum ellenőrzése
    ======================================== */

    const birth = document.getElementById('birthDate');

    if (
        birth.value &&
        birth.value > new Date().toISOString().slice(0, 10)
    ) {
        birth.setCustomValidity(
            'A születési dátum nem lehet jövőbeli.'
        );
    } else {
        birth.setCustomValidity('');
    }

    /* ========================================
       8. Telefonszám ellenőrzése
    ======================================== */

    const phone = document.getElementById('phone');

    phone.setCustomValidity(
        phone.value.trim() &&
        !/^[+0-9 ()-]{7,20}$/.test(phone.value.trim())
            ? 'Ellenőrizze a telefonszámot.'
            : ''
    );

    /* ========================================
       9. TAJ-szám ellenőrzése
    ======================================== */

    const taj = document.getElementById('taj');

    taj.setCustomValidity(
        /^\d{9}$/.test(taj.value)
            ? ''
            : 'Pontosan 9 számjegyet adjon meg.'
    );

    /* ========================================
       10. Feltöltött dokumentumok ellenőrzése
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
       11. Teljes űrlap ellenőrzése
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
       12. Sikeres kliensoldali ellenőrzés
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
   13. Kezdeti állapot beállítása
======================================== */

update();
