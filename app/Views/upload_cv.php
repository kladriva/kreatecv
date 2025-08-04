<form action="<?= site_url('cv/upload') ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="cv_file" accept=".pdf,.doc,.docx" required>
    <button type="submit">Envoyer mon CV</button>
</form>
<?= session('error') ?>
<?= session('success') ?>
