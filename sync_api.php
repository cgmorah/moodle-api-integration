<?php

/**
 * Moodle API Integration Sample
 * Syncs user enrolments from an external system into Moodle.
 */

defined('MOODLE_INTERNAL') || die();

function local_external_sync_users() {
    global $DB;

    $api_url = 'https://api.external-system.com/enrolments';
    $token = 'your_api_token';

    $response = file_get_contents($api_url . '?token=' . $token);
    $users = json_decode($response, true);

    foreach ($users as $data) {
        if ($user = $DB->get_record('user', ['email' => $data['email']])) {
            $courseid = $data['courseid'];
            $roleid = ($data['role'] === 'student') ? 5 : 3;

            $enrol = enrol_get_plugin('manual');
            $instances = enrol_get_instances($courseid, true);

            foreach ($instances as $instance) {
                if ($instance->enrol === 'manual') {
                    $enrol->enrol_user($instance, $user->id, $roleid);
                }
            }
        }
    }
}
?>