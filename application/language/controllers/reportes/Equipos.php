<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Equipos extends CI_Controller
{
    function __construct()
    {
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
        $this->load->library('pdf');
        $this->load->model("Activos_model");
    }

    public function equipoactivo($id)
    {
        $data  = $this->Activos_model->reporteactivo($id);
        foreach ($data as $row) {
            // $results[1]=$row->usuNombre;
            $img='';
            if ($row->tipo=="IMPRESORA") {
                $img='impresora.png';
                $img2='impresora.png';
            }
            elseif ($row->tipo=="LAPTOP") {
                $img='laptopos.jpg';
                $img2='laptopvis.jpg';
            }
            elseif ($row->tipo=="ALLINONE") {
                $img='allone.jpg';
                $img2='allone.jpg';
            }
            elseif ($row->tipo=="CPU" or $row->tipo=="PC" or $row->tipo=="MONITOR") {
                $img='computadora.jpg';
                $img2='computadora2.jpg';
            }
            $pdf = new Pdf();
            $pdf->SetTitle('Reportes');
            $pdf->AliasNbPages();
            $pdf->AddPage('P', 'A4', 0);
            $pdf->pag11();
            $pdf->pag12($row->nombreFabricante,$row->ram,$row->modelo,$row->numserie,$row->procesador,$row->activofijo,'2019-01-01');
            $pdf->pag13($img);
            $pdf->pag14($img2); 
            $pdf->pag15($row->observaciones,$row->usuNombre." ".$row->usuPaterno." ".$row->usuMaterno);
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->AddPage('P', 'A4', 0);
            $pdf->pag21();
            $pdf->Line(20, 30, 200, 30);
            $pdf->pag22($row->usuNombre." ".$row->usuPaterno." ".$row->usuMaterno);
            $pdf->Output('Hoja de Asignacion.pdf', 'I');
        }
    }
}

/*
* application/controllers/Testpdf.php
*/
