<?php
require('fpdf.php');

class PDF extends FPDF {
    function Header() {

        // Dibuja un rectángulo (margen con borde negro)
        $this->Rect(10, 10, $this->GetPageWidth() - 20, $this->GetPageHeight() - 20); // Rectángulo con 10mm de margen

        // Ruta del logo del SENA
        $logoPath = 'multimedia/logo-sena.png';
        $logoWidth = 20; // Ancho deseado del logo
        $pageWidth = $this->GetPageWidth(); // Ancho de la página
        $centerX = ($pageWidth - $logoWidth) / 2; // Posición centr
        
        // Agregar el logo (X=75, Y=10, Ancho=60)
        $this->Image($logoPath, $centerX, 11, $logoWidth); 
        $this->Ln(22); // Espacio debajo del logo

        // Título del acta
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(190, 10, utf8_decode('ACTA DE REUNIÓN'), 1, 1, 'C');
        $this->Ln(5);
    }

    function Footer() {
        $this->SetY(-10); // Baja un poco más para dejar espacio
        $this->SetFont('Arial', 'B', 8);
        $this->SetTextColor(50, 50, 50); // Gris oscuro
        $this->Cell(0, 10, 'GOR-F-084V02', 0, 0, 'C');
    }
    
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

$conn = mysqli_connect("localhost", "root", "", "acta_completas");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

// Variables necesarias para filtrado
$ficha = isset($_GET['ficha']) ? trim($_GET['ficha']) : '';
$acta_contador = isset($_GET['acta_contador']) ? max(0, (int)$_GET['acta_contador']) : 0;


// Validar que se recibió el parámetro n_acta
if (!isset($_GET['n_acta']) || !is_numeric($_GET['n_acta'])) {
    die("Error: Número de acta inválido o no proporcionado.");
}

$n_acta = (int) $_GET['n_acta']; // Convertimos a entero por seguridad

// Preparar consulta
$sql = "SELECT * FROM acta WHERE n_acta = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $n_acta); // "i" porque es un número entero
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Cabecera del Acta
    $pdf->SetFillColor(0, 0, 0); // Fondo negro
    $pdf->SetTextColor(255, 255, 255); // Texto blanco
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(190, 10, 'ACTA No. ' . utf8_decode($row['acta_no']) . ' - ' . date('Y'), 1, 1, 'C', true);

    // Nombre del Comité
    $pdf->SetFillColor(230, 230, 230);
    $pdf->SetTextColor(0, 0, 0); // Texto negro
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(190, 8, utf8_decode('NOMBRE DEL COMITÉ O DE LA REUNIÓN:'), 1, 1, 'L', true);

    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(190, 8, utf8_decode($row['nom_rev']), 1, 'L');

    // Ciudad y Fecha - Hora Inicio y Hora Fin
    $pdf->SetFillColor(230, 230, 230);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(95, 8, 'CIUDAD Y FECHA:', 1, 0, 'L', true);
    $pdf->Cell(95, 8, 'HORA INICIO Y HORA FIN:', 1, 1, 'L', true);

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(95, 8, utf8_decode($row['ciudad'] . ', ' . $row['fecha']), 1, 0, 'L');
    $pdf->Cell(47.5, 8, utf8_decode($row['hora_in']), 1, 0, 'L');
    $pdf->Cell(47.5, 8, utf8_decode($row['hora_fin']), 1, 1, 'L');

    // Lugar y Dirección (CORREGIDO CON MULTICELL)
    $pdf->SetFillColor(230, 230, 230);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(95, 8, 'LUGAR Y/O ENLACE:', 1, 0, 'L', true);
    $pdf->Cell(95, 8, utf8_decode('DIRECCIÓN / REGIONAL / CENTRO:'), 1, 1, 'L', true);

    $pdf->SetFont('Arial', '', 10);

    // Guardar posición inicial
    $x = $pdf->GetX();
    $y = $pdf->GetY();

    // Lugar y/o Enlace
    $pdf->MultiCell(95, 8, utf8_decode($row['lu_en']), 1, 'L');

    // Volver a la posición para Dirección
    $pdf->SetXY($x + 95, $y);

    // Dirección / Regional / Centro
    $pdf->MultiCell(95, 8, utf8_decode($row['direccion']), 1, 'L');

    // Espacio
    $pdf->Ln(7);

    // Agenda
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetFillColor(230, 230, 230);
    $pdf->Cell(190, 10, 'Agenda o Puntos a Desarrollar', 1, 1, 'C', true);

    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(190, 8, utf8_decode($row['agenda']), 1, 'L');

    // Objetivos
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetFillColor(230, 230, 230);
    $pdf->Cell(190, 10, 'Objetivos', 1, 1, 'C', true);

    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(190, 8, utf8_decode($row['objetivos']), 1, 'L');
    
} else {
    $pdf->SetFillColor(230, 230, 230);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(190, 10, 'No se encontraron datos de actas.', 1, 1, 'C');
}

// * Título Principal *
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, utf8_decode('DESARROLLO DE LA REUNIÓN'), 1, 1, 'C');

// * Sección 1: Participantes *
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, '1. Participantes', 1, 1, 'C', true); 
$pdf->Ln(5);

$pdf->SetFont('Arial', '', 10);
$text = "Acorde al reglamento acuerdo 009 del 2024 artículo 48, este Comité está conformado por los siguientes integrantes, quienes tendrán voz y voto:";
$pdf->MultiCell(0, 6, utf8_decode($text), 0, 'J');
$pdf->Ln(5);

// * Integrantes con Voz y Voto *
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 200, 200);
$pdf->Cell(190, 7, utf8_decode('Integrantes con Voz y Voto'), 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);

$integrantesVoto = [
    "a) Un Instructor del programa de formación, en representación del equipo ejecutor del grupo del programa, que será designado por el subdirector del Centro.",
    "b) El Coordinador de Formación del Centro o quien este designe.",
    "c) El Coordinador Académico o quien este designe, quien realiza citación al comité y acta respectiva."
];

foreach ($integrantesVoto as $item) {
    $pdf->MultiCell(190, 6, utf8_decode($item), 0, 'L');
}

$pdf->Ln(5);


// * Integrantes con Voz pero sin Voto *
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 200, 200);
$pdf->Cell(190, 7, utf8_decode('Integrantes con Voz pero sin Voto'), 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);

$integrantesSinVoto = [
    "El representante de los aprendices del Centro de formación de la respectiva modalidad del programa. En su ausencia, el suplente.",
    "El aprendiz vocero del grupo de formación."
];

foreach ($integrantesSinVoto as $item) {
    $pdf->MultiCell(190, 6, utf8_decode($item), 0, 'L');
}

$pdf->Ln(5);


// * Nota sobre invitación a Bienestar del Aprendiz *
$pdf->SetFont('Arial', 'I', 10);
$pdf->MultiCell(0, 6, utf8_decode("Teniendo en cuenta el parágrafo 2, se realizó invitación a representantes del área de bienestar del aprendiz a las sesiones del comité de evaluación y seguimiento para que ayuden al comité a tomar una decisión más objetiva. Quienes tendrán voz, pero no voto."), 0, 'J');
$pdf->Ln(10);

// * Tabla de Participantes *

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 200, 200);

// Ancho total de la tabla
$tableWidth = 170;
$centerX = ($pdf->GetPageWidth() - $tableWidth) / 2;

// Encabezado centrado
$pdf->SetX($centerX);
$pdf->Cell(10, 7, '#', 1, 0, 'C', true);
$pdf->Cell(60, 7, 'Nombres y Apellidos', 1, 0, 'C', true);
$pdf->Cell(70, 7, 'Cargo', 1, 0, 'C', true);
$pdf->Cell(30, 7, 'Asistencia', 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 10);

$consulta = "SELECT nombre, cargo, asistencia FROM participantes WHERE n_acta = ?";
$stmt = $conn->prepare($consulta);
$stmt->bind_param("i", $n_acta);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado) {
    $index = 1;
    while ($row = mysqli_fetch_assoc($resultado)) {
        $pdf->SetX($centerX); // Centrar cada fila
        $pdf->Cell(10, 6, $index++, 1, 0, 'C');
        $pdf->Cell(60, 6, utf8_decode($row['nombre']), 1, 0, 'L');
        $pdf->Cell(70, 6, utf8_decode($row['cargo']), 1, 0, 'L');
        $pdf->Cell(30, 6, utf8_decode($row['asistencia']), 1, 1, 'C');
    }
} else {
    $pdf->SetX($centerX);
    $pdf->Cell($tableWidth, 6, 'Error al obtener los datos.', 1, 1, 'C');
}


$pdf->Ln(5);

$pdf->SetFont('Arial', 'I', 10);
$pdf->MultiCell(0, 6, utf8_decode("Verificado que existe quórum para sesionar y tomar decisiones, se da inicio al comité extraordinario de evaluación y seguimiento. "), 0, 'J');
$pdf->Ln(5);

// * Sección 2: Verificación del acta(s) anterior(es) * 

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(230, 230, 230);
$titulo = mb_convert_encoding('2. Verificación del acta(s) anterior(es):', 'ISO-8859-1', 'UTF-8');
$pdf->Cell(0, 10, $titulo, 1, 1, 'C', true);
$pdf->Ln(5);

$pdf->SetFont('Arial', '', 11); // Fuente regular para el contenido

if (!empty($ficha) && $acta_contador > 1) {
    $acta_anterior = $acta_contador - 1;

    // Consulta con todos los campos necesarios
    $consulta = "SELECT n_acta, fecha, nom_rev, ficha, programa 
                 FROM acta 
                 WHERE ficha = ? AND acta_contador = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->bind_param("ii", $ficha, $acta_anterior);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado && $resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();

        // Formatear fecha al estilo español
        setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'esp'); // Asegura formato de fecha en español
        $fecha_formateada = strftime("%d de %B de %Y", strtotime($row['fecha']));

        // Construir texto final del acta anterior
        $texto_acta = "Acta " . $row['n_acta'] . " - " . date("Y", strtotime($row['fecha'])) .
        " del " . $fecha_formateada . " " .
        $row['nom_rev'] . " FICHA " . $row['ficha'] . " - " . $row['programa'] . ".";
        $pdf->MultiCell(0, 7, utf8_decode($texto_acta), 0, 'L');
    } else {
        $pdf->MultiCell(0, 7, utf8_decode("No se encontró acta anterior para esta ficha."), 0, 'L');
    }
} else {
    $pdf->MultiCell(0, 7, utf8_decode("No hay acta anterior disponible para mostrar."), 0, 'L');
}

$pdf->Ln(5);

// * Sección 3: Casos Anteriores al Comité *

mysqli_set_charset($conn, "utf8mb4");

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(230, 230, 230);
$titulo = mb_convert_encoding('3. Casos anterior comité:', 'ISO-8859-1', 'UTF-8');
$pdf->Cell(0, 10, $titulo, 1, 1, 'C', true);
$pdf->Ln(3);

// Obtener valores actuales de ficha y acta_contador
$ficha = isset($_GET['ficha']) ? (int) $_GET['ficha'] : 0;
$acta_contador = isset($_GET['acta_contador']) ? (int) $_GET['acta_contador'] : 0;

if ($ficha > 0 && $acta_contador > 1) {
    // Buscar el n_acta del acta anterior (de la misma ficha)
    $consulta_anterior = "SELECT n_acta FROM acta WHERE ficha = ? AND acta_contador < ? ORDER BY acta_contador DESC LIMIT 1";
    $stmt_prev = $conn->prepare($consulta_anterior);
    $stmt_prev->bind_param("ii", $ficha, $acta_contador);
    $stmt_prev->execute();
    $stmt_prev->bind_result($n_acta_anterior);

    if ($stmt_prev->fetch()) {
        $stmt_prev->close();

        // Consultar los casos anteriores
        $consulta = "SELECT Aprendiz, medida, descripcion_m, cumplimiento, tipo_con, documento_con FROM conclusiones 
                     WHERE n_acta = ? AND c_contador IN (1, 2, 3)";
        $stmt = $conn->prepare($consulta);
        $stmt->bind_param("i", $n_acta_anterior);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado && $resultado->num_rows > 0) {
            $pdf->SetFont('Arial', '', 10);

            while ($ww = $resultado->fetch_assoc()) {
                $nombre = $ww['Aprendiz'];
                $tipo_con = $ww['tipo_con'];
                $documento_con = $ww['documento_con'];
                $medida = $ww['medida'];
                $descripcion = $ww['descripcion_m'];
                $cumple = trim(strtolower($ww['cumplimiento']));

                $parrafo1 = "- CASO {$nombre}: {$cumple}";
                $parrafo2 = " {$tipo_con}: {$documento_con}";
                $parrafo3 = "El comité de evaluación y seguimiento determina aplicar {$medida}, {$descripcion}. {$ww['cumplimiento']}.";

                $pdf->SetFont('Arial', 'B', 10);
                $pdf->MultiCell(0, 6, utf8_decode($parrafo1));
                $pdf->SetFont('Arial', '', 10);
                $pdf->MultiCell(0, 6, utf8_decode($parrafo2));
                $pdf->MultiCell(0, 6, utf8_decode($parrafo3));
                $pdf->Ln(3);
            }
        } else {
            $pdf->MultiCell(0, 6, utf8_decode('NO HAY CASOS REGISTRADOS'));
        }

        $stmt->close();
    } else {
        $pdf->MultiCell(0, 6, utf8_decode('NO HAY ACTAS ANTERIORES PARA ESTA FICHA'));
    }
} else {
    $pdf->MultiCell(0, 6, utf8_decode('Esta es la primera acta registrada para esta ficha.'));
}

$pdf->Ln(10);

// * Sección 4: Casos Particulares *
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(230, 230, 230);
$pdf->MultiCell(0, 10, utf8_decode('4. Casos Particulares (Anotaciones Adicionales Comité):'), 1, 'C', true);
$pdf->Ln(5);

// Consulta filtrada por el acta actual
$consulta = "SELECT nombre_aprendiz, tipo, documento, nombre_its, falta, reglamento, cla_falta 
             FROM casos_especiales 
             WHERE C_acta = ?";
$stmt = $conn->prepare($consulta);
$stmt->bind_param("i", $n_acta);
$stmt->execute();
$resultado = $stmt->get_result();

$pdf->SetFont('Arial', '', 10);
$index = 1;

if ($resultado && $resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $textoCaso = "{$index}. Aprendiz: {$row['nombre_aprendiz']}\n" .
                     "   - Tipo Documento: {$row['tipo']}\n" .
                     "   - N. Documento: {$row['documento']}\n" .
                     "   - Instructor: {$row['nombre_its']}\n" .
                     "   - Falta: {$row['falta']}\n" .
                     "   - Reglamento Aplicado: {$row['reglamento']}\n" .
                     "   - Calificación provisional de la(s) probable(s) falta(s): {$row['cla_falta']}\n";

        $pdf->MultiCell(0, 7, utf8_decode($textoCaso), 0, 'L');
        $pdf->Ln(3); // Espacio entre cada caso
        $index++;
    }
} else {
    $pdf->MultiCell(0, 7, utf8_decode("No se registraron casos particulares en este acta."), 0, 'L');
}


$pdf->Ln(5);

// * Sección 5: Hechos Actuales *

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(230, 230, 230);
$pdf->Cell(190, 10, utf8_decode('5. Hechos Actuales:'), 1, 1, 'C', true);
$pdf->Ln(3);

$consulta = "SELECT hechos_actuales FROM acta WHERE n_acta = ?";
$stmt = $conn->prepare($consulta);
$stmt->bind_param("i", $n_acta); // Asegúrate de tener $n_acta bien definido
$stmt->execute();
$resultado = $stmt->get_result();

if ($row = $resultado->fetch_assoc()) {
    $hechos_actuales = $row['hechos_actuales'];

    // Convertir a ISO-8859-1 para evitar problemas con tildes
    $hechos_actuales = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $hechos_actuales);

    // Mostrar el contenido con justificación
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 6, $hechos_actuales, 1, 'L', false);
} else {
    // Mensaje por si no se encuentra el registro
    $pdf->SetFont('Arial', 'I', 10);
    $pdf->MultiCell(0, 6, mb_convert_encoding('No se registraron hechos actuales', 'ISO-8859-1', 'UTF-8'), 1, 'C', false);
}

// * Sección 6: Desarrollo Comité *

mysqli_set_charset($conn, "utf8mb4");

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, mb_convert_encoding('6. Desarrollo del Comité', 'ISO-8859-1', 'UTF-8'), 1, 1, 'C', true);
$pdf->Ln(10); 
$pdf->SetFont('Arial', '', 10);

$consulta = "
SELECT 
    dc.d_nombre_aprendiz, dc.d_descargos_its, dc.d_descargos_its_b, dc.d_descargos_its_c, dc.d_descargos_its_d, 
    dc.d_descargos_aprendiz, dc.medida_formativa_comite, dc.inf_jefe_taller, dc.inf_instructores,
    ce.cla_falta, ce.tipo, ce.documento
FROM 
    desarrollo_comite dc
LEFT JOIN 
    casos_especiales ce ON dc.d_nombre_aprendiz = ce.nombre_aprendiz AND ce.C_acta = dc.n_acta
WHERE 
    dc.n_acta = ?
";

$stmt = $conn->prepare($consulta);
$stmt->bind_param("i", $n_acta); // Asegúrate de que $n_acta esté definido correctamente
$stmt->execute();
$resultado = $stmt->get_result();

while ($row = $resultado->fetch_assoc()) {
    $aprendiz = mb_convert_encoding($row['d_nombre_aprendiz'], 'ISO-8859-1', 'UTF-8');
    $tipo = mb_convert_encoding($row['tipo'], 'ISO-8859-1', 'UTF-8');
    $documento = mb_convert_encoding($row['documento'], 'ISO-8859-1', 'UTF-8');
    $instructor1 = mb_convert_encoding($row['d_descargos_its'], 'ISO-8859-1', 'UTF-8');
    $instructor2 = mb_convert_encoding($row['d_descargos_its_b'], 'ISO-8859-1', 'UTF-8');
    $instructor3 = mb_convert_encoding($row['d_descargos_its_c'], 'ISO-8859-1', 'UTF-8');
    $instructor4 = mb_convert_encoding($row['d_descargos_its_d'], 'ISO-8859-1', 'UTF-8');
    $descargosAprendiz = mb_convert_encoding($row['d_descargos_aprendiz'], 'ISO-8859-1', 'UTF-8');
    $medida_formativa_comite = mb_convert_encoding($row['medida_formativa_comite'], 'ISO-8859-1', 'UTF-8');
    $inf_jefe_taller = mb_convert_encoding($row['inf_jefe_taller'], 'ISO-8859-1', 'UTF-8');
    $inf_instructores = mb_convert_encoding($row['inf_instructores'], 'ISO-8859-1', 'UTF-8');
    $cla_falta = mb_convert_encoding($row['cla_falta'], 'ISO-8859-1', 'UTF-8');

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->MultiCell(0, 5, "CASO: $aprendiz", 0, 'L');
    $pdf->MultiCell(0, 5, utf8_decode("Tipo documento: " . $tipo), 0, 'L');
    $pdf->MultiCell(0, 5, utf8_decode("Número: " . $documento), 0, 'L');
    $pdf->Ln(5);

    // ANTECEDENTES
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->MultiCell(0, 10, "ANTECEDENTES:", 0, 'L');
    $pdf->Ln(4);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 6, "Instructor o funcionario: ", 0, 0, 'L');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 6, $instructor1, 0, 'L');
    $pdf->Ln(2);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 6, "Instructor o funcionario: ", 0, 0, 'L');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 6, $instructor2, 0, 'L');
    $pdf->Ln(2);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 6, "Instructor o funcionario: ", 0, 0, 'L');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 6, $instructor3, 0, 'L');
    $pdf->Ln(2);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 6, "Instructor o funcionario: ", 0, 0, 'L');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 6, $instructor4, 0, 'L');
    $pdf->Ln(5);

    // DESCARGOS DEL APRENDIZ
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->MultiCell(0, 5, "DESCARGOS DEL APRENDIZ:", 0, 'L');
    $pdf->Ln(2);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 5, $descargosAprendiz);
    $pdf->Ln(5);

    // CALIFICACIÓN DEFINITIVA
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->MultiCell(0, 5, utf8_decode("CALIFICACIÓN DEFINITIVA DE LA FALTA:"), 0, 'L');
    $pdf->Ln(2);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 5, 
        "Una vez analizadas las pruebas aportadas por el instructor jefe de taller y teniendo en cuenta el reglamento del aprendiz, se califica la falta como $cla_falta\n"
    );
    $pdf->Ln(5);

    // DEBERES
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->MultiCell(0, 5, utf8_decode("Deberes del Aprendiz Sena durante el proceso de ejecución de la formación, los siguientes:"), 0, 'L');
    $pdf->Ln(2);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 6, utf8_decode(
        "2. Conocer y cumplir el reglamento del aprendiz y demás normas del SENA asociadas con su proceso formativo.\n".
        "3. Actuar siempre teniendo como base los principios y valores institucionales.\n".
        "5. Asistir con puntualidad a todas las actividades propias del proceso de formación.\n".
        "6. Cumplir con todas las actividades de su proceso formativo, presentando las evidencias según la planeación pedagógica, guías de aprendizaje y cronograma, en los plazos o en la oportunidad que estas deban presentarse o reportarse, a través de los medios dispuestos para ello.\n".
        "19. Atender las indicaciones de identificación de usuarios que disponga la entidad para el ingreso a las sedes del SENA y a los ambientes de formación.\n\n")
    );
    $pdf->Ln(5);

    // PROHIBICIONES
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->MultiCell(0, 5, utf8_decode("Prohibiciones para los Aprendices del Sena, las siguientes:"), 0, 'L');
    $pdf->Ln(2);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 6, utf8_decode(
        "2. Suplantar identidad en cualquier trámite académico o administrativo del SENA.\n".
        "4. Plagiar, materiales, trabajos y demás documentos generados en los grupos de trabajo o producto del trabajo en equipo institucional, así como en actividades evaluativas del proceso formativo o en concursos, juegos o competencias de cualquier carácter.\n".
        "6. Ingerir, ingresar, comercializar, promocionar o suministrar bebidas alcohólicas o sustancias psicoactivas, dentro de las instalaciones físicas y virtuales del SENA o en los ambientes formativos SENA, o ingresar a la entidad en estado que indique alteraciones de conducta ocasionadas por el consumo de estas o bajo su efecto.\n".
        "9. Cometer, ser cómplice o copartícipe de delitos contra la comunidad educativa o contra la Institución.\n")
    );
    $pdf->Ln(5);

    // MEDIDA FORMATIVA
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->MultiCell(0, 5, utf8_decode("MEDIDA FORMATIVA DEL COMITÉ:"), 0, 'L');
    $pdf->Ln(2);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 5, $medida_formativa_comite);
    $pdf->Ln(5);

    // INFORME JEFE DE TALLER
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->MultiCell(0, 6, "INFORME JEFE DE TALLER:", 0, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 6, $inf_jefe_taller, 0, 'L');
    $pdf->Ln(5);

    // INFORME INSTRUCTORES
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->MultiCell(0, 6, "INFORME INSTRUCTORES:", 0, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 6, $inf_instructores, 0, 'L');
    $pdf->Ln(5);

    // Nueva página si es necesario
    $bottomMargin = 20; 
    if ($pdf->GetY() + 50 > $pdf->GetPageHeight() - $bottomMargin) {
        $pdf->AddPage();
        $pdf->Ln(5);
    }
}
$pdf->Ln(4);

// * Sección 7: Informe Vocero *

// Verificar si hay espacio suficiente en la página, si no, agregar una nueva
if ($pdf->GetY() + 20 > $pdf->GetPageHeight() - 15) {
    $pdf->AddPage();
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->MultiCell(0, 10, mb_convert_encoding('7. INFORME VOCERO Y SUBVOCERO', 'ISO-8859-1', 'UTF-8'), 1, 'C', true);
$pdf->Ln(4);

// Consultar los informes del vocero y subvocero desde la tabla acta
$consulta = "SELECT informe_vocero, informe_subvocero FROM acta WHERE n_acta = ?";
$stmt = $conn->prepare($consulta);
$stmt->bind_param("i", $n_acta);
$stmt->execute();
$resultado = $stmt->get_result();

if ($row = $resultado->fetch_assoc()) {
    // Subtítulo Vocero
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->MultiCell(0, 5, "Vocero", 0, 'L');
    $pdf->Ln(3);

    $informe_vocero = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $row['informe_vocero']);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 6, $informe_vocero, 'L', false);
    $pdf->Ln(5);

    // Subtítulo Subvocero
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->MultiCell(0, 5, "Subvocero", 0, 'L');
    $pdf->Ln(3);

    $informe_subvocero = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $row['informe_subvocero']);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 6, $informe_subvocero, 'L', false);
} else {
    $pdf->SetFont('Arial', 'I', 10);
    $pdf->MultiCell(0, 6, mb_convert_encoding('No hay informe del vocero o subvocero disponible.', 'ISO-8859-1', 'UTF-8'), 1, 'C', false);
}



$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 10);
$pdf->MultiCell(0, 7, mb_convert_encoding('Tomando como referencia el reglamento del aprendiz según acuerdo 009 del 2024', 'ISO-8859-1', 'UTF-8'), 1, 'C', true);
$pdf->Ln(5);

$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(240, 240, 240);
$pdf->MultiCell(0, 7, mb_convert_encoding("
ARTÍCULO 8o. Además de los consagrados en la Constitución y las leyes y demás normas colombianas, el aprendiz SENA es responsable de cumplir con los siguientes deberes, obligaciones y responsabilidades académicos, disciplinarios y administrativos: 

Son deberes del Aprendiz Sena durante el proceso de ejecución de la formación, los siguientes: 

2. Conocer y cumplir el reglamento del aprendiz y demás normas del SENA asociadas con su proceso formativo. 

3. Actuar siempre teniendo como base los principios y valores institucionales. 

5. Asistir con puntualidad a todas las actividades propias del proceso de formación. 

6. Cumplir con todas las actividades de su proceso formativo, presentando las evidencias según la planeación pedagógica, guías de aprendizaje y cronograma, en los plazos o en la oportunidad que estas deban presentarse o reportarse, a través de los medios dispuestos para ello. 

19. Atender las indicaciones de identificación de usuarios que disponga la entidad para el ingreso a las sedes del SENA y a los ambientes de formación. 

ARTÍCULO 10. Se considerarán prohibiciones para los Aprendices del Sena, las siguientes: 

2. Suplantar identidad en cualquier trámite académico o administrativo del SENA. 

4. Plagiar, materiales, trabajos y demás documentos generados en los grupos de trabajo o producto del trabajo en equipo institucional, así como en actividades evaluativas del proceso formativo o en concursos, juegos o competencias de cualquier carácter. 

6. Ingerir, ingresar, comercializar, promocionar o suministrar bebidas alcohólicas o sustancias psicoactivas, dentro de las instalaciones físicas y virtuales del SENA o en los ambientes formativos SENA, o ingresar a la entidad en estado que indique alteraciones de conducta ocasionadas por el consumo de estas o bajo su efecto. 

9. Cometer, ser cómplice o copartícipe de delitos contra la comunidad educativa o contra la Institución. 

ARTÍCULO 27. CUMPLIMIENTO SATISFACTORIO DEL PROCESO FORMATIVO. Se configura cuando el aprendiz presenta evidencias de aprendizaje, idóneas y pertinentes, en las fechas establecidas, asiste y participa activamente en actividades presenciales o virtuales concertadas en su ruta de aprendizaje. Se configura como un incumplimiento la falta de ejecución de lo anteriormente definido. Los incumplimientos se catalogan en incumplimientos justificados y no justificados. Además, se constituyen en faltas académicas o disciplinarias según sea el caso: 

ARTÍCULO 29. INCUMPLIMIENTO INJUSTIFICADO. Se configura incumplimiento injustificado en los siguientes casos: 

1. Cuando el aprendiz no reporta, ni justifica estos incumplimientos ante el instructor, previamente o dentro de los cinco (5) días hábiles siguientes a su ocurrencia con las respectivas evidencias, conforme a los plazos previstos en el anterior artículo. 

2. Cuando el aprendiz reporta su inasistencia en la oportunidad y dentro del plazo establecido pero las causas y soportes no corresponden a las establecidas para incumplimientos justificados. 

El Instructor o Tutor debe efectuar el seguimiento y reporte en el sistema para la gestión de la formación. 

Según los informes descritos por los instructores y de acuerdo a los apartes del reglamento contemplados la medida formativa definida es: 

DESERCIÓN 

a) En la formación presencial, excepto la complementaria, tener tres (3) días continuos de inasistencia injustificada o acumular cinco (5) días no continuos de inasistencia injustificada durante todo el proceso de formación. 

LLAMADO DE ATENCIÓN ESCRITO: 

- Los llamados de atención deben ser por escrito, el aprendiz puede recibir hasta dos (2) llamados de atención por fase del proyecto formativo, por parte de los instructores integrantes del equipo ejecutor, para alcanzar el o los resultados de aprendizaje.  

- El segundo llamado de atención debe ir acompañado de orientaciones académicas escritas basadas en estrategias pedagógicas que le permitan al aprendiz superar el resultado de aprendizaje y acatarlas de modo inmediato. Las orientaciones académicas no son planes de mejoramiento. 

PLAN DE MEJORAMIENTO DISCIPLINARIO 

- No deberá haber inasistencias ni retardos, en el horario que se determine o se incurrirá en plan de mejoramiento integral. 

PLAN DE MEJORAMIENTO ACADÉMICO 

- Deberá cumplir con todas las evidencias acordadas desde el inicio del trimestre en el plan de trabajo y evaluación o se incurrirá en plan de mejoramiento Integral. 

PLAN DE MEJORAMIENTO ACADÉMICO Y DISCIPLINARIO 

- Deberá cumplir con todas las evidencias acordadas desde el inicio del trimestre en el plan de trabajo y evaluación Y No deberá haber inasistencias ni retardos, en el horario que se determine o se incurrirá en plan de mejoramiento Integral. 

PLAN DE MEJORAMIENTO INTEGRAL POR COMITÉ 

- No deberá haber inasistencias ni retardos, en el horario que se determine y deberá cumplir con todas las evidencias acordadas desde el inicio del trimestre en el plan de trabajo y evaluación o se incurrirá en Condicionamiento de Matrícula. 

CONDICIONAMIENTO DE LA MATRÍCULA 

- Medida académica sancionatoria que se impone al aprendiz que incurra en una falta académica o disciplinaria, previo agotamiento de la aplicación de las medidas formativas o disciplinarias. Esta decisión será determinada en el acto administrativo que ordene el condicionamiento de matrícula. Una vez quede en firme el condicionamiento de la matrícula, el aprendiz perderá durante el tiempo que dure el mismo, los estímulos e incentivos que esté recibiendo, si los tuviere. Transcurrido este tiempo el condicionamiento no es superado se procederá a recomendar a la Subdirección de Centro realizar la Cancelación de la Matrícula. 

CANCELACIÓN DE MATRÍCULA 

- Acto administrativo que se origina cuando las causales del aprendíz que originaron el condicionamiento de la matrícula o por faltas catalogadas como graves o gravísimas de acuerdo con la clasificación determinada, o situaciones que se consideran deserción en este Reglamento. 

- Una vez en firme la sanción, debe entregar de manera inmediata el carné institucional y ponerse a paz y salvo por todo concepto. 
", 'ISO-8859-1', 'UTF-8'), 1, 'L');

$pdf->Ln(10);

// * Sección de Compromisos *
if ($pdf->GetY() + 20 > $pdf->GetPageHeight() - 15) {
    $pdf->AddPage();
}

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 7, mb_convert_encoding('Compromisos:', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C');

// Consulta de compromisos relacionados al acta actual
$consulta_compromisos = "SELECT responsable, actividad FROM compromisos WHERE n_acta = ?";
$stmt = $conn->prepare($consulta_compromisos);
$stmt->bind_param("i", $n_acta);
$stmt->execute();
$resultado_compromisos = $stmt->get_result();

if ($resultado_compromisos) {
    while ($row = $resultado_compromisos->fetch_assoc()) {
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 7, mb_convert_encoding($row['responsable'] . ':', 'ISO-8859-1', 'UTF-8'), 0, 1, 'L');

        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(0, 7, mb_convert_encoding($row['actividad'], 'ISO-8859-1', 'UTF-8'), 0, 'J');
        $pdf->Ln(0);
    }
} else {
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 7, 'Error al obtener los compromisos.', 0, 1, 'L');
}

$pdf->Ln(0);

// Consulta de hora_fin y fecha del acta actual
$consulta_acta = "SELECT hora_fin, fecha FROM acta WHERE n_acta = ?";
$stmt_acta = $conn->prepare($consulta_acta);
$stmt_acta->bind_param("i", $n_acta);
$stmt_acta->execute();
$resultado_acta = $stmt_acta->get_result();

if ($resultado_acta && $row_acta = $resultado_acta->fetch_assoc()) {
    $fecha = $row_acta['fecha'];
    setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'esp');
    $fecha_formateada = strftime('%d de %B del %Y', strtotime($fecha));

    $hora_fin = $row_acta['hora_fin'];
    $mensaje_final = "Siendo las: $hora_fin horas, del día $fecha_formateada, se da por finalizada la sesión de la presente reunión.";

    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->MultiCell(0, 7, mb_convert_encoding($mensaje_final, 'ISO-8859-1', 'UTF-8'), 0, 'J');
} else {
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->MultiCell(0, 7, mb_convert_encoding("No se pudo obtener la información de finalización de la reunión.", 'ISO-8859-1', 'UTF-8'), 0, 'J');
}

$pdf->Ln(5);

// * Sección de conclusiones *
if ($pdf->GetY() + 20 > $pdf->GetPageHeight() - 15) {
    $pdf->AddPage();
}

// Título principal
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, mb_convert_encoding('CONCLUSIONES', 'ISO-8859-1', 'UTF-8'), 1, 1, 'C', true);
$pdf->Ln(2);

// Validar espacio antes de agregar sección
if ($pdf->GetY() + 40 > $pdf->GetPageHeight() - 15) {
    $pdf->AddPage();
}

// Consulta a la base de datos actualizada
$consulta_conclusiones = "SELECT Aprendiz, tipo_con, documento_con, medida, descripcion_m FROM conclusiones WHERE n_acta = ?";
$stmt = $conn->prepare($consulta_conclusiones);
$stmt->bind_param("i", $n_acta);
$stmt->execute();
$resultado_conclusiones = $stmt->get_result();

// Mostrar cada conclusión
if ($resultado_conclusiones && $resultado_conclusiones->num_rows > 0) {
    while ($row = $resultado_conclusiones->fetch_assoc()) {
        // Nombre y documento
        $pdf->Ln(2);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->MultiCell(0, 7, mb_convert_encoding('- CASO ' . strtoupper($row['Aprendiz']), 'ISO-8859-1', 'UTF-8'), 0, 'L');
        $pdf->MultiCell(0, 7, mb_convert_encoding('  ' . strtoupper($row['tipo_con']) . ' ' . $row['documento_con'], 'ISO-8859-1', 'UTF-8'), 0, 'L');

        // Medida
        $pdf->SetFont('Arial', '', 10);
        $texto = $row['descripcion_m'] . ' El comité de evaluación y seguimiento determina aplicar medida de ' . $row['medida'] . '.';
        $pdf->MultiCell(0, 7, mb_convert_encoding($texto, 'ISO-8859-1', 'UTF-8'), 0, 'J');
        $pdf->Ln(2);
    }
} else {
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(0, 7, mb_convert_encoding('No se encontraron conclusiones registradas.', 'ISO-8859-1', 'UTF-8'), 0, 'L');
}

$pdf->Ln(5);

if ($pdf->GetY() + 60 > $pdf->GetPageHeight() - 15) {
    $pdf->AddPage();
}

// Variables de ancho de columnas
$col1 = 40; // NOMBRE
$col2 = 45; // DEPENDENCIA / EMPRESA
$col3 = 25; // APRUEBA (SI/NO)
$col4 = 30; // OBSERVACIÓN
$col5 = 50; // FIRMA/PARTICIPACIÓN

// Subtítulo con MultiCell para permitir ajuste de línea
$pdf->SetFont('Arial', 'B', 10);
$pdf->MultiCell(0, 7, mb_convert_encoding("ESTABLECIMIENTO Y \nACEPTACIÓN DE COMPROMISOS", 'ISO-8859-1', 'UTF-8'), 1, 'C', true);

// Encabezado primera tabla con MultiCell
$pdf->SetFillColor(200, 200, 200);
$x = $pdf->GetX();
$y = $pdf->GetY();
$alturaEncabezado = 8; // Ajustar altura del encabezado

$pdf->MultiCell(50, $alturaEncabezado, mb_convert_encoding("ACTIVIDAD / \nDECISIÓN", 'ISO-8859-1', 'UTF-8'), 1, 'C', true);
$pdf->SetXY($x + 50, $y);
$pdf->MultiCell(40, $alturaEncabezado, "FECHA \n ", 1, 'C', true);
$pdf->SetXY($x + 50 + 40, $y);
$pdf->MultiCell(50, $alturaEncabezado, "RESPONSABLE \n ", 1, 'C', true);
$pdf->SetXY($x + 50 + 40 + 50, $y);
$pdf->MultiCell(50, $alturaEncabezado, mb_convert_encoding("FIRMA O \nPARTICIPACIÓN VIRTUAL", 'ISO-8859-1', 'UTF-8'), 1, 'C', true);

// Fila de datos con ajuste automático de altura
$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(240, 240, 240);
$yData = $pdf->GetY();
$alturaFilaDatos = 10; // Ajustar altura para permitir mejor distribución

$pdf->MultiCell(50, $alturaFilaDatos, "Lista de asistencia", 1, 'C');
$pdf->SetXY($x + 50, $yData);
$pdf->MultiCell(40, $alturaFilaDatos, $fecha, 1, 'C');
$pdf->SetXY($x + 50 + 40, $yData);
$pdf->MultiCell(50, $alturaFilaDatos, "Asistentes", 1, 'C');
$pdf->SetXY($x + 50 + 40 + 50, $yData);
$pdf->MultiCell(50, $alturaFilaDatos, "Lista de asistencia", 1, 'C');

$pdf->Ln(5);

if ($pdf->GetY() + 60 > $pdf->GetPageHeight() - 15) {
    $pdf->AddPage();
}
// Subtítulo segunda tabla con MultiCell
$pdf->SetFont('Arial', 'B', 10);
$pdf->MultiCell(0, 7, mb_convert_encoding("DE: ASISTENTES Y \nAPROBACIÓN DECISIONES", 'ISO-8859-1', 'UTF-8'), 1, 'C', true);

// Encabezado segunda tabla con MultiCell
$pdf->SetFillColor(200, 200, 200);
$x = $pdf->GetX();
$y = $pdf->GetY();
$alturaFilaEncabezado = 8;

$pdf->MultiCell($col1, $alturaFilaEncabezado, "NOMBRE \n ", 1, 'C', true);
$pdf->SetXY($x + $col1, $y);
$pdf->MultiCell($col2, $alturaFilaEncabezado, mb_convert_encoding("DEPENDENCIA / \nEMPRESA", 'ISO-8859-1', 'UTF-8'), 1, 'C', true);
$pdf->SetXY($x + $col1 + $col2, $y);
$pdf->MultiCell($col3, $alturaFilaEncabezado, mb_convert_encoding("APRUEBA \n(SI/NO)", 'ISO-8859-1', 'UTF-8'), 1, 'C', true);
$pdf->SetXY($x + $col1 + $col2 + $col3, $y);
$pdf->MultiCell($col4, $alturaFilaEncabezado, mb_convert_encoding("OBSERVACIÓN \n ", 'ISO-8859-1', 'UTF-8'), 1, 'C', true);
$pdf->SetXY($x + $col1 + $col2 + $col3 + $col4, $y);
$pdf->MultiCell($col5, $alturaFilaEncabezado, mb_convert_encoding("FIRMA O \nPARTICIPACIÓN VIRTUAL", 'ISO-8859-1', 'UTF-8'), 1, 'C', true);

// Variables de contenido de filas
$textoNombre = "Lista de asistencia";
$textoDependencia = "CENIGRAF";
$textoAprueba = "SI";
$textoObservacion = "Ninguna";
$textoFirma = "Lista de asistencia";

// Ajuste de posición Y para datos
$y2 = $pdf->GetY();
$alturaFilaDatos = 12; // Ajustar altura para filas con texto dinámico

$pdf->MultiCell($col1, $alturaFilaDatos, $textoNombre, 1, 'C');
$pdf->SetXY($x + $col1, $y2);
$pdf->MultiCell($col2, $alturaFilaDatos, $textoDependencia, 1, 'C');
$pdf->SetXY($x + $col1 + $col2, $y2);
$pdf->MultiCell($col3, $alturaFilaDatos, $textoAprueba, 1, 'C');
$pdf->SetXY($x + $col1 + $col2 + $col3, $y2);
$pdf->MultiCell($col4, $alturaFilaDatos, $textoObservacion, 1, 'C');
$pdf->SetXY($x + $col1 + $col2 + $col3 + $col4, $y2);
$pdf->MultiCell($col5, $alturaFilaDatos, $textoFirma, 1, 'C');

// Ajustar la posición para la siguiente fila
$pdf->SetY($y2 + $alturaFilaDatos);
$pdf->Ln(5);

// Nota sobre protección de datos
$pdf->SetFont('Arial', '', 8);
$pdf->MultiCell(0, 5, mb_convert_encoding(
    'De acuerdo con la Ley 1581 de 2012, Protección de Datos Personales, el Servicio Nacional de Aprendizaje SENA, se compromete a garantizar la seguridad y protección de los datos personales que se encuentran almacenados en este documento, y les dará el tratamiento correspondiente en cumplimiento de lo establecido legalmente.', 
    'ISO-8859-1', 'UTF-8'
), 0, 'J');

$pdf->Ln(15);

// Anexos
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 7, mb_convert_encoding('ANEXOS', 'ISO-8859-1', 'UTF-8'), 1, 1, 'C');

// Código del formulario
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(0, 7, mb_convert_encoding('GOR-F-084V02', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C');

$pdf->Output();
?>