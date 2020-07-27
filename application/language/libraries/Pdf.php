<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH . 'third_party/fpdf/fpdf.php';
class Pdf extends FPDF
{
    function SetDash($black = null, $white = null)
    {
        if ($black !== null)
            $s = sprintf('[%.3F %.3F] 0 d', $black * $this->k, $white * $this->k);
        else
            $s = '[] 0 d';
        $this->_out($s);
    }
    // private functions
    function RoundedRect($x, $y, $w, $h, $r, $style = '')
    {
        $k = $this->k;
        $hp = $this->h;
        if ($style == 'F')
            $op = 'f';
        elseif ($style == 'FD' || $style == 'DF')
            $op = 'B';
        else
            $op = 'S';
        $MyArc = 4 / 3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m', ($x + $r) * $k, ($hp - $y) * $k));
        $xc = $x + $w - $r;
        $yc = $y + $r;
        $this->_out(sprintf('%.2F %.2F l', $xc * $k, ($hp - $y) * $k));

        $this->_Arc($xc + $r * $MyArc, $yc - $r, $xc + $r, $yc - $r * $MyArc, $xc + $r, $yc);
        $xc = $x + $w - $r;
        $yc = $y + $h - $r;
        $this->_out(sprintf('%.2F %.2F l', ($x + $w) * $k, ($hp - $yc) * $k));
        $this->_Arc($xc + $r, $yc + $r * $MyArc, $xc + $r * $MyArc, $yc + $r, $xc, $yc + $r);
        $xc = $x + $r;
        $yc = $y + $h - $r;
        $this->_out(sprintf('%.2F %.2F l', $xc * $k, ($hp - ($y + $h)) * $k));
        $this->_Arc($xc - $r * $MyArc, $yc + $r, $xc - $r, $yc + $r * $MyArc, $xc - $r, $yc);
        $xc = $x + $r;
        $yc = $y + $r;
        $this->_out(sprintf('%.2F %.2F l', ($x) * $k, ($hp - $yc) * $k));
        $this->_Arc($xc - $r, $yc - $r * $MyArc, $xc - $r * $MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }
    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf(
            '%.2F %.2F %.2F %.2F %.2F %.2F c ',
            $x1 * $this->k,
            ($h - $y1) * $this->k,
            $x2 * $this->k,
            ($h - $y2) * $this->k,
            $x3 * $this->k,
            ($h - $y3) * $this->k
        ));
    }
    function pag11()
    {
        $x1 = 10;
        $y1 = 20;
        $this->SetXY($x1, $y1);
        $this->SetFont("Arial", "B", 10);
        $this->MultiCell(40, 20, $this->Image(base_url() . "assets/usuarios/imagenes/logogt.png", $this->GetX(), $this->GetY(), 40, 20), 1);
        $this->SetXY($x1 + 40, $y1);
        $this->SetFont("Arial", "B", 10);
        $this->MultiCell(110, 10, "SISTEMA DE INFORMACION", 1, "C");
        $this->SetXY($x1 + 40, $y1 + 10);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(110, 10, "Asignacion de Equipos de Computo", 1, "C");
        $this->SetXY($x1 + 150, $y1);
        $this->SetFont("Arial", "", 7);
        $this->MultiCell(40, 20, "revision", 1, "L");
    }
    function pag12($marca, $ram, $modelo, $numserie, $procesador, $activofijo,$fechaManto)
    {
        $x1 = 10;
        $y1 = 45;

        $this->SetXY($x1, $y1);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(30, 4, "Marca:");
        $this->SetXY($x1 + 23, $y1);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(45, 4, $marca, "B", "C");
        $this->SetXY($x1 + 70, $y1);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(26, 4, "Memoria Ram:");
        $this->SetXY($x1 + 100, $y1);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(40, 4, $ram, "B", "C");

        $this->SetXY($x1, $y1 + 5);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(30, 4, "Modelo:");
        $this->SetXY($x1 + 23, $y1 + 5);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(45, 4, $modelo, "B", "C");
        $this->SetXY($x1 + 70, $y1 + 5);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(26, 4, "Disco Duro:");
        $this->SetXY($x1 + 100, $y1 + 5);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(40, 4, "", "B", "C");

        $this->SetXY($x1, $y1 + 10);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(30, 4, "No. Serie:");
        $this->SetXY($x1 + 23, $y1 + 10);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(45, 4, $numserie, "B", "C");
        $this->SetXY($x1 + 70, $y1 + 10);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(26, 4, "Procesador:");
        $this->SetXY($x1 + 100, $y1 + 10);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(40, 4, $procesador, "B", "C");

        $this->SetXY($x1, $y1 + 15);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(30, 4, "No.inventario:");
        $this->SetXY($x1 + 23, $y1 + 15);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(45, 4, $activofijo, "B", "C");
        $this->SetXY($x1 + 70, $y1 + 15);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(26, 4, "Software:");
        $this->SetXY($x1 + 100, $y1 + 15);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(40, 4, "", "B", "C");
        $this->SetXY($x1 + 150, $y1 + 10);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(40, 4, "Fecha de Asignacion");
        $this->SetXY($x1 + 150, $y1 + 15);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(40, 4, "", "B", "C");
    }

    function pag13($img)
    {
        $x1 = 10;
        $y1 = 70;
        $this->SetXY($x1 + 20, $y1);
        $this->MultiCell(20, 20, $this->Image(base_url() . "assets/usuarios/imagenes/".$img, $this->GetX(), $this->GetY(), 50), 0);
        $this->imperfeccion($x1, $y1);
    }

    function pag14($img)
    {
        $x1 = 10;
        $y1 = 110;
        $this->SetXY($x1 + 60, $y1);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(65, 4, "Marcar la ubicacion de imperfeccion", 1);
        $this->SetXY($x1 + 20, $y1 + 10);
        $this->MultiCell(20, 20, $this->Image(base_url() . "assets/usuarios/imagenes/".$img, $this->GetX(), $this->GetY(), 50), 0);
        $this->imperfeccion($x1, $y1 + 10);
    }

    function imperfeccion($xx, $yy)
    {
        $x1 = $xx;
        $y1 = $yy;

        $this->SetXY($x1 + 80, $y1);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(10, 4, "", 1);
        $this->SetXY($x1 + 90, $y1);
        $this->MultiCell(40, 4, "Rota", "", "L");

        $this->SetXY($x1 + 80, $y1 + 5);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(10, 4, "", 1);
        $this->SetXY($x1 + 90, $y1 + 5);
        $this->MultiCell(40, 4, "Rayada", "", "L");

        $this->SetXY($x1 + 80, $y1 + 10);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(10, 4, "", 1);
        $this->SetXY($x1 + 90, $y1 + 10);
        $this->MultiCell(40, 4, "Manchada", "", "L");

        $this->SetXY($x1 + 80, $y1 + 15);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(10, 4, "", 1);
        $this->SetXY($x1 + 90, $y1 + 15);
        $this->MultiCell(40, 4, "Despedida", "", "L");

        $this->SetXY($x1 + 80, $y1 + 20);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(10, 4, "", 1);
        $this->SetXY($x1 + 90, $y1 + 20);
        $this->MultiCell(40, 4, "Falta(n) gomita(s)", "", "L");

        $this->SetXY($x1 + 80, $y1 + 25);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(10, 4, "", 1);
        $this->SetXY($x1 + 90, $y1 + 25);
        $this->MultiCell(70, 4, "Etiquetas (rayadas/desprendidas)", "", "L");
    }

    function pag15($observaciones, $nombre)
    {
        $x1 = 10;
        $y1 = 160;
        $this->SetXY($x1, $y1);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(30, 4, "Observaciones", 0);
        $this->SetXY($x1 + 10, $y1 + 10);
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(160, 4, $observaciones);
        $this->Line($x1 + 10, $y1 + 14, 180, $y1 + 14);
        $this->SetXY($x1 + 10, $y1 + 10);
        $this->Line($x1 + 10, $y1 + 18, 180, $y1 + 18);
        $this->SetXY($x1 + 10, $y1 + 10);
        $this->Line($x1 + 10, $y1 + 22, 180, $y1 + 22);
        $this->SetXY($x1 + 10, $y1 + 10);
        $this->Line($x1 + 10, $y1 + 26, 180, $y1 + 26);
        $this->SetXY($x1 + 10, $y1 + 10);
        $this->Line($x1 + 10, $y1 + 30, 180, $y1 + 30);

        $this->SetXY($x1, $y1 + 40);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(190, 3, "Es responsabilidad del usuario resguardar y conservar el equipo en optimas condiciones, asi como su buen funcionamiento, comprometiendose a", 0, "C");
        $this->MultiCell(190, 3, utf8_decode("mantenerlo en el estado en el que lo recibe, cuidando de dicho material como si el mismo fuera de su propiedad, en el entendido de que en caso de que el" .
            "mismo sufra cualquier cualquier daño ocasionado por su dolo o negligencia se hara responsable de la reparacion del mismo"), 0, "C");

        $this->SetXY($x1 + 60, $y1 + 75);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(60, 4, $nombre);
        $this->SetXY($x1 + 70, $y1 + 80);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(40, 4, "Nombre y firma del trabajador", "T");
    }

    function pag21()
    {
        $x1 = 10;
        $y1 = 20;
        $this->SetXY($x1, $y1);
        $this->RoundedRect($x1, $y1, (200 - $x1), 240, 0, 'D');
        $this->SetFont("Arial", "", 10);
        $this->MultiCell(30, 4, $this->Image(base_url() . "assets/usuarios/imagenes/logogt.png", $this->GetX(), $this->GetY(), 40, 10), 0);
        $this->SetXY($x1 + 50, $y1);
        $this->SetFont("Arial", "B", 10);
        $this->MultiCell(80, 10, "ASIGNACION DE EQUIPO DE COMPUTO", 0, "C");
        $this->SetXY($x1 + 160, $y1);
        $this->SetFont("Arial", "", 5);
        $this->MultiCell(30, 5, "Ultima fecha de actualizacion: 02 de Mayo de 2019", 0, "C");

        $this->SetXY($x1, $y1 + 12);
        $this->SetFont("Arial", "", 7);
        $this->MultiCell(190, 3, "Las presentes politicas de asignacion de equipo de computo, tienen por objeto ser una guia en la toma de decisiones,asi como definir los cirterios para la conservacion y resguardo de los equipos de computo asignados como herramienta de trabajo. El desconocimento de la presente politica no exime de su cumplimineto. En caso de tratarse de cuadrilla, los trabajadores que la conformen son responsables del equipo y del cumplimineto de las presentes politicas, entendiendose como responsable solidarios", 0, "L");

        $this->SetXY($x1, $y1 + 25);
        $this->SetFont("Arial", "", 9);
        $this->SetTextColor(255, 255, 255);  // Establece el color del texto (en este caso es blanco)
        $this->SetFillColor(128, 128, 128); // establece el color del fondo de la celda (en este caso es AZUL
        $this->MultiCell(190, 4, "OBLIGACIONES DEL TRABAJADOR", 0, "C", True);
        $this->SetXY($x1, $y1 + 30);
        $this->SetFont("Arial", "", 8);
        $this->SetTextColor(0, 0, 0);  // Establece el color del texto (en este caso es blanco)
        $this->SetFillColor(0, 0, 0); // establece el color del fondo de la celda (en este caso es AZUL
        $this->MultiCell(150, 5, "I. El equipo de computo sera de uso exclusivo como herramienta de trabajo y para las actividades");
        $this->SetXY($x1, $y1 + 35);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(150, 5, "II. Conservar la herramienta de trabajo en buenas condiciones de uso y/o funcionamiento");
        $this->SetXY($x1, $y1 + 40);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(150, 5, "III. No variar la herramienta ni realizar adaptaciones");
        $this->SetXY($x1, $y1 + 45);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(150, 5, "IV. Abstenerse de instalar programas y aplicaciones ajenos a las funciones laborales");
        $this->SetXY($x1, $y1 + 50);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(150, 5, "V. Instalacion de programas unicamente con licencia");

        $this->SetXY($x1, $y1 + 55);
        $this->SetFont("Arial", "", 9);
        $this->SetTextColor(255, 255, 255);  // Establece el color del texto (en este caso es blanco)
        $this->SetFillColor(128, 128, 128); // establece el color del fondo de la celda (en este caso es AZUL
        $this->MultiCell(190, 4, "SINIESTRALIDAD", 0, "C", true);
        $this->SetXY($x1 + 15, $y1 + 60);
        $this->SetFont("Arial", "", 8);
        $this->SetTextColor(0, 0, 0);  // Establece el color del texto (en este caso es blanco)
        $this->SetFillColor(0, 0, 0); // establece el color del fondo de la celda (en este caso es AZUL
        $this->MultiCell(170, 3, "I. Cualquier falla en el equipo debe ser reportada inmediatamente al jefe inmediato via correo electronico y al responsable de Tecnologias de la informacion y mantenimiento a traves de la herramienta HelpDesk");
        $this->SetXY($x1 + 15, $y1 + 70);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(170, 3, "II. El equipo debera entregarse al responsable de Tecnologias de la informacion y mantenimiento, en un plazo maximo de 1 dia habil d ereporte de falla para que se realice el diagnostico corresponiente");
        $this->SetXY($x1 + 15, $y1 + 80);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(170, 3, "III. La unica persona autorizada para el diagnostico y reparacion del equipo sera exclusivamente el responsable de Tecnologias de la informacion y manteniento, en caso que en diagnostico se detecte manipulacion no autorizada, el trabajador cubrira todos los gastos que se causen");
        $this->SetXY($x1 + 15, $y1 + 93);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(170, 3, "IV. El diagnostico se realiza en 2 dias habiles contados a partir de de la recepcion del equipo");
        $this->SetXY($x1 + 15, $y1 + 100);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(170, 3, "V. Si el diagnostico se resulta que la falla fue ocasionada por culpa y/o negligencia en su uso. el trabajador se obliga a cubrir todos los gastos que se causen");
        $this->SetXY($x1 + 15, $y1 + 110);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(170, 3, "VI. Una Vez recibido el equipo defectuoso , se revisa la posibilidad de prestar un equipo sustituto; mismo que no podra estar en posesion del trabajador mas de 5 dias habiles, a menos que se le asigne de manera definitiva");

        $this->SetXY($x1 + 15, $y1 + 125);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(170, 3, "I. El trabajador debera informar de manera inmediata y al responsable de Tecnologias de la Informacion y mantenimiento.");
        $this->SetXY($x1 + 15, $y1 + 132);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(170, 3, "II. El trabajador debera entregar al responsable de Tecnologias de la informacion y mantenimiento la denuncia presentada ante la autoridad del domicilio que le correponda por sus funciones laborales, dentro de los 2 dias habiles siguientes. En caso contrario cubrira el valor total del equipo.");
        $this->SetXY($x1 + 15, $y1 + 145);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(170, 3, "III. Por el primer evento presentado, el patron asumira los gastos correspondientes y repondra el equipo.");
        $this->SetXY($x1 + 15, $y1 + 152);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(170, 3, "IV. Por el segundo evento presentado, el trabajador cubrira el 50% del valor del equipo para que se le reponga el equipo.");
        $this->SetXY($x1 + 15, $y1 + 159);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(170, 3, "V. A partir del tercer evento, el trabajador asumira el costo total del equipo para que se le reponga.");

        $this->SetXY($x1 + 15, $y1 + 170);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(170, 3, "I. El trabajador cubrira de manera inmediata el monto causado para la reposicion del equipo.");

        $this->SetXY($x1 + 2, $y1 + 80);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(170, 3, "Falla");

        $this->SetXY($x1 + 2, $y1 + 145);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(170, 3, "Falla");

        $this->SetXY($x1 + 2, $y1 + 170);
        $this->SetFont("Arial", "", 8);
        $this->MultiCell(170, 3, "Extravio.");
    }

    function pag22($nombre)
    {
        $x1 = 10;
        $y1 = 195;
        $this->SetXY($x1, $y1);
        $this->SetFont("Arial", "", 10);
        $this->SetFillColor(128, 128, 128); // establece el color del fondo de la celda (en este caso es AZUL
        $this->MultiCell(190, 4, "", 0, "C", True);

        $this->SetXY($x1, $y1 + 5);
        $this->SetFont("Arial", "B", 7);
        $this->SetTextColor(0, 0, 0);  // Establece el color del texto (en este caso es blanco)
        $this->SetFillColor(0, 0, 0); // establece el color del fondo de la celda (en este caso es AZUL
        $this->MultiCell(190, 3, "1. EL PATRON EN CUALQUIER MOMENTO PODRA REQUERIR AL TRABAJADOR QUE ENTREGUE EL EQUIPO PARA REVISION; PREVIO AVISO CON 2 DIAS HABILES DE ANTICIPACION");
        $this->SetXY($x1, $y1 + 12);
        $this->MultiCell(190, 3, "2. LA SINIESTRALIDAD APLICA A LA TOTALIDAD O PARCIALIDAD DE LA HERRAMIENTA");
        $this->SetXY($x1, $y1 + 17);
        $this->MultiCell(190, 3, "3. SE CONSIDERA EXTRAVIO CUANDO NO DE PRESENTE LA DENUNCIA ANTE LAS AUTORIDADES CORRESPONDIENTES");
        $this->SetXY($x1, $y1 + 22);
        $this->MultiCell(190, 3, "4. AL FINALIZAR LA RELACION DE TRABAJO O CUANDO LA ACTIVIDAD POR LA CUAL SE LE ASIGNO, DEBERA DEVOLVERLO EN OPTIMAS CONDICIONES, EN CASO CONTRARIO CUBRIRA EL COSTO DE LA REPOSICION O REPARACION DEL MISMO");
        $this->SetXY($x1, $y1 + 30);
        $this->MultiCell(190, 3, "5. PARA EL PAGO DE REPARACIONES O REPOSICION SOLO SE ACPETARA UNICAMENTE EN EFECTIVO(NO REEMPLAZO, NI REPARACIONES CASERAS)");

        $this->SetXY($x1 + 65, $y1 + 45);
        $this->MultiCell(80, 3, $nombre,0);
        $this->SetXY($x1 + 70, $y1 + 50);
        $this->MultiCell(40, 3, "Nombre y firma del Trabajador", "T");
    }
}
