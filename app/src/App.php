<?php

namespace abc;

interface App {
    public function setConfig(AppConfig $config);
    public function run();
}