# ShoutOUT SMS for Magento
Allow your Magento store to send SMS notifications to your customers on order status change.

# Features
- Activate deactivate order status SMS independently
- At the moment module support for following status changes
    - When place a New Order
    - When Order is in Pending Payment status
    - When Order is in Processing Status
    - When Order Complete
    - When Order Closed
    - When Order Canceled
    - When Order Holded
    - When Order is in Payment Review
- Realtime SMS template previewing
- Customizable SMS templates using {customer_id},{customer_email},{customer_company},{customer_lastname},{customer_firstname},{customer_address},{customer_postcode},{customer_city},{customer_country},{customer_state},{customer_phone},{customer_vat_number}, {shop_email},{shop_phone}, {order_id},{order_total_paid},{order_currency},{order_date},{carrier_name}
- View SMS History (Order ID, Order Status, Mobile Number, Created At, SMS Cost (by credit), Message, SMS Status) 
    
# Installation
- Download the module and paste all the files into magento root directory
- Flush cache
- Login to admin panel and navigate to ShoutOUT SMS -> Configurations
- Enter your ShoutOUT API key and other dedatils
- Save
- Now navigate to ShoutOUT SMS -> SMS Templates and add customized SMS templates at your will
- Enjoj !

# Screenshots

![admin configuration](https://s28.postimg.org/ollbglqrx/Screen_Shot_2017_01_21_at_10_43_19_PM.png)

![SMS Templates](https://s28.postimg.org/jx5blf1l9/Screen_Shot_2017_01_21_at_10_42_37_PM.png)

![SMS History](https://s28.postimg.org/mfr0m3nbh/Screen_Shot_2017_01_21_at_10_42_59_PM.png)