<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Defines the form for creating an instance of slideshow
 *
 * @package    mod
 * @subpackage standardslideshow
 * @copyright  2010 onwards Mark Johnson  {@link http://barrenfrozenwasteland.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

require_once ($CFG->dirroot.'/course/moodleform_mod.php');

class mod_standardslideshow_mod_form extends moodleform_mod {

    function definition() {
        global $CFG;

        $mform = $this->_form;

        $mform->addElement('header', 'settings');
        $mform->addElement('text', 'name', get_string('name'));
        $mform->addElement('text', 'width', get_string('width', 'standardslideshow'));
        $mform->addElement('text', 'height', get_string('height', 'standardslideshow'));
        $mform->setType('width', PARAM_INT);
        $mform->setType('height', PARAM_INT);
        $mform->setDefault('width', 640);
        $mform->setDefault('height', 480);

        $list = scandir($CFG->dirroot.'/mod/standardslideshow/s5/ui');
        $themes = array();
        foreach($list as $filename) {
            if (substr($filename, 0, 1) != '.') {
                $themes[$filename] = $filename;
            }
        }        
        $mform->addElement('select', 'theme', get_string('selecttheme', 'standardslideshow'), $themes);

        
        $this->standard_coursemodule_elements();

//-------------------------------------------------------------------------------
// buttons
        $this->add_action_buttons(true, false, null);

    }
}