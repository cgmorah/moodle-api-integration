<?php
require('../../config.php');
require_once($CFG->dirroot.'/local/external_sync/sync_api.php');

local_external_sync_users();
?>