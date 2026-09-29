# Auditoría SEO semántico y GEO: instalaciondeaire.uy

Fecha: 29-sep-2026. Base: las 47 URLs del sitemap, rastreadas en local con `router.php`, el mismo código que está en producción.
Skills: `seo-local-semántico-2026` (flujos 4 y 5) y `cheloseo` (priorización).
Regla del proyecto: **no se borra, fusiona ni redirige ninguna página**. Todas se mejoran.

## Veredicto

Lo técnico está bien: las 47 URLs dan 200, hay un H1 por página, el canonical es correcto, el schema es válido y no tiene estrellas propias, el sitemap lleva `lastmod` e IndexNow está configurado. **El cuello de botella es el contenido de las 24 zonas.** Cada página de zona coincide entre 55 % y 85 % con otra, porque comparten los mismos bloques (pasos, qué incluye, tabla de frigorías, FAQ por atributo) y lo único propio es un párrafo de perfil. Eso es lo que Google filtra como *contenido escalado / doorway*. Lo segundo es la falta de señales de experiencia: no aparece quién atiende, no hay precios con fecha en las páginas de servicio, no hay trabajos ni reseñas, y los artículos no muestran fecha.

## Hallazgos del sitio, ordenados por impacto

| Hallazgo | Tipo | Impacto | Esfuerzo | Acción |
|---|---|---|---|---|
| Las 24 zonas coinciden 55–85 % con otra zona (Malvín ↔ Punta Gorda 85 %, La Blanqueada ↔ San Carlos 80 %, Punta Carretas ↔ Parque Rodó 78 %). El 45–57 % de cada una son bloques idénticos en todas las zonas | RANKING | Alto | Alto | Escribir contenido propio por zona: primer párrafo con respuesta directa, qué se instala ahí y dónde va la condensadora (según el tipo de edificio o casa real), problema típico, referencias reales, FAQ propia de 4–5 preguntas y vecinos con texto de enlace variado. Sacar de las zonas los bloques genéricos (pasos, tabla) o reescribirlos para la zona |
| No se sabe quién atiende: no hay operador, base, matrícula ni fotos propias (las fotos son de stock de Pexels) | RANKING / CONVERSIÓN | Alto | Bajo (depende del operador) | Bloque "Quién te atiende" con datos reales → **faltan datos del operador** (lista al final) |
| Las páginas de servicio no tienen precio "desde" con fecha. El único precio está en un artículo | CONVERSIÓN / GEO | Alto | Bajo (depende del operador) | Tabla de precios con fecha y aclaración de IVA en home, split-inverter, mantenimiento, carga de gas, desinstalación |
| Solo 0–2 de 12–15 H2 están en forma de pregunta en home y servicios, y pocas secciones abren con una respuesta directa | GEO | Medio-alto | Medio | Pasar los H2 a preguntas reales y abrir cada sección con 40–60 palabras que respondan solas |
| Los 7 artículos no muestran fecha de publicación ni de actualización, ni autor | GEO / E-E-A-T | Medio | Bajo | "Última actualización: mes año · Por …" visible, y `dateModified` en el schema |
| 25 de 47 descriptions superan los 150 caracteres. Las de zona son la misma frase con el nombre cambiado. 13 titles pasan de 58 | RANKING (CTR) | Medio | Bajo | Descriptions de 120–150 caracteres y titles de 45–58, con gancho propio por página |
| Titles de zona con plantilla fija ("… - Presupuesto") y el de Centro dice "en Centro" | RANKING | Medio | Bajo | Gancho propio por zona dentro de 45–58 caracteres; "en el Centro" |
| Los bloques "Cómo trabajamos" (4 pasos), "Qué incluye" y la tabla de frigorías se repiten en 28–36 páginas | RANKING | Medio | Medio | Dejarlos completos solo en home, `/como-funciona` y `/calculadora-frigorias`; en las demás, versión adaptada a esa página o un enlace |
| `/zonas` y `/articulos` son índices finos (258 y 257 palabras, 87–92 % repetido) | RANKING | Medio | Bajo | Agregar texto propio: cómo se cubre cada departamento y qué guía leer según el problema |
| `/contacto` no recibe enlaces desde el cuerpo de ninguna página (solo desde el menú) | CONVERSIÓN | Bajo | Bajo | Enlazarlo en el texto de los cierres |
| `robots.txt` no nombra a los crawlers de IA (hoy entran por `Allow: /`) | GEO | Bajo | Bajo | Listar explícitamente OAI-SearchBot, ChatGPT-User, PerplexityBot, Claude-SearchBot y Google-Extended con Allow |

## Página por página

"Igual a" = porcentaje de frases de 5 palabras de esa página que también aparecen en la página más parecida del sitio. Objetivo: menos de 30 % entre zonas y menos de 20 % entre servicios.

| URL | Búsqueda objetivo | Palabras | Problemas | Prioridad |
|---|---|---|---|---|
| `/` | instalación de aire acondicionado montevideo | 940 | 34 % igual a `/split-inverter`; description de 162 car.; title de 59 car.; 1/10 H2 en pregunta | ALTA |
| `/servicios` | servicios aire acondicionado montevideo | 571 | 43 % igual a `/`; description de 168 car. | BAJA |
| `/zonas` | (índice de zonas) | 258 | 81 % igual a `/servicios`; description de 177 car.; 0/5 H2 en pregunta | MEDIA |
| `/como-funciona` | (confianza / proceso) | 830 | 33 % igual a `/`; description de 178 car.; 0/9 H2 en pregunta | BAJA |
| `/preguntas-frecuentes` | preguntas instalación aire | 1179 | description de 160 car.; title de 60 car.; 2/9 H2 en pregunta | BAJA |
| `/contacto` | (conversión) | 94 | description de 169 car. | BAJA |
| `/articulos` | (índice de guías) | 257 | 45 % igual a `/articulos/por-que-el-aire-acondicionado-pierde-agua`; description de 190 car.; title de 60 car. | BAJA |
| `/articulos/por-que-el-aire-acondicionado-pierde-agua` | por qué el aire acondicionado pierde agua | 1394 | title de 61 car.; sin fecha visible | MEDIA |
| `/articulos/permisos-para-instalar-aire-acondicionado-montevideo` | permisos para instalar aire acondicionado en montevideo | 1212 | description de 152 car.; sin fecha visible | MEDIA |
| `/articulos/inverter-vs-on-off-cual-conviene` | inverter vs on/off: cuál conviene | 1236 | title de 60 car.; sin fecha visible | MEDIA |
| `/articulos/cuanto-cuesta-instalar-aire-acondicionado-uruguay` | cuánto cuesta instalar un aire acondicionado en uruguay (2026) | 1254 | description de 152 car.; title de 62 car.; sin fecha visible | MEDIA |
| `/articulos/cuantas-frigorias-necesito-segun-los-m2` | cuántas frigorías necesito según los m² | 1300 | sin fecha visible | MEDIA |
| `/articulos/cada-cuanto-hacer-service-aire-acondicionado` | cada cuánto hacer el service del aire acondicionado | 1181 | title de 59 car.; sin fecha visible | MEDIA |
| `/articulos/aire-acondicionado-no-enfria` | mi aire acondicionado no enfría: causas y qué revisar | 1318 | sin fecha visible | MEDIA |
| `/split-inverter` | instalación split inverter montevideo | 1264 | description de 164 car.; 1/15 H2 en pregunta | ALTA |
| `/apartamentos` | instalar aire en apartamento | 1252 | description de 169 car.; 0/15 H2 en pregunta | ALTA |
| `/mantenimiento` | service aire acondicionado montevideo | 1027 | description de 165 car.; 0/14 H2 en pregunta | ALTA |
| `/reparacion` | reparación aire acondicionado montevideo | 1056 | description de 169 car.; 2/13 H2 en pregunta | ALTA |
| `/carga-de-gas` | carga de gas aire acondicionado | 1041 | description de 156 car.; 0/13 H2 en pregunta | ALTA |
| `/desinstalacion` | desinstalación / retiro de aire | 1134 | description de 163 car.; title de 59 car.; 1/15 H2 en pregunta | MEDIA |
| `/comercial` | aire para oficinas y comercios | 1067 | description de 160 car.; 0/15 H2 en pregunta | MEDIA |
| `/preinstalacion` | preinstalación de aire en obra | 1078 | description de 168 car.; 0/15 H2 en pregunta | MEDIA |
| `/calefaccion` | calefacción con aire acondicionado | 1176 | description de 161 car.; title de 61 car.; 0/15 H2 en pregunta | MEDIA |
| `/calculadora-frigorias` | calculadora de frigorías | 834 | description de 169 car.; 1/12 H2 en pregunta | MEDIA |
| `/zonas/pocitos` | instalación aire acondicionado pocitos | 941 | 68 % igual a `/zonas/centro`; 1/13 H2 en pregunta | ALTA |
| `/zonas/punta-carretas` | instalación aire acondicionado punta carretas | 976 | 78 % igual a `/zonas/parque-rodo`; 1/13 H2 en pregunta | ALTA |
| `/zonas/cordon` | instalación aire acondicionado cordón | 990 | 71 % igual a `/zonas/centro`; 1/13 H2 en pregunta | ALTA |
| `/zonas/centro` | instalación aire acondicionado centro | 970 | 73 % igual a `/zonas/cordon`; 1/13 H2 en pregunta | ALTA |
| `/zonas/parque-rodo` | instalación aire acondicionado parque rodó | 1056 | 71 % igual a `/zonas/punta-carretas`; 1/14 H2 en pregunta | ALTA |
| `/zonas/tres-cruces` | instalación aire acondicionado tres cruces | 849 | 76 % igual a `/zonas/buceo`; 1/12 H2 en pregunta | ALTA |
| `/zonas/buceo` | instalación aire acondicionado buceo | 929 | 68 % igual a `/zonas/tres-cruces`; 1/13 H2 en pregunta | ALTA |
| `/zonas/malvin` | instalación aire acondicionado malvín | 927 | 85 % igual a `/zonas/punta-gorda`; 1/13 H2 en pregunta | ALTA |
| `/zonas/carrasco` | instalación aire acondicionado carrasco | 925 | 67 % igual a `/zonas/pando`; title de 59 car.; 1/13 H2 en pregunta | ALTA |
| `/zonas/punta-gorda` | instalación aire acondicionado punta gorda | 947 | 83 % igual a `/zonas/malvin`; description de 153 car.; 1/13 H2 en pregunta | ALTA |
| `/zonas/prado` | instalación aire acondicionado prado | 939 | 67 % igual a `/zonas/malvin`; 1/13 H2 en pregunta | ALTA |
| `/zonas/parque-batlle` | instalación aire acondicionado parque batlle | 849 | 78 % igual a `/zonas/las-piedras`; description de 155 car.; 1/12 H2 en pregunta | ALTA |
| `/zonas/la-blanqueada` | instalación aire acondicionado la blanqueada | 844 | 80 % igual a `/zonas/san-carlos`; description de 155 car.; 1/12 H2 en pregunta | ALTA |
| `/zonas/ciudad-de-la-costa` | instalación aire acondicionado ciudad de la costa | 1035 | 77 % igual a `/zonas/punta-gorda`; 1/13 H2 en pregunta | ALTA |
| `/zonas/las-piedras` | instalación aire acondicionado las piedras | 885 | 76 % igual a `/zonas/la-paz`; description de 152 car.; 1/12 H2 en pregunta | ALTA |
| `/zonas/la-paz` | instalación aire acondicionado la paz | 890 | 76 % igual a `/zonas/las-piedras`; 1/12 H2 en pregunta | ALTA |
| `/zonas/pando` | instalación aire acondicionado pando | 859 | 77 % igual a `/zonas/las-piedras`; 1/12 H2 en pregunta | ALTA |
| `/zonas/atlantida` | instalación aire acondicionado atlántida | 1045 | 69 % igual a `/zonas/malvin`; title de 60 car.; 1/14 H2 en pregunta | ALTA |
| `/zonas/canelones` | instalación aire acondicionado canelones | 856 | 66 % igual a `/zonas/pando`; description de 152 car.; title de 60 car.; 1/12 H2 en pregunta | ALTA |
| `/zonas/punta-del-este` | instalación aire acondicionado punta del este | 1043 | 65 % igual a `/zonas/maldonado`; 1/14 H2 en pregunta | ALTA |
| `/zonas/maldonado` | instalación aire acondicionado maldonado | 916 | 74 % igual a `/zonas/punta-del-este`; title de 60 car.; 1/13 H2 en pregunta | ALTA |
| `/zonas/piriapolis` | instalación aire acondicionado piriápolis | 974 | 55 % igual a `/zonas/punta-del-este`; 1/14 H2 en pregunta | ALTA |
| `/zonas/san-carlos` | instalación aire acondicionado san carlos | 887 | 75 % igual a `/zonas/la-blanqueada`; description de 151 car.; 1/12 H2 en pregunta | ALTA |

## Plan de trabajo por tandas (con commit y push en cada una, para verlo en la vista previa)

1. **Home y servicios principales**: `/`, `/split-inverter`, `/apartamentos`, `/mantenimiento`, `/reparacion`, `/carga-de-gas`. H2 en pregunta, respuestas directas, bloques repetidos adaptados a cada página, descriptions y FAQ propias.
2. **Zonas de Montevideo** (13): contenido propio por barrio; bajar la similitud a menos de 30 %.
3. **Zonas de Canelones y Maldonado** (11): lo mismo, con la lógica de balneario y temporada donde corresponde.
4. **Artículos** (7) con `geo-article`: fecha y autor visibles, respuestas directas, linter sin alertas altas.
5. **Resto**: `/desinstalacion`, `/comercial`, `/preinstalacion`, `/calefaccion`, `/calculadora-frigorias`, `/servicios`, `/zonas`, `/articulos`, `/como-funciona`, `/preguntas-frecuentes`, `/contacto`, `robots.txt`.

Control en cada tanda: 47 URLs en 200 sin errores de PHP, un H1, JSON-LD válido, similitud medida con el mismo script, linter en artículos.

## Datos que solo puede dar el operador

Sin estos datos, las páginas mejoran igual, pero quedan con `[DATO FALTANTE]` en lugar de la prueba de experiencia que más pesa:

1. Quién atiende: nombre, foto, años en el oficio, habilitación o curso (por ejemplo UTU), base (barrio o ciudad).
2. Precio "desde" de la instalación estándar de 2.250/3.000 frigorías, con mes y aclaración de IVA; qué metros de cañería incluye; recargos (altura, fachada, silleta, metro extra).
3. Precios "desde" de service, carga de gas y desinstalación.
4. Garantía de mano de obra, en meses.
5. Por zona: tiempo de llegada habitual desde la base, 1–2 trabajos reales (mes, tipo de equipo, qué se complicó) y el problema que más ves ahí.
6. Reseñas reales (nombre, barrio, fecha), si hay, y el link a la ficha de Google Business.
7. Fotos de celular de trabajos reales, aunque sean 5 o 6.

## Fuera del sitio (solo lo podés hacer vos, en orden de impacto)

1. **Ficha de Google Business Profile** (área de servicio, categoría "Servicio de aire acondicionado", todos los servicios cargados, mismo nombre y teléfono que la web). Es lo que más pesa para el paquete de 3 resultados con mapa en Montevideo.
2. **Reseñas**: pedirlas a cada cliente, en goteo constante (sin comprarlas ni premiarlas).
3. **Search Console + Bing Webmaster Tools**: enviar el sitemap, `php scripts/indexnow.php` después de cada tanda.
4. **Citaciones** con el mismo nombre, teléfono y web: Mercado Libre Servicios, Páginas Amarillas UY, directorios de técnicos, Facebook/Instagram del negocio.
