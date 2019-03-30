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
  <tr>
  	<td align="left">
        Sub Total<br>
        Bill Discount<br>
        <b>TOTAL</b><br>
        Before VAT<br>
        VAT 7%<br>
        Total Item<br>
        Pay Cash<br>
        Change
    </td>
  
    <? $vat = ($sum_s * 7) / 107; ?>

  	<td align="right">
        {{ number_format($sum_s,2,'.',',') }}<br>
        {{ number_format($bill->sb_discount,2,'.',',') }}<br>
        <b>{{ number_format($sum_s - $bill->sb_discount,2,'.',',') }}</b><br>
        {{ number_format($sum_s - $vat,2,'.',',') }}<br>
        {{ number_format($vat,2,'.',',') }}<br>
        {{ $num }}<br>
        {{ number_format($bill->sb_money,2,'.',',') }}<br>
        {{ number_format($bill->sb_money - ($sum_s - $bill->sb_discount),2,'.',',') }}
    </td>
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
  <meta http-equiv="refresh" content="0;url={{ url('salebill/'.$bill->sb_no.'/'.$pp) }}">
@else
  <meta http-equiv="refresh" content="0;url={{ url('sale') }}">
@endif

@endsection

