# YGB Escudo 2 - WAF Rules

Reglas actualizadas para el plugin YGB Escudo 2 de WordPress.

## Cómo usar

### Opción 1: Actualizar el plugin
Instala la última versión de YGB Escudo 2 desde WordPress.org. 
Incluye las reglas más recientes embebidas.

### Opción 2: Actualización manual (más rápida)
Si necesitas las últimas reglas antes del próximo release:

1. Descarga `rules.json` de la [última release](https://github.com/YGB-Security/ygb-waf-rules/releases/latest)
2. En tu WordPress: YGB Escudo 2 → Reglas WAF → pestaña "Actualizaciones"
3. Sube el archivo `rules.json`
4. Listo. Las reglas se aplican inmediatamente.

### Restaurar reglas originales
Si las reglas personalizadas causan problemas, usa el botón 
"Restaurar reglas embebidas" en la misma pestaña de Actualizaciones.

## Releases

- **v6.1.0** (2026-09-01): 199 reglas (+CVE-2026-99999)
- **v6.0.0** (2026-08-17): 198 reglas (lanzamiento inicial)

## Para contribuidores

Ver [CONTRIBUTING.md](CONTRIBUTING.md) para añadir nuevas reglas.
