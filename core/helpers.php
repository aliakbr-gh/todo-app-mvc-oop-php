<?php

if (!function_exists('dd')) {
    function dd(...$values): void
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $caller = $trace[0] ?? [];

        $file = $caller['file'] ?? 'unknown';
        $line = $caller['line'] ?? 0;

        http_response_code(500);
        header('Content-Type: text/html; charset=UTF-8');

        echo '<!doctype html><html><head><meta charset="utf-8"><title>dd()</title>';
        echo '<style>
            body{font-family:Menlo,Consolas,monospace;background:#111;color:#eee;margin:0;padding:18px;}
            .meta{background:#1d1d1d;border:1px solid #333;border-radius:8px;padding:12px;margin-bottom:14px;}
            .meta div{margin:4px 0;}
            .dump{background:#0b0b0b;border:1px solid #2c2c2c;border-radius:8px;padding:12px;overflow:auto;white-space:pre-wrap;word-break:break-word;}
            .label{color:#8fd3ff;}
            .idx{color:#ffca80;}
        </style></head><body>';

        echo '<div class="meta">';
        echo '<div><span class="label">Function:</span> dd()</div>';
        echo '<div><span class="label">File:</span> ' . htmlspecialchars($file, ENT_QUOTES, 'UTF-8') . '</div>';
        echo '<div><span class="label">Line:</span> ' . (int) $line . '</div>';
        echo '<div><span class="label">Time:</span> ' . date('Y-m-d H:i:s') . '</div>';
        echo '</div>';

        foreach ($values as $i => $value) {
            ob_start();
            var_dump($value);
            $dump = ob_get_clean();

            echo '<div class="dump"><span class="idx">#' . ($i + 1) . "</span>\n";
            echo htmlspecialchars((string) $dump, ENT_QUOTES, 'UTF-8');
            echo '</div><br>';
        }

        if (count($values) === 0) {
            echo '<div class="dump">dd() called with no arguments.</div>';
        }

        echo '</body></html>';
        exit;
    }
}
