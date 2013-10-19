Welcome to the header editor! Please type in the contents and click the save button.
<?php
$headercontents = elgg_get_plugin_setting('headercontents', 'header_editor');
    echo elgg_view('input/plaintext', array(

        'name'  => 'params[headercontents]',

        'value' => $headercontents,

    ));
?>