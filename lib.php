<?php

function start_add_instance($start) {
    global $DB;

    // Try to store it in the database.
    $start->id = $DB->insert_record('start', $start);

    return $start->id;
}

function start_update_instance($start) {
    global $DB;

    // Get the start.
    $oldstart = $DB->get_record('start', array('id' => $start->instance));

    // Update the title.
    $oldstart->name = $start->name;

    // Save the record.
    $DB->update_record('start', $oldstart);

    return true;
}

function start_delete_instance($id) {
    global $DB;

    // Delete the instance.
    $DB->delete_records('start', array('id' => $id));

    return true;
}
