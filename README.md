# reasonableframework-nh-api
2018 KISA-NH농협은행-더루프 핀테크 X 블록체인, NH농협은행 API 연동 with ReasonableFramework PHP

## 테스트 절차
- 입금거래진행 (amount 미설정 시 10)
http://192.168.10.33/api/?route=nhapi&action=deposit&amount=10

- 입금거래조회 (orderTram, orderTsymd, orderIsTuno: 입금거래진행에서 받은 값에 있음)
http://192.168.10.33/api/?route=nhapi&action=depositpop&orderTram=10&orderTsymd=20180601&orderIsTuno=20180601225634320001

- 출금거래진행 (amount 미설정 시 10)
http://192.168.10.33/api/?route=nhapi&action=withdraw&amount=10

- 출금거래조회 ((orderTram, orderTsymd, orderIsTuno: 출금거래진행에서 받은 값에 있음)
http://192.168.10.33/api/?route=nhapi&action=withdrawpop&orderTram=10&orderTsymd=20180601&orderIsTuno=20180601223101246001

- 거래내역조회 (startdate, enddate 미설정 시 오늘 날짜)
http://192.168.10.33/api/?route=nhapi&action=history&startdate=20180601&enddate=20180601
