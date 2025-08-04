<form action="<?= site_url('cv/upload') ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="cv_file" accept=".pdf,.doc,.docx" required>
    <button type="submit">Envoyer mon CV</button>
</form>

<?php if (session()->has('error')): ?>
    <div style="color:red"><?= session('error') ?></div>
<?php endif; ?>

<?php if (session()->has('success')): ?>
    <div style="color:green"><?= session('success') ?></div>
<?php endif; ?>
