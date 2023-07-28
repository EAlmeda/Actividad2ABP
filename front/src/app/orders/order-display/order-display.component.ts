import { Component, Input, OnInit } from '@angular/core';
import { OnlineOrder } from 'src/models/OnlineOrder';

@Component({
  selector: 'app-order-display',
  templateUrl: './order-display.component.html',
  styleUrls: ['./order-display.component.scss']
})
export class OrderDisplayComponent implements OnInit {

  @Input() order: OnlineOrder;

  constructor() { }

  ngOnInit(): void {
  }

}
