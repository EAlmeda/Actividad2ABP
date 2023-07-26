import { Component, OnInit } from '@angular/core';
import { Store } from '@ngrx/store';
import { Observable } from 'rxjs';
import { OnlineOrder } from 'src/models/OnlineOrder';
import { selectOnlineOrderList } from 'src/store';

@Component({
  selector: 'app-orders',
  templateUrl: './orders.component.html',
  styleUrls: ['./orders.component.scss'],
})
export class OrdersComponent implements OnInit {
  public orders$: Observable<OnlineOrder[]>;
  // orders: any[] = [
  //   {
  //     id: '#74895432',
  //     amount: 14,
  //     datetime: '2023-07-12 14:25:32',
  //     expected_datetime: '2023-07-12 14:52:32',
  //     address: '7 St Laurences, Chape',
  //     type: 'DELIVERY',
  //     status: 'COOKING',
  //   },
  //   {
  //     id: '#7321654',
  //     amount: 58,
  //     datetime: '2023-07-12 17:25:32',
  //     expected_datetime: '2023-07-12 18:52:32',
  //     address: '8 St Grove, Bally',
  //     type: 'DELIVERY',
  //     status: 'DELIVERING',
  //   },
  // ];

  constructor(private store: Store) {
    this.orders$ = this.store.select(selectOnlineOrderList);
  }

  ngOnInit(): void {}
}
