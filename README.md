# YGB Escudo 2 - WAF Rules

Reglas WAF extendidas para el plugin YGB Escudo 2 de WordPress.
Plugin: https://wordpress.org/plugins/ygb-escudo-2/

## Cómo usar

1. Descarga rules.json de la última release:
   https://github.com/yosdeny/ygb-waf-rules/releases/latest
2. En WordPress: YGB Escudo 2 → Reglas WAF → Actualizaciones
3. Sube el archivo rules.json
4. Listo

## Releases

- v6.0.1 (2026-08-17): 33 reglas extendidas - Añade CVE-2026-15988 (AI Engine CSRF)
- v6.0.0 (2026-08-17): 32 reglas extendidas - Lanzamiento inicial

## Estructura

ygb-waf-rules/
  rules.json          Archivo principal con reglas extendidas
  README.md           Este archivo
  scripts/
    build.php         Script opcional para construir rules.json

## Soporte

- Issues: https://github.com/yosdeny/ygb-waf-rules/issues

## Licencia

GPLv2 or later
