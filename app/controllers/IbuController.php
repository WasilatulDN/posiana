<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class IbuController extends Controller
{
    function cek()
    {
        // $_isIbu = $this->session->get('auth')['tipe'];
        // if ($_isIbu == 1){
        //     return $this->response->redirect('ibu/home');
        // }elseif($_isIbu == 2){
        //     return $this->response->redirect('posyandu/home');
        // }
    }
    
    public function createAction()
    {
        $this->cek();
    }


    public function storeAction()
    {
        $val = new IbuValidation();
        $messages = $val->validate($_POST);
        if (count($messages)) {
			foreach ($messages as $m) {
                echo $m . "<br>";
			}
        }
        // die();
        else{
            $ibu = new Ibu();
            $ibu->username = $this->request->getPost('username');
            $ibu->email = $this->request->getPost('email');
            $ibu->namaIbu = $this->request->getPost('nama');
            $password = $this->request->getPost('password');
            $ibu->password = $this->security->hash($password);

            // $ibu->gender = $gender;

            $ibu->save();
            $this->response->redirect();
        }
        
    }

    public function loginAction()
    {
        $this->cek();

    }

    public function storeloginAction()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = Ibu::findFirst("email='$email'");

        if ($user) {
            if ($this->security->checkHash($password, $user->password)) {
                $this->session->set(
                    'auth',
                    [
                        'id' => $user->idIbu,
                        'username' => $user->username,
                        'tipe' => '1',
                    ]
                );
                (new Response())->redirect('ibu/home')->send();
            }
        }
    }
    public function lihatAnakAction()
    {
        $id = $this->session->get('auth')['id'];
        $anaks = Anak::find("idIbu='$id'");
            $data = array();

            foreach ($anaks as $anak) {
                $data[] = array(
                    // 'id' => $datpasien->idpasien,
                    'namaAnak' => $anak->namaAnak,
                    'jKel' => $anak->jKel,
                    'tglLahir' => $anak->tglLahir,
                    'link' => $anak->idAnak,
                );


            }
            
            $content = json_encode($data);
            return $this->response->setContent($content);
    }

    public function listKMSAction()
    {
        $id = $this->session->get('auth')['id'];
        $kmss = Kms::find("idIbu='$id'");
            $data = array();

            foreach ($kmss as $kms) {
                if($kms->idAnak)
                {  
                    $anak = Anak::findFirst("idAnak='$kms->idAnak'");
                    $data[] = array(
                        // 'id' => $datpasien->idpasien,
                        'nama' => $anak->namaAnak,
                        'tanggal' => $kms->tanggal,
                        'link' => $kms->idKMS,
                    );

                }
                else
                {
                    $ibu = Ibu::findFirst("idIbu='$id'");
                    $data[] = array(
                        // 'id' => $datpasien->idpasien,
                        'nama' => $ibu->namaIbu,
                        'tanggal' => $kms->tanggal,
                        'link' => $kms->idKMS,
                    );

                }
                


            }
            
            $content = json_encode($data);
            return $this->response->setContent($content);
    }

    public function homeAction()
    {
        $this->cek();

    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect();
    }

    public function addKMSAction()
    {
        $this->cek();

    }

    public function listAnakAction()
    {
        $this->cek();

    }

    public function addAnakAction()
    {
        $this->cek();

    }

    public function storeAnakAction()
    {
        $id = $this->session->get('auth')['id'];
        $anak = new Anak();
        $anak->namaAnak = $this->request->getPost('namaAnak');
        $anak->idIbu = $id;
        $anak->jKel = $this->request->getPost('jkel');
        $anak->tglLahir = $this->request->getPost('tgllahir');

        // $Posyandu->gender = $gender;

        $anak->save();
        $this->response->redirect('ibu/list-anak');
    }

    public function hapusAnakAction($idp)
    {
        $anak = Anak::findFirst("idAnak='$idp'");

        $anak->delete();

        $this->response->redirect('ibu/list-anak');

    }

    public function detailKmsAction($idp)
    {
        $this->cek();
        $kms = Kms::findFirst("idKMS='$idp'");
        // if($kms) echo("ada");
        // else echo("tidak"); die();
        $this->view->kms = $kms;

    }

}