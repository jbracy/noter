
      <div class="firesale width-full confirmation">
		{{ if ship_to }}
        <div class="firesale width-onethird">
          <h2>Shipping Address</h2>
          <ul>
            {{ if ship_to.firstname }}<li>{{ ship_to.fistname }}</li> {{ endif }}
            {{ if ship_to.address1 }}<li>{{ ship_to.address1 }}</li> {{ endif }}
            {{ if ship_to.address2 }}<li>{{ ship_to.address2 }}</li> {{ endif }}
            {{ if ship_to.city }}<li>{{ ship_to.city }}</li> {{ endif }}
            {{ if ship_to.postcode }}<li>{{ ship_to.postcode }}</li> {{ endif }}
            <li>{{ ship_to.country.name }}</li>
          </ul>
        </div>
		{{ endif }}
        <div class="firesale width-onethird">
          <h2>Billing Address:</h2>
          <ul>
            {{ if bill_to.firstname }}<li>{{ bill_to.fistname }}</li> {{ endif }}
            {{ if bill_to.address1 }}<li>{{ bill_to.address1 }}</li> {{ endif }}
            {{ if bill_to.address2 }}<li>{{ bill_to.address2 }}</li> {{ endif }}
            {{ if bill_to.city }}<li>{{ bill_to.city }}, {{ if bill_to.postcode }}{{ bill_to.postcode }}{{ endif }}</li> {{ endif }}
            <li>{{ bill_to.country.name }}</li>
          </ul>
        </div>
		<br />
        <div class="firesale width-onethird payment last">
          <h2>Payment Details</h2>
		  {{ payment }}
        </div>

		<br />
		
		<div class="firesale width-onethird">
        	<h2>Order:</h2>
	        <table class="firesale standard orders" width="100%" cellpadding="1" cellspacing="0" border="0">
	          <thead>
	          <tr>
	            <th><?php echo lang('firesale:label_product'); ?></th>
	            <th><?php echo lang('firesale:cart:label_quantity'); ?></th>
	            <th><?php echo lang('firesale:cart:label_unit_price'); ?></th>
	            <th><?php echo lang('firesale:cart:label_total'); ?></th>
	          </tr>
	          <tbody>
	{{ items }}
	            <tr>
				  <tr><td colspan="4"><br /></td></tr>
	              <td>{{ name }}</td>
	              <td>{{ qty }}</td>
	              <td>{{ price }}</td>
	              <td>{{ total }}</td>
	            </tr>
	{{ /items }}
	          </tbody>
	          <tfoot >
				<tr><td colspan="4" style="border-bottom:1px solid #000;"><br /></td></tr>
	            <tr>
				  <td colspan="2"></td>
	              <td><strong>Sub-Total:</strong></td>
	              <td>{{ price_sub }}</td>
	            </tr>
	            <tr>
			 	  <td colspan="2"></td>
	              <td><strong>Shipping:</strong></td>
	              <td>{{ price_ship }}</td>
	            </tr>
	            <tr class="last">
				  <td colspan="2"></td>              
				  <td class="large"><strong>Total:</strong></td>
	              <td class="large price">{{ price_total }}</td>
	            </tr>
	          </tfoot>
	        </table>
		</div>
      </div>