<?php

$shortOpt = "u:";
$longOpt = [
    "url:",
];
$opt1 = getopt($shortOpt, $longOpt);

if (isset($opt1['u'])) {
    $url = $opt1['u'];
} elseif (isset($opt1['url'])) {
    $url = $opt1['url'];
} else {
    $url = $argv[1];
}

$url_in = array();

function parse($u)
{
    $scheme = parse_url($u, PHP_URL_SCHEME);
    $url_in['scheme'] = $scheme;

    $host = parse_url($u, PHP_URL_HOST);
    $url_in['host'] = $host;

    $cctld = ['ac', 'ad', 'ae', 'af', 'ag', 'ai', 'al', 'am', 'ao', 'aq', 'ar', 
    'as', 'at', 'au', 'aw', 'ax', 'az', 'ba', 'bb', 'bd', 'be', 'bf', 'bg', 'bh',
     'bi', 'bj', 'bm', 'bn', 'bo', 'br', 'bs', 'bt', 'bv', 'by', 'bz', 'ca', 'cc',
    'cd',    'cf', 'cg', 'ch', 'ci', 'ck', 'cl', 'cm', 'cn', 'co', 'cr', 'cu', 
    'cv', 'cw', 'cx', 'cy', 'cz', 'de', 'dj', 'dk', 'dm', 'do', 'dz', 'ec', 'ee',
    'eg', 'er', 'es', 'et', 'eu', 'fi', 'fj', 'fk', 'fm', 'fo', 'fr', 'ga', 'gb',
    'gd', 'ge', 'gf', 'gg', 'gh', 'gi', 'gl', 'gm', 'gn', 'gp', 'gq', 'gr', 'gs',
    'gt', 'gu', 'gw', 'gy', 'hk', 'hm', 'hn', 'hr', 'ht', 'hu', 'id', 'ie', 'il',
    'im', 'in', 'io', 'iq', 'ir', 'is', 'it', 'je', 'jm', 'jo', 'jp', 'ke', 'kg',
    'kh', 'ki', 'km', 'kn', 'kp', 'kr', 'kr', 'kw', 'ky', 'kz', 'la', 'lb', 'lc',
    'li', 'lk', 'lr', 'ls', 'lt', 'lu', 'lv', 'ly', 'ma', 'mc', 'md', 'me', 'mg',
    'mh', 'mk', 'ml', 'mm', 'mn', 'mo', 'mp', 'mq', 'mr', 'ms', 'mt', 'mu', 'mv',
    'mw', 'mx', 'my', 'mz', 'na', 'nc', 'ne', 'nf', 'ng', 'ni', 'nl', 'no', 'np',
    'nr', 'nu', 'nz', 'om', 'pa', 'pe', 'pf', 'pg', 'ph', 'pk', 'pl', 'pm', 'pn',
    'pr', 'ps', 'pt', 'pw', 'py', 'qa', 're', 'ro', 'rs', 'ru', 'rw', 'sa', 'sb',
    'sc', 'sd', 'se', 'sg', 'sh', 'si', 'sj', 'sk', 'sl', 'sm', 'sn', 'so', 'sr',
    'st', 'su', 'sv', 'sx', 'sy', 'sz', 'tc', 'td', 'tf', 'tg', 'th', 'tj', 'tk',
    'tl', 'tm', 'tn', 'to',' tr', 'tt', 'tv', 'tw', 'tz', 'ua', 'ug', 'uk', 'us',
    'uy', 'uz', 'va', 'vc', 've', 'vg', 'vi', 'vn', 'wf', 'ws', 'ye', 'yt', 'za',
    'zm', 'zw',
    ];

    $sld1 = ['com', 'co', 'org', 'in', 'us', 'gov', 'mil', 'int', 'edu', 'net',
    'biz', 'info',
    ];

    $host_p = explode(".", $host);
    $parts = count($host_p);

    switch($parts) {
        case 2:
            $url_in['domain'] = $host;
            $url_in['tld'] = "." . $host_p[1];
            break;
       case 3:
            if (in_array($host_p[2], $cctld) && in_array($host_p[1], $sld1)) {
                $url_in['domain'] = $host;
                $url_in['tld'] = "." . $host_p[2];
                $url_in['sld'] = "." . $host_p[1] . "." . $host_p[2];
            } else {
                $url_in['domain'] = $host_p[1] . "." . $host_p[2];
                $url_in['subdomain'] = $host_p[0];
                $url_in['tld'] = "." . $host_p[2];
            }
            break;
        case 4:
            if (in_array($host_p[3], $cctld) && in_array($host_p[2], $sld1)) {
                $url_in['domain'] = $host_p[1] . "." . $host_p[2] . "." . $host_p[3];
                $url_in['subdomain'] = $host_p[0];
                $url_in['tld'] = "." . $host_p[3];
                $url_in['sld'] = "." . $host_p[2] . "." . $host_p[3];
            } else {
                $url_in['domain'] = $host_p[2] . "." . $host_p[3];
                $url_in['subdomain'] = $host_p[0] . "." . $host_p[1];
                $url_in['tld'] = "." . $host_p[3];
            }
            break;
        case 5:
            if (in_array($host_p[4], $cctld) && in_array($host_p[3], $sld1)) {
                $url_in['domain'] = $host_p[2] . "." . $host_p[3] . "." . $host_p[4];
                $url_in['subdomain'] = $host_p[0] . "." . $host_p[1];
                $url_in['tld'] = "." . $host_p[4];
                $url_in['sld'] = "." . $host_p[3] . "." . $host_p[4];
            } else {
                $url_in['domain'] = $host_p[3] . "." . $host_p[4];
                $url_in['subdomain'] = $host_p[0] . "." . $host_p[1] . "." . $host_p[2];
                $url_in['tld'] = "." . $host_p[4];
            }
            break;
        default:
            echo "Sorry, something went wrong.";
            break;
    }

    $path = parse_url($u, PHP_URL_PATH);
    if (isset($path)) {
        $url_in['path'] = $path;
        $path_ex1 = explode(".", $path, -1);
        $path_ex2 = explode(".", $path);
            if (empty($path_ex1) != true) {
                $url_in['extention'] = end($path_ex2);
            }
    }

    $query = parse_url($u, PHP_URL_QUERY);
    if (isset($query)) {
        $url_in['query'] = $query;
        $parsedQuery = array();
        $qs = explode("&", $query);
        foreach ($qs as $q) {
            $q1 = explode("=", $q);
            $parsedQuery[$q1[0]] = $q1[1];
        }
        $url_in['parsedQuery'] = $parsedQuery;
    }

    $fragment = parse_url($u, PHP_URL_FRAGMENT);
    if (isset($fragment)) {
        $url_in['fragment'] = $fragment;
    }

    echo json_encode($url_in, JSON_PRETTY_PRINT);
}

if (filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED)) {
    parse($url);
} else {
    echo "Sorry, not a URL. Please try again.";
}
