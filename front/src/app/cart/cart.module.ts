import { LOCALE_ID, NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ShoppingCartComponent } from './shopping-cart/shopping-cart.component';
import { ShoppingCartItemComponent } from './shopping-cart-item/shopping-cart-item.component';
import { SharedModule } from '../shared/shared.module';

@NgModule({
  declarations: [
    ShoppingCartComponent,
    ShoppingCartItemComponent
  ],
  imports: [
    CommonModule,
    SharedModule
  ]
})
export class CartModule { }
