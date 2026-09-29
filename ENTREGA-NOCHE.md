# Entrega de la noche — 25-sep-2026

Todo se hizo en local (`C:\xampp\htdocs\instalacionaire`); **no se subió nada al hosting**. Backup completo del estado anterior: `C:\xampp\htdocs\_backup_instalacionaire_2026-09-25`.
QA: los 50 URLs del sitemap responden 200, sin errores PHP, sin `[COMPLETAR]`/`[REEMPLAZAR]`, sin `wa.me/598XXXXXXXX`, un H1 por página.

## Antes de subir (5 minutos)
1. ✅ Número cargado: `CONTACTO_NUMERO = 59894633956` (WhatsApp y Llamar activos, también en el schema).
2. `config/variables.php` → `EMAIL_SMTP_USUARIO` y `EMAIL_SMTP_PASSWORD` (clave de aplicación de Gmail). Aunque no lo cargues, los leads del formulario se guardan y se ven en `/metricas/leads`.

## Qué subir
Subir estas carpetas/archivos completos (pisan a los del servidor):
- `.htaccess`, `sitemap.php`, `f6056a743bf1c4996c6d11b398a24be6.txt` (clave IndexNow, va en la raíz)
- `config/variables.php`
- `data/articulos/` (7 artículos nuevos) — **y borrar en el servidor** los 3 viejos: `2026-10-01-cuantas-frigorias...`, `2026-10-08-inverter...`, `2026-10-15-por-que...`
- `data/servicios/` (todos), `data/faq-general.php`
- `data/leads/` (carpeta con su `.htaccess`; tiene que tener permiso de escritura para PHP)
- `src/controlador/` (Contacto, Local_Controller, Local_Datos, Metricas, Zona_Texto, Zonas)
- `src/vista/` (compact, contacto, index, local, metricas, paginas, partials)
- `public/css/style.css`, `public/images/logo/`, `public/images/articulos/` (nueva), `public/images/infografias/` (nueva)
- Opcional: `scripts/`, `README.md`, `PLAN-SEO-VERANO-2026.md` (quedan bloqueados por .htaccess, no son públicos)

## Después de subir
1. Abrir el sitio en el celular y probar: botón WhatsApp (o formulario), formulario → `/metricas/leads`.
2. Search Console: reenviar `https://instalaciondeaire.uy/sitemap.xml` y pedir indexación de `/`, `/mantenimiento`, `/reparacion`, `/articulos/cuanto-cuesta-instalar-aire-acondicionado-uruguay`, `/articulos/aire-acondicionado-no-enfria`, `/zonas/las-piedras`, `/zonas/pando`, `/zonas/piriapolis`, `/zonas/atlantida`, `/zonas/la-paz` (≈10 por día; el resto al día siguiente).
3. Bing: `php scripts/indexnow.php` (avisa todas las URLs del sitemap) + dar de alta Bing Webmaster Tools importando desde GSC.

## Qué cambió
| Área | Cambio |
|---|---|
| Conversión | Número placeholder → los CTAs van al formulario y "Llamar" se oculta (antes: 17 links a `wa.me/598XXXXXXXX`). Leads guardados en `data/leads/` antes del mail; vista `/metricas/leads` (botón "Leads" en el panel). |
| Confianza | Fuera todos los `[COMPLETAR]` visibles (textos neutros, sin inventar cifras). Reseñas vacías ya no muestran tarjetas "[COMPLETAR] Nombre". Eliminado el schema de estrellas propio (riesgo de acción manual). |
| Marca | Logo nuevo (split + flujo de aire), versión blanca, ícono, favicon, apple-touch, OG image 1200×630 con titular. |
| On-page | Titles 44–62 caracteres con keyword + zona; descriptions con "por WhatsApp" al principio; H1 de pilares con "en Montevideo"; H1 home alineado al title; "retiro" en desinstalación (ya rankea pos 5); metas de zona sin cortes "...". |
| Contenido | 7 zonas nuevas: Las Piedras, La Paz, Pando, Atlántida (Costa de Oro), Canelones, Piriápolis, San Carlos, con perfil propio y vecinos reales. 7 artículos publicados (frigorías, inverter vs on/off, pierde agua, no enfría, cuánto cuesta 2026 con precios de mercado citados, cada cuánto el service, permisos en Montevideo). Enlaces servicio → guías relacionadas. |
| Imágenes | Infografía propia "Cómo es la instalación de un split" en la sección Qué incluye (home, split inverter, apartamentos, calefacción) + 1 infografía por artículo. No son fotos de trabajos ni IA. |
| Técnico | `lastmod` real en el sitemap; IndexNow; `.htaccess` bloquea `scripts/`, `tests/`, `.md`, `composer.*`. |

## Pendiente que solo podés hacer vos
Ver sección 3 de `PLAN-SEO-VERANO-2026.md`: Google Business Profile, citaciones, reseñas, fotos reales, datos del operador (metros incluidos, garantía, precio "desde"), enlaces y la revisión del 31-oct para activar la Fase 2.
