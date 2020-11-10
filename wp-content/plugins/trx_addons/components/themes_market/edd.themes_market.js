/**
 * Themes market: Admin utils
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.6.34
 */

jQuery(document).ready(function() {
	"use strict";
	
	// Change price options in the mode 'Multi'
	jQuery('.edd_price_options.edd_multi_mode input[type="checkbox"]').on('change', function() {
		var opt_list = jQuery(this).parents('.edd_price_options');
		// Disable check both 'Regular' and 'Extended'
		var li = jQuery(this).parents('li'),
			li_id = li.attr('id');
		if (li_id.indexOf('_regular') > 0 || li_id.indexOf('_extended') > 0) {
			var price2 = opt_list.find('li[id*="'+(li_id.indexOf('_regular') > 0 ? '_extended' : '_regular')+'"] input[type="checkbox"]:checked');
			if (price2.length > 0) {
				price2.get(0).checked = false;
			}
		}
		// Recalc subtotals on options change
		var total = 0;
		var curr = opt_list.find('.edd_price_option_price').html().replace(/[0-9\.,]/g, '');
		// Disable uncheck all elements
		if (opt_list.find('input[type="checkbox"]:checked').length == 0) {
			opt_list.find('li:first-child input[type="checkbox"]').get(0).checked = true;
		}
		// Calc subtotals
		opt_list.find('input[type="checkbox"]:checked').each(function() {
			var price = jQuery(this).data('price');
			price = isNaN(price) ? 0 : Number(price);
			total += price;
		});
		opt_list.find('.trx_addons_edd_purchase_subtotal_value').html(curr+total.formatMoney());
	});
});