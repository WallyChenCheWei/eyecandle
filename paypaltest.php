<?php

//SANDBOX
//      $payPalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr&cmd=_xclick&business=heyima_1280121668_biz@gmail.com
//          &item_number='.$arrayId.'&trade_sn='.$arrayId.'&item_name='.$arrayService.'&amount='.$total.'
//          &currency_code=USD&no_shipping=1&no_note=1&charset=utf-8&rm=2
//          &notify_url='.$host.'/index/payresult
//          &return='.$host.'/member/payok
//          &cancel_return='.$host.'/member/shoppingcartlist';
//&notify_url='.$host.'/member/payresult
      $payPalURL = 'https://www.paypal.com/cgi-bin/webscr&cmd=_xclick&business=topadmitservice@gmail.com
          &item_number='.$arrayId.'&trade_sn='.$arrayId.'&item_name='.$arrayService.'&amount='.$total.'
          &currency_code=USD&no_shipping=1&no_note=1&charset=utf-8&rm=2
          &notify_url='.$host.'/index/payresult
          &return='.$host.'/member/payok
          &cancel_return='.$host.'/member/shoppingcartlist';
      $this->_redirect($payPalURL);