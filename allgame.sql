-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2019 a las 23:10:45
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `allgame`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idCiudad` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `nombre`) VALUES
(1, 'Málaga'),
(2, 'Cádiz'),
(3, 'Barcelona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compania`
--

CREATE TABLE `compania` (
  `idCompania` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `idComAPI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compania`
--

INSERT INTO `compania` (`idCompania`, `nombre`, `idComAPI`) VALUES
(11, 'Nintendo', 'Nintendo'),
(12, 'Sony', 'Sony'),
(13, 'Activision', 'Activision'),
(14, 'Electronic Arts', '\"Electronic Arts\"'),
(15, 'Ubisoft', 'Ubisoft'),
(16, 'Square Enix', '\"Square Enix\"'),
(17, 'Sega', 'Sega'),
(18, 'Warner Home Video Games', '\"Warner Home Video Games\"'),
(19, 'Bandai Namco Games America Inc.', '\"Bandai Namco Games America Inc.\"'),
(20, 'Capcom', 'Capcom'),
(21, 'Bethesda Softworks', '\"Bethesda Softworks\"'),
(22, 'Konami', 'Konami'),
(23, '2K Games', '\"2K Games\"'),
(24, 'Reytid', 'Reytid'),
(25, 'THQ', 'THQ'),
(26, 'Aksys Games, Inc.', '\"Aksys Games, Inc.\"'),
(27, '505 Games', '\"505 Games\"'),
(28, 'Rockstar Games', '\"Rockstar Games\"'),
(29, 'Microsoft Studios', '\"Microsoft Studios\"'),
(30, 'Kalypso Media USA', '\"Kalypso Media USA\"');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compania-juego`
--

CREATE TABLE `compania-juego` (
  `idCompania` int(11) NOT NULL,
  `idJuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `idEvaluacion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idJuego` int(11) NOT NULL,
  `evaluacion` varchar(250) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `idFavorito` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idJuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`idFavorito`, `idUsuario`, `idJuego`) VALUES
(16, 49, 459),
(17, 49, 489),
(20, 49, 493);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos-juego`
--

CREATE TABLE `favoritos-juego` (
  `idFavorito` int(11) NOT NULL,
  `idJuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero-juego`
--

CREATE TABLE `genero-juego` (
  `idGenero` int(11) NOT NULL,
  `idJuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `idJuego` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `idJueAPI` int(20) DEFAULT NULL,
  `imagen` varchar(500) DEFAULT 'https://statics.vrutal.com/m/12c5/12c587c9ed3b9edc910316b5954e12c5.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`idJuego`, `nombre`, `descripcion`, `idJueAPI`, `imagen`) VALUES
(457, 'Madden NFL 19', 'Madden NFL 19  Achieve your gridiron greatness in Madden NFL 19 with more precision and control to win in all the ways you play.  Prove your on-field stick-skills with more control over every step, in game-changing moments through the introduction of...', 1705857968, 'https://www.mobygames.com/images/covers/l/498411-madden-nfl-19-xbox-one-front-cover.jpg'),
(459, 'Assassin\'s Creed Syndicate', 'Assassin\'s Creed Syndicate PS4 Video Game!   Featuring the all-new video game now on your favorite video game console Compatible with PS4 game system consoles (Sold separately) Enjoy with family, friends, or even on your own...anytime Rated M for...', 1566333046, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTc0FCED4ph6ouevcPKpUexEae42sK1L4abdr36cYbFg4GiNNFH8viYZkyNN0nhn4UVYzNeUZCimCp0ehpjojivtFvVMzgxr7I.ca.g.Jq41ywxA7Wm2j9tU1Ao7sD0WuKnQxnZKTI69cK0n1oRgTfmNX8TfJ9x6I6uz5jO_1acCvI-&h=300&w=200&format=jpg'),
(460, 'EA Sports UFC 2 ', 'EA SPORTS UFC 2  PS4  This item cannot be shipped to APO/FPO addresses. Please accept our apologies.', 1566334725, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcuGS9Qyd4aLy7j7bQMy4GzuzGwAU378WDUt2Fy7MDp7.WOefgDhO_h9DmdFilQpMYsEM2PJw17VinvBVPIQCN0CTKax1w6A8xQa9_UpJp3OPUd6bYcYlnHZrVmvDGEhQi685XUoGcEAn.m3lvaHoF.L5KQ1uhVb489FlbRymHE30-&h=300&w=200&format=jpg'),
(461, 'Mafia III ', 'With its massive, sprawling map to explore, fully realized historical setting, open mission system, incredible action, and slavish attention to detail, Mafia III could become your life.  It\'s set in New Bordeaux in 1968, a town patterned after New...', 1566974822, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTc22czddQ0peHMdVwcyrvB4p2DTeSRkL.azoEdVT86qU15gVHHgDg_yONDYMnF30Z5w1c2kgLLv_dBToDpWxlNCqbT8zeBQFN8isO9Jf6fOWYB48uf.IG9lsnhLoYTXK58IbzXLo3hUxLcMrdRiz6F4np_BX294wm6_U3EWZciVSk-&h=300&w=200&format=jpg'),
(462, 'Tekken 7', 'Unreal Engine 4 - Powered by the Unreal Engine 4, Tekken 7 sets a new benchmark for graphical fidelity for the fighting game genre, pushing the new generation of console hardware and PC visuals to the limit. Seamless Story Experience - Hollywood-like,...', 1566342891, 'https://vignette.wikia.nocookie.net/tekken/images/d/d9/Tekken_7_FR_Portada.png/revision/latest?cb=20160128235251&path-prefix=es'),
(466, 'Dark Souls Ii - SOTFS', 'Mesmerized by the macabre, trans fixed by torment, these souls seek completion in hopeless ness, despair and impending doom - where true fortitude is earned.  Prepare to face death once again with Dark Souls II - Scholar of the First Sin, which...', 1566339971, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTc6Fc2nEG9sGD6W5Lnhn6uGRXl9_jDZISOOIp7zr.jsjJLrNFuf4nbVx8.imZsxlE_IUeD0GkPtU_XC8yTy2L1KBZ_HtNaIhNFLmbtsnjf_L0unwBycg2MJIbopMfc7uIjmmZ0E.93X3tntojt_Sx6GMVOdmo4_QJWX8JZ3c7nueM-&h=300&w=200&format=jpg'),
(467, 'LEGO Marvel Super Heroes', 'Get ready for an action-packed, brick-smashing good time with LEGO Marvel Super Heroes, the first LEGO video game to feature Marvel characters.', 1566331309, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcZwpnYISKF_DMEQKn6r9OB6p3NtWTaThVgGNJ9ULkwcw.69o5GBnMyym9XDfxq1J0zNUtkm5d89zttT8GXlIJW.KS6c_xiQEr.0w6Q7wcpNvOFj9K46lWT7tZC.jKKEdWqGAZedKElVTjkeXLgNnJAbRbAY.HPLqJTO94dGIyvWk-&h=300&w=200&format=jpg'),
(469, 'Game Of Thrones', 'Game of Thrones-A Telltale Games Series  Telltale\'s Game of Thrones is set in the world of HBO\'s groundbreaking TV show.  This new story tells of House Forrester, a noble family from the north of Westeros, loyal to the Starks of Winter fell.  Caught...', 1566334503, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcQeBn6ttFubnZIwuCclYoWUrQ5CzUxKJAdGerfOdrOQfb2_d6Vdu3IOwz_BYJDo02kYzvCzmTSVAlarugeb7d8041ka4zuhurhKYhkWDfamaiiI1jepZpEiECDuyGWeoCchBN3T9xLNGOUqz7tDd4b7SzOSVHMKTtPtcLsBpvnXA-&h=300&w=200&format=jpg'),
(470, 'Mad Max', 'Play as Mad Max, a lone warrior who must embark on a dangerous journey after his Interceptor is stolen by a deadly gang of marauders.  A reluctant hero with an instinct for survival, Max wants nothing more than to leave the madness behind and find...', 1566337548, 'https://i11c.3djuegos.com/juegos/10044/mad_max/fotos/ficha/mad_max-2722802.jpg'),
(471, 'Just Cause 3', 'The beautiful, scenic Mediterranean republic of Medici used to be home to Rico Rodriguez.  Now, at the request of his friends, Rico returns - only to witness the near-complete destruction of the rebel forces.  General Di Ravello was the head of the...', 1566334390, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcEb_IVTqiE3uywvtY7PlrWQckLL7zyw9_UcX_Pnq86CvHxxLsJXEdLo1t9mn914sngBccmII3loxLaZ7q89FMNqwJaXDCGZSegz6XR46N3.dt__RMIr8pZfiF62TFQM0ZwwEVbhWZg5HYuoLCUQpLX9o4TM3hrkRBqn.A_XRqnYY-&h=300&w=200&format=jpg'),
(473, 'Lego Marvel\'s Avengers', 'This colorful action game features all your favorite Marvel heroes in LEGO form!  There are over 100 characters to unlock and play as, including favorites like the Hulk, Iron Man, and Wonder Woman, plus new characters from Avengers: Age of Ultron and...', 1566332601, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTc0GI2WEg9jr0KrvaFtWlcfmtdoZFjSZ5DkH6YJn4YmXxv6IPF6GbRNTZ1Jk4JW1zOGYf9_UCleDPsA9vJVDxZjHV2y4hS.bfGbYZIUb6yftqvxtXoAoEwiTU5g3zjd4Q8AN6Kwa7mKk6pM7bTi0GHScn8iYVoWHqSQnaPOEoJfzY-&h=300&w=200&format=jpg'),
(474, 'Batman: Arkham Knight ', 'In the explosive finale to the arkham series, batman faces the ultimate threat against the city he is sworn to protect.  The scarecrow returns to unite an impressive roster of super villains, including penguin, two-face and harley quinn, to destroy...', 1317690438, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcWisdKRWe9UqSh0LIVT43kceAry5KBZj9iJxvMu.a4mJ1HI1E32fdX1BVwU9gzW.hy0rjAjwm_AlOn49L1nzxf5blkRN.JTGrR3fRHik_Va4Nwo1Ggm3D3Jb2c5XRC9PK8ulxYftIUjW4YGQHwD4rQOO_.t_5IZgSGf6Ti.RovIE-&h=300&w=200&format=jpg'),
(475, 'Final Fantasy X-X-2 ', 'Return to the world of Spira and relive two of the most beloved Final Fantasy franchise titles.  This HD remaster gives a facelift to some of your favorite characters - this is Tidus and Yuna like you\'ve never seen them before.  Enjoy improved...', 1566340338, 'https://7.allegroimg.com/original/0c9e78/fd7939d84ec6983513794df17437'),
(482, 'Super Mario Party', 'Toys play a crucial part in development of a child. Toys as simple as wooden blocks or numbered puzzle, develops cognitive and physical skills. Complex puzzles, remote control cars, bubble guns helps learn and analyse cause effects...', 1707658633, 'https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/styles/cover_290x414/public/media/image/2018/09/super-mario-party-cover.jpg?itok=ZSTp7W77'),
(485, 'Legend of Zelda - BOTW ', 'Everything in this world is related to electronics and its accessories. In aspects of that our products are very compatible and durable with all kinds of device. These products are recognized for its honesty, high efficiency, and...', 1505941802, 'https://upload.wikimedia.org/wikipedia/en/c/c6/The_Legend_of_Zelda_Breath_of_the_Wild.jpg'),
(486, 'The Crew 2', 'Playstation 4 The Crew 2: Steelbook Gold Edition Video Game', 1704180020, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcvUqCJUaQkwrFHg9QFUSuRwj4b62XG7ZH2Ma5MomBLYzclme96cISXWd4m53K2jcFuB.HVC.KKM0UV3dPrlWfcBYHhcPNCUQHjje4KP3a8KMPxHMbKA4wDUnrG1ZS2f.h9BCeck4YZ7CJbv4h.R3jtIZNeNv4jJoeML7V9H_RtdE-&h=300&w=200&format=jpg'),
(489, 'Mario Kart 8 Deluxe', '‘Mario Kart 8 Deluxe’ es diversión pura y dura por una sencilla razón: es la versión hipervitaminada del ‘Mario Kart 8’ de Wii U, un juego que ya era muy bueno y que ahora se disfruta todavía más en una Nintendo Switch.', NULL, 'https://bilkadk.imgix.net/medias/sys_master/root/h03/he7/9619327320094/MarioKart8Deluxe-PS-front-PEGI-DUMMY-R.jpg?w=350&h=350&auto=format&fm=jpg'),
(491, 'Ori and the blind forest', 'La voz del Árbol de Espíritu comienza la historia narrando desde el momento cuando Ori cae del árbol al bosque de Nibel durante una tormenta. Ori es encontrado y adoptado por una criatura de nombre Naru, quien cria a Ori como su propio hijo.3​Tiempo despues, un cataclismo cae sobre el bosque y los suministros de alimentos se secaron. Naru muere. Debilitado por el cataclismo y huérfano, Ori sale a explorar el bosque solo.', NULL, 'https://i11a.3djuegos.com/juegos/11069/ori_and_the_blind_forest/fotos/ficha/ori_and_the_blind_forest-2558456.jpg'),
(492, 'Octopath Traveler', 'Los autores de Bravely Default, dan vida a Octopath Traveler, un JRPG para Nintendo Switch que combina una estética retro con elementos gráficos propios de la actualidad. El videojuego de Square Enix para Switch apuesta por conservar la esencia más tradicional de las aventuras de rol: buena historia (contada a través de ocho personajes), combates de dificultad ajustada que no se resuelven nunca por fuerza bruta, sino encontrando las debilidades de nuestros enemigos, y un inspirado apartado audiovisual.', NULL, 'https://www.myacg.com.tw/goods_images/1062367_1_20180801094709.jpg'),
(493, 'Spider-Man', 'Han pasado más de cuatro años desde que Spider-Man se balanceó por última vez en el mundo del ocio virtual (si no contamos sus apariciones en títulos como Disney Infinity o LEGO Marvel Super Heroes, y el juego para móviles Spider-Man Unlimited) con The Amazing Spider-Man 2, desarrollado por Beenox para aprovechar el tirón en cines de la película homónima... Y que nos dejó un sabor de boca bastante agridulce. Así que no es de extrañar las ganas que teníamos de volver a disfrutar de un buen juego de Spider-Man. ', NULL, 'https://upload.wikimedia.org/wikipedia/pt/thumb/7/78/Spider-Man_jogo_2018_capa.png/270px-Spider-Man_jogo_2018_capa.png'),
(494, 'Spyro Reignited Trilogy', 'Spyro Reignited Trilogy es un remake de los tres juegos desarrollados por Insomniac para la PlayStation original: Spyro the Dragon, Spyro 2: Ripto’s Revenge (también conocido como En busca de los talismanes o Gateway to Glimmer) y Spyro: Year of the Dragon o El año del dragón. Los tres juegos son prácticamente idénticos, y los principales cambios son visuales y algunos ajustes en el control.', NULL, 'https://m.media-amazon.com/images/M/MV5BMmM4NjI4MGUtYTVjOC00NTYwLWFjZTEtNjUxYTY1MTU2YWQ4XkEyXkFqcGdeQXVyMzY0MDAyMDI@._V1_.jpg'),
(495, 'Mortal Kombat 11', 'Mortal Kombat 11 es la última entrega de la franquicia aclamada por la crítica, que proporciona una experiencia más profunda y más personalizada que nunca con un nuevo sistema de Variación de personajes personalizados que ofrece a los jugadores el control creativo para personalizar versiones de toda la lista de personajes. Desarrollado por los galardonados NetherRealm Studios, Mortal Kombat 11 presentará una nueva historia cinematográfica que continúa la saga épica que lleva más de 25 años de desarrollo.', NULL, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcIpPWTEUSdsyhaelm9zu2M.zrSjFc_iL.qr8NtViDEMDjdwFmijjb6edYvwN9Vql0PzeJOrkHxiOszhbt0ofNjT9a4zO9qsU4DZsHdP8_T3l5GbrGzk._rqbkd_H99.7hs05uCLI1F4bTw.8CnmTSJkG231QcJe4URxrbQ9B1kFQ-&w=540&format=jpg'),
(530, 'World War Z', 'World War Z es un trepidante juego de disparos cooperativo en tercera persona para hasta 4 jugadores, con hordas masivas y una acción brutal.\r\n\r\nLucha contra cientos de zombis en tiroteos espectaculares.\r\nSigue campañas cooperativas narrativas.\r\nLucha contra otros en el modo jugador c. jugador c. zombis.\r\nSube de nivel a 16 clases de personajes y mejora armas para enfrentarte a más desafíos.', NULL, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcOy7x7q1RHF4OyYAPvxeakWFaIr6FHJnctgcOEXIDBTkgUnS07YK6vmzmzwjX95rwhYuxzG5nCtkXFtGkHWi.H6ZpkNPTsl92WSqyp4koCdxD_L1txBYOojB_x2h.7hN3RgtlpWvhIHP5hvqr2krFsEQrFILVwzE63IZUSVM8PWc-&h=300&w=200&format=jpg'),
(531, 'DayZ', 'Un virus desconocido ha azotado la Chernarus posoviética y ha transformado a muchos en infectados enloquecidos. El ambiente hostil por la lucha por los recursos ha llevado a la humanidad al borde del colapso. Eres inmune al virus, pero ¿hasta dónde llegarás para sobrevivir?', NULL, 'https://store-images.s-microsoft.com/image/apps.29273.69886306496288395.9772e69a-b6b4-4e4e-b921-787e4783bd7d.596454ff-8c18-42f6-93ba-3c0dd66b5c6f?mode=scale&q=90&h=300&w=200'),
(532, 'RAGE 2', 'Adéntrate con todo en un mundo distópico sin sociedad, leyes ni orden. RAGE 2 une dos estudios puntales: Avalanche Studios, maestros de la locura de mundo abierto, e id Software, creadores de los juegos shooter de primera persona, para ofrecer un carnaval de matanza donde puedes ir donde quieras, disparar a cualquier cosa y hacer explotar todo.', NULL, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcDk96N_qww63WdsMaZp26Pv7gpiNSYTMvy2JDGjwnpcqtOuAj_MRTEV.PtwGbi6r_KykIz8Ryej8Kehvi9PtirBaLh_mrQc9WAi3_3lclfwHVAI2hHEXTU3NSLy9KnA7XSsOmKYogBNRaXG8iAbOp62qpdnN_EzGOBCotlALlTno-&w=540&format=jpg'),
(533, 'Devil May Cry 5', 'El demonio que conoces regresa en esta aventura totalmente nueva de la elegante serie de acción desmesurada. Prepárate para desatar la maldad con tres personajes singulares jugables en esta emblemática combinación de acción estilizada de alto octano e imágenes místicas por las que se conoce la serie. El director Hideaki Itsuno y el equipo base han regresado para crear la experiencia de acción más demente, tecnológicamente avanzada y totalmente imperdible de esta generación.', NULL, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTc8j9X52qm417sQruuxqOsgAG6WRy0blVonQvN_csziFZxY1FAxXgB7.UxuLHg0d4sjbXvDKGg9ZbU4O0_gfQj5EEsjyP4exTt7woYFQ4cNwhHV4tZYf8ex613twaDzL1PqAPzCcjb9gYBc3wwAxDIUk4dBcEXPJP.awy9C2geV.Q-&w=540&format=jpg'),
(534, 'Metro Exodus', 'Estamos en el año 2036.\r\n\r\nUn cuarto de siglo después de que la guerra nuclear devastara la Tierra, aún quedan unos pocos centenares de supervivientes que luchan por la supervivencia bajo las ruinas de Moscú, en los túneles del metro. Han sobrevivido a pesar del veneno, las bestias mutadas, los horrores paranormales y las llamas de la guerra civil.\r\n\r\nPero ahora tú eres Artyom y debes huir del metro y liderar un grupo de Spartan Rangers en un increíble viaje por todo el continente a lo largo de la Rusia postapocalíptica para buscar una nueva vida al Este.', NULL, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcuvagwtLyJYkXOJsmyhgBJdNguY_A7nUfWVPqFttqiUShCIVdefS_W6MQXAjhIqZnXY3kfde2HWgA0p_2Jbk8fFxpuNGFL_iWMrRoKTYtnHT3IDpIBuHEc5EgkccEr_8TWq8dZW81uWN6gESkRHkqsHM7xscqY46wJipxjNPkvLA-&w=540&format=jpg'),
(535, 'Borderlands 3', 'El juego de disparador y saqueo original vuelve, con una multitud infinita de armas y una aventura totalmente nueva impulsada por el caos. Lánzate por nuevos mundos y enemigos como uno de los cuatro nuevos cazadores Vault... los fantásticos busca tesoros por excelencia de Borderlands, cada uno con un profundo conjunto de habilidades, capacidades y personalización. Juega solo o con amigos para enfrentarte a enemigos dementes, encuentra multitudes de botines y salva tu hogar de los líderes de secta más implacable de la galaxia.', NULL, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTc9FvITMUFGGX3DIrw0bw20X2_WaD4TdJuIx24Tf.2ZqUhb3qstVlLDqW62tVW4tSNQthusLtxkH52ngZvdelrEsVb95PRXWUelIPsfKSUxghSk_N_QvNo9.oJFNACqjOBOXo47FfYYG7TgHXvAtebcJlDENUpKA36TI4_tGCFO7c-&w=540&format=jpg'),
(536, 'Sekiro: Shadows Die Twice', 'En Sekiro: Shadows Die Twice, eres el \"lobo de un brazo\", un deshonrado y desfigurado guerrero rescatado de al borde de la muerte. Comprometido a proteger un joven señor, descendiente de un linaje antiguo, te conviertes en el blanco de muchos enemigos despiadados, entre los que se incluye el peligroso clan Ashina. Cuando el joven señor es capturado, harás todo lo posible durante tu peligrosa misión para recuperar tu honor... incluso de la muerte.\r\n\r\nExplora la era de finales de Siglo XVI de Sengoku Japón, un brutal período de conflictos constantes por la vida y la muerte, mientras te enfrentas a poderosos enemigos en un mundo oscuro y retorcido. Desata un arsenal de mortíferas herramientas protéticas y poderosas habilidades ninja mientras combinas agilidad, recorridos verticales y un visceral combate mano a mano en una sangrienta confrontación.', NULL, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTcNk.w.C54FsUiLp5yxpsdrGyoykTuXZ_SSOdMYClP7ePq_OzRi0zWeCLUVxBJIPTDqfcQ.tqcupyOqUYgQHq57Ze1dqPrixVfYo3mXWFktnJdpUgzy4GMGf_FVq6OloJWqej2Qefs012g6GcW6HEY45Vp55m7MWHnSy6yuqkcK1E-&w=540&format=jpg'),
(537, 'The Division 2', 'Han pasado siete meses desde que el mortífero virus infestó a la ciudad de Nueva York y el resto del mundo, paralizando la población mundial. La sociedad tal como la conocemos ha colapsado. Cuando llegó el virus, The Division, una unidad de agentes de incógnito civiles, se activó como última línea de defensa. Desde entonces, han estado luchando sin descanso para salvar lo que queda e impedir que la civilización caiga en el caos.\r\n\r\nSupuestamente, Washington D.C. es la última ciudad en pie para evitar el colapso total del país, pero al verse amenazada por varios frentes, está en el precipicio. The Division se juega más que nunca... si cae Washington D.C., cae el país. Apoderados como agentes civiles, tú y tu equipo sois la última esperanza para detener la caída de la sociedad después del colapso pandémico.', NULL, 'https://images-eds-ssl.xboxlive.com/image?url=8Oaj9Ryq1G1_p3lLnXlsaZgGzAie6Mnu24_PawYuDYIoH77pJ.X5Z.MqQPibUVTc7Nqt385TnwRdLp0l_5MCv7lgZoKs87S9axtTWaQLyB0.C1lqEst9w3xpM6Qk1M.vfxTu_UeKLnkRZxmt6lTYhumEL7ZZcQlxr0TlZBMoURqY4oDYO1UxPAW4nusVonA178Mf5CY5LB1ukqgdLPqANKlMPD35sfBOevjbCv5pUuM-&w=540&format=jpg'),
(538, 'Super Mario Odyssey', 'Super Mario Odyssey es uno de esos Super Mario que serán recordados durante muchos años, capaz tanto de abrazar a un jugador veterano en un abrumador baño de nostalgia y diversión, como de ser la puerta de entrada para un novato a un mundo lleno de posibilidades, en una experiencia que le marque para siempre.\r\n\r\nUna vez más la saga se reinventa para mantenerse fresca y sorprendente 30 años después, algo que tiene un mérito difícil de describir, pero que Nintendo ejecuta con una facilidad pasmosa, como si ponerte a corretear con Mario por bellos y divertidos entornos 3D con un control perfecto y con la capacidad de llegar a todo tipo de jugadores fuera lo más sencillo del mundo.\r\n\r\n', NULL, 'https://i5.walmartimages.ca/images/Large/946/768/6000198946768.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `idPlataforma` int(11) NOT NULL,
  `idPlaAPI` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`idPlataforma`, `idPlaAPI`, `nombre`) VALUES
(1, '2-12451425', 'PlayStation 4'),
(5, '2-12451422', 'Nintendo Switch'),
(6, '2-12451432', 'Xbox One');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_juego`
--

CREATE TABLE `plataforma_juego` (
  `idPlataforma` int(11) NOT NULL,
  `idJuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plataforma_juego`
--

INSERT INTO `plataforma_juego` (`idPlataforma`, `idJuego`) VALUES
(1, 457),
(6, 457),
(1, 459),
(6, 459),
(1, 460),
(6, 460),
(1, 461),
(6, 461),
(1, 462),
(1, 466),
(1, 467),
(6, 467),
(6, 469),
(1, 470),
(6, 470),
(1, 471),
(6, 471),
(1, 473),
(6, 473),
(1, 474),
(6, 474),
(1, 475),
(5, 482),
(5, 485),
(1, 486),
(6, 486),
(5, 489),
(6, 491),
(1, 493),
(1, 494),
(1, 530),
(6, 530),
(1, 531),
(6, 531),
(1, 532),
(6, 532),
(1, 533),
(6, 533),
(1, 534),
(6, 534),
(6, 535),
(1, 536),
(6, 536),
(1, 537),
(6, 537),
(5, 538);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `idTienda` int(11) NOT NULL,
  `idCiudad` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` int(250) NOT NULL,
  `tlf` int(11) NOT NULL,
  `latitud` int(11) DEFAULT NULL,
  `longitud` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `pass` varchar(33) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fecnac` date NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `pass`, `nombre`, `apellidos`, `email`, `fecnac`, `descripcion`) VALUES
(13, 'sthyb99', '067ddd99326dada550764d99b7037023', 'Esther', 'Meléndez', 'sthyb99@gmail.com', '1930-01-01', 'Hola, me llamo Esther Meléndez Bravo y tengo 20 años.'),
(49, 'hola99', '067ddd99326dada550764d99b7037023', 'Hola', 'Bravita Bravota', 'holita99@gmail.com', '1972-12-10', 'Hola que tal soy la pera.'),
(68, 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Admin', 'Admin', 'admin@gmail.com', '1999-10-10', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idCiudad`);

--
-- Indices de la tabla `compania`
--
ALTER TABLE `compania`
  ADD PRIMARY KEY (`idCompania`);

--
-- Indices de la tabla `compania-juego`
--
ALTER TABLE `compania-juego`
  ADD PRIMARY KEY (`idJuego`,`idCompania`),
  ADD KEY `fk_compania_juego_compania` (`idJuego`),
  ADD KEY `fk_compania_compania` (`idCompania`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`idEvaluacion`),
  ADD KEY `fk_evaluacion_juego` (`idJuego`) USING BTREE,
  ADD KEY `fk_evaluacion_usuario` (`idUsuario`) USING BTREE;

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`idFavorito`),
  ADD KEY `fk_favoritos_usuario` (`idUsuario`),
  ADD KEY `favoritos_ibfk_1` (`idJuego`);

--
-- Indices de la tabla `favoritos-juego`
--
ALTER TABLE `favoritos-juego`
  ADD PRIMARY KEY (`idJuego`,`idFavorito`),
  ADD KEY `fk_favoritos_juego_favoritos` (`idJuego`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `genero-juego`
--
ALTER TABLE `genero-juego`
  ADD PRIMARY KEY (`idJuego`,`idGenero`),
  ADD KEY `fk_genero_juego_genero` (`idJuego`),
  ADD KEY `fk_genero_genero` (`idGenero`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`idJuego`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`idPlataforma`);

--
-- Indices de la tabla `plataforma_juego`
--
ALTER TABLE `plataforma_juego`
  ADD PRIMARY KEY (`idJuego`,`idPlataforma`),
  ADD KEY `fk_plataforma_juego_plataforma` (`idJuego`),
  ADD KEY `fk_plataforma_plataforma` (`idPlataforma`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`idTienda`),
  ADD KEY `fk_tiendas_ciudad` (`idCiudad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `idCiudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compania`
--
ALTER TABLE `compania`
  MODIFY `idCompania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `idEvaluacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `idFavorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `idJuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=539;

--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `idPlataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `idTienda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compania-juego`
--
ALTER TABLE `compania-juego`
  ADD CONSTRAINT `fk_compania_compania` FOREIGN KEY (`idCompania`) REFERENCES `compania` (`idCompania`),
  ADD CONSTRAINT `fk_compania_juego` FOREIGN KEY (`idJuego`) REFERENCES `juego` (`idJuego`);

--
-- Filtros para la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `fk_evaluacion_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `fk_evaluaciones_juego` FOREIGN KEY (`idJuego`) REFERENCES `juego` (`idJuego`);

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`idJuego`) REFERENCES `juego` (`idJuego`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_favoritos_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `favoritos-juego`
--
ALTER TABLE `favoritos-juego`
  ADD CONSTRAINT `favoritos-juego_ibfk_1` FOREIGN KEY (`idJuego`) REFERENCES `favoritos-juego` (`idJuego`) ON DELETE CASCADE;

--
-- Filtros para la tabla `genero-juego`
--
ALTER TABLE `genero-juego`
  ADD CONSTRAINT `fk_genero_genero` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`),
  ADD CONSTRAINT `fk_genero_juego` FOREIGN KEY (`idJuego`) REFERENCES `juego` (`idJuego`);

--
-- Filtros para la tabla `plataforma_juego`
--
ALTER TABLE `plataforma_juego`
  ADD CONSTRAINT `fk_plataforma_juego` FOREIGN KEY (`idJuego`) REFERENCES `juego` (`idJuego`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_plataforma_plataforma` FOREIGN KEY (`idPlataforma`) REFERENCES `plataforma` (`idPlataforma`);

--
-- Filtros para la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD CONSTRAINT `fk_tiendas_ciudad` FOREIGN KEY (`idCiudad`) REFERENCES `ciudad` (`idCiudad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
