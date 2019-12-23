<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class KmsController extends Controller
{

    public function listIbuAction()
    {
        $id = $this->session->get('auth')['id'];
        $daftars = Daftar::find("idPosyandu='$id'");
        $data = array();

            foreach ($daftars as $daftar) {
                if($daftar->idAnak == NULL)
                {
                    $ibu = Ibu::findFirst("idIbu='$daftar->idIbu'");
                    $data[] = array(
                        // 'id' => $datpasien->idpasien,
                        'nama' => $ibu->namaIbu,
                        'link' => $ibu->idIbu,
                    );

                }
                    
            }
            
            $content = json_encode($data);
            return $this->response->setContent($content);
    }

    public function listAnakAction()
    {
        $id = $this->session->get('auth')['id'];
        $daftars = Daftar::find("idPosyandu='$id'");
        $data = array();

            foreach ($daftars as $daftar) {
                if($daftar->idAnak == NULL)
                {
                    
                }
                else{
                    $ibu = Ibu::findFirst("idIbu='$daftar->idIbu'");
                    $anak = Anak::findFirst("idAnak='$daftar->idAnak'");
                    $data[] = array(
                        // 'id' => $datpasien->idpasien,
                        'namaAnak' => $anak->namaAnak,
                        'namaIbu' => $ibu->namaIbu,
                        'link' => $anak->idAnak,
                    );

                }
                    
            }
            
            $content = json_encode($data);
            return $this->response->setContent($content);
    }
    

    

    public function homeAction()
    {

    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect();
    }

    public function addPesertaAction()
    {

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
                    'conditions' => 'idIbu = ?1 AND idAnak = ?2 AND idPosyandu =?3',
                    'bind' => [
                        1 => $user->idIbu,
                        2 => NULL,
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
        $this->response->redirect('posyandu/add-peserta');
        
    }

    public function createIbuAction($idp)
    {
        $ibu = Ibu::findFirst("idIbu='$idp'");
        $this->view->ibu = $ibu;

    }

    public function storeIbuAction()
    {
        $kms = new Kms();
        $kms->idPosyandu = $this->session->get('auth')['id'];
        $kms->idIbu = $this->request->getPost('idIbu');
        $kms->tanggal = $this->request->getPost('tanggal');
        $kms->beratBadan = $this->request->getPost('beratbadan');
        $kms->tekananDarah = $this->request->getPost('tekanandarah');
        $kms->usiaKandungan = $this->request->getPost('usiakandungan');
        $kms->vitamin = $this->request->getPost('vitamin');
        $kms->catatan = $this->request->getPost('catatan');

        // $Posyandu->gender = $gender;

        $kms->save();
        $this->response->redirect('posyandu/list-peserta');
    }

    public function createAnakAction($idp)
    {
        $anak = Anak::findFirst("idAnak='$idp'");
        $this->view->anak = $anak;

    }

    public function storeAnakAction()
    {
        $kms = new Kms();
        $kms->idPosyandu = $this->session->get('auth')['id'];
        $kms->idIbu = $this->request->getPost('idIbu');
        $kms->idAnak = $this->request->getPost('idAnak');
        $kms->tanggal = $this->request->getPost('tanggal');
        $kms->tinggiBadan = $this->request->getPost('tinggibadan');
        $kms->beratBadan = $this->request->getPost('beratbadan');
        $kms->lingkarKepala = $this->request->getPost('lingkarkepala');
        $kms->imunisasi = $this->request->getPost('imunisasi');
        $kms->vitamin = $this->request->getPost('vitamin');
        $kms->catatan = $this->request->getPost('catatan');

        // $Posyandu->gender = $gender;

        $kms->save();
        $this->response->redirect('posyandu/list-anak');
    }

    public function listKmsAction()
    {

    }

    public function daftarKmsAction()
    {
        $id = $this->session->get('auth')['id'];
        $kmss = Kms::find("idPosyandu='$id'");
        $data = array();

            foreach($kmss as $kms) {
                $ibu = Ibu::findFirst("idIbu='$kms->idIbu'");
                if($kms->idAnak == NULL)
                {
                    
                    $data[] = array(
                        // 'id' => $datpasien->idpasien,
                        'nama' => $ibu->namaIbu,
                        'namaIbu' => NULL,
                        'link' => $kms->idKMS,
                    );
                    
                }
                else{
                    $anak = Anak::findFirst("idAnak='$kms->idAnak'");
                    $data[] = array(
                        // 'id' => $datpasien->idpasien,
                        'nama' => $anak->namaAnak,
                        'namaIbu' => $ibu->namaIbu,
                        'link' => $kms->idKMS,
                    );

                }

                    
            }
            
            $content = json_encode($data);
            return $this->response->setContent($content);
    }

    public function detailKmsAction($idp)
    {
        $kms = Kms::findFirst("idKMS='$idp'");
        // if($kms) echo("ada");
        // else echo("tidak"); die();
        $this->view->kms = $kms;

    }

    public function hapusKmsAction($idp)
    {
        $kms = Kms::findFirst("idKMS='$idp'");

        $kms->delete();

        $this->response->redirect('kms/list-kms');

    }

}