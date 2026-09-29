<?php
/**
 * Guía: permisos para instalar aire en Montevideo. Sin asesoría legal: todo remite a consultar
 * (administración, Intendencia, UTE). Datos verificados en las páginas oficiales en septiembre de 2026.
 */
return [
    'slug'        => 'permisos-para-instalar-aire-acondicionado-montevideo',
    'titulo'      => 'Permisos para instalar aire acondicionado en Montevideo',
    'title'       => 'Permisos para instalar aire acondicionado en Montevideo',
    'description' => 'Qué revisar antes de instalar un aire en Montevideo: reglamento de copropiedad y administración, trámite de la Intendencia y potencia contratada en UTE.',
    'keywords'    => 'permiso instalar aire acondicionado montevideo, aire acondicionado edificio reglamento copropiedad, intendencia montevideo aire acondicionado trámite, aumentar potencia ute aire acondicionado, condensadora fachada edificio',
    'categoria'   => 'Instalación',
    'tema'        => 'Permisos y requisitos para instalar aire acondicionado',
    'fecha'       => '2026-09-25',
    'actualizado' => '2026-09-25',
    'autor'       => 'Equipo ' . EMPRESA_NOMBRE,
    'imagen'      => 'articulos/permisos-para-instalar-aire-acondicionado-montevideo.webp',
    'imagen_alt'  => 'Infografía: cuatro pasos antes de instalar un aire en Montevideo, del reglamento del edificio y la administración a la Intendencia y la potencia contratada en UTE',
    'imagen_pie'  => '',
    'bajada'      => 'Tres frentes que conviene revisar antes de agujerear la pared: el edificio, la Intendencia y UTE. Qué dice cada uno y a quién preguntar.',

    'respuesta'   => 'Para un split en Montevideo hay tres frentes. En edificios, el <strong>reglamento de copropiedad</strong> y la administración suelen definir dónde va la condensadora y adónde se desagota. La <strong>Intendencia</strong> tiene un trámite de habilitación de ventilación mecánica y aire acondicionado para viviendas; consultá si aplica a tu caso. Y en <strong>UTE</strong>, revisá que la potencia contratada alcance.',

    'puntos_clave' => [
        'El reglamento de copropiedad y la asamblea pueden regular fachada, ubicación de condensadoras y desagotes.',
        'La Intendencia de Montevideo tiene el trámite "Instalaciones de ventilación mecánica y aire acondicionado para viviendas", con proyecto aprobado por el SIME.',
        'UTE no cobra el cambio de potencia entre 1,4 y 9 kW en servicios monofásicos.',
        'Para más de 7,4 kW, UTE exige contratar una firma instaladora autorizada.',
    ],

    'secciones' => [
        [
            'h2'       => '¿Necesito permiso del edificio para instalar un aire?',
            'parrafos' => [
                'En la mayoría de los edificios, sí conviene pedirlo. La fachada, los muros exteriores y los ductos son bienes comunes, y la ley de propiedad horizontal (Ley 10.751) permite que cada propietario haga modificaciones en su unidad siempre que no lesione el derecho de los demás. Las innovaciones que alteran el aspecto arquitectónico o el uso de bienes comunes requieren aprobación de la asamblea con mayorías especiales.',
                'En la práctica, cada edificio lo resuelve en su <strong>reglamento de copropiedad</strong> o con resoluciones de asamblea. Es habitual que definan:',
            ],
            'lista' => [
                'Dónde se puede colocar la condensadora: balcón, azotea, patio de aire y luz, nicho previsto o fachada.',
                'Si se permite colgar condensadoras en fachada y con qué criterio estético.',
                'Adónde tiene que ir el agua del desagote: nunca a la vereda ni al balcón de abajo.',
                'Si hay una preinstalación o un ducto común previsto para los equipos.',
                'Horarios para hacer ruido y perforar.',
            ],
            'nota' => 'Esto no es asesoramiento legal. Antes de instalar, pedí el reglamento a la administración y consultá por escrito. Si hay dudas sobre qué dice la ley, consultá con un escribano o abogado.',
        ],
        [
            'h2'       => '¿Qué conviene preguntarle a la administración?',
            'parrafos' => [
                'Mandale un mensaje o mail con cuatro preguntas concretas. Tenerlo por escrito evita problemas después:',
            ],
            'lista' => [
                '¿Dónde puedo ubicar la unidad exterior?',
                '¿Hay que pedir autorización a la asamblea o alcanza con avisar?',
                '¿Adónde debe conectarse el desagote?',
                '¿Hay algún requisito para el trabajo en fachada (seguro, silleta, horarios)?',
            ],
            'lista_ordenada' => true,
            'h3s' => [
                ['h3' => '¿Y si alquilo?', 'parrafos' => [
                    'Además del edificio, necesitás la autorización del propietario, idealmente por escrito. Acordá también qué pasa con el equipo cuando te vayas: si queda o si lo sacás con una <a href="desinstalacion">desinstalación</a> correcta.',
                ]],
            ],
        ],
        [
            'h2'       => '¿Hay que hacer un trámite en la Intendencia de Montevideo?',
            'parrafos' => [
                'La Intendencia tiene un trámite llamado <strong>"Instalaciones de ventilación mecánica y aire acondicionado para viviendas"</strong>, dentro de las habilitaciones. Según la página oficial, sirve para solicitar la habilitación de estas instalaciones en viviendas colectivas o unifamiliares, y pide un proyecto aprobado por el Servicio de Instalaciones Mecánicas y Eléctricas (SIME), con planos y memoria firmados por un ingeniero industrial o un instalador registrado en ese servicio. Los costos (timbre, tasa y estudio del proyecto) varían según la potencia declarada.',
                'La página no aclara si un split individual en un apartamento entra en ese trámite o si está pensado para instalaciones de mayor porte, como sistemas centrales o ductos colectivos. No lo pudimos confirmar, así que no lo afirmamos: <strong>consultalo directamente con la Intendencia</strong> (SIME) antes de instalar, sobre todo si es un sistema central, un edificio nuevo o varios equipos.',
                'Para <a href="comercial">locales comerciales, oficinas y comercios</a>, la instalación de aire suele entrar en la habilitación del local. Consultalo con la Intendencia o con quien gestione la habilitación.',
            ],
        ],
        [
            'h2'       => '¿Tengo que aumentar la potencia contratada en UTE?',
            'parrafos' => [
                'Depende de lo que ya tengas conectado. Un split residencial suma consumo a la hora de más uso, junto con el calefón, el horno o la cocina eléctrica. Si la llave general de UTE salta cuando prendés todo junto, probablemente la potencia no alcance.',
                'Según UTE, los aumentos o reducciones de potencia <strong>no tienen costo entre servicios monofásicos de 1,4 kW y 9 kW</strong> (y entre 9,5 y 11,5 kW). Para potencias <strong>superiores a 7,4 kW</strong> hay que contratar una firma instaladora autorizada por UTE. El trámite lo hace el titular del servicio por la web, por el 0800 1930 (o *1930 desde celular) o en una oficina comercial.',
            ],
            'tabla' => [
                'cabecera' => ['Situación (servicio monofásico)', 'Qué dice UTE'],
                'filas'    => [
                    ['Cambio de potencia entre 1,4 y 9 kW', 'Sin costo'],
                    ['Cambio entre 9,5 y 11,5 kW', 'Sin costo'],
                    ['Pedir más de 7,4 kW', 'Requiere firma instaladora autorizada por UTE'],
                    ['Otras modificaciones', 'Costo según potencia y obra necesaria'],
                ],
            ],
            'nota' => 'Datos de la página de potencia contratada de UTE, consultada en septiembre de 2026. Verificá las condiciones vigentes antes de pedir el cambio. Subir la potencia no reemplaza revisar la instalación eléctrica interna: el técnico te dice si el equipo necesita una línea propia desde el tablero.',
        ],
        [
            'h2'       => '¿Qué revisa el técnico antes de instalar?',
            'parrafos' => [
                'En la visita o por fotos, antes de dar el presupuesto, en ' . EMPRESA_NOMBRE . ' revisamos que la ubicación de la condensadora sea la que permite el edificio, que el desagote tenga adónde ir sin molestar a nadie y que la instalación eléctrica soporte el equipo.',
                'Si la condensadora va en fachada, en un nicho o en la azotea, lo coordinamos con la administración. En edificios con reglas estrictas, lo más prolijo es una <a href="preinstalacion">preinstalación</a> o seguir el criterio que ya usan los demás equipos. Todo esto lo contamos en <a href="apartamentos">instalación en apartamentos</a>.',
            ],
        ],
    ],

    'faq' => [
        ['q' => '¿Puedo poner la condensadora en la fachada del edificio?', 'a' => 'Depende del reglamento de copropiedad y de lo que resuelva la asamblea. Muchos edificios lo limitan o fijan un criterio. Consultá a la administración por escrito antes de instalar.'],
        ['q' => '¿Necesito permiso de la Intendencia para un split en mi apartamento?', 'a' => 'La Intendencia tiene un trámite de habilitación de ventilación mecánica y aire acondicionado para viviendas, pero su página no aclara si aplica a un split individual. Consultalo con la Intendencia (SIME) antes de instalar.'],
        ['q' => '¿Cuesta algo aumentar la potencia en UTE?', 'a' => 'Según UTE, no tiene costo entre 1,4 y 9 kW en servicios monofásicos. Para más de 7,4 kW necesitás una firma instaladora autorizada por UTE.'],
        ['q' => '¿Adónde tiene que ir el agua del desagote en un edificio?', 'a' => 'A un desagüe, a una pileta de patio o a donde indique el edificio. Nunca a la vereda ni sobre el balcón de otro vecino.'],
        ['q' => '¿Soy inquilino, puedo instalar un aire?', 'a' => 'Necesitás autorización del propietario y cumplir el reglamento del edificio. Acordá por escrito qué pasa con el equipo al terminar el contrato.'],
    ],

    'fuentes' => [
        ['label' => 'Instalaciones de ventilación mecánica y aire acondicionado para viviendas — Intendencia de Montevideo', 'url' => 'https://tramites.montevideo.gub.uy/tramites-y-tributos/habilitacion/instalaciones-de-ventilacion-mecanica-y-aire-acondicionado-para-viviendas', 'nota' => 'requisitos del trámite de habilitación (consultado en septiembre de 2026)'],
        ['label' => 'Instalaciones Mecánicas y Eléctricas (SIME) — Intendencia de Montevideo', 'url' => 'https://montevideo.gub.uy/institucional/dependencias/instalaciones-mecanicas-y-electricas', 'nota' => 'servicio que aprueba los proyectos y atiende consultas'],
        ['label' => 'Potencia contratada — UTE', 'url' => 'https://www.ute.com.uy/clientes/tramites-y-servicios/potencia-contratada', 'nota' => 'cambio sin costo entre 1,4 y 9 kW; instalador autorizado para más de 7,4 kW (consultado en septiembre de 2026)'],
        ['label' => 'Ley 10.751 de propiedad horizontal — IMPO', 'url' => 'https://www.impo.com.uy/bases/leyes/10751-1946', 'nota' => 'modificaciones en unidades, bienes comunes y reglamento de copropiedad'],
    ],

    'links' => [
        ['href' => 'apartamentos',  'label' => 'Instalación en apartamentos'],
        ['href' => 'comercial',     'label' => 'Aire acondicionado comercial'],
        ['href' => 'preinstalacion', 'label' => 'Preinstalación de aire acondicionado'],
        ['href' => 'desinstalacion', 'label' => 'Desinstalación y mudanza'],
    ],

    'cta_titulo'  => '¿Ya tenés el visto bueno del edificio?',
    'cta_texto'   => 'Contanos dónde permite el reglamento poner la condensadora y te pasamos presupuesto con un técnico de tu zona.',
    'cta_message' => 'Hola! Quiero instalar un aire en mi apartamento. Barrio: ___ / Piso: ___ / Dónde va la condensadora: ___',
];
