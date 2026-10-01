document.documentElement.classList.add('js');

const toggle = document.querySelector('.nav-toggle');
const nav = document.querySelector('.site-nav');
if (toggle && nav) {
    toggle.addEventListener('click', () => {
        const open = nav.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
}

const KEY = 'profit-cookies';
const SIX_MONTHS = 1000 * 60 * 60 * 24 * 183;
const banner = document.querySelector('[data-cookie]');

function readChoice() {
    try {
        const raw = localStorage.getItem(KEY);
        if (!raw) return null;
        const data = JSON.parse(raw);
        if (!data || !data.choice || !data.at) return null;
        if (Date.now() - data.at > SIX_MONTHS) {
            localStorage.removeItem(KEY);
            return null;
        }
        return data.choice;
    } catch (error) {
        return null;
    }
}

function saveChoice(choice) {
    localStorage.setItem(KEY, JSON.stringify({ choice, at: Date.now() }));
    if (banner) banner.hidden = true;
}

if (banner) {
    if (readChoice()) banner.hidden = true;
    banner.querySelectorAll('[data-cookie-choice]').forEach((button) => {
        button.addEventListener('click', () => saveChoice(button.dataset.cookieChoice));
    });
}

document.querySelectorAll('[data-cookie-manage]').forEach((button) => {
    button.addEventListener('click', () => {
        localStorage.removeItem(KEY);
        if (banner) banner.hidden = false;
    });
});
