<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>스마트 컨트랙트 체결 프로세스</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ethsol/bignumber.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ethsol/crypto-js.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ethsol/utf8.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ethsol/web3.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/purecss/pure-min.css"></script>
<style>
	#container { width: 900px; margin: 20px auto; }
</style>
<script>
    // 완료 후 이동할 주소
    var redirect_uri = "<?php echo $redirect_uri; ?>";

    // 연결할 JSON-RPC서버(가상 머신)의 IP 주소 및 포트 번호
    var url = "http://192.168.8.100:8545";
    var contractAddress = "0x7b3dc30cad98ef05a3c63560369ca83076ddbd4b";
    var user_name;
    var web3 = new Web3();
    var provider = new web3.providers.HttpProvider(url)
    web3.setProvider(provider);
    web3.eth.defaultAccount = web3.eth.accounts[0];
    var ABI = [{
		"constant": false,
		"inputs": [{
				"name": "_Fund_name",
				"type": "string"
			}],
		"name": "setFund_name",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [{
				"name": "_Investor",
				"type": "string"
			}],
		"name": "setInvestor",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [{
				"name": "_Payment",
				"type": "uint32"
			}],
		"name": "setPayment",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "getFund_name",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
    {
		"constant": true,
		"inputs": [],
		"name": "getInvestor",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
    {
		"constant": true,
		"inputs": [],
		"name": "getPayment",
		"outputs": [
			{
				"name": "",
				"type": "uint32"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	}];

    var framFundContract = web3.eth.contract(ABI).at(contractAddress);

    // 로그인(Unlock)
    function login() {
        user_name = $("#userName").val();

        var password = $("#password").val();
        alert("account : " + user_name + " passwd : " + password);
        var JSONdata = createJSONdata("personal_unlockAccount", [user_name, password, 30]);
        alert("json ok");
        executeJsonRpc(url, JSONdata, function success(data) {
            alert("IN" + data);
            // 로그인 성공
            if (data.error == null) {
                alert("success");
                console.log("login success!");
            } else {
                // 로그인 실패
                alert("false");
                console.log("login error");
            }

            init();
        }, function error(data) {
            // 로그인 실패
            alert("false1");
            console.log("login error");
        });
    }

    // 초기화
    function init() {
		//web3.eth.defaultAccount = user_name;
		//$("#greeting").val(helloWorldContract.say());
    }

    // 업데이트
    function refresh() {
		// web3.eth.defaultAccount = user_name;
        $("#framfund").val(framFundContract.say());
    }

    //카운트 증가
    function update() {
        alert(""+$("#framfund").val());
        //web3.eth.defaultAccount = user_name;
        framFundContract.setGreeting($("#framfund").val());
    }

	// 스마트 컨트랙트 등록
    function input() {
		$("#contract_loading").append("<div>스마트 컨트랙트 체결 중입니다... 잠시만 기다려주세요.</div>");
		$("#contract_loading").append("<div><img src='<?php echo base_url(); ?>assets/img/loading.gif' alt='loading'></div>");

        framFundContract.setFund_name($("#a1").val());
        framFundContract.setInvestor($("#a2").val());
        framFundContract.setPayment($("#a3").val());

		// 일정 시간 후 리다이렉트
		setTimeout(function() {
			alert("스마트 컨트랙트가 체결되었습니다.");
			if(redirect_uri == "") {
				window.location.href = "/api/?route=ethsol";
			} else {
				window.location.href = redirect_uri;
			}
		}, 10000);
    }

	// 스마트 컨트랙트 조회
    function view() {
        $("#a1").val(framFundContract.getFund_name());
        $("#a2").val(framFundContract.getInvestor());
        $("#a3").val(framFundContract.getPayment());
    }

    // 스마트 컨트랙트 모니터로 접속
    function monitor() {
		window.location.href = "/api/?route=ethmon";
	}

    // JSON 메시지 생성
    function createJSONdata(method, params) {
        var JSONdata = {
        "jsonrpc" : "2.0",
			"method" : method,
			"params" : params
        };
        return JSONdata;
    }

    // JSON-RPC 실행
    function executeJsonRpc(url_exec, JSONdata, success, error) {
        $.ajax({
            type : 'post',
            url : url_exec,
            data : JSON.stringify(JSONdata),
            contentType : 'application/JSON',
            dataType : 'JSON',
            scriptCharset : 'utf-8',
            success : function(data) {
                success(data);
            },
            error : function(data) {
                error(data);
            }
        });
    }
    
    function redirect() {
		if(redirect_uri == "") {
			window.location.href = "/api/?route=ethsol";
		} else {
			window.location.href = redirect_uri;
		}
	}

    $(document).ready(function() {
		if(redirect_uri != "") {
			$("#contract_buttons").css("display", "none");
			input(); // 스마트 컨트랙트 체결 진행
		}
	});
</script>
</head>
<body>
	<div id="container">
		<h1>JKS Company - Smart Contract</h1>

		<form class="pure-form pure-form-aligned" action="<?php echo base_url(); ?>" onsubmit="return false;">
			<fieldset>
				<legend>스마트 컨트랙트 체결</legend>

				<div class="pure-control-group">
					<label for="">적요</label>
					<input type="text" id="a1" value="<?php echo $subject; ?>">
					<span class="pure-form-message-inline">필수 입력입니다.</span>
				</div>

				<div class="pure-control-group">
					<label for="a2">상세</label>
					<input type="text" id="a2" value="<?php echo $content; ?>">
					<span class="pure-form-message-inline">필수 입력입니다.</span>
				</div>

				<div class="pure-control-group">
					<label for="a3">금액</label>
					<input type="text" id="a3" value="<?php echo $amount; ?>">
					<span class="pure-form-message-inline">필수 입력입니다.</span>
				</div>

				<p id="contract_loading"></p>

				<div id="contract_buttons" class="pure-controls">
					<button type="submit" class="pure-button pure-button-primary" onclick="input();">체결</button>
					<button type="button" class="pure-button" onclick="update();">Update</button>
					<button type="button" class="pure-button" onclick="refresh();">Refresh</button>
					<button type="button" class="pure-button" onclick="view();">View</button>
					<button type="button" class="pure-button" onclick="monitor();">Monitor</button>
					<button type="button" class="pure-button" onclick="redirect();">Redirect</button>
				</div>
			</fieldset>
		</form>

		<p>JKS Company.</p>
	</div>
</body>
</html>
