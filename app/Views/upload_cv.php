<style>
body {
    background: linear-gradient(135deg, #f12711, #f5af19);
    font-family: 'Segoe UI', Arial, sans-serif;
    min-height: 100vh;
    margin: 0;
}
.form-cv-container {
    background: rgba(255,255,255,0.96);
    width: 95vw;
    max-width: 820px;
    margin: 50px auto 0 auto;
    padding: 45px 42px 38px 42px;
    border-radius: 24px;
    box-shadow: 0 8px 22px #f1271144, 0 2px 8px #fff6;
}
.form-cv-container h2 {
    margin-top: 0;
    font-size: 1.55rem;
    color: #d35400;
    font-weight: bold;
    letter-spacing: .02em;
}
.form-cv-container label {
    display: block;
    font-weight: 500;
    margin-bottom: 7px;
    color: #84430d;
}
.form-cv-container input[type="text"],
.form-cv-container input[type="email"],
.form-cv-container input[type="file"] {
    width: 100%;
    padding: 13px 12px;
    border-radius: 10px;
    border: 1.3px solid #ffd6a0;
    margin-bottom: 22px;
    font-size: 1.07rem;
    background: #fffaf7;
    transition: border 0.2s;
    box-sizing: border-box;
}
.form-cv-container input[type="text"]:focus,
.form-cv-container input[type="email"]:focus,
.form-cv-container input[type="file"]:focus {
    border: 1.4px solid #f7971e;
    outline: none;
}
.form-cv-container button,
.form-cv-container .btn-ia {
    width: 100%;
    background: linear-gradient(90deg, #f7971e, #ffd200);
    color: #b14000;
    padding: 14px 0;
    border: none;
    border-radius: 10px;
    font-size: 1.14rem;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 2px 8px #f7971e33;
    letter-spacing: .02em;
    margin-bottom: 10px;
    transition: background 0.18s, color 0.18s, transform 0.15s;
    display: block;
}
.form-cv-container button:hover,
.form-cv-container .btn-ia:hover {
    background: linear-gradient(90deg, #f12711, #f5af19);
    color: #fff;
    transform: translateY(-2px) scale(1.03);
}
.form-cv-container .btn-ia {
    background: linear-gradient(90deg, #f5af19, #f12711 90%);
    color: #b14000;
    margin-top: 0;
    margin-bottom: 0;
}
.form-cv-container .btn-ia:hover {
    background: linear-gradient(90deg, #f12711, #f7971e 90%);
    color: #fff;
}
.form-cv-container .message {
    margin-top: 17px;
    padding: 11px 13px;
    border-radius: 7px;
    font-size: 1rem;
}
.form-cv-container .message.error {
    background: #ffeaea;
    color: #b94a48;
    border: 1px solid #e6a1a1;
}
.form-cv-container .message.success {
    background: #e8fff0;
    color: #328047;
    border: 1px solid #99e6b1;
}
/* Popup styles */
#ia-popup-overlay {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0; right: 0; bottom: 0;
    width: 100vw; height: 100vh;
    background: rgba(20,0,0,0.38);
    align-items: center;
    justify-content: center;
}
#ia-popup {
    background: #fff;
    color: #d35400;
    border-radius: 20px;
    padding: 48px 38px;
    box-shadow: 0 6px 28px #0002, 0 2px 12px #f5af1911;
    font-size: 1.32rem;
    font-weight: bold;
    text-align: center;
    min-width: 220px;
    min-height: 90px;
    max-width: 98vw;
    animation: popupAppear 0.2s;
    position: relative;
}
#ia-popup .close-btn {
    position: absolute;
    top: 9px; right: 13px;
    background: transparent;
    border: none;
    font-size: 1.35em;
    color: #f12711;
    cursor: pointer;
}
@keyframes popupAppear {
    from { opacity: 0; transform: translateY(30px) scale(0.95);}
    to   { opacity: 1; transform: translateY(0) scale(1);}
}
/* --- RESPONSIVE --- */
@media (max-width: 900px) {
    .form-cv-container {
        max-width: 99vw;
        padding: 5vw 2vw 8vw 2vw;
        margin-top: 16vw;
        border-radius: 18px;
    }
    #ia-popup { padding: 28px 8vw; font-size: 1.08rem;}
}
@media (max-width: 600px) {
    .form-cv-container {
        max-width: 99vw;
        padding: 7vw 3vw 11vw 3vw;
        margin-top: 5vw;
        border-radius: 13px;
    }
    .form-cv-container h2 { font-size: 1.18rem; }
    .form-cv-container button,
    .form-cv-container .btn-ia {
        font-size: 1em;
        padding: 12px 0;
        border-radius: 7px;
    }
    #ia-popup { padding: 19px 2vw; font-size: .97rem;}
}
</style>

<div class="form-cv-container">
    <h2>Informations personnelles</h2>
    <form action="<?= site_url('cv/upload') ?>" method="post" enctype="multipart/form-data">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" name="username" required placeholder="Votre nom d'utilisateur">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required placeholder="votre@email.com">

        <label for="phone">Contact WhatsApp</label>
        <input type="text" id="phone" name="phone" required placeholder="06 12 34 56 78">

        <h2 style="margin-top:32px;">Déposer votre CV</h2>
        <input type="file" name="cv_file" accept=".pdf,.doc,.docx" required>

        <button type="submit">Envoyer mon CV</button>
    </form>
    <!-- Bouton Générer avec l'IA -->
    <button class="btn-ia" onclick="openIaPopup()">Générer avec l'IA</button>

    <?php if (session()->has('error')): ?>
        <div class="message error"><?= session('error') ?></div>
    <?php endif; ?>
    <?php if (session()->has('success')): ?>
        <div class="message success"><?= session('success') ?></div>
    <?php endif; ?>
</div>

<!-- Popup IA -->
<div id="ia-popup-overlay">
    <div id="ia-popup">
        <button class="close-btn" onclick="closeIaPopup()" title="Fermer">&times;</button>
        Solution en cours de développement...
    </div>
</div>

<script>
function openIaPopup() {
    document.getElementById('ia-popup-overlay').style.display = 'flex';
}
function closeIaPopup() {
    document.getElementById('ia-popup-overlay').style.display = 'none';
}
window.addEventListener('keydown', function(e){
    if (e.key === "Escape") closeIaPopup();
});
</script>
