import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { OrdersComponent } from './orders.component';
import { OrderDisplayComponent } from './order-display/order-display.component';

@NgModule({
  declarations: [OrderDisplayComponent, OrdersComponent],
  imports: [CommonModule],
})
export class OrdersModule {}
