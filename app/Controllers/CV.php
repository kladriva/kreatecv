<?php

namespace App\Controllers;

use App\Models\CVModel;

class CV extends BaseController
{
    public function upload()
    {
        helper(['form', 'url']);
        $session = session();

        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('cv_file');

            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads/cvs', $newName);

                $cvModel = new CVModel();
                $cvModel->save([
                    'user_id'  => 1, // Remplace par l’ID de l’utilisateur connecté
                    'filename' => $file->getClientName(),
                    'filepath' => 'uploads/cvs/' . $newName,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);

                $session->setFlashdata('success', 'CV envoyé avec succès !');
            } else {
                $session->setFlashdata('error', 'Erreur lors de l’envoi du CV.');
            }
        }
        return redirect()->back();
    }
}
