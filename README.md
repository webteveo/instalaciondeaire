# Instalación de Aire Uruguay — sitio web

Sitio de generación de leads para instalación, service y reparación de aire acondicionado en Uruguay. Se presenta en primera persona como **empresa de técnicos en refrigeración** con técnicos por zona (no como intermediaria ni red que "conecta"); los leads entran por WhatsApp y teléfono. Construido sobre la misma plantilla PHP (MVC propio, sin base de datos) del sitio anterior, conservando diseño, componentes y rendimiento.

Dominio: https://instalaciondeaire.uy. Correo: contacto@instalaciondeaire.uy. Teléfono y WhatsApp: una sola constante `CONTACTO_NUMERO` en `config/variables.php` (hoy `59894633956`). Mientras no sea un número válido (`598` + 8 dígitos), los botones de WhatsApp llevan al formulario y los de Llamar se ocultan: nunca se publica un `wa.me` roto.

Plan SEO vigente: `PLAN-SEO-VERANO-2026.md`. Cambios de la noche del 25-sep-2026: `ENTREGA-NOCHE.md`.

## Correrlo en local (sin XAMPP)

Con PHP 8.1+ instalado, desde la carpeta del proyecto:

- Windows: doble clic en `dev.bat` (abre el navegador solo).
- Mac/Linux: `./dev.sh`
- A mano: `php -S localhost:8000 router.php`

Queda en **http://localhost:8000**. `router.php` replica las reglas de `.htaccess` (URLs limpias, `sitemap.xml`, `llms.txt`, favicon, carpetas bloqueadas) y **recarga el navegador solo** cada vez que guardás un archivo. Para apagar la recarga: `LIVERELOAD=0`.

**Web de vista previa que se actualiza sola (Render, gratis):** entrar a https://render.com/deploy?repo=https://github.com/webteveo/instalaciondeaire, iniciar sesión con GitHub y tocar *Deploy*. Queda una dirección fija `https://instalaciondeaire-xxxx.onrender.com` y cada cambio que se sube a la rama `claude/zealous-thompson-3ghmjc` se publica solo en 1–3 minutos (la página abierta se recarga sola). Configuración en `render.yaml` y `Dockerfile`. El plan gratis se duerme sin visitas: la primera carga tarda ~30 s.

**En GitHub, sin instalar nada:** botón verde *Code* → *Codespaces* → *Create codespace on …*. Se instala PHP, arranca el servidor y se abre la vista previa del puerto 8000; editás en el navegador y la página se actualiza sola.

## Dónde se completa cada cosa

| Qué | Dónde |
|---|---|
| Nombre, teléfono/WhatsApp (`CONTACTO_NUMERO`), email, mensaje y label de WhatsApp por defecto, microcopy, horarios, colores, SMTP, clave de métricas | `config/variables.php` (marcado con `[COMPLETAR]`) |
| Dominio para redirección https/www y sitemap | `.htaccess`, `robots.txt` |
| Logos y favicon (logo sep-2026: split + flujo de aire) | `public/images/logo/logo.svg`, `logo-blanco.svg`, `icono.svg`, `favicon.svg`. `scripts/generate-logos.cjs` regenera `logo.png`, `icono.png`, `apple-touch-icon.png`, `favicon.ico` y `og-image.png`: `NODE_PATH=<node_modules con sharp> node scripts/generate-logos.cjs` |
| Infografías propias | `public/images/infografias/` (esquema de instalación en la sección "Qué incluye") y `public/images/articulos/{slug}.webp` (una por artículo, generadas desde `data/articulos/_imagenes.json`) |
| Leads del formulario | Se guardan siempre en `data/leads/YYYY-MM.ndjson` antes de mandar el mail (si el SMTP falla o está vacío, la consulta no se pierde). Se ven en `/metricas/leads` con la clave del panel |
| IndexNow (Bing) | Clave en `/f6056a743bf1c4996c6d11b398a24be6.txt`. Después de subir cambios: `php scripts/indexnow.php` |
| Fotos | `public/images/hero/hero-desktop.webp`, `hero-mobile-720.webp`, `hero-mobile.webp`, `quienes-somos.webp` y `public/images/servicios/{slug}.webp` (1200×675). Son fotos de stock de Pexels (ver créditos abajo); reemplazar por fotos propias cuando haya, manteniendo nombres y medidas |
| **Servicios pilar** (`/split-inverter`, `/apartamentos`, ...) | `data/servicios/{slug}.php` (uno por página, copiar `_plantilla.php`) + registrar el slug en `Local_Datos::SERVICIOS`. Con eso queda en el sitemap, footer, `/servicios`, formulario y schema |
| Home (`/`): hero, cards, pasos, quiénes somos, diferenciadores, FAQ | `src/vista/compact/*.php` (cada archivo tiene su array al inicio); FAQ de la home en `compact/faq-data.php` |
| **Zonas** (`/zonas/{slug}`) | `src/controlador/Local_Datos.php` → `ZONAS` (atributos: vivienda, costera, antiguo, temporada, linderas) + un párrafo `PERFIL` por zona en `src/controlador/Zona_Texto.php`. El resto del texto y las FAQ se arman solos según los atributos |
| **Fase 2** servicio × zona (`/apartamentos/pocitos`, ...) | `Local_Datos::FASE2_ACTIVA` (hoy `false`), `FASE2_SERVICIOS` y las zonas con `'principal' => true`. Al activarla entran al router, al sitemap y a los enlaces. El servicio "instalacion" usa `data/servicios/_instalacion.php` |
| FAQ generales (`/preguntas-frecuentes`) | `data/faq-general.php` |
| Cómo trabajamos (`/como-funciona`), privacidad, términos | `src/vista/paginas/como-funciona.php`, `privacidad.php`, `terminos.php` (con `[COMPLETAR]`) |
| Calculadora de frigorías | Textos en `data/servicios/calculadora-frigorias.php`; lógica JS en `src/vista/local/calculadora.php` (base 150 frig/m², factores, redondeo a 2.250/3.000/4.500/5.500/6.000) |
| Reseñas | `src/vista/compact/testimonios-data.php` (vacío = la sección no se muestra; nunca schema de estrellas propio) |
| Artículos / guías | `data/articulos/YYYY-MM-DD-slug.php`. Hay 3 borradores con `'borrador' => true`: completar y quitar la marca para publicar |
| Mensajes de WhatsApp por página | `cta_message` en cada `data/servicios/*.php`; zonas en `Zonas_Controller::ver()`; calculadora en el JS de su vista; header/footer usan `$page_cta_message` |

## Arquitectura de contenido local

- `src/controlador/Local_Datos.php`: lista de zonas (`ZONAS`), regiones, vecinos y servicios. Una zona se publica solo si existe `data/zonas/{slug}.php`.
- `data/zonas/{slug}.php`: texto de la página `/zonas/{slug}` y, en `servicios`, el de cada página `/{servicio}/{slug}` (mantenimiento, reparación, carga de gas, desinstalación). Si falta el texto de un servicio, esa URL no existe.
- `data/servicios/*.php`: páginas pilar de cada servicio, incluidas las nuevas (multi-split, piso-techo-y-cassette, instalacion-en-altura, recambio-de-equipo).
- `sitemap.php` y `llms.php` se arman solos a partir de esos datos.
- QA antes de cada push: `python3 scripts/qa-seo.py http://127.0.0.1:8000` (estado, H1, title/description, similitud entre páginas; requiere `pip install beautifulsoup4 lxml`).

## Sistemas

- **Ruteo MVC** (`src/libs/App.php`): `/controlador/metodo`, páginas de un segmento (`Landings_Controller`: métodos públicos + servicios generados desde `data/servicios`), `/zonas/{slug}`, `/articulos/{slug}`, alias en `App::RUTAS` (`/servicios`) y Fase 2 `/{servicio}/{zona}`.
- **Schema**: `HVACBusiness` + `LocalBusiness` (área de servicio, sin dirección física, `areaServed` con departamentos y zonas, `hasOfferCatalog` con los servicios) en `partials/head.php`; `Service` + `FAQPage` + `BreadcrumbList` en cada servicio y zona; `FAQPage` en home y `/preguntas-frecuentes`.
- **Analítica**: métricas propias (`/metricas`, panel privado; datos en `data/metrics/*.ndjson`). Cada CTA lleva `data-page-type` y `data-zona` (helper `cta_track()`; cada vista declara `cta_contexto('tipo', 'zona')`) y `main.js` los envía con `whatsapp_click`, `phone_click`, `form_submit` y `pageview`, y también a `gtag` si hay GA configurado.
- **Botones flotantes**: WhatsApp siempre + llamada (`tel:`) en celular, en `partials/footer.php`.
- **Sitemap** (`/sitemap.xml`) y **llms.txt** (`/llms.txt`): se arman solos desde controladores, servicios, zonas y artículos publicados.
- **Contacto**: formulario por email (PHPMailer, SMTP en `variables.php`, **[COMPLETAR]** credenciales) con campos: nombre, teléfono, barrio, casa/apartamento, piso, ¿ya tenés el equipo?, frigorías o BTU, servicio, email, mensaje.

## Reglas de contenido

Español rioplatense con voseo. Sin precios ni cifras inventadas (clientes, años, certificaciones). No somos servicio oficial de ninguna marca: solo "trabajamos con equipos de todas las marcas (Midea, Samsung, LG, Hisense, etc.)". Sobre permisos de edificios se sugiere consultar el reglamento y la administración; sin afirmaciones legales.

## Verificar en local

```bash
php -l src/controlador/Local_Controller.php
php tests/metrics-source.php
```

## Créditos de fotos (Pexels, licencia libre para uso comercial)

Todas descargadas de pexels.com; la licencia no exige atribución pero se deja constancia para poder reemplazarlas o citarlas.

| Archivo | Foto Pexels | Autor |
|---|---|---|
| hero-desktop / hero-mobile | 5463575 | Jose Andres Pacheco Cortes |
| quienes-somos | 6471912 | Jose Andres Pacheco Cortes |
| servicios/instalacion | 5463575 | Jose Andres Pacheco Cortes |
| servicios/split-inverter | 38788452 | Neosiam |
| servicios/apartamentos | 32230390 | Lecelle |
| servicios/mantenimiento | 5463576 | Jose Andres Pacheco Cortes |
| servicios/reparacion | 5463587 | Jose Andres Pacheco Cortes |
| servicios/carga-de-gas | 5463580 | Jose Andres Pacheco Cortes |
| servicios/desinstalacion | 5463581 | Jose Andres Pacheco Cortes |
| servicios/comercial | 16914846 | Mak_JP |
| servicios/preinstalacion | 14522790 | Zechen Li |
| servicios/calefaccion | 6316054 | Artbovich |
| servicios/calculadora-frigorias | 7587368 | Artbovich |
