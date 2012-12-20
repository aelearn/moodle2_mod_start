<?php

// Get the necessary files.
require_once('../../config.php');
require_once('lib.php');
 
// Get the course module ID.
$id = required_param('id', PARAM_INT);
 
// Get the course module.
if (!$cm = get_coursemodule_from_id('certificate', $id)) {
    print_error('Course Module ID was incorrect');
}

// Get the course.
if (!$course = $DB->get_record('course', array('id'=> $cm->course))) {
    print_error('course is misconfigured');
}
