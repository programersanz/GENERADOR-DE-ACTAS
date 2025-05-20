-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2025 a las 17:50:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `acta_completas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acta`
--

CREATE TABLE `acta` (
  `n_acta` int(100) NOT NULL,
  `acta_no` varchar(100) NOT NULL,
  `acta_contador` int(100) DEFAULT NULL,
  `nom_rev` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora_in` varchar(6) NOT NULL,
  `hora_fin` varchar(6) NOT NULL,
  `lu_en` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `agenda` varchar(1000) NOT NULL,
  `objetivos` varchar(1000) NOT NULL,
  `participantes` int(100) DEFAULT NULL,
  `inf_ficha` varchar(9000) DEFAULT NULL,
  `casos_ant` varchar(9000) DEFAULT NULL,
  `aprendices_dest` int(100) DEFAULT NULL,
  `casos_part` int(100) DEFAULT NULL,
  `hechos_actuales` text DEFAULT NULL,
  `desarrollo` varchar(9000) DEFAULT NULL,
  `informe_vocero` text NOT NULL,
  `descargos_apre` varchar(100) NOT NULL,
  `conclusion` varchar(1000) DEFAULT NULL,
  `ficha` int(100) NOT NULL,
  `programa` varchar(100) NOT NULL,
  `privacidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `acta`
--

INSERT INTO `acta` (`n_acta`, `acta_no`, `acta_contador`, `nom_rev`, `ciudad`, `fecha`, `hora_in`, `hora_fin`, `lu_en`, `direccion`, `agenda`, `objetivos`, `participantes`, `inf_ficha`, `casos_ant`, `aprendices_dest`, `casos_part`, `hechos_actuales`, `desarrollo`, `informe_vocero`, `descargos_apre`, `conclusion`, `ficha`, `programa`, `privacidad`) VALUES
(1, 'Na.001', 1, 'Comité de Seguimiento', 'Bogotá D.C.', '2022-11-17', '20:06', '20:06', 'sdfsdf', 'Cl. 15 #31-42', '1.Comité de evaluación y seguimiento aprendices ficha - 2450019 de ANIMACION 3D    ', 'Se reúne el ________________________________________, como instancia competente para investigar y analizar los casos tanto académicos como disciplinarios de los aprendices de la ficha- 2450019 de ANIMACION 3D.', NULL, NULL, NULL, NULL, NULL, 'dfsdf', NULL, 'sdfsdfdf', '', NULL, 1, ' ANIMACION 3D', 'privada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendices_destacados`
--

CREATE TABLE `aprendices_destacados` (
  `id_destacados` int(100) NOT NULL,
  `acta_des` int(100) NOT NULL,
  `nombre_des` varchar(100) NOT NULL,
  `apellido_des` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aprendices_destacados`
--

INSERT INTO `aprendices_destacados` (`id_destacados`, `acta_des`, `nombre_des`, `apellido_des`) VALUES
(1, 1, 'fgdfg', 'dfgdfg'),
(2, 2, 'asda', 'dass'),
(3, 1, 'sdfsdf', 'sdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `id_aprendiz` int(100) NOT NULL,
  `ficha` int(100) NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `Numero` varchar(100) NOT NULL,
  `Nombre_aprendiz` varchar(100) NOT NULL,
  `Apellido_aprendiz` varchar(100) NOT NULL,
  `Celular` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) NOT NULL,
  `Estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aprendiz`
--

INSERT INTO `aprendiz` (`id_aprendiz`, `ficha`, `Tipo`, `Numero`, `Nombre_aprendiz`, `Apellido_aprendiz`, `Celular`, `Correo`, `Estado`) VALUES
(1149, 2670271, 'C.E', '1034567890', 'Juan', 'Pérez', '3112345678', 'juan.perez@email.com', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_anteriores`
--

CREATE TABLE `casos_anteriores` (
  `id_casos_A` int(100) NOT NULL,
  `A_ficha` int(100) NOT NULL,
  `A_contador` int(100) NOT NULL,
  `A_acta` int(100) NOT NULL,
  `A_aprendiz` varchar(100) NOT NULL,
  `A_medida` varchar(100) NOT NULL,
  `A_descripcion` text NOT NULL,
  `A_cumplimiento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `casos_anteriores`
--

INSERT INTO `casos_anteriores` (`id_casos_A`, `A_ficha`, `A_contador`, `A_acta`, `A_aprendiz`, `A_medida`, `A_descripcion`, `A_cumplimiento`) VALUES
(1, 2450019, 1, 2, 'sdfsdf', '1.DESERCIÓN', '1.Cuando el aprendiz injustificadamente no se presente por tres (3) días consecutivos al Centro de Formación o empresa en su proceso formativo. Cuando al terminar el periodo de aplazamiento aprobado por el SENA, el Aprendiz no reingresa al programa de formación. Cuando transcurridos dos (2) años contados a partir de la fecha de terminación de la etapa lectiva del programa, el Aprendiz no ha presentado evidencia de la realización de la etapa productiva.', 'Cumplio'),
(2, 2450019, 1, 2, 'sdfsdf', '2.LLAMADO DE ATENCIÓN ESCRITO', '2.Cuando se trate de hechos que contraríen en menor grado el orden académico o disciplinario, sin afectar los deberes, derechos y prohibiciones, o cuando sea necesario para prevenir la ocurrencia de hechos que vulneren esos deberes, derechos y prohibiciones, el aprendiz podrá recibir un llamado de atención verbal por parte del (los) Instructor, el Coordinador Académico, el(los) responsable(s) de Bienestar, o el subdirector del Centro. Este llamado de atención verbal no constituye una sanción.', 'No cumplio'),
(3, 2450019, 1, 2, 'sdfsdf', '3.PLAN DE MEJORAMIENTO DISCIPLINARIO', '3.No deberá haber inasistencias ni retardos, en el horario que se determine o se incurrirá en plan de mejoramiento Integral.', 'Cumplio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_especiales`
--

CREATE TABLE `casos_especiales` (
  `id_casos_E` int(100) NOT NULL,
  `C_ficha` int(100) NOT NULL,
  `C_acta` int(100) DEFAULT NULL,
  `nombre_aprendiz` varchar(100) NOT NULL,
  `nombre_its` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `falta` varchar(100) NOT NULL,
  `reglamento` text NOT NULL,
  `reglamento_a` text NOT NULL,
  `reglamento_b` text NOT NULL,
  `reglamento_c` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `casos_especiales`
--

INSERT INTO `casos_especiales` (`id_casos_E`, `C_ficha`, `C_acta`, `nombre_aprendiz`, `nombre_its`, `description`, `falta`, `reglamento`, `reglamento_a`, `reglamento_b`, `reglamento_c`) VALUES
(1, 2450019, 1, 'asd', 'asdasd', 'asdas', 'Académica', '14. Portar permanentemente y en lugar visible el carné que lo identifica como Aprendiz Sena, durante su proceso de aprendizaje, renovarlo de acuerdo con las disposiciones vigentes y devolverlo al finalizar el programa o cuando se presente retiro, aplazamiento o cancelación de la matrícula. En caso de pérdida de carné, el aprendiz debe formular la denuncia correspondiente, tramitar el duplicado y cancelar el valor respectivo con base en la normatividad dada por la Dirección General.', 'N/A', '11. Asistir a las reuniones que programe el Centro de Formación para seguimiento a las actividades desarrolladas durante la etapa productiva. La no asistencia a estas reuniones debe justificarse mediante excusa comprobable.', 'N/A'),
(2, 2450019, 1, 'asdasd', 'asdd', 'asdas', 'Académica', '15. Utilizar la dotación o ropa de trabajo y los elementos de protección personal dispuestos en los ambientes de aprendizaje, observando las condiciones de prevención señaladas por el Instructor o Tutor y organizarlos para ser utilizados exclusivamente en el ambiente de aprendizaje requerido.', 'N/A', 'N/A', '12. Respetar los derechos de autor en los materiales, trabajos, proyectos y demás documentos generados por los grupos de trabajo o compañeros, y que hayan sido compartidos al interior de la Plataforma. Sin embargo, con la autorización de los creadores se puede hacer uso de cualquier material publicado, dando el crédito a quien generó la idea, a la fuente que se consultó o al recurso que referencia la información.'),
(3, 2450019, 1, 'dasdas', 'asd', 'a', 'Académica', '17. Conservar y mantener en buen estado, orden y aseo, las instalaciones físicas, el material didáctico, equipos y herramientas de la entidad o que estén a cargo de esta, respondiendo por los daños ocasionados a estos intencionalmente o por descuido, debidamente comprobados.', 'N/A', '13. Conocer y asumir las políticas y directrices institucionales establecidas, así como el Reglamento del Aprendiz Sena, y convivir en comunidad de acuerdo con ellos.', 'N/A'),
(4, 2450019, 2, 'dfg', 'gdf', 'g', 'Académica', 'N/A', 'N/A', 'N/A', 'N/A'),
(5, 2450019, 1, 'sdf', 'sdfsd', 'fsdf', 'Académica', 'N/A', 'N/A', 'N/A', 'N/A'),
(6, 2450019, 1, 'sdfsdf', 'sdf', 'sdf', 'Académica', 'N/A', 'N/A', 'N/A', 'N/A'),
(7, 2450019, 1, 'sdfsdf', 'fsdf', 'sdfsd', 'Académica', 'N/A', 'N/A', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conclusiones`
--

CREATE TABLE `conclusiones` (
  `id_conclusion` int(100) NOT NULL,
  `c_contador` int(100) NOT NULL DEFAULT 0,
  `n_ficha` int(100) DEFAULT NULL,
  `q_acta` int(100) DEFAULT NULL,
  `Aprendiz` varchar(100) NOT NULL,
  `medida` varchar(100) NOT NULL,
  `descripcion_m` text NOT NULL,
  `cumplimiento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conclusiones`
--

INSERT INTO `conclusiones` (`id_conclusion`, `c_contador`, `n_ficha`, `q_acta`, `Aprendiz`, `medida`, `descripcion_m`, `cumplimiento`) VALUES
(1, 1, 2450019, 1, 'sdfsdf', '1.DESERCIÓN', '1.Cuando el aprendiz injustificadamente no se presente por tres (3) días consecutivos al Centro de Formación o empresa en su proceso formativo. Cuando al terminar el periodo de aplazamiento aprobado por el SENA, el Aprendiz no reingresa al programa de formación. Cuando transcurridos dos (2) años contados a partir de la fecha de terminación de la etapa lectiva del programa, el Aprendiz no ha presentado evidencia de la realización de la etapa productiva.', ''),
(2, 1, 2450019, 1, 'sdfsdf', '2.LLAMADO DE ATENCIÓN ESCRITO', '2.Cuando se trate de hechos que contraríen en menor grado el orden académico o disciplinario, sin afectar los deberes, derechos y prohibiciones, o cuando sea necesario para prevenir la ocurrencia de hechos que vulneren esos deberes, derechos y prohibiciones, el aprendiz podrá recibir un llamado de atención verbal por parte del (los) Instructor, el Coordinador Académico, el(los) responsable(s) de Bienestar, o el subdirector del Centro. Este llamado de atención verbal no constituye una sanción.', ''),
(3, 1, 2450019, 1, 'sdfsdf', '3.PLAN DE MEJORAMIENTO DISCIPLINARIO', '3.No deberá haber inasistencias ni retardos, en el horario que se determine o se incurrirá en plan de mejoramiento Integral.', ''),
(4, 2, 2450019, 2, 'dgdff', '3.PLAN DE MEJORAMIENTO DISCIPLINARIO', '2.Cuando se trate de hechos que contraríen en menor grado el orden académico o disciplinario, sin afectar los deberes, derechos y prohibiciones, o cuando sea necesario para prevenir la ocurrencia de hechos que vulneren esos deberes, derechos y prohibiciones, el aprendiz podrá recibir un llamado de atención verbal por parte del (los) Instructor, el Coordinador Académico, el(los) responsable(s) de Bienestar, o el subdirector del Centro. Este llamado de atención verbal no constituye una sanción.', ''),
(5, 1, 2450019, 1, 'fsdfsdfdf', 'N/A', 'N/A', ''),
(6, 1, 2450019, 1, 'sdfsdf', 'N/A', 'N/A', ''),
(7, 1, 2450019, 1, 'fsdfsd', 'N/A', 'N/A', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrollo_comite`
--

CREATE TABLE `desarrollo_comite` (
  `id_desarrollo` int(100) NOT NULL,
  `d_acta` int(100) NOT NULL,
  `d_nombre_aprendiz` varchar(100) NOT NULL,
  `d_descargos_its` text NOT NULL,
  `d_descargos_its_b` text NOT NULL,
  `d_descargos_its_c` text NOT NULL,
  `d_descargos_aprendiz` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `desarrollo_comite`
--

INSERT INTO `desarrollo_comite` (`id_desarrollo`, `d_acta`, `d_nombre_aprendiz`, `d_descargos_its`, `d_descargos_its_b`, `d_descargos_its_c`, `d_descargos_aprendiz`) VALUES
(1, 1, 'sfsdfd', 'sdfsdf', 'sdf', 'fsdfd', 'sdf'),
(2, 1, 'fsd', 'sdfsd', 'fsdf', 'dfsd', 'dfsdf'),
(3, 1, 'sdfds', 'fsdf', 'dfsdfs', 'fsdf', 'sfs'),
(4, 2, 'fgd', 'fgdf', 'gdfgdf', 'g', 'fgdfg'),
(5, 1, 'df', 'sdfsd', 'fsdf', 'sdf', 'sdfsd'),
(6, 1, 'ffsd', 'fsd', 'sdf', 'sdfsd', 'fsdf'),
(7, 1, 'fsd', 'fsdf', 'sdf', 'sdf', 'sdfsdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `id_ficha` int(100) NOT NULL,
  `ficha_contador` int(100) DEFAULT NULL,
  `N_ficha` varchar(100) NOT NULL,
  `cantidad_apre` varchar(100) NOT NULL,
  `programa` varchar(100) NOT NULL,
  `jornada` varchar(100) DEFAULT NULL,
  `tipo_forma` varchar(100) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `fecha_iniciop` date DEFAULT NULL,
  `fecha_finp` date DEFAULT NULL,
  `actas` int(100) DEFAULT NULL,
  `aprendices` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`id_ficha`, `ficha_contador`, `N_ficha`, `cantidad_apre`, `programa`, `jornada`, `tipo_forma`, `fecha_inicio`, `fecha_fin`, `fecha_iniciop`, `fecha_finp`, `actas`, `aprendices`) VALUES
(1, 3, '2450019', '31', 'Impresión Digital', 'Diurna', 'Técnico', '2025-02-26', '2025-03-06', '2025-03-21', '2025-04-30', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `tipodocf` varchar(100) NOT NULL,
  `documentof` varchar(100) NOT NULL,
  `correof` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `id_instructor` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `tipodoc` varchar(100) NOT NULL,
  `documento` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`id_instructor`, `nombre`, `apellido`, `tipodoc`, `documento`, `telefono`, `rol`, `correo`, `contraseña`) VALUES
(10, 'usuario', 'prueba', ' C.C', '88159709', '3138883328', '2', 'prueba1@gmail.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medida_formativa`
--

CREATE TABLE `medida_formativa` (
  `id_medida` int(100) NOT NULL,
  `medida_formativa` varchar(100) NOT NULL,
  `descripcion_medida` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medida_formativa`
--

INSERT INTO `medida_formativa` (`id_medida`, `medida_formativa`, `descripcion_medida`) VALUES
(1, '1.DESERCIÓN', '1.Cuando el aprendiz injustificadamente no se presente por tres (3) días consecutivos al Centro de Formación o empresa en su proceso formativo. Cuando al terminar el periodo de aplazamiento aprobado por el SENA, el Aprendiz no reingresa al programa de formación. Cuando transcurridos dos (2) años contados a partir de la fecha de terminación de la etapa lectiva del programa, el Aprendiz no ha presentado evidencia de la realización de la etapa productiva.'),
(2, '2.LLAMADO DE ATENCIÓN ESCRITO', '2.Cuando se trate de hechos que contraríen en menor grado el orden académico o disciplinario, sin afectar los deberes, derechos y prohibiciones, o cuando sea necesario para prevenir la ocurrencia de hechos que vulneren esos deberes, derechos y prohibiciones, el aprendiz podrá recibir un llamado de atención verbal por parte del (los) Instructor, el Coordinador Académico, el(los) responsable(s) de Bienestar, o el subdirector del Centro. Este llamado de atención verbal no constituye una sanción.'),
(3, '3.PLAN DE MEJORAMIENTO DISCIPLINARIO', '3.No deberá haber inasistencias ni retardos, en el horario que se determine o se incurrirá en plan de mejoramiento Integral.'),
(4, '4.PLAN DE MEJORAMIENTO ACADÉMICO', '4.Deberá cumplir con todas las evidencias acordadas desde el inicio del trimestre en el plan de trabajo y evaluación o se incurrirá en plan de mejoramiento Integral.'),
(5, '5.PLAN DE MEJORAMIENTO ACADÉMICO Y DISCIPLINARIO', '5.Deberá cumplir con todas las evidencias acordadas desde el inicio del trimestre en el plan de trabajo y evaluación Y No deberá haber inasistencias ni retardos, en el horario que se determine o se incurrirá en plan de mejoramiento Integral.'),
(6, '6.PLAN DE MEJORAMIENTO INTEGRAL POR COMITÉ', '6.No deberá haber inasistencias ni retardos, en el horario que se determine y deberá cumplir con todas las evidencias acordadas desde el inicio del trimestre en el plan de trabajo y evaluación o se incurrirá en Condicionamiento de Matrícula.'),
(7, '7.CONDICIONAMIENTO DE LA MATRÍCULA', '7.Se impone al Aprendiz que incurra en una falta académica o disciplinaria, previo agotamiento del procedimiento establecido en este Reglamento. El condicionamiento de matrícula cesa cuando el Aprendiz cumple el plan de mejoramiento concertado y /o compromisos escritos. Una vez quede en firme el condicionamiento de la matrícula, el Subdirector del Centro debe generar la pérdida de estímulos e incentivos que esté recibiendo el aprendiz, si los tuviere. Esta decisión será determinada en el acto académico que ordene el condicionamiento de matrícula transcurrido este tiempo el condicionamiento no es superado se procederá a realizar la Cancelación de la Matrícula.'),
(8, '8.CANCELACIÓN DE MATRÍCULA', '8.Acto administrativo que se origina cuando persisten en el aprendiz las causales que originaron el condicionamiento de matrícula o por faltas catalogadas como graves de acuerdo a la clasificación determinada en los artículos 25 y 26 del reglamento, en las etapas lectiva y productiva. Implica que la persona sancionada pierde la condición de aprendiz y no puede participar en procesos de ingreso a la institución por periodo entre 6 y 12 meses cuando es de índole académico y entre 12 y 24 meses cuando es de índole disciplinaria, de acuerdo a las recomendaciones del comité de evaluación y seguimiento. Una vez en firme la sanción, debe entregar de manera inmediata el carné institucional y ponerse a paz y salvo por todo concepto.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `id_participantes` int(100) NOT NULL,
  `n_acta` int(100) DEFAULT NULL,
  `nombre` varchar(1000) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `asistencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`id_participantes`, `n_acta`, `nombre`, `cargo`, `asistencia`) VALUES
(1, 1, 'Adriana Hernandez', 'instructor jefe de taller', 'Asistio'),
(2, 1, 'Alexander Carvajal', 'Coordinador Académico', 'Asistio'),
(3, 1, 'Julia  Romero', 'instructora jefe de taller', 'No Asistio'),
(4, 2, 'Adriana Hernandez', 'instructor jefe de taller', 'Asistio'),
(5, 2, 'Adriana Hernandez', 'instructor jefe de taller', 'Asistio'),
(6, 2, 'Adriana Hernandez', 'instructor jefe de taller', 'Asistio'),
(7, 1, 'Adriana Hernandez', 'instructor jefe de taller', 'Asistio'),
(8, 1, 'Adriana Hernandez', 'instructor jefe de taller', 'Asistio'),
(9, 1, 'Adriana Hernandez', 'instructor jefe de taller', 'Asistio'),
(10, NULL, '', '', ''),
(11, NULL, '', '', ''),
(100, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id_programa` int(11) NOT NULL,
  `programa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id_programa`, `programa`) VALUES
(18, 'Auxiliar Contable'),
(19, 'Desarrollo de Software'),
(20, 'Sistemas'),
(21, 'Soldadura'),
(22, 'Electricidad'),
(23, 'Mecánica Industrial'),
(24, 'Logística Empresarial'),
(25, 'Atención Integral a la Primera Infancia'),
(26, 'Cocina'),
(27, 'Panadería'),
(28, 'Carpintería y Ebanistería'),
(29, 'Construcción de Edificaciones'),
(30, 'Mantenimiento de Motores Diésel'),
(31, 'Seguridad Ocupacional'),
(32, 'Gestión Documental'),
(33, 'Redes de Datos'),
(34, 'Instalaciones Eléctricas Residenciales'),
(35, 'Agroindustria Alimentaria'),
(36, 'Producción Pecuaria'),
(37, 'Asistencia Administrativa'),
(38, 'Análisis y Desarrollo de Software (ADSO)'),
(39, 'Animación 3D'),
(40, 'Impresión Digital'),
(41, 'Gestión Empresarial'),
(42, 'Gestión de Mercados'),
(43, 'Gestión Logística'),
(44, 'Producción Multimedia'),
(45, 'Gestión del Talento Humano'),
(46, 'Construcción de Edificaciones'),
(47, 'Desarrollo de Medios Gráficos Visuales'),
(48, 'Producción de Contenidos Digitales'),
(49, 'Automatización Industrial'),
(50, 'Mecatrónica'),
(51, 'Energías Renovables'),
(52, 'Gestión Ambiental'),
(53, 'Gestión de Redes de Datos'),
(54, 'Producción de Moda'),
(55, 'Control de Calidad en Confección Industrial'),
(56, 'Gestión Hotelera'),
(57, 'Agroindustria Alimentaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reglamento`
--

CREATE TABLE `reglamento` (
  `id_regla` int(100) NOT NULL,
  `nombre_falta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reglamento`
--

INSERT INTO `reglamento` (`id_regla`, `nombre_falta`) VALUES
(1, '1. Cumplir con todas las actividades propias de su proceso de aprendizaje o del plan de mejoramiento, definidas durante su etapa lectiva y productiva.'),
(2, '2. Respetar los derechos ajenos y no abusar de los propios.'),
(3, '3. Verificar en el sistema que sus datos básicos, se encuentren totalmente diligenciados y/o actualizarlos de acuerdo con el trámite administrativo correspondiente.'),
(4, '4. Participar en las actividades complementarias o de profundización, relacionadas con el programa de formación, con el fin de gestionar su proceso de aprendizaje.'),
(5, '5. Informar y hacer la solicitud, por escrito, al Coordinador Académico y registrar en el sistema de gestión de la formación oportunamente las solicitudes o novedades (Traslados, Aplazamiento, Retiro voluntario y Reingreso), que presente durante el proceso de aprendizaje, utilizando medios virtuales y/o físicos; para los programas de formación complementaria en modalidad virtual, realizar en los sistemas de información el retiro voluntario del programa o inscripción del mismo. '),
(6, '6. Si el trámite para la consecución de contrato de aprendizaje o de otra de las alternativas para el desarrollo de la etapa productiva, es realizado directamente por el aprendiz, este deberá informar inmediatamente cuando esto ocurra, a los responsables de apoyar este proceso en el Centro de Formación.'),
(7, '7. Proteger los recursos culturales y naturales del país y velar por la conservación del ambiente sano, vinculándose, apoyando y/o colaborando en las acciones que adelante el Centro de Formación.'),
(8, '8. Acatar las decisiones contempladas en el Manual de Convivencia.'),
(9, '9. Asumir con responsabilidad su participación en las actividades programadas como salidas, pasantías técnicas, intercambios de aprendices a nivel nacional e internacional, así como en las demás de carácter lúdico-pedagógico.'),
(10, '10. Hacer uso apropiado de los ambientes de aprendizaje (infraestructura, equipos, herramientas, recursos didácticos, técnicos, tecnológicos, bibliográficos), disponibles para su proceso de aprendizaje, asumiendo responsabilidad legal en situaciones de utilización inadecuada y uso indebido, que deterioran los ambientes de aprendizaje y generan detrimento patrimonial.'),
(11, '11. Asistir a las reuniones que programe el Centro de Formación para seguimiento a las actividades desarrolladas durante la etapa productiva. La no asistencia a estas reuniones debe justificarse mediante excusa comprobable.'),
(12, '12. Respetar los derechos de autor en los materiales, trabajos, proyectos y demás documentos generados por los grupos de trabajo o compañeros, y que hayan sido compartidos al interior de la Plataforma. Sin embargo, con la autorización de los creadores se puede hacer uso de cualquier material publicado, dando el crédito a quien generó la idea, a la fuente que se consultó o al recurso que referencia la información.'),
(13, '13. Conocer y asumir las políticas y directrices institucionales establecidas, así como el Reglamento del Aprendiz Sena, y convivir en comunidad de acuerdo con ellos.'),
(14, '14. Portar permanentemente y en lugar visible el carné que lo identifica como Aprendiz Sena, durante su proceso de aprendizaje, renovarlo de acuerdo con las disposiciones vigentes y devolverlo al finalizar el programa o cuando se presente retiro, aplazamiento o cancelación de la matrícula. En caso de pérdida de carné, el aprendiz debe formular la denuncia correspondiente, tramitar el duplicado y cancelar el valor respectivo con base en la normatividad dada por la Dirección General.'),
(15, '15. Utilizar la dotación o ropa de trabajo y los elementos de protección personal dispuestos en los ambientes de aprendizaje, observando las condiciones de prevención señaladas por el Instructor o Tutor y organizarlos para ser utilizados exclusivamente en el ambiente de aprendizaje requerido.'),
(16, '16. Portar el uniforme de manera decorosa; dentro del Centro de Formación, en los ambientes donde se desarrollen actividades extracurriculares y entornos diferentes al académico. Así como en el desarrollo de la etapa productiva, cuando la empresa patrocinadora lo exija.'),
(17, '17. Conservar y mantener en buen estado, orden y aseo, las instalaciones físicas, el material didáctico, equipos y herramientas de la entidad o que estén a cargo de esta, respondiendo por los daños ocasionados a estos intencionalmente o por descuido, debidamente comprobados.'),
(18, '18. Actuar siempre teniendo como base los principios y valores para la convivencia; obrar con honestidad, respeto, responsabilidad, lealtad, justicia, compañerismo y solidaridad con la totalidad de los integrantes de la comunidad educativa y expresarse con respeto, cultura y educación, en forma directa, a través de medios impresos o electrónicos que le facilita la entidad (como foros de discusión, redes sociales, chat, correo electrónico, blogs y demás).'),
(19, '19. Hacer uso apropiado de los espacios de comunicación y respetar a los integrantes de la comunidad educativa, siendo solidario, tolerante y veraz en la información que se publique en medios impresos o digitales; abstenerse de enviar material multimedia que contenga imágenes, videos, documentos o grabaciones que no sean objeto de las actividades de aprendizaje.'),
(20, '20. Informar al instructor, coordinador, directivo o personal de apoyo, cualquier irregularidad que comprometa el buen nombre y normal marcha del Centro de Formación de la entidad y de la comunidad educativa, o que considere sospechosa dentro de la Institución y en los ambientes de aprendizaje, permitiendo una actuación oportuna, preventiva o correctiva.'),
(21, '21. Respetar la dignidad, intimidad e integridad de los miembros de la comunidad educativa Sena.'),
(22, '22. Respetar los bienes y elementos de propiedad de los integrantes de la comunidad educativa y del Sena.'),
(23, '23. Obrar conforme al principio del respeto de los derechos de los demás evitando realizar y/o apoyar actos que limiten y/o afecten a la comunidad educativa, como impedir el acceso a funcionarios y aprendices a los centros de formación y demás instalaciones del Sena.'),
(24, '24. Presentar siempre las mejores condiciones de aseo y pulcritud personal.'),
(25, '25. Enaltecer y respetar los símbolos patrios e institucionales.'),
(26, '26. No usar expresiones grotescas en foros de discusión, mensajes, anuncios, correos tanto generales como en grupos de trabajo.'),
(27, '27. Cumplir a cabalidad la normatividad vigente del Estado colombiano en lo referente a delitos informáticos.'),
(28, '28. Denunciar tratos, propuestas, o actos inmorales de parte de cualquier funcionario y de cualquier miembro de la comunidad educativa.'),
(29, '29. Suscribir al momento de asentar la matrícula el Acta de Compromiso como Aprendiz Sena.'),
(30, '30. Verificar a través del Sistema Gestión Virtual de Aprendices, que el contrato de aprendizaje con la empresa patrocinadora se encuentre acorde al contrato físico firmado, y en caso de encontrar inconsistencias reportarlo de forma inmediata a la Oficina de Promoción y Relaciones Corporativas de su Centro con la líder de contrato de aprendizaje.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(100) NOT NULL,
  `roles` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `roles`) VALUES
(1, 'admin'),
(2, 'instructor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `upload`
--

CREATE TABLE `upload` (
  `id_upload` int(100) NOT NULL,
  `acta_rar` int(100) DEFAULT NULL,
  `fname` text NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `upload`
--

INSERT INTO `upload` (`id_upload`, `acta_rar`, `fname`, `name`) VALUES
(1, 1, '20221129173222_REPORTE DE APRENDICES 17-11-22-20221128T152916Z-001.zip', 'REPORTE DE APRENDICES 17-11-22-20221128T152916Z-001.zip');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `rol` int(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `documento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `correo`, `rol`, `telefono`, `contrasena`, `documento`) VALUES
(15, 'duban steven', 'castillo', 'steven@gmail.com', 1, '4646450', '123456', '6455466'),
(16, 'Hugo', 'Camargo', 'hugo@gmail.com', 1, '5465456', '123456', '2147483647');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acta`
--
ALTER TABLE `acta`
  ADD PRIMARY KEY (`n_acta`),
  ADD KEY `participantes` (`participantes`),
  ADD KEY `ficha` (`ficha`),
  ADD KEY `acta_casos_par_fk` (`casos_part`),
  ADD KEY `acta_contador` (`acta_contador`);

--
-- Indices de la tabla `aprendices_destacados`
--
ALTER TABLE `aprendices_destacados`
  ADD PRIMARY KEY (`id_destacados`);

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`id_aprendiz`);

--
-- Indices de la tabla `casos_anteriores`
--
ALTER TABLE `casos_anteriores`
  ADD PRIMARY KEY (`id_casos_A`);

--
-- Indices de la tabla `casos_especiales`
--
ALTER TABLE `casos_especiales`
  ADD PRIMARY KEY (`id_casos_E`),
  ADD KEY `caso_instructor` (`nombre_its`),
  ADD KEY `caso_aprendiz` (`nombre_aprendiz`);

--
-- Indices de la tabla `conclusiones`
--
ALTER TABLE `conclusiones`
  ADD PRIMARY KEY (`id_conclusion`),
  ADD KEY `acta_contador` (`c_contador`);

--
-- Indices de la tabla `desarrollo_comite`
--
ALTER TABLE `desarrollo_comite`
  ADD PRIMARY KEY (`id_desarrollo`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id_ficha`),
  ADD UNIQUE KEY `z` (`id_ficha`),
  ADD KEY `actas` (`actas`),
  ADD KEY `aprendices` (`aprendices`);

--
-- Indices de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id_instructor`);

--
-- Indices de la tabla `medida_formativa`
--
ALTER TABLE `medida_formativa`
  ADD PRIMARY KEY (`id_medida`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id_participantes`),
  ADD KEY `tipo` (`n_acta`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `reglamento`
--
ALTER TABLE `reglamento`
  ADD PRIMARY KEY (`id_regla`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acta`
--
ALTER TABLE `acta`
  MODIFY `n_acta` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `aprendices_destacados`
--
ALTER TABLE `aprendices_destacados`
  MODIFY `id_destacados` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  MODIFY `id_aprendiz` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1157;

--
-- AUTO_INCREMENT de la tabla `casos_anteriores`
--
ALTER TABLE `casos_anteriores`
  MODIFY `id_casos_A` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `casos_especiales`
--
ALTER TABLE `casos_especiales`
  MODIFY `id_casos_E` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `conclusiones`
--
ALTER TABLE `conclusiones`
  MODIFY `id_conclusion` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `desarrollo_comite`
--
ALTER TABLE `desarrollo_comite`
  MODIFY `id_desarrollo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id_ficha` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2450060;

--
-- AUTO_INCREMENT de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2086;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id_instructor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `medida_formativa`
--
ALTER TABLE `medida_formativa`
  MODIFY `id_medida` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id_participantes` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `reglamento`
--
ALTER TABLE `reglamento`
  MODIFY `id_regla` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `upload`
--
ALTER TABLE `upload`
  MODIFY `id_upload` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acta`
--
ALTER TABLE `acta`
  ADD CONSTRAINT `fk_acta_ficha` FOREIGN KEY (`ficha`) REFERENCES `ficha` (`id_ficha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
