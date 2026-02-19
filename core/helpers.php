<?php

if (!function_exists('dd')) {
    function dd(...$values): void
    {
        dump_renderer('dd', $values);
        exit;
    }
}

if (!function_exists('dump')) {
    function dump(...$values): void
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $caller = $trace[0] ?? [];
        $file = $caller['file'] ?? 'unknown';
        $line = (int) ($caller['line'] ?? 0);

        echo '<pre style="margin:12px 0;padding:16px;font-family:monospace;white-space:pre-wrap;word-break:break-word;line-height:1.4;background:oklch(75% 0.183 55.934);color:#2e1a00;border:1px solid #2e1a00;">';
        echo 'Function: dump()' . "\n";
        echo 'File: ' . htmlspecialchars($file, ENT_QUOTES, 'UTF-8') . "\n";
        echo 'Line: ' . $line . "\n";
        echo 'Time: ' . date('Y-m-d H:i:s') . "\n\n";

        foreach ($values as $i => $value) {
            ob_start();
            var_dump($value);
            $dump = ob_get_clean();

            echo '#' . ($i + 1) . "\n";
            echo htmlspecialchars((string) $dump, ENT_QUOTES, 'UTF-8') . "\n";
        }

        if (count($values) === 0) {
            echo "dump() called with no arguments.\n";
        }

        echo '</pre>';
    }
}

if (!function_exists('dump_renderer')) {
    function dump_renderer(string $fnName, array $values): void
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3);
        $caller = $trace[1] ?? [];

        $file = $caller['file'] ?? 'unknown';
        $line = $caller['line'] ?? 0;

        if (!headers_sent()) {
            header('Content-Type: text/html; charset=UTF-8');
        }

        echo '<!doctype html><html><head><meta charset="utf-8"><title>' . htmlspecialchars($fnName, ENT_QUOTES, 'UTF-8') . '()</title>';
        echo '<style>
            body{margin:0;background:oklch(75% 0.183 55.934);color:#2e1a00;}
            pre{margin:0;padding:16px;font-family:monospace;white-space:pre-wrap;word-break:break-word;line-height:1.4;}
        </style></head><body>';

        echo '<pre>';
        echo 'Function: ' . htmlspecialchars($fnName, ENT_QUOTES, 'UTF-8') . "()\n";
        echo 'File: ' . htmlspecialchars($file, ENT_QUOTES, 'UTF-8') . "\n";
        echo 'Line: ' . (int) $line . "\n";
        echo 'Time: ' . date('Y-m-d H:i:s') . "\n\n";

        foreach ($values as $i => $value) {
            ob_start();
            var_dump($value);
            $dump = ob_get_clean();

            echo '#' . ($i + 1) . "\n";
            echo htmlspecialchars((string) $dump, ENT_QUOTES, 'UTF-8') . "\n";
        }

        if (count($values) === 0) {
            echo htmlspecialchars($fnName, ENT_QUOTES, 'UTF-8') . "() called with no arguments.\n";
        }

        echo '</pre></body></html>';
    }
}
