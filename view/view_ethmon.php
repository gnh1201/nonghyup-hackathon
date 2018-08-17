<html lang="ko">
<head>
<meta charset="UTF-8">
<title>스마트 컨트랙트 모니터링 도구</title>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ethsol/bignumber.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ethsol/crypto-js.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ethsol/utf8.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ethsol/web3.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/purecss/pure-min.css"></script>
<style>
	html, body { margin: 0; padding: 0; }
	#container { margin: 20px; }
	#contract_buttons { margin: 20px 0; }
	#list { margin: 20px 0; }
</style>
<script>
    var web3 = new Web3();
    var provider = new web3.providers.HttpProvider("http://192.168.8.100:8545");
    web3.setProvider(provider);
    web3.eth.defaultAccount = web3.eth.accounts[0];
    var stop = false;
    // 감시 개시
    function startMonitor() {
        stop = false;
        //20건 전 블록부터 참조
        var startBlockNo = web3.eth.blockNumber - 20;
        var table = document.getElementById('list');
        var i = startBlockNo;
        for (; i < web3.eth.blockNumber; i++) {
            var result = web3.eth.getBlock(i);
            insertBlockRow(result, table, i);
        }
        setTimeout(function() {
            watchBlock(table, i);
        }, 10000);
    }
    // 블록 감시
    function watchBlock(table, blockNumber) {
        if (stop) {
            return;
        }

        if (blockNumber == web3.eth.blockNumber) {
            setTimeout(function() {watchBlock(table, blockNumber);}, 10000);
            return;
        }
        var result = web3.eth.getBlock(blockNumber);
        insertBlockRow(result, table, blockNumber);
        setTimeout(function() {watchBlock(table, ++blockNumber);}, 10000);
    }
    // 행 추가 블록 정보 편집
    function insertBlockRow(result, table) {
        var row = table.insertRow();
        var td = row.insertCell(0);
        td.innerHTML = result.number;
        var td = row.insertCell(1);
        td.innerHTML = new Date(parseInt(result.timestamp, 16) * 1000).toString();
        var td = row.insertCell(2);
        td.innerHTML = result.hash;
        var td = row.insertCell(3);
        td.innerHTML = result.nonce;
        var td = row.insertCell(4);
        if (result.transactions.length > 0) {
            insertTranRow(result.transactions, td);
        }
    }
    // 행 추가 트랜잭션 정보 편집
    function insertTranRow(transactions, td) {
        var allData = "";
        for (var i = 0; i < transactions.length; i++) {
            var data = web3.eth.getTransaction(transactions[i]);
            allData += JSON.stringify(data);
        }
        td.innerHTML = "<input type='text' value='" + allData + "' /></td>";
    }
    // 정지
    function stopWatch() {
        stop = true;
    }
</script>
</head>
<body>
	<div id="container">
		<h1>JKS Company 스마트 컨트랙트 모니터링</h1>

		<div id="contract_buttons">
			<button type="button" class="pure-button pure-button-primary" onclick="startMonitor();">시작</button>
			<button type="button" class="pure-button" onclick="stopWatch();">중단</button>
		</div>

		<table id="list" class="pure-table">
			<tr>
				<th>Block#</th>
				<th>Timestamp</th>
				<th>BlockHash</th>
				<th>Nonce</th>
				<th>Transaction</th>
			</tr>
		</table>
	</div>
</body>
<!-- 

{"blockHash":"0xfcfa6f73dffcc5ccbde32d3fcef4e8273b759c870baf4e2ac6bc1fff7194857d",
"blockNumber":7770,"from":"0xa4497368d0f4d20a4370c399d496a0048f25d52e",
"gas":90000,"gasPrice":"20000000000","hash":"0x541d49d2e9cee8729f8d3fe6bed3ae1b6693ea534f647a40defc8cb19813970f",
"input":"0xa4136862000000000000000000000000000000000000000000000000000000000000002000000000000000000000000000000000000000000000000000000000000000046466646600000000000000000000000000000000000000000000000000000000",
"nonce":72,"to":"0x9a45d91bda104b5914990d2c87d81ec1797ac996","transactionIndex":0,"value":"0",
"v":"0x1b","r":"0xf89b100266f77f211322dc081aed284a4d86889b0374b5a2d6dae9cd87d7c91c",
"s":"0x6e5e79abe6c979fd49d0f5b7faf30f5ca69eb85d5f82a99df20d0dbb9c999b6"}

-->
</html>
