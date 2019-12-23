<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class PosyanduController extends Controller
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
        // $val = new UserRegisterValidation();
        // $messages = $val->validate($_POST);
        $Posyandu = new Posyandu();
        $Posyandu->username = $this->request->getPost('username');
        $Posyandu->email = $this->request->getPost('email');
        $Posyandu->namaPosyandu = $this->request->getPost('nama');
        $password = $this->request->getPost('password');
        $Posyandu->password = $this->security->hash($password);
        // $Posyandu->gender = $gender;

        $Posyandu->save();
        $this->response->redirect();
    }

    public function loginAction()
    {
        $this->cek();

    }

    public function storeloginAction()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = Posyandu::findFirst("email='$email'");

        if ($user) {
            if ($this->security->checkHash($password, $user->password)) {
                $this->session->set(
                    'auth',
                    [
                        'id' => $user->idPosyandu,
                        'username' => $user->username,
                        'tipe' => '2',
                    ]
                );
                (new Response())->redirect('posyandu/home')->send();
            }
        }
    }

    public function listKMSAction()
    {
        $id = $this->session->get('auth')['id'];
        $kmss = Kms::find("idPosyandu='$id'");
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
                    $ibu = Ibu::findFirst("$kms->idIbu");
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

    public function listPesertaAction()
    {
        $this->cek();

    }

    public function listAnakAction()
    {
        $this->cek();

    }

    public function searchResultAction()
    {
        $username = $this->request->getPost('username');
        // $password = $this->request->getPost('password');

        $user = Ibu::findFirst("username='$username'");
        if ($user) {
            $data = Daftar::findFirst(
                [
                    'columns' => '*',
                    'conditions' => 'idIbu = ?1 AND idPosyandu =?2',
                    'bind' => [
                        1 => $user->idIbu,
                        2 => $this->session->get('auth')['id'],
                    ]
                ]
            );
            if($data)
            {  

            }
            else{
                $Daftar = new Daftar();
                $Daftar->idPosyandu = $this->session->get('auth')['id'];
                $Daftar->idIbu = $user->idIbu;

                $Daftar->save();  
            }
                          
            
        }
        $anaks = Anak::find("idIbu='$user->idIbu'");
        if ($anaks) {
            foreach($anaks as $anak)
            {
                $data = Daftar::findFirst(
                    [
                        'columns' => '*',
                        'conditions' => 'idIbu = ?1 AND idAnak = ?2 AND idPosyandu=?3',
                        'bind' => [
                            1 => $user->idIbu,
                            2 => $anak->idAnak,
                            3 => $this->session->get('auth')['id'],
                        ]
                    ]
                );
                if($data)
                {

                }
                else
                {
                    $Daftar = new Daftar();
                    $Daftar->idPosyandu = $this->session->get('auth')['id'];
                    $Daftar->idIbu = $user->idIbu;
                    $Daftar->idAnak = $anak->idAnak;
    
                    $Daftar->save();

                }
               
            }
            
            
        }
        $this->response->redirect('posyandu/list-peserta');
    }

}