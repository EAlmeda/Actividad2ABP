import { OrderEffects } from './order/order.effects';
import { ShoppingCartEffects } from './shopping-cart/shopping-cart.effects';
import { ProductEffects } from './product/product.effects';

export const effects: any[] = [
    ProductEffects,
    ShoppingCartEffects,
    OrderEffects,
];
