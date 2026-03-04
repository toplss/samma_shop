@extends('layouts.header')

@section('title', '장바구니 페이지')

@section('content')

<div class="sub-container">
  <div class="sub-title-wrap">
    <h4>장바구니</h4>  
  </div>
  
  @include('layouts.mypage_top')

  <div class="cart-wrap">
    <table class="cart-table">
      <thead>
        <tr>
          <th>
            <input type="checkbox" name="ct_chkall" value="1" id="ct_chkall" style="width:14px; height:14px;" onclick="ct_check_all(this.form)">
          </th>
          <th>번호</th>
          <th>상품명</th>
          <th>판매가</th>
          <th>상세</th>
          <th>보관/반품유형</th>
          <th>수량</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="cart-table-check">
            <label for="ct_chk_0">
              <input type="checkbox" name="ct_chk[]" value="0" id="ct_chk_0" class="ct_chk" it_id="C00283" style="width:14px; height:14px;">
            </label>
          </td>
          <td class="cart-table-num">1</td>
          <td class="cart-table-title">
            <div>
              <img src="https://sammamall.com:443/mall/data/item/C00283/thumb-4336_400x400.png" width="60" height="60" alt="">
              <h6>[동서식품]레드불(분홍)핑크에디션/일반캔<i>(250ml*24입)</i></h6>              
            </div>
          </td>
          <td class="cart-table-price">29,760원</td>
          <td class="cart-table-cost"><p>개당단가 <span>0</span>원</p><p>권장판매가 <span>0</span>원</p></td>
          <td class="cart-table-type"><span class="room_temp">상온</span><span class="return_o">반품가능</span></td>
          <td class="cart-table-ea">
            <div>
              <p class="Qua wish-num">
                <button type="button" class="sit_qty_minus" data-it_id="C00283">
                  <img src="{{ asset('images/icon/minus.svg') }}">
                </button> 
                <input type="text" name="ct_qty[C00283][0]" id="ct_qty_C00283" value="1" class="cart_ct_qty_C00283" onkeyup="qty_btn_C00283(0); update_cart_ajax_C00283('47899', 'C00283');" onchange="qty_btn_C00283(0); update_cart_ajax_C00283('47899', 'C00283');">
                <button type="button" class="sit_qty_plus">
                  <img src="{{ asset('images/icon/plus.svg') }}">
                </button>
              </p>
              <button id="buy_box_btn" class="btn2" onclick="Sendit_cart_ajax_B00078('B00078'); return false;">박스구매</button>
              <a href="javascript:;" class="sit_delete_btn" data-it_id="C00283"><img src="{{ asset('images/icon/trash.svg') }}"></a>
            </div>

          </td>
        </tr>

      </tbody>
      <tfoot>
        <tr>
          <th colspan="7">
            <div>
              <button type="button" class="btn3" onclick="return form_check('seldelete');">선택삭제</button>
              <button type="button" class="btn1" onclick="return form_check('alldelete');">전체삭제</button>              
            </div>
          </th>
        </tr>


      </tfoot>
    </table>

    <div class="odr-cart">
      <h3>결제금액</h3>
      <ul class="odr-payment">
          <li class="total-each">
            <p>상온제품 합계<span id="_prd_type_1_price" class="reload_cart_price_1">212,640</span>원</p>
            <p>저온제품 합계<span id="_prd_type_2_price" class="reload_cart_price_2">173,810</span>원</p>
          </li>
          <li class="icon2">
            <img src="{{ asset('images/icon/plus.svg') }}">
          </li>
          <li class="delivery">
            <p>배송비<span id="_delivery_price" class="reload_total_send_cost">0</span> 원</p>
          </li>
          <li class="icon2"><img src="{{ asset('images/icon/equals.svg') }}"></li>
          <li class="total">
            <p><span id="_price_sum" class="reload_total_cart_price">386,450</span>원</p>
            <button type="button" class="btn1" onclick="location.href='/mypage/orderform'">구매하기</button>
          </li>
      </ul>
    </div>
  </div>




</div>









@endsection


