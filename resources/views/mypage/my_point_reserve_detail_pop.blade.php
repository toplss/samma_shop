<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title', '삼마몰')</title>

	<link rel="stylesheet" href="{{ asset('css/common.css') }}?v={{ config('asset.version') }}">
	<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}?v={{ config('asset.version') }}">
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}?v={{ config('asset.version') }}">
	<link rel="stylesheet" href="{{ asset('css/sub.css') }}?v={{ config('asset.version') }}">
	
</head>
<body>

<div class="point-pop">
    <h6>적립금 상세내역</h6>
    <div class="pp-table">
        <table>
            <tr>
                <th>구분</th>
                <th>상품정보</th>
                <th>수량</th>
                <th>금액</th>
            </tr>
            <tr>
                <td rowspan="4" class="bg">취소</td>
                <td>
                    <div class="pp-flex">
                        <img src="/images/item/A00029/123.jpg" alt="">
                        <p>[농심]오징어집1700 <small>(78g*20입)</small></p>
                    </div>
                </td>
                <td>1box</td>
                <td>13,140원</td>
            </tr>    
            <tr>
                <td>
                    <div class="pp-flex">
                        <img src="/images/item/A00029/123.jpg" alt="">
                        <p>[농심]오징어집1700 <small>(78g*20입)</small></p>
                    </div>
                </td>
                <td>1box</td>
                <td>13,140원</td>
            </tr>     
            <tr>
                <td>
                    <div class="pp-flex">
                        <img src="/images/item/A00029/123.jpg" alt="">
                        <p>[농심]오징어집1700 <small>(78g*20입)</small></p>
                    </div>
                </td>
                <td>1box</td>
                <td>13,140원</td>
            </tr>    
            <tr>
                <td class="txt-right">외 3건</td>
                <td></td>
                <td>50,000원</td>
            </tr>   


            <tr>
                <td rowspan="3" class="bg">물류파손</td>
                <td>
                    <div class="pp-flex">
                        <img src="/images/item/A00168/1066_7ZW07YOc7KCc6rO87ZmI65w67O87LSI7L2U1800.jpg" alt="">
                        <p>[해태제과]홈런볼-초코1800 <small>(46g*30입)</small></p>
                    </div>
                </td>
                <td>3box</td>
                <td>24,640원</td>
            </tr>    
            <tr>
                <td>
                    <div class="pp-flex">
                        <img src="/images/item/A00168/1066_7ZW07YOc7KCc6rO87ZmI65w67O87LSI7L2U1800.jpg" alt="">
                        <p>[해태제과]홈런볼-초코1800 <small>(46g*30입)</small></p>
                    </div>
                </td>
                <td>3box</td>
                <td>24,640원</td>
            </tr>    
            <tr>
                <td>
                    <div class="pp-flex">
                        <img src="/images/item/A00168/1066_7ZW07YOc7KCc6rO87ZmI65w67O87LSI7L2U1800.jpg" alt="">
                        <p>[해태제과]홈런볼-초코1800 <small>(46g*30입)</small></p>
                    </div>
                </td>
                <td>3box</td>
                <td>24,640원</td>
            </tr>        
        </table>
    </div>
</div>




</body>
</html>