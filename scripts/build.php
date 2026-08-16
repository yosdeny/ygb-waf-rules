#!/usr/bin/env php
<?php
/**
 * Constructor de rules.json para YGB Escudo 2
 * 
 * Uso: php scripts/build.php [version]
 * Ejemplo: php scripts/build.php 6.1.0
 */

$rules_dir   = __DIR__ . '/../rules';
$output_file = __DIR__ . '/../rules.json';

// Cargar archivos en orden alfabético
$files = glob($rules_dir . '/*.json');
sort($files);

$all_rules = [];

foreach ($files as $file) {
    $content = file_get_contents($file);
    $rules = json_decode($content, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        fwrite(STDERR, "❌ Error JSON en " . basename($file) . ": " . json_last_error_msg() . "\n");
        exit(1);
    }
    
    echo "✓ " . basename($file) . " (" . count($rules) . " reglas)\n";
    
    // Validar cada regla
    foreach ($rules as $rule) {
        $required = ['num', 'id', 'pattern', 'severity', 'description', 'target'];
        foreach ($required as $field) {
            if (!isset($rule[$field])) {
                fwrite(STDERR, "❌ Campo '$field' faltante en regla " . ($rule['id'] ?? '?') . "\n");
                exit(1);
            }
        }
        
        // Validar regex
        $test = @preg_match($rule['pattern'], '');
        if ($test === false) {
            fwrite(STDERR, "❌ Regex inválida en regla {$rule['id']}\n");
            exit(1);
        }
        
        $all_rules[] = $rule;
    }
}

// Ordenar por num
usort($all_rules, fn($a, $b) => $a['num'] - $b['num']);

// Detectar duplicados
$seen = [];
foreach ($all_rules as $rule) {
    if (in_array($rule['id'], $seen)) {
        fwrite(STDERR, "❌ ID duplicado: {$rule['id']}\n");
        exit(1);
    }
    $seen[] = $rule['id'];
}

// Determinar versión
$version = $argv[1] ?? null;
if (!$version) {
    if (file_exists($output_file)) {
        $existing = json_decode(file_get_contents($output_file), true);
        $current = $existing['version'] ?? '1.0.0';
        $parts = explode('.', $current);
        $parts[2]++;
        $version = implode('.', $parts);
    } else {
        $version = '1.0.0';
    }
}

// Generar salida
$output = [
    'version'    => $version,
    'updated_at' => gmdate('c'),
    'rule_count' => count($all_rules),
    'rules'      => $all_rules,
];

file_put_contents($output_file, json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

echo "\n✅ rules.json generado (v{$version}, " . count($all_rules) . " reglas)\n";