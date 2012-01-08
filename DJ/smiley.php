<script type="text/javascript" language="javascript">
/* <![CDATA[ */
    function grin(tag) {
    	var myField;
    	tag = ' ' + tag + ' ';
        if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
    		myField = document.getElementById('comment');
    	} else {
    		return false;
    	}
    	if (document.selection) {
    		myField.focus();
    		sel = document.selection.createRange();
    		sel.text = tag;
    		myField.focus();
    	}
    	else if (myField.selectionStart || myField.selectionStart == '0') {
    		var startPos = myField.selectionStart;
    		var endPos = myField.selectionEnd;
    		var cursorPos = endPos;
    		myField.value = myField.value.substring(0, startPos)
    					  + tag
    					  + myField.value.substring(endPos, myField.value.length);
    		cursorPos += tag.length;
    		myField.focus();
    		myField.selectionStart = cursorPos;
    		myField.selectionEnd = cursorPos;
    	}
    	else {
    		myField.value += tag;
    		myField.focus();
    	}
    }
/* ]]> */
</script>
<div id="smilies">
	<a href="javascript:grin(':?:')" title="疑问"><img src="http://liunian.info/img/smilies/icon_question.gif" alt="疑问" /></a>
	<a href="javascript:grin(':razz:')" title="调皮"><img src="http://liunian.info/img/smilies/icon_razz.gif" alt="调皮" /></a>
	<a href="javascript:grin(':sad:')" title="难过"><img src="http://liunian.info/img/smilies/icon_sad.gif" alt="难过" /></a>
	<a href="javascript:grin(':evil:')" title="抠鼻"><img src="http://liunian.info/img/smilies/icon_evil.gif" alt="抠鼻" /></a>
	<a href="javascript:grin(':!:')" title="惊叫"><img src="http://liunian.info/img/smilies/icon_exclaim.gif" alt="惊叫" /></a>
	<a href="javascript:grin(':smile:')" title="微笑"><img src="http://liunian.info/img/smilies/icon_smile.gif" alt="微笑" /></a>
	<a href="javascript:grin(':oops:')" title="可爱"><img src="http://liunian.info/img/smilies/icon_redface.gif" alt="可爱" /></a>
	<a href="javascript:grin(':grin:')" title="坏笑"><img src="http://liunian.info/img/smilies/icon_biggrin.gif" alt="坏笑" /></a>
	<a href="javascript:grin(':eek:')" title="惊讶"><img src="http://liunian.info/img/smilies/icon_surprised.gif" alt="惊讶" /></a>
	<a href="javascript:grin(':shock:')" title="吓"><img src="http://liunian.info/img/smilies/icon_eek.gif" alt="吓" /></a>
	<a href="javascript:grin(':???:')" title="撇嘴"><img src="http://liunian.info/img/smilies/icon_confused.gif" alt="撇嘴" /></a>
	<a href="javascript:grin(':cool:')" title="大兵"><img src="http://liunian.info/img/smilies/icon_cool.gif" alt="大兵" /></a>
	<a href="javascript:grin(':lol:')" title="偷笑"><img src="http://liunian.info/img/smilies/icon_lol.gif" alt="偷笑" /></a>
	<a href="javascript:grin(':mad:')" title="咒骂"><img src="http://liunian.info/img/smilies/icon_mad.gif" alt="咒骂" /></a>
	<a href="javascript:grin(':twisted:')" title="发怒"><img src="http://liunian.info/img/smilies/icon_twisted.gif" alt="发怒" /></a>
	<a href="javascript:grin(':roll:')" title="白眼"><img src="http://liunian.info/img/smilies/icon_rolleyes.gif" alt="白眼" /></a>
	<a href="javascript:grin(':wink:')" title="鼓掌"><img src="http://liunian.info/img/smilies/icon_wink.gif" alt="鼓掌" /></a>
	<a href="javascript:grin(':idea:')" title="酷"><img src="http://liunian.info/img/smilies/icon_idea.gif" alt="酷" /></a>
	<a href="javascript:grin(':arrow:')" title="擦汗"><img src="http://liunian.info/img/smilies/icon_arrow.gif" alt="擦汗" /></a>
	<a href="javascript:grin(':neutral:')" title="亲亲"><img src="http://liunian.info/img/smilies/icon_neutral.gif" alt="亲亲" /></a>
	<a href="javascript:grin(':cry:')" title="大哭"><img src="http://liunian.info/img/smilies/icon_cry.gif" alt="大哭" /></a>
<a href="javascript:grin(':mrgreen:')" title="呲牙"><img src="http://liunian.info/img/smilies/icon_mrgreen.gif" alt="呲牙" /></a>
</div>