<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CvModel;
use App\Models\ExperienceModel;
use App\Models\FormationModel;
use App\Models\CompetenceModel;
use App\Models\LanguageModel;
use App\Models\HobbyModel;

class CvController extends BaseController
{
    // --- ÉTAPE 1: DESCRIPTION DU PROFIL ---
    public function step1_get()
    {
        return view('cv/step1_form'); // Nouvelle vue pour le profil
    }

    public function step1_post()
    {
        // Pas de validation nécessaire pour un champ optionnel, sinon ajoutez-la ici
        session()->set('cv_data_step1', $this->request->getPost());
        return redirect()->to('/cv/etape2');
    }

    // --- ÉTAPE 2: INFORMATIONS PERSONNELLES ---
    public function step2_get()
    {
        if (!session()->has('cv_data_step1')) {
            return redirect()->to('/cv/etape1');
        }
        return view('cv/step2_form'); // Ancienne vue de l'étape 1
    }

    public function step2_post()
    {
        $rules = [
            'nom_utilisateur'  => 'required|min_length[3]',
            'email'            => 'required|valid_email',
        ];
        if (!$this->validate($rules)) {
            return view('cv/step2_form', ['validation' => $this->validator]);
        }
        session()->set('cv_data_step2', $this->request->getPost());
        return redirect()->to('/cv/etape3');
    }

    // --- ÉTAPE 3: EXPÉRIENCES ---
    public function step3_get()
    {
        if (!session()->has('cv_data_step2')) {
            return redirect()->to('/cv/etape1');
        }
        return view('cv/step3_form'); // Ancienne vue de l'étape 2
    }

    public function step3_post()
    {
        $rules = ['experiences.*.titre_poste' => 'required|min_length[3]'];
        if (!$this->validate($rules)) {
            return view('cv/step3_form', ['validation' => $this->validator]);
        }
        session()->set('cv_data_step3', $this->request->getPost());
        return redirect()->to('/cv/etape4');
    }

    // --- ÉTAPE 4: FORMATIONS ---
    public function step4_get()
    {
        if (!session()->has('cv_data_step3')) {
            return redirect()->to('/cv/etape1');
        }
        return view('cv/step4_form'); // Ancienne vue de l'étape 3
    }

    public function step4_post()
    {
        $rules = ['formations.*.diplome' => 'required|min_length[3]'];
        if (!$this->validate($rules)) {
            return view('cv/step4_form', ['validation' => $this->validator]);
        }
        session()->set('cv_data_step4', $this->request->getPost());
        return redirect()->to('/cv/etape5');
    }

    // --- ÉTAPE 5: COMPÉTENCES ---
    public function step5_get()
    {
        if (!session()->has('cv_data_step4')) {
            return redirect()->to('/cv/etape1');
        }
        return view('cv/step5_form'); // Ancienne vue de l'étape 4
    }

    public function step5_post()
    {
        $rules = ['competences.*.nom_competence' => 'required|min_length[2]'];
        if (!$this->validate($rules)) {
            return view('cv/step5_form', ['validation' => $this->validator]);
        }
        session()->set('cv_data_step5', $this->request->getPost());
        return redirect()->to('/cv/etape6');
    }

    // --- ÉTAPE 6: LANGUES ---
    public function step6_get()
    {
        if (!session()->has('cv_data_step5')) {
            return redirect()->to('/cv/etape1');
        }
        return view('cv/step6_form'); // Nouvelle vue
    }

    public function step6_post()
    {
        $rules = ['langues.*.nom_langue' => 'required|min_length[2]'];
        if (!$this->validate($rules)) {
            return view('cv/step6_form', ['validation' => $this->validator]);
        }
        session()->set('cv_data_step6', $this->request->getPost());
        return redirect()->to('/cv/etape7');
    }

    // --- ÉTAPE 7: HOBBIES & SAUVEGARDE FINALE ---
    public function step7_get()
    {
        if (!session()->has('cv_data_step6')) {
            return redirect()->to('/cv/etape1');
        }
        return view('cv/step7_form'); // Nouvelle vue
    }

    public function step7_post()
    {
        $db = \Config\Database::connect();
        $cvModel = new CvModel();
        $experienceModel = new ExperienceModel();
        $formationModel = new FormationModel();
        $competenceModel = new CompetenceModel();
        $languageModel = new LanguageModel();
        $hobbyModel = new HobbyModel();

        // Récupération de toutes les données
        $profileData = session()->get('cv_data_step1');
        $persoData = session()->get('cv_data_step2');
        $experiencesData = session()->get('cv_data_step3')['experiences'] ?? [];
        $formationsData = session()->get('cv_data_step4')['formations'] ?? [];
        $competencesData = session()->get('cv_data_step5')['competences'] ?? [];
        $languesData = session()->get('cv_data_step6')['langues'] ?? [];
        $hobbiesData = $this->request->getPost('hobbies') ?? [];

        // Fusion des données pour la table principale
        $mainCvData = array_merge($profileData, $persoData);

        $db->transStart();

        // 1. Sauvegarder le CV principal
        $cvModel->save($mainCvData);
        $cvId = $cvModel->getInsertID();

        // 2. Sauvegarder les expériences
        foreach ($experiencesData as $item) {
            if (!empty($item['titre_poste'])) {
                $item['cv_submission_id'] = $cvId;
                $experienceModel->save($item);
            }
        }
        
        // 3. Sauvegarder les formations
        foreach ($formationsData as $item) {
            if (!empty($item['diplome'])) {
                $item['cv_submission_id'] = $cvId;
                $formationModel->save($item);
            }
        }
        
        // 4. Sauvegarder les compétences
        foreach ($competencesData as $item) {
            if (!empty($item['nom_competence'])) {
                $item['cv_submission_id'] = $cvId;
                $competenceModel->save($item);
            }
        }

        // 5. Sauvegarder les langues
        foreach ($languesData as $item) {
            if (!empty($item['nom_langue'])) {
                $item['cv_submission_id'] = $cvId;
                $languageModel->save($item);
            }
        }

        // 6. Sauvegarder les hobbies
        foreach ($hobbiesData as $item) {
            if (!empty($item['nom_hobby'])) {
                $item['cv_submission_id'] = $cvId;
                $hobbyModel->save($item);
            }
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Un problème est survenu lors de la sauvegarde.');
        }

        session()->destroy();
        return redirect()->to('/cv/succes');
    }

    public function success()
    {
        return view('cv/success_page');
    }
}