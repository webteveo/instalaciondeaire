@echo off
REM Levanta el sitio en http://localhost:8000 con recarga automatica al guardar cambios.
cd /d "%~dp0"
if "%PORT%"=="" set PORT=8000
echo Sitio corriendo en http://localhost:%PORT%  (Ctrl+C para cortar)
start "" http://localhost:%PORT%
php -S localhost:%PORT% router.php
