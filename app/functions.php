<?php declare(strict_types = 1);

if (! function_exists('uuid')) {
    /**
     * @return string
     */
    function uuid() : string {
        return (string) Ramsey\Uuid\Uuid::uuid4();
    }
}

if (! function_exists('wedding_date')) {
    /**
     * @param string|null $format
     * @return string|DateTime
     */
    function wedding_date(string $format = null) {
        $date = \Carbon\Carbon::createFromFormat('Y-m-d', config('wedding.date'));

        return $format ? $date->format($format) : $date;
    }
}

if (! function_exists('eview')) {
    /**
     * Return an escaped view
     * 
     * @param string $view
     * @param array  $params
     * @return string
     */
    function eview(string $view, array $params = []) : string {
        return str_replace(["\n", "\r", "\t", "  "], '', addslashes((string) view($view, $params)));
    }
}