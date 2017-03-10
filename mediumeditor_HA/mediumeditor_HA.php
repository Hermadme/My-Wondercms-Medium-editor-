<?php
/**
 * MediumEditor plugin.
 *
 * It transforms all the editable areas into MediumEditor inline editor.
 *
 * @author  Yassine Addi <yassineaddi.dev@gmail.com>
 * @version 1.0.0
 */
defined('INC_ROOT') OR die('Direct access is not allowed.');

wCMS::addListener('js', 'loadMediumEditorJS');
wCMS::addListener('css', 'loadMediumEditorCSS');



function loadMediumEditorJS($args) {
	global $buttontb;
	if (isset($buttontb))
	{
	 	$buttontoolb = $buttontb;
	}
	else
	{
   		$buttontoolb = '"bold", "italic", "underline", "anchor", "h2", "h3", "quote"';
	}
	$args = [];
	array_push($args, '<script src="plugins/mediumeditor_HA/dist/js/medium-editor.min.js"></script>', '<script src="plugins/mediumeditor_HA/dist/js/medium-editor-tables.min.js"></script>', '<script src="plugins/mediumeditor_HA/dist/js/medium-button.min.js"></script>',

'<script>

var s=$("span.editable").clone();s.each(function(a,b){var c=s[a].id,d=s[a].outerHTML.replace(/span/,"div");$("span.editable#"+c).replaceWith(d)});

var editor = new MediumEditor(".editable", {

toolbar: {buttons: ['. $buttontoolb . '], },

anchor: {targetCheckbox: true,} ,

extensions: {
"bred":  new MediumButton({label:"<b>RED Marker</b>", start:"<span style=\"color: white; background-color: red\">", end:"</span>"}),
"byellow":  new MediumButton({label:"<b>YELLOW marker</b>", start:"<span style=\"background-color: yellow\">", end:"</span>"}),
"white":  new MediumButton({label:"<b>WHITE</b>", start:"<font color=\"white\">", end:"</font>"}),
"purple":  new MediumButton({label:"<b>PURPLE</b>", start:"<font color=\"purple\">", end:"</font>"}),
"green":  new MediumButton({label:"<b>GREEN</b>", start:"<font color=\"green\">", end:"</font>"}),
"blue":  new MediumButton({label:"<b>BLUE</b>", start:"<font color=\"blue\">", end:"</font>"}),
"red":  new MediumButton({label:"<b>RED</b>", start:"<font color=\"red\">", end:"</font>"}),
"hr":  new MediumButton({label:"<b>HR</b>", start:"<br><br>", end:"<hr>"}),
"imgleft":  new MediumButton({label:"<b>IMGL</b>", start:"<img src=\"", end:"\" alt=\"geen foto\" style=\"float: left;\">"}),
"imgright":  new MediumButton({label:"<b>IMGR</b>", start:"<img src=\"", end:"\" alt=\"geen foto\" style=\"float: right;\">"}),
"imgcenter":  new MediumButton({label:"<b>IMGC</b>", start:"<img src=\"", end:"\" alt=\"geen foto\" style=\"clear: both; display: block; margin-left: auto;  margin-right: auto\"><br>"}),

table: new MediumEditorTable()}}).subscribe("blur",function(d,e){$.post("",{fieldname:e.id,content:e.innerHTML})

});

</script>');

	$script = <<<'EOT'

<script>function nl2br(a){return(a+"").replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g,"$1<br>$2")}function fieldSave(a,b){$("#save").show(),$.post("",{fieldname:a,content:b},function(a){window.location.reload()})}var changing=!1;$(document).ready(function(){$('[data-toggle="tooltip"]').tooltip(),$("span.editText").click(function(){changing||(a=$(this),title=a.attr("title")?title='"'+a.attr("title")+'" ':"",a.hasClass("editable")?null:a.html("<textarea "+title+' id="'+a.attr("id")+'_field" onblur="fieldSave(a.attr(\'id\'),nl2br(this.value));">'+a.html().replace(/<br>/gi,"\n")+"</textarea>"),a.children(":first").focus(),autosize($("textarea")),changing=!0)})});</script>
EOT;
	array_push($args, $script);
	return $args;
}

function loadMediumEditorCSS($args) {
	array_push($args[0], '<link rel="stylesheet" href="plugins/mediumeditor_HA/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">', '<link rel="stylesheet" href="plugins/mediumeditor_HA/dist/css/medium-editor-tables.min.css" type="text/css" media="screen" charset="utf-8">', '<link rel="stylesheet" href="plugins/mediumeditor_HA/dist/css/themes/bootstrap.min.css" type="text/css" media="screen" charset="utf-8">', '<style>.medium-editor-toolbar-form a{border:none;}.medium-editor-toolbar-anchor-preview a{border:none;}</style>');
	return $args;
}

