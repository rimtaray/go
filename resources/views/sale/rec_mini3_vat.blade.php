@extends('layouts.receive')

@section('content')

<table width="300"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center">
    	<b>{{ $shop->m_inv_name }}</b><br>
        {{ $shop->m_inv_add }} {{ $shop->m_inv_tel}}<br>
        TAX INVOICE (ABB.)<br>
        TAX ID : {{ $shop->m_inv_no }}<br>
        ใบเสร็จรับเงิน/ใบกำกับภาษีอย่างย่อ
    </td>
  </tr>
  <tr>
    <td colspan="2" align="left">
    	Date : {{ $bill->created_at }}<br>
        Receipt No : {{ $bill->sb_no }}<br>
        CASHIER : {{ $bill->u_name }}
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><hr></td>
  </tr>
        <? 
        $num = '0'; 
        $sum_p = '0';
        $sum_s = '0';
        ?>
        @foreach($sale as $sale)

        <? 
        $num++ ; 
        $sum_p += $sale->s_pprice;
        $sum_s += $sale->s_price;
        ?>

          <tr>
            <td colspan="2" align="left">{{ $sale->s_barcode }}  {{ $sale->s_pname }}</td>
          </tr>
          <tr>
            <td align="left">ET {{ $sale->s_num }} x {{ number_format($sale->s_pprice,2,'.',',') }}</td>
            <td align="right"><?=number_format(($sale->s_pprice * $sale->s_num),2,'.',',');?></td>
          </tr>
                @if($sale->s_pprice > $sale->s_price)               
                <tr>
                  <td align="left">ส่วนลด</td>
                  <td align="right">- <?=number_format($sale->s_pprice - $sale->s_price,2,'.',',');?></td>
                </tr>
                @endif
                   
        @endforeach


  <tr>
    <td colspan="2" align="center"><hr></td>
  </tr>

  <? $vat = ($sum_s * 7) / 107; ?>

  <tr>
    <td align="left">Sub Total</td><td align="right">{{ number_format($sum_s,2,'.',',') }}</td>
  </tr>
  <tr>
    <td align="left">Bill Discount</td><td align="right">{{ number_format($bill->sb_discount,2,'.',',') }}</td>
  </tr>
  <tr>
    <td align="left"><b>TOTAL</b></td><td align="right"><b>{{ number_format($sum_s - $bill->sb_discount,2,'.',',') }}</b></td>
  </tr>
  <tr>
    <td align="left">Before VAT</td><td align="right">{{ number_format($sum_s - $vat,2,'.',',') }}</td>
  </tr>
  <tr>
    <td align="left">VAT 7%</td><td align="right">{{ number_format($vat,2,'.',',') }}</td>
  </tr>
  <tr>
    <td align="left">Total Item</td><td align="right">{{ $num }}</td>
  </tr>
  <tr>
    <td align="left">Pay Cash</td><td align="right">{{ number_format($bill->sb_money,2,'.',',') }}</td>
  </tr>

    <? 
    // วิธีจ่ายเงินอื่นๆ
    if($tbcheck){
      foreach($tbcheck as $tbcheck){
        echo '<tr><td align="left">Check number : ' . $tbcheck->ch_number . '</td><td align="right">' . number_format($tbcheck->ch_amount,2,'.',',') . '</td></tr>'; 
      }
    }

    if($tbpayment){
      foreach($tbpayment as $tbpayment){
        if($tbpayment->pay_type == '1'){
          echo '<tr><td align="left">Credit no : ' . $tbpayment->pay_credit_no . '</td><td align="right">' . number_format($tbpayment->pay_amount,2,'.',',') . '</td></tr>'; 
        }
        if($tbpayment->pay_type == '4'){
          echo '<tr><td align="left">Bank no : ' . $tbpayment->pay_type_id . '</td><td align="right">' . number_format($tbpayment->pay_amount,2,'.',',') . '</td></tr>'; 
        }
      }
    }
    ?>
  <tr>
    <td align="left">Change</td><td align="right">{{ number_format($bill->sb_change,2,'.',',') }}</td>
  </tr>
  <tr>
  	<td colspan="2" align="center">
        <hr>
    	** Have A Nice Day **<br>
        ** Thank You **<br>
    	** VAT Included **
    </td>
  </tr>
</table>


@if(!$pp)
  <? $pp = $shop->m_rec_num - 1;?>
@else
  <? $pp = $pp - 1;?>
@endif

@if($pp > 0)
  <meta http-equiv="refresh" content="0;url={{ url('re_print_receive/'.$bill->sb_no.'/'.$pp) }}">
@else
  <meta http-equiv="refresh" content="0;url={{ url('sale') }}">
@endif

@endsection

