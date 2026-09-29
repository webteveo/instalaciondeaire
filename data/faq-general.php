<?php
/**
 * FAQ generales de /preguntas-frecuentes (visibles + schema FAQPage). Sin cifras de precio.
 * Cada item: q, a (html permitido: <strong>, <a href>), tema (agrupa en la pagina).
 */
$u = $GLOBALS['url'] ?? '/';
return [
    // ── Precio e instalación ──
    ['tema' => 'Precio e instalación', 'q' => '¿Cuánto cuesta instalar un aire acondicionado en Montevideo?',
     'a' => 'No hay un precio único, y desconfiá de quien te lo dé sin preguntar nada. Lo que define el costo es: la <strong>capacidad del equipo</strong> (no es lo mismo colgar un split de 2.250 frigorías que uno de 6.000), los <strong>metros de cañería de cobre</strong> entre la unidad interior y la condensadora, <strong>dónde va la condensadora</strong> (balcón, patio, techo o fachada con trabajo en altura), si hace falta <strong>canaleta</strong> para tapar el caño, si hay que hacer una <strong>línea eléctrica dedicada</strong> desde el tablero y si hay que <strong>retirar un equipo viejo</strong>. Decinos tu barrio, las frigorías y si es casa o apartamento, y un técnico de tu zona te pasa el presupuesto por WhatsApp.'],
    ['tema' => 'Precio e instalación', 'q' => '¿Qué incluye la instalación estándar?',
     'a' => 'Lo habitual: <strong>soporte</strong> (ménsulas) para la condensadora, <strong>cañería de cobre aislada</strong> en el tramo estándar (los metros incluidos se detallan en el presupuesto; en el mercado uruguayo lo habitual son 3 metros), <strong>desagote</strong> de la unidad interior, interconexión eléctrica entre unidades, <strong>vacío del circuito</strong> con bomba y <strong>prueba de funcionamiento</strong>. Se cobran aparte los metros extra, el trabajo en altura, la canaleta, la línea eléctrica dedicada y bases o estructuras especiales. Pedí que el presupuesto lo diga por escrito.'],
    ['tema' => 'Precio e instalación', 'q' => '¿Instalan equipos comprados en otro lado?',
     'a' => 'Sí. Compralo donde te convenga (casa de electrodomésticos, importador, particular) y el técnico lo instala. Trabajamos con equipos de <strong>todas las marcas</strong> (Midea, Samsung, LG, Hisense, etc.). Guardá la factura del equipo y pedile al técnico el comprobante de instalación: la garantía del fabricante suele pedir los dos.'],
    ['tema' => 'Precio e instalación', 'q' => '¿Pueden instalar la condensadora en la fachada de un edificio?',
     'a' => 'Técnicamente sí, con trabajo en altura (se cotiza aparte). Pero antes <strong>consultá el reglamento de copropiedad y a la administración</strong>: muchos edificios definen dónde puede ir la unidad exterior, si se permite en la fachada y cómo debe desagotar para no gotear al vecino de abajo. No podemos asegurarte qué permite tu edificio; sí podemos darte opciones (balcón, patio de aire, azotea) según lo que te autoricen. Más detalle en <a href="' . $u . 'apartamentos">instalación en apartamentos</a>.'],
    ['tema' => 'Precio e instalación', 'q' => '¿Cuánto tarda una instalación?',
     'a' => 'Una instalación estándar de un split, con la condensadora cerca y sin trabajo en altura, suele resolverse en una visita de unas pocas horas. Si hay que hacer línea eléctrica, canaleta larga o colgarse por la fachada, puede llevar más. El técnico te lo anticipa en el presupuesto.'],

    // ── Elegir el equipo ──
    ['tema' => 'Elegir el equipo', 'q' => '¿Cuántas frigorías necesito?',
     'a' => 'Como regla rápida, unas <strong>150 frigorías por m²</strong> en un ambiente normal: 2.250 frigorías (9.000 BTU) hasta 12 m², 3.000 (12.000 BTU) hasta 20 m², 4.500 (18.000 BTU) hasta 30 m², 5.500 (22.000 BTU) hasta 37 m² y 6.000 (24.000 BTU) hasta 42 m². Sumá un escalón si el ambiente da al norte, tiene ventanales, techo alto o está bajo azotea. Con la <a href="' . $u . 'calculadora-frigorias">calculadora de frigorías</a> lo resolvés en un minuto.'],
    ['tema' => 'Elegir el equipo', 'q' => '¿Inverter u on/off?',
     'a' => 'Para uso habitual, <strong>inverter</strong>. El compresor regula su velocidad en vez de prender y apagar: llega a la temperatura y la mantiene consumiendo menos, hace menos ruido y arranca sin picos. Si además vas a calefaccionar en invierno, la diferencia de consumo se nota más. Un on/off puede justificarse solo para un uso muy esporádico donde el precio de compra pese más que el consumo. Ver <a href="' . $u . 'split-inverter">instalación de split inverter</a>.'],
    ['tema' => 'Elegir el equipo', 'q' => '¿Cuánto consume un aire acondicionado?',
     'a' => 'Depende de la capacidad, de si es inverter, de la temperatura que pongas y de cuántas horas lo uses. Como orden de magnitud, un split inverter de 3.000 frigorías consume alrededor de 1 kW por hora de funcionamiento a plena carga, y bastante menos cuando ya alcanzó la temperatura; un on/off de la misma capacidad consume más porque arranca y para todo el tiempo. Mirá la etiqueta de eficiencia energética del equipo (clase A o superior) y compará el consumo anual declarado. Cada grado menos de 24 °C en verano sube el consumo de forma notoria.'],
    ['tema' => 'Elegir el equipo', 'q' => '¿Sirve el aire acondicionado para calefaccionar?',
     'a' => 'Sí, si es <strong>frío-calor</strong> (bomba de calor), que hoy es la mayoría de los split inverter. En el clima de Uruguay rinde bien casi todo el invierno y suele ser más económico de usar que las estufas eléctricas de resistencia. En días muy fríos y húmedos el equipo hace ciclos de descongelado y pierde algo de rendimiento. Más en <a href="' . $u . 'calefaccion">calefacción con aire acondicionado</a>.'],

    // ── Service y problemas ──
    ['tema' => 'Service y problemas', 'q' => '¿Cada cuánto hay que hacerle service al aire?',
     'a' => 'Los <strong>filtros</strong> de la unidad interior conviene limpiarlos cada dos a cuatro semanas de uso, y eso lo podés hacer vos. El <strong>service completo</strong> con un técnico (limpieza de serpentines interior y exterior, revisión de desagote, control de presiones y conexiones) se recomienda una vez al año, antes del verano. En zonas costeras con salitre o con mucho uso todo el año, dos veces al año. Ver <a href="' . $u . 'mantenimiento">service y mantenimiento</a>.'],
    ['tema' => 'Service y problemas', 'q' => '¿Por qué mi aire pierde agua?',
     'a' => 'Casi siempre por el <strong>desagote obstruido</strong>: la bandeja de condensado se llena y el agua chorrea por la unidad interior. Otras causas: filtros muy sucios que hacen que el evaporador se congele y después descongele de golpe, la unidad interior desnivelada, o falta de gas (también congela el evaporador). Un service lo resuelve; si el equipo es nuevo y pierde, suele ser un problema de instalación. Ver <a href="' . $u . 'reparacion">reparación de aire acondicionado</a>.'],
    ['tema' => 'Service y problemas', 'q' => '¿Cada cuánto hay que cargar gas?',
     'a' => 'Nunca, si la instalación está bien hecha. El gas refrigerante circula en un circuito cerrado y no se consume. Si el equipo necesita carga es porque <strong>hay una fuga</strong>, y lo correcto es encontrarla y repararla antes de cargar. Ver <a href="' . $u . 'carga-de-gas">carga de gas R410A y R32</a>.'],
    ['tema' => 'Service y problemas', 'q' => 'El aire prende pero no enfría, ¿qué puede ser?',
     'a' => 'Lo más común, en este orden: filtros o serpentín sucios, condensadora tapada o sin ventilación, falta de gas por una fuga, o un problema en el compresor o en la placa. Antes de llamar, limpiá los filtros y fijate que la unidad exterior no esté obstruida. Si sigue igual, un técnico lo diagnostica en la visita.'],

    // ── Zonas y funcionamiento ──
    ['tema' => 'Zonas y funcionamiento', 'q' => '¿En qué zonas trabajan?',
     'a' => 'Montevideo (Pocitos, Punta Carretas, Cordón, Centro, Parque Rodó, Tres Cruces, Buceo, Malvín, Carrasco, Punta Gorda, Prado, Parque Batlle y La Blanqueada), Ciudad de la Costa en Canelones, y Punta del Este y Maldonado. Si tu barrio no aparece, escribí igual: te decimos si un técnico cercano lo cubre. Ver <a href="' . $u . 'zonas">todas las zonas</a>.'],
    ['tema' => 'Zonas y funcionamiento', 'q' => '¿Quién viene a mi casa?',
     'a' => 'Un técnico en refrigeración de ' . EMPRESA_NOMBRE . ' que atiende tu zona. El mismo técnico te pasa el presupuesto, coordina la visita y hace el trabajo, y nosotros respondemos por la garantía de la mano de obra. Más en <a href="' . $u . 'como-funciona">cómo trabajamos</a>.'],
    ['tema' => 'Zonas y funcionamiento', 'q' => '¿Son servicio oficial de alguna marca?',
     'a' => 'No. Somos una empresa independiente. Trabajamos con equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.), pero no representamos a ninguna. Si tu equipo está en garantía de fábrica y la falla es del equipo, consultá primero con el comercio o el importador.'],
];
