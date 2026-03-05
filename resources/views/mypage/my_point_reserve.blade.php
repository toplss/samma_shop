@extends('layouts.header')

@section('content')

<div class="sub-container">
  <div class="sub-title-wrap">
      <h4>적립금내역</h4>  
  </div>
  
  <div class="point-wrap">
    
    @include('layouts.mypage_top')

    <p class="mypoint"><span>적립금 정산은 주문 배송일에 정산예정입니다</span></p>

    <table class="table1 point-table">
      <colgroup>
        <col style="width:5%;" class="hide-820">
        <col style="width:22%;">
        <col style="width:15%;">
        <col style="width:22%;">
        <col style="width:22%;">
        <col style="width:auto;">
      </colgroup>
      <thead>
        <tr>
          <th class="hide-820">번호</th>
          <th>날짜</th>
          <th>구분</th>
          <th>적립</th>
          <th>채권</th>
          <th>사용</th>
          {{-- <th>적립금잔액</th> --}}
        </tr>
      </thead>
      <tbody>

        @foreach($items as $index => $row)

          @php
            if ($row->od_delivery_step == 8) {  //잔액조정
              $gubun = '잔액';
            } elseif ($row->po_point_type == 'increase'){
              $gubun = '적립';
            } elseif ($row->po_point_type == 'bond'){
              $gubun = '채권';
            } elseif ($row->po_point_type == 'decrease'){
              $gubun = '사용';              
            }

            //주문삭제건 건너띄기
            if ($row->po_action == 'od_del') {
                continue;
            }

            //적립금 상세내역 가공
            $comment = '';
            $actions = explode('#', $row->po_action);
            $action_cnt = !empty($actions) ? count($actions) : 0;

            foreach ($actions as $key => $action) {

              $str_po_action = [
                "od_use"=>"주문",
                "od_cancel"=>"주문취소",
                "pt_cancel"=>"취소",
                "pt_return"=>"반품",
                "pt_return_receivable"=>"반품채권",
                "pt_outofstock"=>"결품",
                "pt_outofstock_deposit"=>"결품채권",
                "pt_damage_staff"=>"기사파손",
                "pt_damage_logistic"=>"물류파손",
                "pt_incentive"=>"장려금",
                "pt_dc"=>"DC",
                "pt_reserve"=>"주문",
                "pt_buy_reserve"=>"충전",
                "modify"=>"잔액", //잔액조정
              ];
              

              $amount_po_action = [
                "od_use"=>$row->po_point,
                "od_cancel"=>$row->po_point,
                "pt_cancel"=>$row->pt_cancel,
                "pt_return"=>$row->pt_return,
                "pt_return_receivable"=>$row->pt_return_receivable,
                "pt_outofstock"=>$row->pt_outofstock,
                "pt_outofstock_deposit"=>$row->pt_outofstock_deposit,
                "pt_damage_staff"=>$row->pt_damage_staff,
                "pt_damage_logistic"=>$row->pt_damage_logistic,
                "pt_incentive"=>$row->pt_incentive,
                "pt_dc"=>$row->pt_dc,
                "pt_reserve"=>$row->pt_reserve,
                "pt_buy_reserve"=>$row->pt_buy_reserve,
                "modify"=>$row->pt_buy_reserve, //잔액조정
              ];

              //여러 건인 경우 제일 처음건으로 표기
              if ($key > 1) {
                  $po_action = $str_po_action[$actions[0]];
              } else {
                  $po_action = $str_po_action[$action] ?? '';
              }


              $comment .= "<li>
                  <span>" 
                  . $str_po_action[$action] . " " 
                  . (($gubun == '잔액' || $gubun == '채권') ? '' : $gubun)  //반품채권, 결품채권은 이미 채권이라는 단어가 포함되어 있으므로 $gubun값은 빈값으로 처리함
                  . "</span>
                  <b>" . number_format($amount_po_action[$action]) . "원</b>
              </li>";

            }

          @endphp
        <tr>
          <td class="hide-820">{{ $items->firstItem() + $index }}</td>
          <td>{{ \Carbon\Carbon::parse($row->reg_date)->format('Y-m-d') }}</td>
          <td>
            <span class="pt1" onclick='javascript:point_reserve_showDetail(@json($comment));'>
              {{ ($po_action == '잔액') ? '' : $po_action }} {{ ($gubun == '채권') ? '' : $gubun }} {{ ($action_cnt > 1) ? '외 ' . ($action_cnt - 1) . '건' : '' }}
            </span>
          </td>
          <td class="{{ ($gubun == '적립' or $gubun == '잔액') ? 'txt-red' : '' }}">{{ ($gubun == '적립' or $gubun == '잔액') ? number_format($row->change_point) . '원' : '-' }}</td>
          <td class="{{ ($gubun == '채권') ? 'txt-blue' : '' }}">{{ ($gubun == '채권') ? number_format($row->change_point) . '원' : '-' }}</td>
          <td class="{{ ($gubun == '사용') ? 'txt-blue' : '' }}">{{ ($gubun == '사용') ? number_format($row->change_point) . '원' : '-' }}</td>

        </tr>
        @endforeach

        <!-- 이월 -->
        {{-- @if($items->total() > 0)
        <tr class="txt-bold" style="background-color:#f5f5f5;">
          <td class="hide-820"></td>
          <td>이월</td>
          <td colspan="3"></td>
          <td>
            @if($carry_balance > 0)
                {{ number_format($carry_balance) }}원
            @else
                -
            @endif            
          </td>
        </tr>
        @endif --}}


        <!-- 없을때 -->
        @if($items->total() < 1)
        <tr>
          <td colspan="6" height="100">내역이 없습니다.</td>
        </tr>
        @endif

      </tbody>
    </table>

  </div>
    {{ $items->links() }}

</div>
<script>

  //조회날짜 초기 세팅
  $(document).ready(function() {

    @if(!request()->filled('start_date') && !request()->filled('end_date'))
        set_date();
    @endif

  });

  function set_date() {
    const end = new Date();
    const start = new Date(end);
    start.setMonth(start.getMonth() - 2);

    $('#start_date').datepicker('setDate', start);
    $('#end_date').datepicker('setDate', end);
  }
  

  //구분 클릭 시 적립금 상세내역 
  function point_reserve_showDetail(comment) {  

    var detail_content = '';
    detail_content = `

        <ul class="point-pop">
          <li>적립금 상세내역</li>
          ${comment}
        </ul>
    `;    

    Swal.fire({
      html: detail_content,
      icon: 'info',
      confirmButtonText: '확인'
    });    
  }
</script>
@endsection