# Contributing

## Añadir nueva regla

1. Edita el archivo correspondiente en `rules/` (si existe la estructura modular)
   o edita directamente `rules.json`

2. Sigue este formato:
   ```json
   {
     "num": 199,
     "id": "CVE-2026-XXXXX-PLUGIN",
     "pattern": "/pattern_here/i",
     "severity": "critical|high|medium|low",
     "description": "Descripción legible",
     "target": "post|query|uri|all|...",
     "condition": ["YGB_Escudo_2_WAF_Callbacks", "callback_method"],
     "cve": "CVE-2026-XXXXX",
     "added_in": "X.Y.Z"
   }
