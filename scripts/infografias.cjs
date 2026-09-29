// Uso: NODE_PATH=<node_modules con sharp> node scripts/infografias.cjs  (lee data/articulos/_imagenes.json)
// Genera public/images/articulos/{slug}.webp (1200x675) desde data/articulos/_imagenes.json
const sharp = require('sharp'); const fs = require('fs'); const path = require('path');
const root = path.join(__dirname, '..');
const out = path.join(root, 'public/images/articulos'); fs.mkdirSync(out, { recursive: true });
const items = JSON.parse(fs.readFileSync(path.join(root, 'data/articulos/_imagenes.json'), 'utf8'));
const F = "font-family=\"'Segoe UI', Arial, sans-serif\"";
const esc = s => String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
const ICON = `<rect width="180" height="180" rx="42" fill="#0A5BD8"/><rect x="30" y="38" width="120" height="50" rx="13" fill="#fff"/><g fill="none" stroke="#fff" stroke-width="8" stroke-linecap="round"><path d="M42 108c10-8 20-8 30 0s20 8 30 0 20-8 30 0"/><path d="M52 128c8-6.5 16.5-6.5 25 0s16.5 6.5 25 0 16.5-6.5 25 0"/></g>`;
function wrap(t, max) { const w = String(t).split(' '); const l = []; let c = ''; for (const x of w) { if ((c + ' ' + x).trim().length > max) { l.push(c.trim()); c = x; } else c += ' ' + x; } if (c.trim()) l.push(c.trim()); return l; }
(async () => {
  for (const it of items) {
    const rows = (it.datos || []).slice(0, 8);
    const esTabla = rows.length && rows.every(r => typeof r === 'string' ? r.includes('|') : Array.isArray(r));
    const titulo = wrap(it.titulo_corto || it.slug, 38).slice(0, 2);
    const top = 70 + titulo.length * 52;
    const rowH = Math.min(62, Math.floor((675 - top - 70) / Math.max(rows.length, 1)));
    const fs1 = Math.min(26, Math.floor(rowH * 0.45));
    let body = '';
    rows.forEach((r, i) => {
      const y = top + 20 + i * rowH;
      if (esTabla) {
        const [a, b, c] = (Array.isArray(r) ? r : r.split('|')).map(x => x.trim());
        const header = i === 0 && it.tipo === 'tabla' && it.encabezado !== false;
        body += `<rect x="60" y="${y}" width="1080" height="${rowH - 8}" rx="10" fill="${header ? '#0B2545' : (i % 2 ? '#FFFFFF' : '#EAF2FC')}"/>`;
        body += `<text x="84" y="${y + (rowH - 8) / 2 + fs1 * 0.36}" ${F} font-size="${fs1}" font-weight="700" fill="${header ? '#fff' : '#0B2545'}">${esc(a)}</text>`;
        const xb = c !== undefined ? 470 : 640; if (c !== undefined) body += `<text x="820" y="${y + (rowH - 8) / 2 + fs1 * 0.36}" ${F} font-size="${fs1}" font-weight="${header ? 700 : 500}" fill="${header ? '#BFE9F7' : '#4F5966'}">${esc(c)}</text>`;
        body += `<text x="${xb}" y="${y + (rowH - 8) / 2 + fs1 * 0.36}" ${F} font-size="${fs1}" font-weight="${header ? 700 : 500}" fill="${header ? '#BFE9F7' : '#0A5BD8'}">${esc(b || '')}</text>`;
      } else {
        const cy = y + (rowH - 8) / 2;
        body += `<rect x="60" y="${y}" width="1080" height="${rowH - 8}" rx="10" fill="${i % 2 ? '#FFFFFF' : '#EAF2FC'}"/>`;
        body += `<circle cx="96" cy="${cy}" r="${Math.min(19, rowH / 3)}" fill="#0A5BD8"/><text x="96" y="${cy + 7}" ${F} font-size="19" font-weight="700" fill="#fff" text-anchor="middle">${it.tipo === 'pasos' || it.tipo === 'diagrama' ? i + 1 : '✓'}</text>`;
        body += `<text x="132" y="${cy + fs1 * 0.36}" ${F} font-size="${fs1}" font-weight="600" fill="#0B2545">${esc(r)}</text>`;
      }
    });
    const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="675" viewBox="0 0 1200 675">
<defs><linearGradient id="bg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#F3F6FB"/><stop offset="1" stop-color="#E3EEF9"/></linearGradient></defs>
<rect width="1200" height="675" fill="url(#bg)"/>
<rect x="0" y="0" width="1200" height="10" fill="#0A5BD8"/>
${titulo.map((l, i) => `<text x="60" y="${86 + i * 52}" ${F} font-size="44" font-weight="800" fill="#0B2545">${esc(l)}</text>`).join('')}
<g transform="translate(1068 38) scale(.4)">${ICON}</g>
${body}
<text x="60" y="650" ${F} font-size="17" fill="#4F6B8A">${esc(it.pie || 'Guía de referencia · septiembre 2026')}</text>
<text x="1140" y="650" ${F} font-size="17" font-weight="700" fill="#0A5BD8" text-anchor="end">instalaciondeaire.uy</text>
</svg>`;
    await sharp(Buffer.from(svg)).webp({ quality: 86 }).toFile(path.join(out, it.slug + '.webp'));
    if (process.argv[2]) await sharp(Buffer.from(svg)).resize(800).png().toFile(path.join(process.argv[2], 'prev-' + it.slug + '.png'));
    console.log('ok', it.slug, rows.length, esTabla ? 'tabla' : 'lista');
  }
})();
