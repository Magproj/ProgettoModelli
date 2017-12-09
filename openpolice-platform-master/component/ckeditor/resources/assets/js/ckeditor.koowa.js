/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

if(!Koowa) var Koowa = {};

Koowa.Controller.Form = new Class({

    Extends: Koowa.Controller,

    _action_default: function(action, data, novalidate){
        if(!novalidate && !this.fireEvent('validate')) {
            return false;
        }

        // Don't validate if novalidate is set
        if(!novalidate){
            // Loop through all the editor intances
            // See: http://ckeditor.com/forums/CKEditor-3.x/Getting-CKEDITOR-instance
            for(var i in CKEDITOR.instances) {

                element = document.getElementById(CKEDITOR.instances[i].name);

                // If any instance is empty then abort the save action
                if(!CKEDITOR.instances[i].getData() && element.classList.contains('ckeditor-required')) {
                    return false;
                }
            }
        }

        this.form.adopt(new Element('input', {name: '_action', type: 'hidden', value: action}));
        this.form.submit();
    }
});
