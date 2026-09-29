# Imagen para publicar el sitio (Render u otro host con Docker). Usa el mismo router.php que en local.
FROM php:8.3-cli
WORKDIR /app
COPY . /app
RUN mkdir -p data/metrics data/leads && chown -R www-data:www-data data
USER www-data
ENV PORT=8080
EXPOSE 8080
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT} router.php"]
