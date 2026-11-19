<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed, onMounted, onUnmounted, ref } from 'vue';

const now = ref(new Date());
let clockInterval;

const greeting = computed(() => {
    // Sapaan mengikuti jam lokal perangkat yang sedang membuka halaman.
    const hour = now.value.getHours();

    if (hour < 11) return 'Pagi';
    if (hour < 15) return 'Siang';
    if (hour < 18) return 'Sore';
    return 'Malam';
});

const dateLabel = computed(() => new Intl.DateTimeFormat('id-ID', {
    weekday: 'long',
    day: 'numeric',
    month: 'long',
}).format(now.value));

const timeLabel = computed(() => new Intl.DateTimeFormat('id-ID', {
    hour: '2-digit',
    minute: '2-digit',
}).format(now.value));

onMounted(() => {
    // Perbarui jam berkala tanpa meminta pembaruan setiap detik.
    clockInterval = window.setInterval(() => {
        now.value = new Date();
    }, 30_000);
});

// Hentikan timer agar tidak berjalan setelah pengguna meninggalkan halaman.
onUnmounted(() => window.clearInterval(clockInterval));
</script>

<template>
    <Head title="Ruang Langit" />

    <main class="sky-page">
        <section class="sky-hero" aria-labelledby="sky-title">
            <img
                class="sky-photo"
                src="https://images.unsplash.com/photo-1499346030926-9a72daac6c63?auto=format&fit=crop&w=2400&q=85"
                alt="Awan putih membentang di langit biru"
                fetchpriority="high"
            />
            <div class="sky-wash" aria-hidden="true"></div>

            <header class="sky-header">
                <Link href="/" class="sky-wordmark" aria-label="Ruang Langit, beranda">
                    <span class="wordmark-sun" aria-hidden="true"></span>
                    <span>RUANG <strong>LANGIT</strong></span>
                </Link>

                <div class="sky-local-time" aria-live="polite">
                    <span>{{ greeting }} di tempatmu</span>
                    <span>{{ dateLabel }} · {{ timeLabel }}</span>
                </div>

                <Link href="/login" class="sky-header-link">Masuk <span aria-hidden="true">↗</span></Link>
            </header>

            <div class="sky-copy">
                <p class="sky-eyebrow"><span></span> TEMPAT CERITA BERTUMBUH</p>
                <h1 id="sky-title">Ruang<br /><em>Langit.</em></h1>
                <p class="sky-description">
                    Luaskan pikiran. Simpan cerita yang ingin kamu bawa lebih jauh.
                </p>
                <div class="sky-actions">
                    <Link href="/login" class="sky-primary-link">
                        Masuk ke ruangmu <span aria-hidden="true">→</span>
                    </Link>
                    <Link href="/register" class="sky-secondary-link">Buat akun</Link>
                </div>
            </div>

            <div class="sky-bottomline" aria-hidden="true">
                <span>IDE BEBAS, CERITA LEGA</span>
                <span>01 / LANGIT TERBUKA</span>
            </div>
        </section>

        <section class="sky-followup" aria-label="Ruang Langit">
            <p>SETIAP CERITA PUNYA TEMPAT UNTUK BERSINAR.</p>
            <span>{{ greeting }} · {{ timeLabel }}</span>
        </section>
    </main>
</template>

<style scoped>
.sky-page {
    --sky-ink: #102a43;
    --sky-blue: #147aa3;
    --sky-coral: #e36b4b;
    color: var(--sky-ink);
    font-family: 'Trebuchet MS', 'Segoe UI', sans-serif;
}

.sky-hero {
    position: relative;
    isolation: isolate;
    min-height: min(82svh, 820px);
    overflow: hidden;
    background: #91c9e4;
}

.sky-photo,
.sky-wash {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
}

.sky-photo {
    z-index: -2;
    object-fit: cover;
    object-position: center 48%;
}

.sky-wash {
    z-index: -1;
    background: rgba(224, 244, 251, 0.28);
}

.sky-header {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: center;
    gap: 24px;
    padding: 28px clamp(24px, 6vw, 88px);
}

.sky-wordmark {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    width: fit-content;
    color: var(--sky-ink);
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 1.3px;
    text-decoration: none;
}

.sky-wordmark strong {
    font-weight: 800;
}

.wordmark-sun {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: var(--sky-coral);
}

.sky-local-time {
    display: grid;
    gap: 3px;
    text-align: center;
    color: rgba(16, 42, 67, 0.78);
    font-size: 12px;
}

.sky-local-time span:first-child {
    color: var(--sky-ink);
    font-weight: 700;
}

.sky-header-link {
    justify-self: end;
    color: var(--sky-ink);
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
}

.sky-header-link span {
    margin-left: 5px;
    color: var(--sky-coral);
}

.sky-copy {
    width: min(680px, 75vw);
    margin: clamp(70px, 12vh, 145px) 0 112px clamp(24px, 11vw, 160px);
    animation: sky-arrive 700ms ease-out both;
}

.sky-eyebrow {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 0 0 18px;
    color: #174765;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.8px;
}

.sky-eyebrow span {
    width: 24px;
    height: 2px;
    background: var(--sky-coral);
}

.sky-copy h1 {
    margin: 0;
    color: var(--sky-ink);
    font-family: Georgia, 'Times New Roman', serif;
    font-size: clamp(64px, 9vw, 126px);
    font-weight: 400;
    line-height: 0.88;
}

.sky-copy h1 em {
    color: #176c91;
    font-weight: 400;
}

.sky-description {
    max-width: 395px;
    margin: 24px 0 28px;
    color: #23445b;
    font-size: 16px;
    line-height: 1.65;
}

.sky-actions {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 24px;
}

.sky-primary-link {
    display: inline-flex;
    align-items: center;
    gap: 24px;
    min-height: 50px;
    padding: 0 20px;
    background: var(--sky-ink);
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    transition: background 160ms ease, transform 160ms ease;
}

.sky-primary-link:hover {
    transform: translateY(-2px);
    background: #1d4b68;
    color: #fff;
}

.sky-primary-link span {
    color: #ffd08f;
    font-size: 19px;
}

.sky-secondary-link {
    color: var(--sky-ink);
    font-size: 14px;
    font-weight: 700;
    text-decoration-color: rgba(16, 42, 67, 0.45);
    text-underline-offset: 5px;
}

.sky-bottomline {
    position: absolute;
    right: clamp(24px, 6vw, 88px);
    bottom: 24px;
    left: clamp(24px, 6vw, 88px);
    display: flex;
    justify-content: space-between;
    color: rgba(16, 42, 67, 0.72);
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.6px;
}

.sky-followup {
    display: flex;
    min-height: 18svh;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding: 24px clamp(24px, 6vw, 88px);
    background: #f5fbfc;
}

.sky-followup p {
    margin: 0;
    color: #24516b;
    font-family: Georgia, 'Times New Roman', serif;
    font-size: clamp(18px, 2.2vw, 26px);
}

.sky-followup span {
    flex: none;
    color: #507185;
    font-size: 12px;
}

@keyframes sky-arrive {
    from { opacity: 0; transform: translateY(16px); }
    to { opacity: 1; transform: translateY(0); }
}

@media (max-width: 700px) {
    .sky-hero {
        min-height: 78svh;
    }

    .sky-header {
        grid-template-columns: 1fr auto;
        padding: 22px 20px;
    }

    .sky-local-time {
        display: none;
    }

    .sky-copy {
        width: auto;
        margin: clamp(90px, 15vh, 150px) 24px 120px;
    }

    .sky-copy h1 {
        font-size: clamp(64px, 18vw, 100px);
    }

    .sky-description {
        max-width: 310px;
    }

    .sky-bottomline {
        right: 20px;
        left: 20px;
        font-size: 9px;
        letter-spacing: 1px;
    }

    .sky-followup {
        min-height: 22svh;
        align-items: flex-start;
        flex-direction: column;
        justify-content: center;
        gap: 8px;
        padding: 20px 24px;
    }
}

@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        transition-duration: 0.01ms !important;
    }
}
</style>