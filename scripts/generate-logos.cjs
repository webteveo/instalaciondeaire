// Uso: NODE_PATH=<carpeta node_modules con sharp> node scripts/generate-logos.cjs
// Genera los recursos raster del sitio desde los SVG de public/images/logo (logo sep-2026: split + flujo de aire).
// Si cambia el logo: editar logo.svg, logo-blanco.svg, icono.svg y favicon.svg y volver a correr este script.
const fs = require('node:fs/promises');
const path = require('node:path');
const sharp = require('sharp');
const dir = path.join(__dirname, '../public/images/logo');

async function main() {
  const logo = await fs.readFile(path.join(dir, 'logo.svg'), 'utf8');
  const icon = await fs.readFile(path.join(dir, 'icono.svg'), 'utf8');
  const render = (svg) => sharp(Buffer.from(svg), { density: 288 });

  // Logo color con fondo transparente (schema, respaldo PNG)
  await render(logo).resize({ width: 800 }).png().toFile(path.join(dir, 'logo.png'));

  // Icono cuadrado y apple-touch-icon
  const iconPng = await render(icon).resize(512, 512, { fit: 'contain', background: '#00000000' }).png().toBuffer();
  await fs.writeFile(path.join(dir, 'icono.png'), iconPng);
  await sharp(iconPng).resize(180, 180).flatten({ background: '#FFFFFF' }).png().toFile(path.join(dir, 'apple-touch-icon.png'));

  // ICO con imágenes PNG para navegadores y accesos directos de Windows (favicon.svg es el principal)
  const sizes = [16, 32, 48, 64, 128, 256];
  const frames = [];
  for (const size of sizes) frames.push(await sharp(iconPng).resize(size, size).png().toBuffer());
  const header = Buffer.alloc(6 + 16 * sizes.length);
  header.writeUInt16LE(1, 2);
  header.writeUInt16LE(sizes.length, 4);
  let offset = header.length;
  frames.forEach((frame, i) => {
    const at = 6 + 16 * i;
    header[at] = header[at + 1] = sizes[i] === 256 ? 0 : sizes[i];
    header.writeUInt16LE(1, at + 4);
    header.writeUInt16LE(32, at + 6);
    header.writeUInt32LE(frame.length, at + 8);
    header.writeUInt32LE(offset, at + 12);
    offset += frame.length;
  });
  await fs.writeFile(path.join(dir, 'favicon.ico'), Buffer.concat([header, ...frames]));

  // Imagen OG 1200x630: fondo azul oscuro, logo blanco, titular y bajada
  const logoBlanco = await fs.readFile(path.join(dir, 'logo-blanco.svg'), 'utf8');
  const socialLogo = await render(logoBlanco).resize({ width: 640 }).png().toBuffer();
  const fondo = `<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="630" viewBox="0 0 1200 630">
    <defs><linearGradient id="bg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0B2545"/><stop offset="1" stop-color="#0A5BD8"/></linearGradient></defs>
    <rect width="1200" height="630" fill="url(#bg)"/>
    <g fill="none" stroke="#FFFFFF" stroke-opacity=".08" stroke-width="28" stroke-linecap="round">
      <path d="M760 470c60-48 120-48 180 0s120 48 180 0 120-48 180 0"/><path d="M820 560c50-40 100-40 150 0s100 40 150 0"/>
    </g>
    <g font-family="'Segoe UI', 'Helvetica Neue', Arial, sans-serif" fill="#FFFFFF">
      <text x="80" y="360" font-size="54" font-weight="800">Instalación de aire acondicionado</text>
      <text x="80" y="428" font-size="40" font-weight="600" fill="#BFE9F7">Montevideo · Canelones · Maldonado</text>
      <text x="80" y="520" font-size="30" font-weight="600" fill="#7FDBF3">Split inverter · Service · Reparación · Carga de gas</text>
    </g>
  </svg>`;
  await sharp(Buffer.from(fondo)).composite([{ input: socialLogo, top: 70, left: 60 }]).png().toFile(path.join(dir, 'og-image.png'));
  console.log('Generados logo.png, icono.png, apple-touch-icon.png, favicon.ico y og-image.png.');
}
main().catch(error => { console.error(error); process.exitCode = 1; });
