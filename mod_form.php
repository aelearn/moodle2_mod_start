<?php

// This file must be included from another file.
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');
}
 
// Get some needed libraries.
require_once($CFG->dirroot.'/course/moodleform_mod.php');
require_once($CFG->dirroot.'/mod/certificate/lib.php');
 
class mod_start_mod_form extends moodleform_mod
{
 
    public function definition()
    {
        $mform =& $this->_form;
 
        $this->standard_coursemodule_elements();
 
        $this->add_action_buttons();
    }
}
