<h1>신용등급 조회</h1>

<table class="pure-table">
    <thead>
        <tr>
			<th>#</th>
            <th>아이디</th>
            <th>이름</th>
            <th>이메일</th>
            <th>보유자산</th>
            <th>신용등급</th>
        </tr>
    </thead>
    <tbody>
<?php
		foreach($user_list as $row) {
?>
        <tr>
			<td><?php echo $row['mb_no']; ?></td>
            <td><?php echo $row['mb_id']; ?></td>
            <td><?php echo $row['mb_name']; ?></td>
            <td><?php echo $row['mb_email']; ?></td>
            <td><?php echo number_format($row['mb_point']); ?></td>
            <td><?php echo 10 - round(($row['mb_point'] / ($asset_avg + $row['mb_point'])) * 9); ?></td>
        </tr>
<?php
		}
?>
    </tbody>
</table>

<p>거래처의 신용등급 변동 시 기입하신 연락처로 안내를 받을 수 있습니다.</p>

<p><a href="<?php echo base_url(); ?>">돌아가기</a></p>
