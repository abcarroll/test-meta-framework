<?php
// (C) Copyright 2017 A.B. Carroll <ben@hl9.net>
// unless otherwise noted.  Read README.md for licensing details.

namespace abc;

interface App {
    public function setConfig(AppConfig $config);
    public function run();
}