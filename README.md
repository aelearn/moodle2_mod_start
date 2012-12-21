moodle2_mod_start
=================

Installation
------------

1. Clone the repostiory to: <strong>`<moodle_path>/mod/start`</strong>
2. Go to the Notifications link in Moodle after logging in as an admin.

Usage
-----

Simply add this activity module to a course to use it. It is best to place only
one instance in the very first section (section 0) of each course. When a
student clicks the module it will link to the first visible module starting at
the second section (section 1) in the course. If there are no visible modules
then it just links back to the course. Modules in the very first section are
ignored.
