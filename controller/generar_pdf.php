<?php
require('fpdf.php');

// Conexión a la base de datos
require_once "modelo/basededatos.php";
$pdo = BaseDeDatos::Conectar();

// Verificar la conexión

// Obtener el ID del acta (puede ser pasado desde la URL o un formulario)
$idActa = isset($_GET['id']) ? $_GET['id'] : 1;  // Por ejemplo, el id lo pasas por la URL

// Consultar la tabla 'actas' para obtener todos los datos necesarios
$query = "SELECT * FROM actas WHERE id_acta = ?";
$stmt = $pdo->prepare("SELECT * FROM actas WHERE id_acta = ?");
$stmt->execute([$idActa]);
$actaData = $stmt->fetch(PDO::FETCH_ASSOC);  // Aquí obtienes los datos del acta

// Cerrar la conexión a la base de datos

// Generación del PDF
class PDF extends FPDF {
    // Cabecera de página
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Acta de Reunión', 0, 1, 'C');
        $this->Ln(5);
    }

    // Pie de página
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Crear instancia de PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

// ** Datos generales (obtenidos de la base de datos) **
$pdf->SetFillColor(200, 220, 255);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(60, 10, "Campo", 1, 0, 'C', true);
$pdf->Cell(130, 10, "Valor", 1, 1, 'C', true);
$pdf->SetFont('Arial', '', 10);

// Los datos que se necesitan imprimir
$data = [
    "Acta No" => $actaData['acta_no'],
    "Ficha" => $actaData['ficha'],
    "Programa" => $actaData['programa'],
    "Nombre Comité" => $actaData['nom_rev'],
    "Fecha" => $actaData['fecha'],
    "Hora Inicio" => $actaData['hora_in'],
    "Hora Fin" => $actaData['hora_fin'],
    "Lugar/Enlace" => $actaData['lu_en'],
    "Dirección" => $actaData['direccion'],
    "Ciudad" => $actaData['ciudad'],
    "Agenda" => $actaData['agenda'],
    "Objetivos" => $actaData['objetivos']
];

// Iniciar la impresión del acta en el PDF
$pdf->SetFont('Arial', 'B', 10);

// Lista de campos a imprimir con sus nombres en el PDF
$fields = [
    'n_acta' => 'Número de Acta',
    'acta_no' => 'Número de Acta Secundaria',
    'acta_contador' => 'Contador',
    'nom_rev' => 'Nombre Comité',
    'ciudad' => 'Ciudad',
    'fecha' => 'Fecha',
    'hora_in' => 'Hora Inicio',
    'hora_fin' => 'Hora Fin',
    'lu_en' => 'Lugar/Enlace',
    'direccion' => 'Dirección',
    'agenda' => 'Agenda',
    'objetivos' => 'Objetivos',
    'participantes' => 'Participantes',
    'inf_ficha' => 'Información de Ficha',
    'casos_ant' => 'Casos Anteriores',
    'aprendices_dest' => 'Aprendices Destacados',
    'casos_part' => 'Casos Particulares',
    'hechos_actuales' => 'Hechos Actuales',
    'desarrollo' => 'Desarrollo',
    'informe_vocero' => 'Informe Vocero',
    'descargos_apre' => 'Descargos Aprendices',
    'conclusion' => 'Conclusión',
    'ficha' => 'Ficha',
    'programa' => 'Programa',
    'privacidad' => 'Privacidad'
];

// Recorrer y mostrar cada campo del acta
foreach ($fields as $field => $label) {
    // Verificar si el campo existe y tiene valor
    $value = isset($actaData[$field]) && $actaData[$field] ? utf8_decode($actaData[$field]) : 'No disponible'; // Valor por defecto si está vacío
    $pdf->Cell(60, 10, $label, 1);
    $pdf->Cell(130, 10, $value, 1, 1);
}

// ** Participantes ** (Aquí deberías consultar la base de datos para los participantes, por ejemplo)
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Participantes:', 0, 1);
$pdf->SetFont('Arial', '', 10);
$participantes = [
    ["Pedro Garcia", "Instructor jefe de taller", "Asistió"],
    ["Juan Pérez", "Instructor auxiliar", "No asistió"]
];
foreach ($participantes as $row) {
    $pdf->Cell(60, 10, utf8_decode($row[0]), 1);
    $pdf->Cell(60, 10, utf8_decode($row[1]), 1);
    $pdf->Cell(40, 10, utf8_decode($row[2]), 1, 1);
}

// ** Casos Anteriores ** (Ejemplo de cómo podrías incluir esto)
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Casos Anteriores:', 0, 1);
$pdf->SetFont('Arial', '', 10);
$casosAnteriores = [
    ["2450019", "001", "Pedro Garcia", "Instructor", "Descripción del caso", "Cumplido"]
];
foreach ($casosAnteriores as $row) {
    $pdf->Cell(40, 10, utf8_decode($row[0]), 1);
    $pdf->Cell(30, 10, utf8_decode($row[1]), 1);
    $pdf->Cell(40, 10, utf8_decode($row[2]), 1);
    $pdf->Cell(40, 10, utf8_decode($row[3]), 1);
    $pdf->Cell(50, 10, utf8_decode($row[4]), 1);
    $pdf->Cell(30, 10, utf8_decode($row[5]), 1, 1);
}

// ** Casos Particulares ** (Ejemplo de cómo podrías incluir esto)
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Casos Particulares:', 0, 1);
$pdf->SetFont('Arial', '', 10);
$casosParticulares = [
    ["Juan Pérez", "Instructor", "Descripción Académica"]
];
foreach ($casosParticulares as $row) {
    $pdf->Cell(60, 10, utf8_decode($row[0]), 1);
    $pdf->Cell(60, 10, utf8_decode($row[1]), 1);
    $pdf->Cell(60, 10, utf8_decode($row[2]), 1, 1);
}

// ** Hechos Actuales **
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Hechos Actuales:', 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(0, 10, utf8_decode($actaData['hechos_actuales']));

// ** Desarrollo del Comité **
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Desarrollo del Comité:', 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(0, 10, utf8_decode($actaData['desarrollo']));

// ** Informe Vocero **
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Informe del Vocero:', 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(0, 10, utf8_decode($actaData['informe_vocero']));

// ** Conclusión **
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Conclusiones:', 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(0, 10, utf8_decode($actaData['conclusion']));

// ** Compromisos y protección de datos **
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Compromisos:', 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(60, 10, 'Actividad', 1);
$pdf->Cell(130, 10, 'Responsable', 1, 1);
$pdf->Cell(60, 10, 'Programación sesión', 1);
$pdf->Cell(130, 10, 'Área bienestar al Aprendiz', 1, 1);

// ** Protección de datos personales **
$pdf->Ln(5);
$pdf->SetFont('Arial', 'I', 8);
$pdf->MultiCell(0, 10, utf8_decode('De acuerdo con la Ley 1581 de 2012, Protección de datos personales se debe garantizar la seguridad y protección de los datos personales que se encuentran almacenados en este documento.'));

// Generar el PDF
$pdf->Output();
