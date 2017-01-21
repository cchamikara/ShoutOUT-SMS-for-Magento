/**
 * ShoutOUT Lite (https://lite.getshoutout.com/).
 *
 * @category    Shoutout
 * @package     Shoutout_Sms
 * @author      Chamal Chamikara <chamalchamikara@gmail.com>
 * @copyright   Copyright (c) 2017 Chamal Chamikara. (http://www.learnmagento.com/)
 */
$j( document ).ready(function() {
    $j('.sms-template .customer-attributes .helper-hooks span').click(function () {
        // for displaying in input
        var _currentClass = $j(this).attr('class');
        var _releventTextAreaIs = $j('#text_hook_'+_currentClass);
        var caretPos = _releventTextAreaIs[0].selectionStart;
        _releventTextAreaIs.val(_releventTextAreaIs.val().substring(0, caretPos) + $j(this).html() + _releventTextAreaIs.val().substring(caretPos) );

        // place cursor at the end of the input text
        var el = _releventTextAreaIs.get(0);
        var elemLen = el.value.length;
        el.selectionStart = elemLen;
        el.selectionEnd = elemLen;
        el.focus();

        // for displaying in preview
        var inactiveTextArea = $j('.right-textarea textarea[status="'+_releventTextAreaIs.attr('status')+'"]');
        var caretPosInactive = inactiveTextArea[0].selectionStart;
        inactiveTextArea.val(inactiveTextArea.val().substring(0, caretPosInactive) + $j(this).attr('title') + inactiveTextArea.val().substring(caretPosInactive) );
    });

    // realtime value copying from input to preview
    $j(".active-textarea").keyup(function() {
        var _currentTextArea = $j(this);
        var _releventInactiveTextArea = $j('.right-textarea textarea[status="'+_currentTextArea.attr('status')+'"]');
        _releventInactiveTextArea.val(replaceText(_currentTextArea.val()));
    });

    // for generating preview on page load
    $j( ".left-textarea textarea" ).each(function() {
        var _currentTextArea = $j(this);
        var _releventInactiveTextArea = $j('.right-textarea textarea[status="'+_currentTextArea.attr('status')+'"]');
        _releventInactiveTextArea.val(replaceText(_currentTextArea.val()));
    });

});

function replaceText(string){
    _replaceArray = ['customer_id', 'customer_email', 'customer_company', 'customer_lastname', 'customer_firstname', 'customer_address', 'customer_postcode', 'customer_city', 'customer_country', 'customer_state', 'customer_phone', 'customer_vat_number', 'customer_invoice_company', 'customer_invoice_lastname', 'customer_invoice_firstname', 'customer_invoice_address', 'customer_invoice_postcode', 'customer_invoice_city', 'customer_invoice_country', 'customer_invoice_state', 'customer_invoice_phone', 'customer_invoice_vat_number', 'shop_email', 'shop_phone', 'order_id', 'order_total_paid', 'order_currency', 'order_date', 'carrier_name'];
    var _preview = '';
    for(var i = 0; i < _replaceArray.length; i++) {
        var _replaceWith = $j( '.sms-template .customer-attributes .helper-hooks span:contains("{'+_replaceArray[i]+'}")').attr('title');
        _preview = string.replace(new RegExp('{'+_replaceArray[i]+'}', 'gi'), _replaceWith);
        string = _preview;
    }
    return _preview;
}