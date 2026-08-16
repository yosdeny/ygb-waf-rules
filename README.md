# YGB Escudo 2 - WAF Rules

Repositorio oficial de reglas del Firewall de Aplicaciones Web (WAF) para el plugin [YGB Escudo 2](https://ygb-security.com/ygb-escudo-2) de WordPress.

Este repositorio contiene las reglas actualizadas que protegen contra vulnerabilidades conocidas, ataques de inyección, cross-site scripting, ejecución remota de código y amenazas emergentes.

---

## 📋 Tabla de Contenidos

- [Estructura del Repositorio](#estructura-del-repositorio)
- [Cómo Funciona](#cómo-funciona)
- [Instalación y Configuración](#instalación-y-configuración)
- [Uso del Script de Build](#uso-del-script-de-build)
- [Añadir Nuevas Reglas](#añadir-nuevas-reglas)
- [Formato de Reglas](#formato-de-reglas)
- [Firma Digital](#firma-digital)
- [Flujo de Trabajo](#flujo-de-trabajo)
- [Repositorio Privado vs Público](#repositorio-privado-vs-público)
- [Seguridad](#seguridad)
- [Contribuciones](#contribuciones)
- [Licencia](#licencia)

---

## 📁 Estructura del Repositorio

ygb-waf-rules/
├── rules.json # Archivo combinado de todas las reglas (generado)
├── rules.json.sig # Firma digital de rules.json (generada)
├── CHANGELOG.md # Historial de cambios (auto-generado)
├── README.md # Este archivo
├── rules/ # Reglas individuales organizadas por categoría
│ ├── 01-base.json # Reglas fundamentales (fuerza bruta, XML-RPC, etc.)
│ ├── 02-sqli.json # SQL Injection
│ ├── 03-xss.json # Cross-Site Scripting
│ ├── 04-rce.json # Remote Code Execution
│ ├── 05-lfi-rfi.json # Local/Remote File Inclusion
│ ├── 06-ssrf.json # Server-Side Request Forgery
│ ├── 07-deserialization.json # PHP Object Injection / Deserialization
│ ├── 08-smuggling.json # HTTP Request Smuggling
│ ├── 09-supply-chain.json # Supply Chain Attacks
│ ├── 10-auth-bypass.json # Authentication Bypass
│ ├── 11-cve-2026.json # CVEs específicos de 2026
│ └── 12-misc.json # Reglas misceláneas
├── scripts/
│ └── build-rules.php # Script de construcción
├── .keys/ # Claves criptográficas (NO subir a Git)
│ ├── private.pem # Clave privada para firma
│ └── public.pem # Clave pública para verificación
└── .github/
└── workflows/
└── build-and-sign.yml # CI/CD automático (opcional)

---

## 🔄 Cómo Funciona

┌─────────────────┐
│ Reglas en │ php scripts/build-rules.php
│ rules/*.json │ ──────────────────────────────► rules.json
└─────────────────┘ │
│ git push
▼
┌─────────────────┐
│ GitHub │
│ (raw URL) │
└────────┬────────┘
│
Cada 6 horas (cron)│
▼
┌─────────────────┐
│ WordPress │
│ YGB Escudo 2 │
│ │
│ 1. Descargar │
│ 2. Verificar │
│ 3. Validar │
│ 4. Aplicar │
└─────────────────┘


**Frecuencia de actualización:** Los sitios con YGB Escudo 2 verifican actualizaciones cada **6 horas** automáticamente.

**Fallback:** Si no hay conexión a internet o el repositorio no está disponible, el plugin usa las reglas locales embebidas en el código.

---

## 🚀 Instalación y Configuración

### Requisitos

- PHP 7.4 o superior (para el script de build)
- Git
- Cuenta de GitHub

### Clonar el repositorio

```bash
# Repositorio público
git clone https://github.com/YGB-Security/ygb-waf-rules.git
cd ygb-waf-rules

# Repositorio privado (requiere autenticación)
git clone https://github.com/YGB-Security/ygb-waf-rules.git
# o con SSH
git clone git@github.com:YGB-Security/ygb-waf-rules.git

