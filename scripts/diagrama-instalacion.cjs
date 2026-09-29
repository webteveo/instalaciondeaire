// Uso: NODE_PATH=<node_modules con sharp> node scripts/diagrama-instalacion.cjs  (genera public/images/infografias/instalacion-split-que-incluye.webp)
const sharp = require('sharp'); const path = require('path');
const out = path.join(__dirname, '../public/images/infografias');
const F = "font-family=\"'Segoe UI', Arial, sans-serif\"";
const num = (x, y, n) => `<circle cx="${x}" cy="${y}" r="17" fill="#0A5BD8"/><text x="${x}" y="${y + 6}" ${F} font-size="18" font-weight="700" fill="#fff" text-anchor="middle">${n}</text>`;
const leyenda = [
  ['Unidad interior nivelada', 'fijada a la pared, con salida del desagote'],
  ['Cañería de cobre aislada', 'tramo estándar + cable de interconexión'],
  ['Desagote con pendiente', 'el agua de condensación sale afuera'],
  ['Soporte (ménsulas)', 'la condensadora firme y separada de la pared'],
  ['Condensadora', 'a la sombra si se puede, con aire libre alrededor'],
  ['Vacío y prueba', 'bomba de vacío, manómetros, frío y calor'],
];
const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="675" viewBox="0 0 1200 675">
<rect width="1200" height="675" fill="#F3F6FB"/>
<rect x="660" y="0" width="540" height="675" fill="#E3EEF9"/>
<text x="60" y="68" ${F} font-size="38" font-weight="800" fill="#0B2545">Cómo es la instalación de un split</text>
<text x="60" y="104" ${F} font-size="21" fill="#4F5966">Qué incluye una instalación estándar de aire acondicionado</text>
<text x="690" y="150" ${F} font-size="16" font-weight="700" letter-spacing="3" fill="#4F6B8A">EXTERIOR · BALCÓN O PATIO</text>
<text x="60" y="150" ${F} font-size="16" font-weight="700" letter-spacing="3" fill="#4F6B8A">INTERIOR</text>
<!-- pared -->
<rect x="620" y="120" width="40" height="555" fill="#CBD5E1"/>
<rect x="620" y="120" width="40" height="555" fill="url(#ladrillo)" opacity=".5"/>
<defs><pattern id="ladrillo" width="40" height="24" patternUnits="userSpaceOnUse"><path d="M0 12h40M20 0v12M0 24h40M10 12v12" stroke="#94A3B8" stroke-width="1.5"/></pattern></defs>
<!-- unidad interior -->
<rect x="210" y="180" width="360" height="96" rx="22" fill="#fff" stroke="#CBD5E1" stroke-width="3"/>
<rect x="240" y="244" width="300" height="9" rx="4.5" fill="#0B2545" opacity=".18"/>
<circle cx="540" cy="204" r="6" fill="#22C3E6"/>
<g fill="none" stroke="#22C3E6" stroke-width="6" stroke-linecap="round" opacity=".7">
<path d="M270 300c14-10 28-10 42 0s28 10 42 0 28-10 42 0"/><path d="M290 326c12-8 24-8 36 0s24 8 36 0 24-8 36 0"/></g>
${num(190, 180, 1)}
<!-- cañeria -->
<path d="M570 222H720V470H760" fill="none" stroke="#1F2937" stroke-width="20" stroke-linejoin="round"/>
<path d="M570 216H714V470H760" fill="none" stroke="#B87333" stroke-width="5" stroke-linejoin="round"/>
<path d="M570 228H726V470H760" fill="none" stroke="#D08B4A" stroke-width="5" stroke-linejoin="round"/>
${num(700, 196, 2)}
<!-- desagote -->
<path d="M555 276V296H700C706 296 706 296 706 302V640" fill="none" stroke="#22C3E6" stroke-width="5" stroke-dasharray="12 8"/>
<path d="M696 628l10 16 10-16" fill="none" stroke="#22C3E6" stroke-width="5"/>
${num(600, 318, 3)}
<!-- condensadora -->
<rect x="760" y="390" width="320" height="190" rx="14" fill="#fff" stroke="#94A3B8" stroke-width="3"/>
<circle cx="870" cy="485" r="72" fill="#E2E8F0" stroke="#94A3B8" stroke-width="3"/>
<g stroke="#94A3B8" stroke-width="3"><line x1="798" y1="485" x2="942" y2="485"/><line x1="870" y1="413" x2="870" y2="557"/><line x1="819" y1="434" x2="921" y2="536"/><line x1="921" y1="434" x2="819" y2="536"/></g>
<circle cx="870" cy="485" r="14" fill="#94A3B8"/>
<g stroke="#CBD5E1" stroke-width="4" stroke-linecap="round"><line x1="970" y1="420" x2="1050" y2="420"/><line x1="970" y1="445" x2="1050" y2="445"/><line x1="970" y1="470" x2="1050" y2="470"/><line x1="970" y1="495" x2="1050" y2="495"/><line x1="970" y1="520" x2="1050" y2="520"/><line x1="970" y1="545" x2="1050" y2="545"/></g>
${num(1100, 400, 5)}
<!-- ménsulas -->
<g stroke="#475569" stroke-width="8" stroke-linecap="round" fill="none"><path d="M660 582H1060"/><path d="M660 640L760 582"/></g>
${num(1100, 600, 4)}
<!-- manometro / vacio -->
<path d="M760 470 C800 470 830 330 870 300" fill="none" stroke="#0A5BD8" stroke-width="4" stroke-dasharray="3 7" stroke-linecap="round"/><g transform="translate(900 280)"><circle r="40" fill="#fff" stroke="#0A5BD8" stroke-width="5"/><path d="M-24 10A26 26 0 0 1 24 10" fill="none" stroke="#CBD5E1" stroke-width="5"/><line x1="0" y1="8" x2="16" y2="-16" stroke="#0B2545" stroke-width="5" stroke-linecap="round"/><circle r="6" fill="#0B2545"/></g>
${num(955, 240, 6)}
<!-- leyenda -->
${leyenda.map(([t, d], i) => { const y = 390 + i * 44; return `${num(76, y - 7, i + 1)}<text x="104" y="${y - 6}" ${F} font-size="19" font-weight="700" fill="#0B2545">${t}</text><text x="104" y="${y + 15}" ${F} font-size="15" fill="#4F5966">${d}</text>`; }).join('')}
<text x="1180" y="660" ${F} font-size="16" fill="#4F6B8A" text-anchor="end">instalaciondeaire.uy</text>
</svg>`;
sharp(Buffer.from(svg)).webp({ quality: 86 }).toFile(path.join(out, 'instalacion-split-que-incluye.webp')).then(() => console.log('ok'));
