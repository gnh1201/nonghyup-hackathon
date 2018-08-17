<h1>스마트 컨트랙트 투자 체결</h1>

<form id="formContract" class="pure-form pure-form-aligned" method="post">
	<fieldset>
		<legend>스마트 컨트랙트 체결</legend>
		
		<div class="hidden">
			<input type="hidden" name="route" value="ethsol">
			<input type="hidden" name="subject" value="스마트 컨트랙트 투자 체결">
			<input type="hidden" name="content" value="">
			<input type="hidden" name="amount" value="1">
			<input type="hidden" name="redirect_uri" value="">
		</div>

		<div class="pure-control-group">
			<label for="b1">투자자</label>
			<input type="text" name="b1" id="b1" value="<?php echo $b1; ?>">
		</div>

		<div class="pure-control-group">
			<label for="b2">생산자</label>
			<input type="text" name="b2" id="b2" value="<?php echo $b2; ?>">
		</div>
		
		<div class="pure-control-group">
			<label for="b3">투자기간</label>
			<input type="text" name="b3" id="b3" value="<?php echo $b3; ?>">
		</div>

		<div class="pure-control-group">
			<label for="b4">송금주기</label>
			<input type="text" name="b4" id="b4" value="<?php echo $b4; ?>">
		</div>
		
		<div class="pure-control-group">
			<label for="b5">손익배분비율</label>
			<input type="text" name="b5" id="b5" value="<?php echo $b5; ?>">
		</div>
		
		<div class="pure-control-group">
			<label for="b6">손실하한선</label>
			<input type="text" name="b6" id="b6" value="<?php echo $b6; ?>">
		</div>

		<div class="pure-controls">
			<button type="submit" class="pure-button pure-button-primary">체결</button>
		</div>
	</fieldset>
</form>

<p>JKS Company.</p>

<script type="text/javascript">
$(document).ready(function() {
	$("#formContract").submit(function() {
		var objContent = $(this).find("input[name='content']");
		var b1 = $("#b1").val();
		var b2 = $("#b2").val();
		var b3 = $("#b3").val();
		var b4 = $("#b4").val();
		var b5 = $("#b5").val();
		var b6 = $("#b6").val();

		var newContent = "투자자="+b1+",생산자="+b2+",투자기간="+b3+",송금주기="+b4+",손익배분비율="+b5+",손실하한선="+b6;
		objContent.val(newContent);

		var objRedirectUri = $(this).find("input[name='redirect_uri']");
		objRedirectUri.val(window.location.href);
	});
});
</script>
