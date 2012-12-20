<?php

// Get the necessary files.
require_once('../../config.php');
require_once('lib.php');
 
// Get the course module ID.
$id = required_param('id', PARAM_INT);
 
// Get the course module.
if (!$cm = get_coursemodule_from_id('start', $id)) {
    print_error('Course Module ID was incorrect');
}

// Get the course.
if (!$course = $DB->get_record('course', array('id'=> $cm->course))) {
    print_error('course is misconfigured');
}

// Get the number of sections in the course.
$sections = unserialize($course->sectioncache);
$numsections = count($sections);

// Loop through the sections.
for ($i = 1; $i < $numsections; $i++) {

    // Get the course modules in this section.
    $sequence = $DB->get_records('course_sections', array(
        'course' => $course->id,
        'section' => $i,
    ), null, 'sequence');
    $sequence = array_pop($sequence);
    $modules = explode(',', $sequence->sequence);

    // Loop through the course modules.
    for ($j = 0; $j < count($modules); $j++) {

        // Get the course module.
        $coursemoduleid = (int)$modules[$j];
        if ($coursemoduleid) {
            $coursemodule = $DB->get_records('course_modules',
                    array('id' => $coursemoduleid), null, 'module,visible');
            $coursemodule = array_pop($coursemodule);

            // Check if the course module is visible.
            if (is_object($coursemodule) && '1' === $coursemodule->visible) {

                // Get the module.
                $module = $DB->get_records('modules',
                        array('id' => $coursemodule->module), null, 'name');
                $module = array_pop($module);
                
                redirect($CFG->wwwroot . '/mod/' . $module->name
                        . '/view.php?id=' . $coursemoduleid);
            }
        }
    }
}

redirect($CFG->wwwroot . '/course/view.php?id=' . $course->id);
