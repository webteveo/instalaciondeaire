#!/usr/bin/env python3
"""
Control SEO de todas las URLs del sitemap (correr con el sitio levantado: ./dev.sh).
  python3 scripts/qa-seo.py [http://127.0.0.1:8000] [--solo prefijo]
Mide por pagina: estado HTTP, title/description, cantidad de H1, palabras de contenido propio y
similitud con la pagina mas parecida del sitio (frases de 5 palabras compartidas / total de la pagina).
Objetivo: zonas y servicio x zona < 30 %, resto < 20 %. Requiere beautifulsoup4 y lxml.
"""
import re, sys, json, urllib.request, collections
from bs4 import BeautifulSoup

B = next((a for a in sys.argv[1:] if a.startswith('http')), 'http://127.0.0.1:8000').rstrip('/')
solo = sys.argv[sys.argv.index('--solo') + 1] if '--solo' in sys.argv else ''
xml = urllib.request.urlopen(B + '/sitemap.xml').read().decode()
urls = [l.split('instalaciondeaire.uy', 1)[1] or '/' for l in re.findall(r'<loc>([^<]+)', xml)]

def shingles(t):
    w = re.findall(r'\w+', t.lower())
    return set(tuple(w[i:i + 5]) for i in range(len(w) - 4))

pages, errores = {}, []
for u in urls:
    try:
        r = urllib.request.urlopen(B + u); html = r.read().decode(); code = r.status
    except Exception as e:
        errores.append((u, str(e))); continue
    if re.search(r'(Warning|Fatal error|Notice|Deprecated)</b>:', html): errores.append((u, 'error PHP en el HTML'))
    s = BeautifulSoup(html, 'lxml')
    d = s.find('meta', attrs={'name': 'description'})
    main = s.find('main') or s.body
    for t in main(['script', 'style', 'noscript', 'nav', 'footer']): t.decompose()
    blocks = [re.sub(r'\s+', ' ', b.get_text(' ', strip=True)) for b in main.find_all(['p', 'li', 'td', 'h2', 'h3', 'summary', 'dd'])]
    blocks = [b for b in blocks if len(b.split()) >= 8]
    pages[u] = dict(code=code, title=s.title.get_text(strip=True) if s.title else '', desc=d['content'] if d else '',
                    h1=len(s.find_all('h1')), text=' '.join(blocks))
S = {u: shingles(p['text']) for u, p in pages.items()}
idx = collections.defaultdict(set)
for u, sh in S.items():
    for x in sh: idx[x].add(u)
rows = []
for u, p in pages.items():
    if solo and not u.startswith(solo): continue
    cnt = collections.Counter()
    for x in S[u]:
        for v in idx[x]:
            if v != u: cnt[v] += 1
    v, n = cnt.most_common(1)[0] if cnt else ('', 0)
    sim = round(100 * n / max(1, len(S[u])))
    lim = 30 if re.match(r'^/(zonas|mantenimiento|reparacion|carga-de-gas|desinstalacion)/', u) else 20
    flags = []
    if sim > lim: flags.append(f'sim>{lim}')
    if not 30 <= len(p['title']) <= 62: flags.append(f"title {len(p['title'])}")
    if not 100 <= len(p['desc']) <= 160: flags.append(f"desc {len(p['desc'])}")
    if p['h1'] != 1: flags.append(f"h1={p['h1']}")
    rows.append((u, len(p['text'].split()), sim, v, flags))
for u, w, sim, v, f in sorted(rows, key=lambda r: -r[2]):
    print(f"{u:58} {w:5}p {sim:3}% ~ {v[:40]:40} {' '.join(f)}")
dup_t = [t for t, c in collections.Counter(p['title'] for p in pages.values()).items() if c > 1]
dup_d = [t for t, c in collections.Counter(p['desc'] for p in pages.values()).items() if c > 1]
print(f"\n{len(pages)} URLs | errores: {len(errores)} | titles repetidos: {len(dup_t)} | descriptions repetidas: {len(dup_d)} | con alertas: {sum(1 for r in rows if r[4])}")
for e in errores: print('ERROR', e)
for t in dup_t: print('TITLE REPETIDO', t)
sys.exit(1 if errores or dup_t or dup_d else 0)
