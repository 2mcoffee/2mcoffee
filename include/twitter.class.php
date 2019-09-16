<?php

declare(strict_types=1);

require_once __DIR__ . '../include/OAuth.php';
require_once __DIR__ . '../include/Twitter.php';

class_alias('DG\Twitter\Twitter', 'Twitter');
class_alias('DG\Twitter\Exception', 'TwitterException');
?>