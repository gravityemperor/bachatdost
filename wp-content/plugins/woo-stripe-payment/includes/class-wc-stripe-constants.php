<?php
defined( 'ABSPATH' ) || exit();

/**
 *
 * @since 3.1.0
 * @author Payment Plugins
 *
 */
class WC_Stripe_Constants {

	const CUSTOMER_ID = '_wc_stripe_customer';

	const PAYMENT_METHOD_TOKEN = '_payment_method_token';

	const PAYMENT_INTENT_ID = '_payment_intent_id';

	const PAYMENT_INTENT = '_payment_intent';

	const MODE = '_wc_stripe_mode';

	const CHARGE_STATUS = '_wc_stripe_charge_status';

	const SOURCE_ID = '_stripe_source_id';

	const STRIPE_INTENT_ID = '_stripe_intent_id';

	const STRIPE_CUSTOMER_ID = '_stripe_customer_id';

	const SUCCESS = 'success';

	const FAILURE = 'failure';

	const WOOCOMMERCE_STRIPE_ORDER_PAY = 'WOOCOMMERCE_STRIPE_ORDER_PAY';

	const PRODUCT_GATEWAY_ORDER = '_stripe_gateway_order';

	const BUTTON_POSITION = '_stripe_button_position';

	/**
	 *
	 * @since 3.1.3
	 * @var unknown
	 */
	const REDIRECT_HANDLER = 'redirect_handler';

	/**
	 * @since 3.2.11
	 */
	const PROCESSING_PAYMENT = 'processing_payment';

	/**
	 * @since 3.3.3
	 */
	const REQUIRES_CONFIRMATION = 'requires_confirmation';

	const REQUIRES_ACTION = 'requires_action';

	const SUCCEEDED = 'succeeded';

	const REQUIRES_CAPTURE = 'requires_capture';

	const REQUIRES_PAYMENT_METHOD = 'requires_payment_method';

	const SETUP_INTENT_ID = '_setup_intent_id';
}
