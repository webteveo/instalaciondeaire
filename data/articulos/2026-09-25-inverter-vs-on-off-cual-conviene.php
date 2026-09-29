<?php
/** Guía: inverter vs on/off. Sin cifras de ahorro inventadas. */
return [
    'slug'        => 'inverter-vs-on-off-cual-conviene',
    'titulo'      => 'Inverter vs on/off: cuál conviene',
    'title'       => 'Inverter vs on/off: cuál conviene en Uruguay | Consumo y uso',
    'description' => 'Inverter vs on/off: cómo funciona cada uno, consumo en la factura de UTE, ruido, calefacción en invierno y en qué casos conviene cada opción.',
    'keywords'    => 'inverter vs on off, aire acondicionado inverter o convencional, diferencia inverter on off, split inverter consumo, cuál conviene inverter',
    'categoria'   => 'Elegir el equipo',
    'tema'        => 'Tecnología inverter',
    'fecha'       => '2026-09-25',
    'actualizado' => '2026-09-25',
    'autor'       => 'Equipo ' . EMPRESA_NOMBRE,
    'imagen'      => 'articulos/inverter-vs-on-off-cual-conviene.webp',
    'imagen_alt'  => 'Infografía: comparación inverter vs on/off en control del compresor, temperatura, consumo en uso continuo, ruido, calefacción y precio de compra',
    'imagen_pie'  => '',
    'bajada'      => 'Qué cambia adentro del equipo, qué se nota en la factura de UTE y cuándo un on/off todavía tiene sentido.',

    'respuesta'   => 'Para uso habitual conviene un <strong>inverter</strong>: regula la velocidad del compresor en lugar de prenderlo y apagarlo, mantiene la temperatura estable, consume menos en uso continuo, hace menos ruido y calefacciona mejor en invierno. Un on/off solo se justifica si lo vas a usar muy pocos días al año y pesa más el precio de compra.',

    'puntos_clave' => [
        'El inverter varía la velocidad del compresor; el on/off lo prende y lo apaga siempre a plena potencia.',
        'La diferencia de consumo crece con las horas de uso y con el uso en invierno.',
        'La instalación es la misma: soporte, cañería, desagote, vacío y prueba.',
        'UTE bonifica $2.500 por aire clase A en frío y calor comprado entre el 1/9/2026 y el 31/3/2027 (Plan Redondo).',
    ],

    'secciones' => [
        [
            'h2'  => '¿Cómo funciona un aire inverter y uno on/off?',
            'parrafos' => [
                'La diferencia está en el compresor, el motor que mueve el gas y hace el trabajo pesado. Todo lo demás (unidad interior, condensadora, cañería) es parecido.',
            ],
            'h3s' => [
                ['h3' => 'On/off: el compresor arranca y para', 'parrafos' => [
                    'El compresor de un on/off tiene una sola velocidad. Arranca a plena potencia, enfría hasta que el termostato marca la temperatura y corta. Cuando el ambiente se calienta un par de grados, vuelve a arrancar. Cada arranque tiene un pico de corriente varias veces mayor que la de funcionamiento, y la temperatura del ambiente oscila entre ciclos.',
                ]],
                ['h3' => 'Inverter: el compresor regula su velocidad', 'parrafos' => [
                    'El inverter usa un variador electrónico que cambia la velocidad del compresor según lo que pide el ambiente. Arranca suave, enfría rápido al principio y, cuando se acerca a la temperatura elegida, baja de velocidad y se queda trabajando despacio. No hay picos de arranque ni cortes constantes.',
                ]],
            ],
        ],
        [
            'h2'       => '¿El inverter consume menos en la factura de UTE?',
            'parrafos' => [
                'Sí, en uso normal, porque pasa la mayor parte del tiempo trabajando a baja velocidad para mantener la temperatura, en lugar de arrancar y parar a plena potencia. Cuánto se nota en la factura depende de las horas de uso, de la temperatura que elijas, de la aislación del ambiente y de que el equipo tenga el tamaño correcto.',
                'No hay una cifra única de ahorro que valga para todos los casos, así que desconfiá de los porcentajes redondos. La forma honesta de comparar es la <strong>etiqueta de eficiencia energética</strong> que exige la URSEA para los aires que se venden en Uruguay: muestra la clase (de A, la más eficiente, hacia abajo) y el consumo declarado. Compará dos equipos de la misma capacidad y mirá la clase en frío y en calor.',
                'Un dato concreto: el <strong>Plan Redondo de UTE</strong> bonifica $2.500 (IVA incluido) en la factura por cada aire acondicionado clase A en frío y en calor comprado entre el 1 de septiembre de 2026 y el 31 de marzo de 2027, con un máximo de seis equipos por cliente. Hay que registrar la compra con la factura electrónica y el equipo tiene que quedar instalado en ese servicio.',
            ],
        ],
        [
            'h2'       => '¿Cuál hace menos ruido y da más confort?',
            'parrafos' => [
                'El inverter. En régimen, la condensadora gira despacio y la unidad interior sopla suave, algo que se nota mucho en dormitorios. El on/off tiene ruido de arranque cada vez que el compresor vuelve a entrar y la temperatura sube y baja entre ciclos.',
                'La humedad también cambia. El inverter trabaja más tiempo seguido a baja potencia, lo que ayuda a sacar humedad del aire de forma pareja. En los días húmedos del verano uruguayo eso se siente tanto como la temperatura.',
            ],
        ],
        [
            'h2'       => '¿Cuál calefacciona mejor en invierno?',
            'parrafos' => [
                'El inverter frío-calor. Funciona como bomba de calor: en lugar de generar calor con una resistencia, lo saca del aire exterior y lo pasa adentro. Por eso rinde mucho más por kWh que una estufa eléctrica de resistencia o un panel.',
                'Con temperaturas exteriores bajas, el inverter ajusta la velocidad y sostiene mejor el rendimiento. Muchos on/off económicos son solo frío, así que si pensás usarlo en invierno, revisá que diga frío-calor. Más detalles en <a href="calefaccion">calefacción con aire acondicionado</a>.',
            ],
        ],
        [
            'h2'       => '¿Cambia el precio de compra o la instalación?',
            'parrafos' => [
                'El equipo inverter suele costar más que un on/off de la misma capacidad; la diferencia varía según marca y modelo, así que comparalo en el comercio con la etiqueta de eficiencia al lado. La <a href="split-inverter">instalación</a> es la misma para los dos: soporte, perforación, cañería de cobre, desagote, conexión eléctrica, vacío y prueba.',
                'Donde sí hay que prestar atención es al tamaño. Un inverter sobredimensionado pierde parte de su ventaja porque nunca llega a trabajar despacio. Antes de comprar, calculá con la <a href="calculadora-frigorias">calculadora de frigorías</a>.',
            ],
        ],
        [
            'h2'    => '¿Cuándo conviene cada uno?',
            'lista' => [
                '<strong>Inverter:</strong> uso diario en verano, uso en invierno para calefaccionar, dormitorios donde importa el silencio, apartamentos y oficinas con muchas horas de uso.',
                '<strong>On/off:</strong> uso muy esporádico (una casa de temporada que se usa pocos días), ambientes de paso o un presupuesto de compra muy ajustado.',
            ],
            'parrafos' => [
                'En ' . EMPRESA_NOMBRE . ' instalamos los dos tipos, de todas las marcas. Si ya tenés un on/off viejo que se rompió, en la guía de <a href="reparacion">reparación</a> contamos cuándo conviene arreglarlo y cuándo cambiarlo.',
            ],
        ],
        [
            'h2'    => 'Comparativa rápida inverter vs on/off',
            'tabla' => [
                'cabecera' => ['Aspecto', 'Inverter', 'On/off'],
                'filas'    => [
                    ['Control del compresor', 'Velocidad variable', 'Prende y apaga'],
                    ['Temperatura', 'Estable', 'Oscila entre ciclos'],
                    ['Consumo en uso continuo', 'Menor', 'Mayor'],
                    ['Ruido', 'Menor en régimen', 'Picos al arrancar'],
                    ['Calefacción', 'Casi siempre frío-calor', 'Depende del modelo'],
                    ['Precio de compra', 'Más alto', 'Más bajo'],
                    ['Instalación', 'Igual', 'Igual'],
                ],
            ],
            'parrafos' => ['Comparativa de ' . EMPRESA_NOMBRE . ', septiembre de 2026, para equipos de la misma capacidad.'],
        ],
    ],

    'faq' => [
        ['q' => '¿El inverter consume menos de verdad?', 'a' => 'Sí, en uso normal, porque la mayor parte del tiempo trabaja a baja velocidad manteniendo la temperatura. Cuánto menos depende de las horas de uso, la aislación y el tamaño del equipo; compará la etiqueta de eficiencia.'],
        ['q' => '¿Vale la pena inverter para un dormitorio que uso pocas horas?', 'a' => 'Si lo usás todas las noches del verano, sí: además de consumir menos, es más silencioso. Si es un cuarto de huéspedes que se usa pocos días al año, un on/off puede alcanzar.'],
        ['q' => '¿Se instala distinto un inverter?', 'a' => 'No. Soporte, cañería, desagote, vacío y prueba son iguales. Lo que cambia es el equipo, no la instalación.'],
        ['q' => '¿Un on/off puede calefaccionar?', 'a' => 'Solo si es frío-calor; muchos on/off económicos son solo frío. Aun así, en calefacción el inverter rinde mejor con frío exterior.'],
        ['q' => '¿Qué es el Plan Redondo de UTE?', 'a' => 'Una bonificación de $2.500 en la factura por aire acondicionado clase A en frío y calor, comprado entre el 1 de septiembre de 2026 y el 31 de marzo de 2027 e instalado en el servicio. Condiciones completas en la web de UTE.'],
    ],

    'fuentes' => [
        ['label' => 'Plan Redondo — UTE', 'url' => 'https://www.ute.com.uy/clientes/soluciones-para-el-hogar/planredondo', 'nota' => 'bonificación de $2.500 por aire clase A, compras del 1/9/2026 al 31/3/2027 (consultado en septiembre de 2026)'],
        ['label' => 'Programa de Normalización y Etiquetado de Eficiencia Energética — MIEM', 'url' => 'https://www.gub.uy/ministerio-industria-energia-mineria/politicas-y-gestion/programas/programa-normalizacion-etiquetado-eficiencia-energetica', 'nota' => 'etiqueta obligatoria, clases de eficiencia y consumo declarado'],
        ['label' => 'Inverter compressor — Wikipedia (en inglés)', 'url' => 'https://en.wikipedia.org/wiki/Inverter_compressor', 'nota' => 'funcionamiento del compresor de velocidad variable y pico de arranque del on/off'],
    ],

    'links' => [
        ['href' => 'split-inverter',        'label' => 'Instalación de split inverter'],
        ['href' => 'calefaccion',           'label' => 'Calefacción con aire acondicionado'],
        ['href' => 'calculadora-frigorias', 'label' => 'Calculadora de frigorías'],
        ['href' => 'reparacion',            'label' => 'Reparación de aire acondicionado'],
        ['href' => 'preguntas-frecuentes',  'label' => 'Preguntas frecuentes'],
    ],

    'cta_titulo'  => '¿Te decidiste? Pedí presupuesto de instalación',
    'cta_texto'   => 'Decinos tu barrio, las frigorías y si es casa o apartamento. Te responde un técnico de tu zona.',
    'cta_message' => 'Hola! Leí la guía inverter vs on/off y quiero presupuesto para instalar un split. Barrio: ___ / Frigorías: ___',
];
