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

- v6.1.3 (2026-08-18): 34 reglas extendidas - Añade CVE-2026-15748 (Forminator) (AI Engine CSRF)
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

Este repositorio está licenciado bajo la licencia GPLv2 or later, igual que el plugin YGB Escudo 2.

YGB Escudo 2 WAF Rules
Copyright (C) 2026 YGB Security

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

## Reconocimientos
Wordfence Threat Intelligence: Por reportar CVE-2026-15826 y CVE-2026-15988

Comunidad WordPress: Por reportar vulnerabilidades y contribuir a la seguridad

Patchstack: Por investigación de seguridad en plugins WordPress

## Mantenedor: YGB Security
Última actualización: 17 de agosto de 2026
