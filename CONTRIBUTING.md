# Contributing

## Añadir nueva regla

1. Edita el archivo correspondiente en `rules/` (si existe la estructura modular)
   o edita directamente `rules.json`

2. Sigue este formato:
## 📝 Formato del Archivo

El archivo `rules.json` tiene esta estructura:

```json
{
  "version": "6.0.1",
  "updated_at": "2026-08-17T00:00:00Z",
  "rule_count": 33,
  "rules": [
    {
      "num": 199,
      "id": "CVE-2026-15988-AI-ENGINE-CSRF",
      "pattern": "/\\/wp-json\\/wp\\/v2\\/users.*[?&]_method\\s*=\\s*POST/i",
      "severity": "critical",
      "description": "CVE-2026-15988: AI Engine CSRF privilege escalation",
      "target": "uri|query",
      "condition": {
        "operator": "AND",
        "conditions": [
          {"type": "user_not_logged_in"},
          {"type": "param_exists", "param": "_method"}
        ]
      },
      "cve": "CVE-2026-15988",
      "added_in": "6.0.1"
    }
  ]
}
```
## Campos de Regla:

| Campo       | Tipo   | Descripción                                                      |
|-------------|--------|------------------------------------------------------------------|
| num         | int    | Número de regla (orden de evaluación)                            |
| id          | string | Identificador único                                              |
| pattern     | string | Expresión regular PHP                                            |
| severity    | string | Severidad: low, medium, high, critical                           |
| description | string | Descripción legible                                              |
| target      | string | Dónde inspeccionar: uri, query, post, headers, cookies, all, etc. |
| condition   | mixed  | Condición opcional para aplicar la regla                         |
| cve         | string | ID del CVE (opcional)                                            |
| added_in    | string | Versión en que se añadió                                         |
