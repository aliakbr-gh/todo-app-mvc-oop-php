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
        dump_renderer('dump', $values);
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
            body{font-family:Menlo,Consolas,monospace;background:#fff5eb;color:#3b250f;margin:0;padding:18px;}
            .meta{background:#ffe3c7;border:1px solid #f2ba7d;border-radius:8px;padding:12px;margin-bottom:14px;}
            .meta div{margin:4px 0;}
            .dump{background:#fff0df;border:1px solid #f0ba7d;border-radius:8px;padding:12px;overflow:auto;}
            .dump pre{margin:8px 0 0;white-space:pre-wrap;word-break:break-word;color:#3b250f;}
            .label{color:#a74d00;}
            .idx{color:#cc5f00;}
        </style></head><body>';

        echo '<div class="meta">';
        echo '<div><span class="label">Function:</span> ' . htmlspecialchars($fnName, ENT_QUOTES, 'UTF-8') . '()</div>';
        echo '<div><span class="label">File:</span> ' . htmlspecialchars($file, ENT_QUOTES, 'UTF-8') . '</div>';
        echo '<div><span class="label">Line:</span> ' . (int) $line . '</div>';
        echo '<div><span class="label">Time:</span> ' . date('Y-m-d H:i:s') . '</div>';
        echo '</div>';

        foreach ($values as $i => $value) {
            ob_start();
            var_dump($value);
            $dump = ob_get_clean();

            echo '<div class="dump"><span class="idx">#' . ($i + 1) . '</span>';
            echo '<pre>' . htmlspecialchars((string) $dump, ENT_QUOTES, 'UTF-8') . '</pre>';
            echo '</div><br>';
        }

        if (count($values) === 0) {
            echo '<div class="dump"><pre>' . htmlspecialchars($fnName, ENT_QUOTES, 'UTF-8') . '() called with no arguments.</pre></div>';
        }

        echo '</body></html>';
    }
}
