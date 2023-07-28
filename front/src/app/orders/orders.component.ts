import { Component, OnInit } from '@angular/core';
import { OnlineOrderService } from './online-order.service';
import { CustomerService } from '../customer.service';
import { OnlineOrder } from 'src/models/OnlineOrder';

@Component({
  selector: 'app-orders',
  templateUrl: './orders.component.html',
  styleUrls: ['./orders.component.scss'],
})
export class OrdersComponent implements OnInit {
  orders: OnlineOrder[];

  constructor(private customerService: CustomerService) {}

  ngOnInit(): void {

    this.customerService.getOnlineOrdersByCustomer('7').subscribe((res) => {
      this.orders = res.data;
    });
  }
}
