# My-Wondercms-Medium-editor-
An addition to the medium editor plugin forWwonderCMS

To use this plugin, download and extract the zip file, put the folder 'mediumeditor_HA' in the plugins folder of your WonderCMS website. You now can use the medium editor. You should remove the original medium editor plugin from the plugin folder in order to prevent a conflict.

The next code goes in you're theme php file. if you don't do that, you will have only the standard options

```
<?php
	global $buttontb;
	$buttontb = '"h1", "h2", "h3", "h4", "h5", "h6", "bold", "italic", "underline", "white", "red", "green", "blue", "purple", "byellow", "bred", "anchor", "hr", "justifyLeft", "justifyCenter", "justifyRight", "justifyFull", "table", "subscript", "superscript", "quote", "imgleft", "imgright", "imgcenter", "removeFormat"';
?>
```

If you don't need all the buttons, you can remove the buttons you don't need.
