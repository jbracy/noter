
    <form method="post" action="{{ url:site uri='cart/update' }}" class="firesale">

        <table class="cart">
            <thead>
                <tr>
                    <th class="remove"><?php echo lang('firesale:cart:label_remove'); ?></th>
                    <th class="name"><?php echo lang('firesale:cart:label_name'); ?></th>
                    <th><?php echo lang('firesale:cart:label_unit_price'); ?></th>
                    <th><?php echo lang('firesale:cart:label_total'); ?></th>
                </tr>
            </thead>
            <tbody>
{{ if contents != false }}
{{ contents }}
                <tr>
                    <td class="remove"><input type="checkbox" name="item[{{ rowid }}][remove]" value="1" /></td>
                    <td class="name"><a href="{{ firesale:url route="product" id=id }}">{{ name }}</a></td>
                    <td>{{ if old_price }}<del>{{ old_price }}</del> {{ endif }}{{ price }}</td>
                    <td>{{ if old_sub }}<del>{{ old_sub }}</del> {{ endif }}{{ subtotal }}</td>
                </tr>
{{ /contents }}
{{ else }}
                <tr><td colspan="8"><center><strong><?php echo lang('firesale:cart:label_no_items_in_cart'); ?></strong></center></td></tr>
{{ endif }}
            </tbody>
        </table>

        <section id="cart-buttons">
            <div class="right">
                <button type="submit" name="btnAction" value="update" class="btn"><span><?php echo lang('firesale:cart:button_update'); ?></span></button>
                <button type="submit" name="btnAction" value="checkout" class="btn"><span><?php echo lang('firesale:cart:button_goto_checkout'); ?></span></button>
            </div>
        </section>

        <section id="cart-totals">
            <ul>
                <li><label><?php echo lang('firesale:cart:label_sub_total'); ?>:</label><span>{{ subtotal }}</span></li>
                <li><label><?php echo lang('firesale:cart:label_tax'); ?>:</label><span>{{ tax }}</span></li>
                <li class="large"><label><?php echo lang('firesale:cart:label_total'); ?>:</label><span>{{ total }}</li>
            </ul>
            <br class="clear" />
        </section>

    </form>
