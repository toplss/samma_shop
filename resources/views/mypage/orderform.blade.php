@extends('layouts.header')

@section('title', '주문하기 페이지')

@section('content')

<div class="sub-container">
  <div class="sub-title-wrap">
    <h4>주문/결제</h4>  
  </div>

  <div class="orderform-wrap">
    <h4>배송 정보</h4>
    <table class="odr-delivery-table">
      <tr>
        <th>상호</th>
        <td><input type="text" name="od_company" value="플존PC방(성남.미금점)" id="od_company" readonly></td>
      </tr>
      <tr>
        <th>이름</th>
        <td><input type="text" name="od_name" value="한명화" id="od_name" readonly></td>
      </tr>
      <tr>
        <th>휴대폰번호</th>
        <td><input type="text" name="od_hp" value="010-9999-2684" id="od_hp" readonly></td>
      </tr>
      <tr>
        <th>전화번호</th>
        <td><input type="text" name="od_tel" value="010-9877-6540" id="od_tel" readonly></td>
      </tr>
      <tr>
        <th>이메일</th>
        <td><input type="text" name="od_email" value="mhhappy8800@naver.com" id="od_email" readonly></td>
      </tr>
      <tr>
        <th>주소</th>
        <td>
          <p>
            <span id="od_addr_jibeon_txt">경기 성남시 분당구  돌마로 80 (현대벤처빌오피스텔)</span>
            <span id="od_addr2_txt">지하1층 101호,102호 플존PC방(미금점)</span>
          </p>
          <p style="color:#da2727;">※ 주소 변경시 고객센터 (031-238-9661) 로 연락주시기 바랍니다.</p>
        </td>
      </tr>
      <tr>
        <th>배송요일</th>
        <td>
          <ul class="delivery-days">
            <li>월</li>
            <li class="on">화</li>
            <li>수</li>
            <li>목</li>
            <li>금</li>
            <li>토</li>
          </ul>
          <p style="color:#da2727;">※ 배송요일 하루전 오후 2시이전 주문시 원활한 납품을 받으실 수 있습니다.</p>
					<p class="near_delivery_info">납품 : <span >1월 21일 (수)</span></p>		
        </td>
      </tr>
    </table>
    
    <h4>상품 정보</h4>
    <div class="ord-item-wrap">
      <!-- 상온 -->
      <table class="ord-item-table1">
        <thead>
          <tr>
            <th colspan="5">상온제품</th>
          </tr>
          <tr>
            <th>이미지</th>
            <th>상품명</th>
            <th>규격</th>
            <th>수량</th>
            <th>금액</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><img src="https://sammamall.com/mall/data/item/C00283/thumb-4336_400x400.png" alt=""></td>
            <td>[코카콜라]몬스터에너지(하늘)망고로코/뚱캔</td>
            <td>355ml*24입</td>
            <td>1</td>
            <td>37,560원</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">합계</th>
            <th>1</th>
            <th>37,560원</th>
          </tr>
        </tfoot>
      </table>
      <!-- 저온 -->
      <table class="ord-item-table2">
        <thead>
          <tr>
            <th colspan="5">저온제품</th>
          </tr>
          <tr>
            <th>이미지</th>
            <th>상품명</th>
            <th>규격</th>
            <th>수량</th>
            <th>금액</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><img src="https://sammamall.com/mall/data/item/C00283/thumb-4336_400x400.png" alt=""></td>
            <td>[코카콜라]몬스터에너지(하늘)망고로코/뚱캔</td>
            <td>355ml*24입</td>
            <td>1</td>
            <td>37,560원</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">합계</th>
            <th>1</th>
            <th>37,560원</th>
          </tr>
        </tfoot>
      </table>

    </div>

    <table class="ord-price-table">
      <h4>총 주문금액</h4>
      <tr>
        <th>상온 합계</th>
      </tr>

    </table>

    <h4>충전금/적립금</h4>
    <table class="ord-point-table">
      <tr>
        <th>충전금 사용</th>
        <td>
          <p class="my-point">
            <input type="text" name="input_od_temp_point" value="" id="input_od_temp_point"> 
            <u>원</u>
          </p>
          <span>(보유충전금 : <b>3,000원</b>)</span>
          <label><input type="checkbox" name="all_use_temp_point" id="all_use_temp_point" value="1" onchange="show_temp_point();">충전금 전액</label>
        </td>
      </tr>
      <tr>
        <th>적립금 사용</th>
        <td>
          <p class="my-point">
            <input type="text" name="input_od_temp_point_reserve" value="" id="input_od_temp_point_reserve">
            <u>원</u>
          </p>
          <span>(보유적립금 : <b>190,000원</b>)</span>
          <label><input type="checkbox" name="all_use_temp_point_reserve" id="all_use_temp_point_reserve" value="1" onchange="show_temp_point_reserve();">적립금 전액</label>
        </td>
      </tr>
      <tr>
        <th>사용합계</th>
        <td>
          <span id="temp_point_txt">충전금 사용 3,000원</span>
          <span id="temp_point_reserve_txt">적립금 사용 0원</span>
          <span id="total_use_temp_point_txt">합계 3,000원</span>
        </td>
      </tr>
      <tr>
        <th>결제금액</th>
        <td id="payment_amount_txt">383,450원</td>
      </tr>
    </table>

    <h4>당월 잔액</h4>
    <table class="ord-balance-table">
      <tr>
        <th>당월 잔액</th>
        <td>
          <p>214,770원</p>
          <span>[입금계좌 : 기업은행 785-010521-97-306]</span>
        </td>
      </tr>
    </table>


    <div class="payment_bot">
      <!-- 선불 -->
		  <div class="pay_before">
				<h4>결제방법</h4>
					<ul>
            <li class="od_settle_finance_vbank">
              <label for="od_settle_finance_vbank">
                <input type="radio" id="od_settle_finance_vbank" name="od_settle_case" value="금융권가상계좌"onclick="pay_ch(this)">금융권 가상계좌
              </label>
            </li>
		        <li class="od_settle_charge">
							<label>
                <input type="radio" id="od_settle_charge" name="od_settle_case" value="충전금"onclick="pay_ch(this)">
									충전금결제
							</label>
						</li>
            <li class="od_settle_reserve">
								<label>
									<input type="radio" id="od_settle_reserve" name="od_settle_case" value="적립금"onclick="pay_ch(this)">
									적립금결제
								</label>
						</li>
            <li class="od_settle_charge_reserve">
              <label>
                <input type="radio" id="od_settle_charge_reserve" name="od_settle_case" value="충전금+적립금" class="checker" onclick="pay_ch(this)">
                충전금+적립금결제
              </label>
						</li>
          </ul>

          <dl>
            <dt>입금계좌</dt>
            <dd id="settle_finance_vbank">기업은행 78501053697467 [ 예금주: 플존PC방(성남.미금점) ]</dd>
            <dt>입금자명</dt>
            <dd><input type="text" name="od_finance_deposit_name" id="od_finance_deposit_name" readonly></dd>
          </dl>						
			</div>

      <!-- 공통 -->
      <div class="pay_now">
        	<p>배송요일 하루전 오후 2시이전 주문시 원활한 납품을 받으실 수 있습니다.</p>
          <ul>
            <li><button type="button" class="od_btn btn3" onclick="forderform_check(this.form);">주문결제</button></li>
            <li><button type="button" class="od_btn_cancel btn1" onclick="loaction.href='/mypage/cart'">장바구니</button></li>
					</ul>
      </div>
		</div>

  </div>




</div>









@endsection


