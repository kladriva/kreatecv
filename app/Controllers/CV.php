<?php

namespace App\Controllers;

use App\Models\CVModel;

class CV extends BaseController
{
    public function index()
    {
        return view('upload_cv');
    }

    public function upload()
    {
        helper(['form', 'url']);
        $session = session();

        // 1. On récupère les champs du formulaire
        $username = $this->request->getPost('username');
        $email    = $this->request->getPost('email');
        $phone    = $this->request->getPost('phone');

        $file = $this->request->getFile('cv_file');
        if ($file && $file->isValid()) {
            $uploadPath = WRITEPATH . 'uploads/cvs';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $newName = $file->getRandomName();
            if ($file->move($uploadPath, $newName)) {
                $cvModel = new \App\Models\CVModel();

                // 2. On ajoute les infos persos au tableau data
                $data = [
                    'user_id'   => 1, // adapte selon utilisateur connecté
                    'username'  => $username,
                    'email'     => $email,
                    'phone'     => $phone,
                    'filename'  => $file->getClientName(),
                    'filepath'  => 'uploads/cvs/' . $newName,
                    'created_at'=> date('Y-m-d H:i:s'),
                ];
                if ($cvModel->insert($data)) {
                    $session->setFlashdata('success', 'CV et infos enregistrés avec succès !');
                } else {
                    $session->setFlashdata('error', 'Erreur lors de l’enregistrement en BDD.');
                }
            } else {
                $session->setFlashdata('error', 'Erreur lors du déplacement du fichier.');
            }
        } else {
            $session->setFlashdata('error', 'Erreur lors de l’upload du fichier.');
        }
        return redirect()->to('/cv');
    }
}
