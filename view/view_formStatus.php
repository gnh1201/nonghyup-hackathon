<h1>스마트 컨트랙트 신뢰투자 with NH (농산물 재배온도 <?php echo $it_exists ? "조회" : "입력"; ?>)</h1>

<form id="formStatus" class="pure-form" method="post">
    <fieldset>
        <legend>상세 재배정보 <?php echo $it_exists ? "조회" : "입력"; ?></legend>

        <div class="hidden">
			<input type="hidden" name="route" value="updateStatus"/>
			<input type="hidden" name="action" value="update"/>
        </div>

        <h2>펀드상품 선택</h2>
        <table class="pure-table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">펀드상품</th>
					<th scope="col">단위가격</th>
					<th scope="col">모집</th>
					<th scope="col">모집금액</th>
					<th scope="col">날짜</th>
				</tr>
			</thead>
			<tbody>
<?php
				foreach($item_list as $row) {
?>
				<tr>
					<td scope="col">
						<input type="radio" name="it_id" value="<?php echo $row['it_id']; ?>"<?php echo ($row['it_id'] == $it_id) ? 'checked="checked"' : ''; ?>/>
					</td>
					<td><?php echo $row['it_name']; ?></td>
					<td><?php echo number_format($row['it_price']); ?>원</td>
					<td><?php echo $row['it_sum_qty']; ?>명</td>
					<td><?php echo number_format($row['it_price'] * $row['it_sum_qty']); ?>원</td>
					<td><?php echo $row['it_time']; ?></td>
				</tr>
<?php
				}
?>
			</tbody>
        </table>
        
<?php
		if(!empty($it_id)) {
?>

		<h2>재배 온도표</h2>
		<table class="pure-table">
			<thead>
				<tr>
					<th>Q#</th>
					<th>현황</th>
					<th>Day 1</th>
					<th>Day 2</th>
					<th>Day 3</th>
					<th>Day 4</th>
					<th>Day 5</th>
					<th>Day 6</th>
					<th>Day 7</th>
					<th>Day 8</th>
					<th>Day 9</th>
					<th>Day 10</th>
					<th>판매금</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td>Q1(n)</td>
					<td><input type="text" class="text" name="status_matrix[q1][0]" value="<?php echo $status_matrix['q1'][0]; ?>" readonly="readonly"/></td>
					<td><input type="text" class="text text_q1" name="status_matrix[q1][1]" value="<?php echo $status_matrix['q1'][1]; ?>" /></td>
					<td><input type="text" class="text text_q1" name="status_matrix[q1][2]" value="<?php echo $status_matrix['q1'][2]; ?>"/></td>
					<td><input type="text" class="text text_q1" name="status_matrix[q1][3]" value="<?php echo $status_matrix['q1'][3]; ?>"/></td>
					<td><input type="text" class="text text_q1" name="status_matrix[q1][4]" value="<?php echo $status_matrix['q1'][4]; ?>"/></td>
					<td><input type="text" class="text text_q1" name="status_matrix[q1][5]" value="<?php echo $status_matrix['q1'][5]; ?>"/></td>
					<td><input type="text" class="text text_q1" name="status_matrix[q1][6]" value="<?php echo $status_matrix['q1'][6]; ?>"/></td>
					<td><input type="text" class="text text_q1" name="status_matrix[q1][7]" value="<?php echo $status_matrix['q1'][7]; ?>"/></td>
					<td><input type="text" class="text text_q1" name="status_matrix[q1][8]" value="<?php echo $status_matrix['q1'][8]; ?>"/></td>
					<td><input type="text" class="text text_q1" name="status_matrix[q1][9]" value="<?php echo $status_matrix['q1'][9]; ?>"/></td>
					<td><input type="text" class="text text_q1" name="status_matrix[q1][10]" value="<?php echo $status_matrix['q1'][10]; ?>"/></td>
					<td><input type="text" class="text text_q1" name="status_matrix[q1][11]" value="<?php echo $status_matrix['q1'][11]; ?>"/></td>
				</tr>
				<tr>
					<td>Q2(d)</td>
					<td><input type="text" class="text" name="status_matrix[q2][0]" value="<?php echo $status_matrix['q2'][0]; ?>" readonly="readonly"/></td>
					<td><input type="text" class="text text_q2" name="status_matrix[q2][1]" value="<?php echo $status_matrix['q2'][1]; ?>"/></td>
					<td><input type="text" class="text text_q2" name="status_matrix[q2][2]" value="<?php echo $status_matrix['q2'][2]; ?>"/></td>
					<td><input type="text" class="text text_q2" name="status_matrix[q2][3]" value="<?php echo $status_matrix['q2'][3]; ?>"/></td>
					<td><input type="text" class="text text_q2" name="status_matrix[q2][4]" value="<?php echo $status_matrix['q2'][4]; ?>"/></td>
					<td><input type="text" class="text text_q2" name="status_matrix[q2][5]" value="<?php echo $status_matrix['q2'][5]; ?>"/></td>
					<td><input type="text" class="text text_q2" name="status_matrix[q2][6]" value="<?php echo $status_matrix['q2'][6]; ?>"/></td>
					<td><input type="text" class="text text_q2" name="status_matrix[q2][7]" value="<?php echo $status_matrix['q2'][7]; ?>"/></td>
					<td><input type="text" class="text text_q2" name="status_matrix[q2][8]" value="<?php echo $status_matrix['q2'][8]; ?>"/></td>
					<td><input type="text" class="text text_q2" name="status_matrix[q2][9]" value="<?php echo $status_matrix['q2'][9]; ?>"/></td>
					<td><input type="text" class="text text_q2" name="status_matrix[q2][10]" value="<?php echo $status_matrix['q2'][10]; ?>"/></td>
					<td><input type="text" class="text text_q2" name="status_matrix[q2][11]" value="<?php echo $status_matrix['q2'][11]; ?>"/></td>
				</tr>
				<tr>
					<td>Q3(d)</td>
					<td><input type="text" class="text" name="status_matrix[q3][0]" value="<?php echo $status_matrix['q3'][0]; ?>" readonly="readonly"/></td>
					<td><input type="text" class="text text_q3" name="status_matrix[q3][1]" value="<?php echo $status_matrix['q3'][1]; ?>"/></td>
					<td><input type="text" class="text text_q3" name="status_matrix[q3][2]" value="<?php echo $status_matrix['q3'][2]; ?>"/></td>
					<td><input type="text" class="text text_q3" name="status_matrix[q3][3]" value="<?php echo $status_matrix['q3'][3]; ?>"/></td>
					<td><input type="text" class="text text_q3" name="status_matrix[q3][4]" value="<?php echo $status_matrix['q3'][4]; ?>"/></td>
					<td><input type="text" class="text text_q3" name="status_matrix[q3][5]" value="<?php echo $status_matrix['q3'][5]; ?>"/></td>
					<td><input type="text" class="text text_q3" name="status_matrix[q3][6]" value="<?php echo $status_matrix['q3'][6]; ?>"/></td>
					<td><input type="text" class="text text_q3" name="status_matrix[q3][7]" value="<?php echo $status_matrix['q3'][7]; ?>"/></td>
					<td><input type="text" class="text text_q3" name="status_matrix[q3][8]" value="<?php echo $status_matrix['q3'][8]; ?>"/></td>
					<td><input type="text" class="text text_q3" name="status_matrix[q3][9]" value="<?php echo $status_matrix['q3'][9]; ?>"/></td>
					<td><input type="text" class="text text_q3" name="status_matrix[q3][10]" value="<?php echo $status_matrix['q3'][10]; ?>"/></td>
					<td><input type="text" class="text text_q3" name="status_matrix[q3][11]" value="<?php echo $status_matrix['q3'][11]; ?>"/></td>
				</tr>
				<tr>
					<td>Q4(n)</td>
					<td><input type="text" class="text" name="status_matrix[q4][0]" value="<?php echo $status_matrix['q4'][0]; ?>" readonly="readonly"/></td>
					<td><input type="text" class="text text_q4" name="status_matrix[q4][1]" value="<?php echo $status_matrix['q4'][1]; ?>"/></td>
					<td><input type="text" class="text text_q4" name="status_matrix[q4][2]" value="<?php echo $status_matrix['q4'][2]; ?>"/></td>
					<td><input type="text" class="text text_q4" name="status_matrix[q4][3]" value="<?php echo $status_matrix['q4'][3]; ?>"/></td>
					<td><input type="text" class="text text_q4" name="status_matrix[q4][4]" value="<?php echo $status_matrix['q4'][4]; ?>"/></td>
					<td><input type="text" class="text text_q4" name="status_matrix[q4][5]" value="<?php echo $status_matrix['q4'][5]; ?>"/></td>
					<td><input type="text" class="text text_q4" name="status_matrix[q4][6]" value="<?php echo $status_matrix['q4'][6]; ?>"/></td>
					<td><input type="text" class="text text_q4" name="status_matrix[q4][7]" value="<?php echo $status_matrix['q4'][7]; ?>"/></td>
					<td><input type="text" class="text text_q4" name="status_matrix[q4][8]" value="<?php echo $status_matrix['q4'][8]; ?>"/></td>
					<td><input type="text" class="text text_q4" name="status_matrix[q4][9]" value="<?php echo $status_matrix['q4'][9]; ?>"/></td>
					<td><input type="text" class="text text_q4" name="status_matrix[q4][10]" value="<?php echo $status_matrix['q4'][10]; ?>"/></td>
					<td><input type="text" class="text text_q4" name="status_matrix[q4][11]" value="<?php echo $status_matrix['q4'][11]; ?>"/></td>
				</tr>
				<tr>
					<td>판매금액</td>
					<td><input type="text" class="text status_matrix init_amt" name="status_matrix[amt][0]" value="<?php echo $status_matrix['amt'][0]; ?>" style="visibility: hidden;" readonly="readonly"/></td>
					<td><input type="text" class="text status_matrix text_amt" name="status_matrix[amt][1]" value="<?php echo $status_matrix['amt'][1]; ?>" readonly="readonly"/></td>
					<td><input type="text" class="text status_matrix text_amt" name="status_matrix[amt][2]" value="<?php echo $status_matrix['amt'][2]; ?>" readonly="readonly"/></td>
					<td><input type="text" class="text status_matrix text_amt" name="status_matrix[amt][3]" value="<?php echo $status_matrix['amt'][3]; ?>" readonly="readonly"/></td>
					<td><input type="text" class="text status_matrix text_amt" name="status_matrix[amt][4]" value="<?php echo $status_matrix['amt'][4]; ?>" readonly="readonly"/></td>
					<td><input type="text" class="text status_matrix text_amt" name="status_matrix[amt][5]" value="<?php echo $status_matrix['amt'][5]; ?>" readonly="readonly"/></td>
					<td><input type="text" class="text status_matrix text_amt" name="status_matrix[amt][6]" value="<?php echo $status_matrix['amt'][6]; ?>" readonly="readonly"/></td>
					<td><input type="text" class="text status_matrix text_amt" name="status_matrix[amt][7]" value="<?php echo $status_matrix['amt'][7]; ?>" readonly="readonly"/></td>
					<td><input type="text" class="text status_matrix text_amt" name="status_matrix[amt][8]" value="<?php echo $status_matrix['amt'][8]; ?>" readonly="readonly"/></td>
					<td><input type="text" class="text status_matrix text_amt" name="status_matrix[amt][9]" value="<?php echo $status_matrix['amt'][9]; ?>" readonly="readonly"/></td>
					<td><input type="text" class="text status_matrix text_amt" name="status_matrix[amt][10]" value="<?php echo $status_matrix['amt'][10]; ?>" readonly="readonly"/></td>
					<td><input type="text" class="text status_matrix text_amt" name="status_matrix[amt][11]" value="<?php echo $status_matrix['amt'][11]; ?>" id="amt"/></td>
				</tr>
			</tbody>
		</table>

		<h2>체결/수익지급</h2>
		<table class="pure-table">
			<thead>
				<tr>
					<th>구분</th>
					<th>현황</th>
					<th>Day 1</th>
					<th>Day 2</th>
					<th>Day 3</th>
					<th>Day 4</th>
					<th>Day 5</th>
					<th>Day 6</th>
					<th>Day 7</th>
					<th>Day 8</th>
					<th>Day 9</th>
					<th>Day 10</th>
					<th>수익금</th>
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<td>생산자계좌</td>
					<td><input type="text" class="text text2" name="status_matrix[p1][0]" value="<?php echo $status_matrix['p1'][0]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p1][1]" value="<?php echo $status_matrix['p1'][1]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p1][2]" value="<?php echo $status_matrix['p1'][2]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p1][3]" value="<?php echo $status_matrix['p1'][3]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p1][4]" value="<?php echo $status_matrix['p1'][4]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p1][5]" value="<?php echo $status_matrix['p1'][5]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p1][6]" value="<?php echo $status_matrix['p1'][6]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p1][7]" value="<?php echo $status_matrix['p1'][7]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p1][8]" value="<?php echo $status_matrix['p1'][8]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p1][9]" value="<?php echo $status_matrix['p1'][9]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p1][10]" value="<?php echo $status_matrix['p1'][10]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p1][11]" value="<?php echo $status_matrix['p1'][11]; ?>"/></td>
				</tr>
				<tr>
					<td>스마트계좌</td>
					<td><input type="text" class="text text2" name="status_matrix[p2][0]" value="<?php echo $status_matrix['p2'][0]; ?>" id="standard_balance"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p2][1]" value="<?php echo $status_matrix['p2'][1]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p2][2]" value="<?php echo $status_matrix['p2'][2]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p2][3]" value="<?php echo $status_matrix['p2'][3]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p2][4]" value="<?php echo $status_matrix['p2'][4]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p2][5]" value="<?php echo $status_matrix['p2'][5]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p2][6]" value="<?php echo $status_matrix['p2'][6]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p2][7]" value="<?php echo $status_matrix['p2'][7]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p2][8]" value="<?php echo $status_matrix['p2'][8]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p2][9]" value="<?php echo $status_matrix['p2'][9]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p2][10]" value="<?php echo $status_matrix['p2'][10]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p2][11]" value="<?php echo $status_matrix['p2'][11]; ?>"/></td>
				</tr>
				<tr>
					<td>투자자계좌</td>
					<td><input type="text" class="text text2" name="status_matrix[p3][0]" value="<?php echo $status_matrix['p3'][0]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p3][1]" value="<?php echo $status_matrix['p3'][1]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p3][2]" value="<?php echo $status_matrix['p3'][2]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p3][3]" value="<?php echo $status_matrix['p3'][3]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p3][4]" value="<?php echo $status_matrix['p3'][4]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p3][5]" value="<?php echo $status_matrix['p3'][5]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p3][6]" value="<?php echo $status_matrix['p3'][6]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p3][7]" value="<?php echo $status_matrix['p3'][7]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p3][8]" value="<?php echo $status_matrix['p3'][8]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p3][9]" value="<?php echo $status_matrix['p3'][9]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p3][10]" value="<?php echo $status_matrix['p3'][10]; ?>"/></td>
					<td><input type="text" class="text text2" name="status_matrix[p3][11]" value="<?php echo $status_matrix['p3'][11]; ?>" id="completed_price"/></td>
				</tr>
				<tr>
					<td>체결/지급</td>
					<td></td>
					<td><button type="button" class="pure-button" onclick="fund_pay(1);">체결</button></td>
					<td><button type="button" class="pure-button" onclick="fund_pay(2);">체결</button></td>
					<td><button type="button" class="pure-button" onclick="fund_pay(3);">체결</button></td>
					<td><button type="button" class="pure-button" onclick="fund_pay(4);">체결</button></td>
					<td><button type="button" class="pure-button" onclick="fund_pay(5);">체결</button></td>
					<td><button type="button" class="pure-button" onclick="fund_pay(6);">체결</button></td>
					<td><button type="button" class="pure-button" onclick="fund_pay(7);">체결</button></td>
					<td><button type="button" class="pure-button" onclick="fund_pay(8);">체결</button></td>
					<td><button type="button" class="pure-button" onclick="fund_pay(9);">체결</button></td>
					<td><button type="button" class="pure-button" onclick="fund_pay(10);">체결</button></td>
					<td><button type="button" class="pure-button pure-button-primary" onclick="fund_pay(0);">지급</button></td>
				</tr>
			</tbody>
		</table>

<?php
		if(!$it_exists) {
?>

		<div class="pure-controls area_buttons">
			<button type="submit" class="pure-button pure-button-primary">반영</button>
		</div>
<?php
		}
?>

<?php
		} else {
?>
		<p>상품을 선택해주세요</p>
<?php
		}
?>
	</fieldset>
</form>

<script type="text/javascript">
var base_url = "<?php echo base_url(); ?>";
var it_id = "<?php echo $it_id; ?>";
var contracted = "<?php echo $contracted; ?>";

$(document).ready(function() {
	$("input[name='it_id']").click(function() {
		window.location.href = "/api/?route=formStatus&it_id=" + $(this).val();
	});

	var check_amt = function() {
		var standard_balance = parseInt($("#standard_balance").val());
		var current_price = parseInt($("#amt").val());
		var completed_price = current_price - standard_balance;
		if(completed_price >= 0) {
			$("#completed_price").val(completed_price);
			$("#completed_price").css({
				"background-color": "#00ff00",
				"color": "#000"
			});
		} else {
			$("#completed_price").val(0);
			$("#completed_price").css({
				"background-color": "#ff0000",
				"color": "#fff"
			});
		}
	};

	$("#amt").keyup(function() {
		check_amt();
	});
	check_amt();
	
	// 15 16 17 => +1원 (Q1, Q4)
	// 18 19 20 => +1원 (Q2, Q3)
	// 그 외 => -1원
	$("input.text_q1, input.text_q4").each(function() {
		var current_value = parseInt($(this).val());
		if(!(current_value >= 15 && current_value <= 17)) {
			$(this).css({
				"background-color": "#ff0000",
				"color": "#fff"
			});
		}
	});
	$("input.text_q2, input.text_q3").each(function() {
		var current_value = parseInt($(this).val());
		if(!(current_value >= 18 && current_value <= 20)) {
			$(this).css({
				"background-color": "#ff0000",
				"color": "#fff"
			});
		}
	});	

	// 결제와 컨트랙트 완료 메시지
	if(contracted != "") {
		alert("요청하신 결제 및 컨트랙트가 완료되었습니다.");
	}
});

function fund_pay(num) {
	var amount = 0;

	if(num > 0) {
		var p1_amount = parseInt($("input[name='status_matrix[p1][" + num + "]'").val());
		var p1_amount_prev = parseInt($("input[name='status_matrix[p1][" + (num - 1) + "]'").val());
		if(p1_amount > p1_amount_prev) {
			amount = p1_amount - p1_amount_prev;
		}
	} else {
		amount = parseInt($("#completed_price").val());
	}

	if(amount > 0) {
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: base_url,
			data: {
				"route": "nhapi",
				"action": "deposit",
				"amount": amount
			},
			success: function(req) {
				if(req.success == true) {
					fund_contract(num);
				} else {
					alert("문제가 발생했습니다. 관리자에게 문의하세요.");
				}
			}
		});
	} else {
		alert("지급할 금액이 없습니다.");
	}
}

function fund_contract(num) {
	var amount = parseInt($("#completed_price").val());
	var subject = "펀드 수익금 지급";
	var content = "수익금=" + amount + ",펀드번호=" + it_id;

	if(num > 0) {
		var p1_amount = parseInt($("input[name='status_matrix[p1][" + num + "]'").val());
		var p1_amount_prev = parseInt($("input[name='status_matrix[p1][" + (num - 1) + "]'").val());
		var p2_amount = $("input[name='status_matrix[p2][" + num + "]'").val();
		var p3_amount = $("input[name='status_matrix[p3][" + num + "]'").val();
		
		if(p1_amount > p1_amount_prev) {
			amount = p1_amount - p1_amount_prev;
		}

		subject = "Day " + num + " 투자 체결";
		content = "체결금액=" + amount + ",생산자계좌=" + p1_amount + ",스마트계좌=" + p2_amount + ",투자자계좌=" + p3_amount + ",펀드번호=" + it_id;
	}

	window.location.href = base_url + "?" + $.param({
		"route": "ethsol",
		"subject": subject,
		"content": content,
		"amount": amount,
		"redirect_uri": window.location.href + "&contracted=" + num + "&amount=" + amount
	});
}
</script>
