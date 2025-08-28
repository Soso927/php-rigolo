<?php
// inc/logger.php
 
/**
 * Écrit un évènement dans logs/data.log (1 ligne JSON par évènement)
 */
function log_event(string $type, array $data = [], ?string $file = null): void
{
    $dir = __DIR__ . '/../logs';
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
    $file = $file ?: $dir . '/data.log';
 
    $entry = [
        'ts'     => date('c'),
        'type'   => $type,
        'ip'     => $_SERVER['REMOTE_ADDR']    ?? null,
        'method' => $_SERVER['REQUEST_METHOD'] ?? null,
        'uri'    => $_SERVER['REQUEST_URI']    ?? null,
        'ua'     => $_SERVER['HTTP_USER_AGENT']?? null,
        'sid'    => session_id() ?: null,
        'data'   => $data,
    ];
    $line = json_encode($entry, JSON_UNESCAPED_UNICODE) . PHP_EOL;
 
    if ($fh = @fopen($file, 'ab')) {
        if (flock($fh, LOCK_EX)) {
            fwrite($fh, $line);
            fflush($fh);
            flock($fh, LOCK_UN);
        }
        fclose($fh);
    }
}
 
/** Raccourci : tracer une visite de page */
function log_visit(array $extra = []): void
{
    log_event('visit', $extra);
}
 