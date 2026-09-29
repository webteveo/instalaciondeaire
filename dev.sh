#!/usr/bin/env sh
# Levanta el sitio en http://localhost:8000 con recarga automática al guardar cambios.
cd "$(dirname "$0")"
PORT="${PORT:-8000}"
echo "Sitio corriendo en http://localhost:$PORT  (Ctrl+C para cortar)"
exec php -S 0.0.0.0:"$PORT" router.php
