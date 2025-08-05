<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenue - Formation CodeIgniter 4</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f12711, #f5af19);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
      text-align: center;
    }
    .container {
      background: rgba(0, 0, 0, 0.3);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.3);
      min-width: 400px;
    }
    h1 {
      font-size: 3em;
      margin-bottom: 0.5em;
    }
    p {
      font-size: 1.2em;
    }
    .logo {
      width: 100px;
      margin-bottom: 20px;
    }
    .btn-cv {
      margin-top: 35px;
      padding: 16px 38px;
      background: linear-gradient(90deg, #f7971e, #ffd200);
      color: #b14000;
      border: none;
      border-radius: 10px;
      font-size: 1.2em;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.2s, transform 0.17s;
      box-shadow: 0 2px 8px #0002;
      letter-spacing: .03em;
    }
    .btn-cv:hover {
      background: linear-gradient(90deg, #f12711, #f5af19);
      color: #fff;
      transform: translateY(-2px) scale(1.04);
      box-shadow: 0 4px 16px #0003;
    }
    @media (max-width: 600px) {
      .container {
        min-width: unset;
        width: 95vw;
        padding: 15vw 4vw;
      }
      h1 { font-size: 2em; }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Bienvenue sur CV Gen AI</h1>
    <p>
     Créez un CV percutant avec l'aide de l'IA
    </p>
    <a href="<?= site_url('cv') ?>">
      <button class="btn-cv">Commencer mon CV</button>
    </a>
  </div>
</body>
</html>
