# Plan SEO verano 2026 — instalaciondeaire.uy

Fecha: 25-sep-2026. Método: skill `seo-local-semantico-2026` + datos de Google Search Console + auditoría del código y del sitio en producción.
Etiquetas: **[RANKING]** mueve posiciones · **[CONVERSIÓN]** mueve leads · **[TRÁMITE]** se hace una vez · **[GEO]** respuestas de IA.

---

## 1. Diagnóstico (por qué no hay impresiones, clics ni contactos)

| # | Hallazgo | Tipo | Gravedad |
|---|---|---|---|
| 1 | **En producción los 17 botones de WhatsApp van a `wa.me/598XXXXXXXX` y el botón Llamar a `tel:+598XXXXXXXX`.** Aunque entre tráfico, nadie puede escribir ni llamar. | CONVERSIÓN | Bloqueante |
| 2 | El formulario de contacto manda por SMTP, pero usuario y clave SMTP están vacíos: **todo envío falla** y el lead se pierde. | CONVERSIÓN | Bloqueante |
| 3 | El sitio tiene **10 días en Google**: primeras impresiones el 17-sep, 57 impresiones y 1 clic en total. Es normal para un dominio nuevo; la curva sube entre el mes 2 y el 4. El verano (dic-ene) es la ventana y hay que llegar indexado y con autoridad en noviembre. | RANKING | Contexto |
| 4 | Sitemap: 32 URLs enviadas, 0 "indexadas" en el reporte del sitemap (la inspección confirma home, /split-inverter y /zonas/pocitos indexadas; /mantenimiento está "Discovered – not indexed"). | RANKING | Alta |
| 5 | **Placeholders visibles en producción**: 9 `[COMPLETAR]` en la home, tarjetas de reseñas "[COMPLETAR] Nombre", "[COMPLETAR: X] metros", "[REEMPLAZAR logo]" en el alt del logo. Google y el usuario ven un sitio a medio hacer (calidad/E-E-A-T y conversión). | RANKING + CONVERSIÓN | Alta |
| 6 | Titles largos (home 73 caracteres, zonas ~66) y H1 de la home promete "todo Uruguay" pero se cubren 3 departamentos. | RANKING | Media |
| 7 | `lastmod` del sitemap = fecha de hoy para todas las URLs (Google aprende a ignorarlo). | TRÁMITE | Baja |
| 8 | Sin ficha de Google Business Profile, sin citaciones, sin enlaces externos, sin reseñas: la autoridad local es cero. En "instalación de aire acondicionado montevideo" manda el pack local. | RANKING | Alta (off-page) |
| 9 | Solo 16 zonas y ninguna localidad de Canelones fuera de Ciudad de la Costa; Maldonado sin Piriápolis ni San Carlos con página propia. | RANKING | Media |
| 10 | Blog: 3 artículos en borrador con placeholders; cero contenido informacional publicado (las consultas "cuántas frigorías", "pierde agua", "no enfría" son justo las que la IA y Google responden en verano). | RANKING + GEO | Media |
| 11 | Logo placeholder (copo de nieve genérico) marcado [REEMPLAZAR]. | CONVERSIÓN | Baja |

Consultas con impresiones (todas posiciones 5–60, volumen mínimo): instalacion aire acondicionado, carga de gas aire acondicionado (pos 7), preinstalación aire acondicionado (pos 1–7), retiro de aire acondicionado (pos 5), empresa de aire acondicionado (pos 41–64). Señal útil: **Google ya entiende el sitio como "aire acondicionado" y rankea rápido en long tail de servicio** (preinstalación, retiro, carga de gas). Ahí están los primeros clics.

---

## 2. Qué se ejecuta esta noche (automático, en local — no se publica nada)

Todo queda en `C:\xampp\htdocs\instalacionaire`. Backup completo previo en `C:\xampp\htdocs\_backup_instalacionaire_2026-09-25`. Al final se genera `ENTREGA-NOCHE.md` con la lista exacta de archivos cambiados para subir.

### Fase 0 — Desbloquear la conversión [CONVERSIÓN]
- Mientras `CONTACTO_NUMERO` tenga X, **ningún botón apunta a `wa.me/598XXXXXXXX`**: van al formulario de contacto (el código ya lo preveía para número vacío; se extiende al placeholder). El botón Llamar se oculta en ese caso.
- **Leads guardados siempre**: el formulario guarda cada consulta en `data/leads/*.ndjson` (bloqueado por .htaccess) **antes** de intentar el mail, y muestra "gracias" aunque el SMTP falle. Se agrega la lista de leads al panel `/metricas`.
- Se sacan todos los `[COMPLETAR]`/`[REEMPLAZAR]` visibles: textos neutros y verdaderos ("los metros que se indican en el presupuesto"), sin inventar cifras. Las secciones de reseñas y proyectos no se muestran mientras estén vacías.

### Fase 1 — Marca [CONVERSIÓN]
- Logo nuevo (vectorial): split + flujo de aire + wordmark "Instalación de Aire", versión color, blanca, ícono, favicon, apple-touch, OG image 1200×630. Se regeneran con `scripts/generate-logos.cjs`.

### Fase 2 — On-page y CTR [RANKING]
- Titles 45–60 caracteres con keyword + zona al inicio y gancho propio; descriptions 120–155 con "por WhatsApp" dentro de los primeros 120.
- H1 de la home alineado con el title y la cobertura real (Montevideo, Canelones y Maldonado).
- Primer párrafo answer-first en pilares y zonas (qué, dónde, cómo se cotiza, CTA).
- Sitemap con `lastmod` real (fecha de modificación de cada archivo de datos).
- IndexNow (Bing/Yandex) con archivo de clave + script para avisar URLs nuevas.

### Fase 3 — Contenido nuevo [RANKING][GEO]
**Tanda 1 de zonas (7 URLs, localidades con SERP propia y competencia débil según la SERP):** Las Piedras, La Paz, Pando, Atlántida (Costa de Oro), Canelones ciudad, Piriápolis, San Carlos. Cada una con perfil propio escrito a mano, tipo de vivienda, atributos (costa/salitre, temporada), vecinos geográficos reales y enlaces desde ≥ 3 páginas. **No** se activa la Fase 2 servicio × zona todavía (regla anti-doorway: primero indexación > 85 % de lo publicado).

**Artículos (7, voseo, answer-first, tablas con fecha, fuentes reales):**
1. Cuántas frigorías necesito según los m² (completar borrador)
2. Inverter vs on/off: cuál conviene (completar borrador)
3. Por qué el aire acondicionado pierde agua (completar borrador)
4. El aire acondicionado no enfría: causas y qué revisar antes de llamar
5. Cuánto cuesta instalar un aire acondicionado en Uruguay (2026): qué incluye, qué se cobra aparte, rangos de mercado citados con fuente y fecha
6. Cada cuánto hacer el service del aire acondicionado (y qué incluye antes del verano)
7. Permisos para instalar aire acondicionado en Montevideo: edificio, Intendencia (SIME) y potencia UTE (el trámite de la Intendencia rankea #2 para la consulta principal)

**Imágenes nuevas:** infografías propias (no IA, no stock) para cada artículo y para "qué incluye la instalación" / "tabla de frigorías": sirven para Google Imágenes, para citar en IA y no pretenden ser trabajos propios.

---

## 3. Lo que tenés que hacer vos (no se puede automatizar)

### Mañana (30 minutos) — sin esto nada del resto sirve
1. **[CONVERSIÓN] Poner el número real** en `config/variables.php` → `CONTACTO_NUMERO` (formato `59899123456`).
2. **[CONVERSIÓN] SMTP**: cargar `EMAIL_SMTP_USUARIO` y `EMAIL_SMTP_PASSWORD` (clave de aplicación de Gmail) para que el formulario también llegue por mail.
3. **Subir los archivos** de `ENTREGA-NOCHE.md` al hosting.
4. **[TRÁMITE] GSC**: reenviar `sitemap.xml`; pedir indexación manual (Inspección de URL → Solicitar indexación) de: `/`, `/mantenimiento`, `/reparacion`, `/carga-de-gas`, `/zonas`, las 7 zonas nuevas y los 7 artículos (tope ~10/día).
5. **[TRÁMITE] Bing Webmaster Tools**: importar la propiedad desde GSC y enviar el sitemap.

### Esta semana — autoridad local (lo que más mueve el pack) [RANKING]
6. **Google Business Profile** como negocio con área de servicio (sin dirección visible), categoría principal "Servicio de aire acondicionado" / "Contratista de aire acondicionado", secundarias "Servicio de reparación de aire acondicionado", "Contratista de calefacción". Mismo nombre, teléfono y lista de servicios que la web. **Solo del operador real** (riesgo: suspensión de ficha).
7. **Citaciones NAP idénticas** (nombre + teléfono + web): Bing Places, Apple Business Connect, Facebook, Instagram, Cylex Uruguay, Infoisinfo, Páginas Amarillas / Guía Móvil, Mercado Libre Servicios (publicación de instalación con link a la web). Luego cargar las URLs de Facebook/Instagram en `REDES_*` para el `sameAs`.
8. **Reseñas**: pedir reseña en Google a cada cliente del técnico (link corto de la ficha en `RESENA_GOOGLE_PROFILE_URL`; la página `/resena` ya existe). Meta: 10 reseñas antes de diciembre. Cargar las reales en `testimonios-data.php` (con nombre, barrio y fecha).
9. **Fotos reales** del técnico trabajando (celular alcanza): 10–20 fotos de instalaciones con barrio y fecha → `data/proyectos.json`. Es el dato que convierte las páginas de zona de "plantilla" a "local de verdad".
10. **Datos del operador que desbloquean contenido** (escribirlos en `config/variables.php` y en los servicios): metros de cañería incluidos, plazo de garantía, tipo de factura, tiempo habitual de instalación, si atiende sábados/urgencias, precio "desde" de instalación estándar y service. Con precios reales y fecha el sitio gana CTR y citas en IA.

### Octubre–noviembre — escalar [RANKING]
11. **Enlaces** (5–10 de calidad, no masivos): proveedores de equipos o comercios de electrodomésticos locales que no instalan, administradoras de edificios, inmobiliarias de Punta del Este (puesta a punto de temporada), notas en medios locales ("cómo preparar el aire para el verano"). Desde tus otros sitios, solo si el tema es afín (construcción, steel framing, casas modulares → "climatización") y con 1 link contextual, nunca footer.
12. **Revisión a los 30 días** (fin de octubre): si la tanda 1 de zonas tiene > 85 % indexado y las zonas de Montevideo muestran impresiones, activar la **Fase 2** (`FASE2_ACTIVA = true`) solo para `instalacion` × 10 barrios principales (10 URLs), no las 30 de golpe.
13. **Google Ads de temporada** (opcional, lo más rápido para leads en diciembre): campaña de búsqueda "instalación aire acondicionado" + barrio, a las landings de zona, horario del técnico.

### Diciembre–febrero — cosechar
14. Contenido de urgencia de temporada: "aire no enfría", "pierde agua", "carga de gas" ya van a estar indexados; sumar códigos de error por marca si GSC muestra búsquedas de "error E1 midea" etc.
15. Marzo: service de cierre de temporada en Maldonado y calefacción (bomba de calor) para abril–junio.

---

## 4. Métricas de éxito

| Métrica | Hoy | 31-oct | 31-dic |
|---|---|---|---|
| URLs indexadas | ~10 / 32 | > 35 / 46 | > 90 % |
| Impresiones / semana (GSC) | ~50 | 300–600 | 2.000+ |
| Clics / semana | 0–1 | 10–25 | 60+ |
| Leads (WhatsApp + form) / semana | 0 (bloqueado) | 2–5 | 10+ |
| Reseñas Google | 0 | 5 | 10–15 |

Las proyecciones son orientativas para un dominio nuevo sin enlaces; dependen sobre todo de la ficha GBP, las reseñas y que el número esté cargado.

## 5. Riesgos y lo que NO se hace
- No se publican cientos de páginas servicio × zona (riesgo doorway/scaled content, acción manual). Tandas de 5–10 con indexación antes de la siguiente.
- No se inventan reseñas, estrellas propias en schema, precios, años de experiencia ni fotos "de trabajos" que no son propios.
- No se usa la Indexing API de Google para páginas de servicio.
